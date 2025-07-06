<?php

namespace App\Controllers;

use App\Models\DataModel;
use App\Libraries\CurrencyHelper;
use App\Libraries\DateHelper;

class Home extends BaseController
{

    public $db = null;

    public function __construct(){

        date_default_timezone_set('Asia/Jakarta');
        $this->db = new DataModel();
        //echo var_dump($this->db);

    }

    public function testing_post(){

         $validated = $this->validate([
            'file_preview' => [
                'uploaded[file_preview]',
                'ext_in[file_preview,jpg,jpeg,png]',
                'max_size[file_preview,2024]',
            ],
        ]);


        //echo var_dump( $validated);

        if ($validated) {

            $docs = $this->request->getFile('file_preview');

            // create folder by date
          

             $dname = explode(".", $_FILES['file_preview']['name']);
            $ext = end($dname);

            $folderWaktu = date('ymd');
              $folderName = 'themes/' . $folderWaktu;
            $folderPath = WRITEPATH . 'uploads/' . $folderName;
            $newName = date('ymdhis') . '_themes.' . $ext;

            //echo 'moved';

             if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

             $docs->move($folderPath, $newName);

             sleep(3);

             // how to continue this part for resizing?
             $nama_lengkap = $folderPath . '/' . $newName;
             resizeImage($nama_lengkap, $nama_lengkap);
            
             return $nama_lengkap;
        }

       
        //echo var_dump($data);
        return null;

    }


    public function testing_library(){

        return view('testing_library');

    }

    public function test(){
        
        $mode_affiliator = $this->getSessionData('is_affiliator');

        echo var_dump($mode_affiliator);

        //return view('testing_wa_chat_rotator');

    }

    //public $cache = new TempCache();

    public function index()
    {
       //return redirect()->to('http://fgroupindonesia.com/pelayanan/solusi-digital'); 
         return view('landing_page');
    }

    public function landingpage_builder(){

        $mode = $this->request->getGet('mode');

        

        return view('grapejs/builder.php');

    }

    public function display_affiliate_shop(){

        $data = $this->getDashboardDataSimple();

        $reff = $this->request->getGet('reff');
        $minPrice = $this->request->getGet('minPrice');
        $maxPrice = $this->request->getGet('maxPrice');

        if(isset($minPrice) && isset($maxPrice)){
            $dp = $this->db->getAllAffiliateProductsForShopByPrice($minPrice, $maxPrice);
        }else if(isset($minPrice)){
            $dp = $this->db->getAllAffiliateProductsForShopByPriceMinimum($minPrice);
        }else{
            // make it general for all price
            $dp = $this->db->getAllAffiliateProductsForShop();
        }

        $highestPrice = $this->db->getAffiliateProductHighestPrice();
        $lowestPrice = $this->db->getAffiliateProductLowestPrice();

        $sort_mode = $this->request->getGet('sort_mode');

        if (!empty($sort_mode) && !empty($dp)) {
    switch ($sort_mode) {
        case 'popular':
            usort($dp, function ($a, $b) {
                return $b->views_count <=> $a->views_count; // assumes you have a 'views_count' or similar
            });
            break;

        case 'newest':
            usort($dp, function ($a, $b) {
                return strtotime($b->date_created) <=> strtotime($a->date_created); // assumes 'created_at' is datetime
            });
            break;

        case 'rating':
            usort($dp, function ($a, $b) {
                return $b->rating_overall <=> $a->rating_overall; // assumes 'rating' is float or int
            });
            break;

        case 'highest_price':
            usort($dp, function ($a, $b) {
                return $b->base_price <=> $a->base_price;
            });
            break;

        case 'lowest_price':
            usort($dp, function ($a, $b) {
                return $a->base_price <=> $b->base_price;
            });
            break;

        case 'default':
        default:
            // Keep default order, no sorting needed
            break;
    }
}
    
    if (!$sort_mode) {
        $sort_mode = 'default';
    }

    $data['sort_mode'] = $sort_mode;
       
        
        $dcat = $this->db->getAllAffiliateProductCategoriesForShop();

        $u_id = $this->getSessionData('user_id');

        $cari = array(
            'customer_user_id' => $u_id,
            'cart_status' => 'active'
        );

        $cart = $this->db->selectLastDataBy($cari, 'affiliate_carts');
         $total_cart_items = 0;

        if(!empty($cart)){

            $filter2 = array(
                'cart_id' => $cart->id
            );

            $data_cart_items = $this->db->selectAllDataBy($filter2, 'affiliate_cart_items');
            
           

            if(!empty($data_cart_items)){
                $total_cart_items = count($data_cart_items);
            }

            

        }

        $data['total_cart_items'] = $total_cart_items;    


        if(!empty($dp)){
            $data['data_products'] = $dp;    
        }

        if(!empty($dcat)){
            $data['data_product_categories'] = $dcat;    
        }

        // now for paginating
        $totalItems = count($dp); // 230
        $itemsPerPage = 12;
        $totalPages = ceil($totalItems / $itemsPerPage);

        // Get current page from GET param or default to 1
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        // Validate current page
        $currentPage = max(1, min($totalPages, $currentPage));

        // Calculate the offset
        $offset = ($currentPage - 1) * $itemsPerPage;

        // Get current page items
        $pageItems = array_slice($dp, $offset, $itemsPerPage);

        $start = ($currentPage - 1) * $itemsPerPage + 1;
        $end = $start + $itemsPerPage - 1;

        // Make sure $end does not exceed $totalItems
        if ($end > $totalItems) {
            $end = $totalItems;
        }

        // make it to the front
        $data['currentPage'] = $currentPage;
        $data['totalPages'] = $totalPages;
        $data['totalItems'] = $totalItems;
        $data['start'] = $start;
        $data['end'] = $end;

        if(!empty($minPrice)){
            $data['minPrice'] = $minPrice;
        }

        if(!empty($maxPrice)){
            $data['maxPrice'] = $maxPrice;
        }

        // now filter indication
     
        if(!empty($minPrice) || !empty($maxPrice)){
        
        $filter0To10     = $this->getActiveFilterClass($minPrice, $maxPrice, 0, 10000);
        $filter10To50    = $this->getActiveFilterClass($minPrice, $maxPrice, 10000, 50000);
        $filter50To100   = $this->getActiveFilterClass($minPrice, $maxPrice, 50000, 100000);
        $filter100To250  = $this->getActiveFilterClass($minPrice, $maxPrice, 100000, 250000);
        $filter250To500  = $this->getActiveFilterClass($minPrice, $maxPrice, 250000, 500000);
        $filter500To1M   = $this->getActiveFilterClass($minPrice, $maxPrice, 500000, 1000000);
        $filter1MTo5M    = $this->getActiveFilterClass($minPrice, $maxPrice, 1000000, 5000000);
        $filterAbove5M   = $this->getActiveFilterClass($minPrice, $maxPrice, 5000000, null);
        
        $data['filter0To10']   = $filter0To10;  
        $data['filter10To50']  = $filter10To50;        
        $data['filter50To100'] = $filter50To100;        
        $data['filter100To250'] = $filter100To250;        
        $data['filter250To500'] = $filter250To500;        
        $data['filter500To1M']  = $filter500To1M;        
        $data['filter1MTo5M']   = $filter1MTo5M;        
        $data['filterAbove5M'] = $filterAbove5M;

        }
   
        // contiune this part

        return view('affiliate/shop', $data);
    }

   private function getActiveFilterClass($currentMin, $currentMax, $targetMin, $targetMax = null) {
    if ($targetMax === null) {
        return ($currentMin == $targetMin && $currentMax === null) ? 'active-filter' : '';
    }
    return ($currentMin == $targetMin && $currentMax == $targetMax) ? 'active-filter' : '';
    }


    public function display_all_affiliate_products(){

        $data = $this->getDashboardDataSimple();

        $data['page_name'] = "Management Affiliate Products";
        $data['data_products'] = $this->db->selectAllDataAffiliateProducts();
        $data['data_product_categories'] = $this->db->selectAllData('affiliate_product_categories');

        return view('manage_affiliate_products', $data);
    }

     public function display_affiliate_shop_login(){
        return view('affiliate/shop-login');
    }

      public function display_affiliate_cart(){
        return view('affiliate/cart');
    }

    public function display_affiliate_product(){

        $id = $this->request->getGet('id');
        $reff = $this->request->getGet('reff');

        $cari = array(
            'p.id'=>$id
        );

        $produk = $this->db->getAffiliateProductForShopBy($cari);

        $filter = array(
            'product_id' => $id
        );

        $rating = $this->db->getAffiliateProductRatingShopBy($filter);
        $data = $this->getDashboardDataSimple();

        $data['data_product'] = $produk;
        $data['data_rating'] = $rating;

        return view('affiliate/single-product', $data);
    }

      public function display_affiliate_faq(){
        return view('affiliate/faq');
    }

    public function display_all_affiliate_sales_orders(){

        $data = $this->getDashboardDataSimple();

        $u_id = $this->getSessionData('user_id');

        // data_affiliate_sales
        $cari = array(
            'user_id' => $u_id 
        );

        $data_af_sales = $this->db->selectAllDataBy($cari, 'affiliate_sales');
        //$data['data_affiliate_sales'] = $data_af_sales;
        $data['page_name'] = "Manage Sales - Orderan Pelanggan";
        $data['total_sales'] = 0;
        return view('manage_affiliate_sales', $data);   

    }


     public function order_jasa($menu = null): string
    {
        // for security reasons
        $this->protectLogin();

        $session = session();
        $r = $session->get('role');

        //echo var_dump($r);

       $data = $this->getDashboardData($r);
       $data['search_display'] = 'search-hide';
       $data['page_name'] = 'Order Jasa';
       $data['role'] = $r;

       // we pass the library to help
       // the view in rendering cash value
       $data['currency_helper'] = new CurrencyHelper();
       $data['date_helper'] = new DateHelper();

        if(!empty($r)){
         
          //echo "client";
                $data['filter_month'] = $this->get4QuartalMonths();

                if($menu == 'digital_marketing'){
                $data['page_name'] = 'Pelayanan Jasa Digital Marketing';
                return view('dashboard_order_jasa_digital_marketing', $data);
                }

                if($menu == 'pembuatan_app_web'){
                    $data['page_name'] = 'Pelayanan Jasa Pembuatan Aplikasi &amp; Web';
                return view('dashboard_order_pembuatan_app_web', $data);
                }

                if($menu == 'lain'){
                    $data['page_name'] = 'Pelayanan Jasa Lainnya';
                return view('dashboard_order_jasa_lain', $data);
                }

                if($menu == null){
                return view('dashboard_order_jasa', $data);
                }
           }
        
    }

     public function order_jasa_digital_marketing() : string
    {

        return $this->order_jasa('digital_marketing');
    }

    public function order_jasa_pembuatan_app_web() : string
    {
        return $this->order_jasa('pembuatan_app_web');
    }

       public function order_jasa_lain() : string
    {

        return $this->order_jasa('lain');
    }

    public function display_registration(): string {

         return view('registration');

    }

	public function display_login()
    {
       $st = $this->request->getGet('status');
       $data = array();

       if(isset($st)){
        $data['error'] = 'salah username atau password!';
       }

       $session = session();

    if (!$session->has('has_visited_login')) {
        // Kunjungan pertama
        $data['second_visit'] = false;
        $session->set('has_visited_login', true); // set agar kunjungan selanjutnya dianggap kedua
    } else {
        // Sudah pernah masuk halaman login
        $data['second_visit'] = true;
    }

    // Untuk debugging
     //echo var_dump($data['second_visit']);
        return view('login_portal', $data);
    }

    public function display_login_error(): string
    {
        $data = array('message' => 'invalid login!');
        return view('login_portal', $data);
    }

    private function countPublishedApp($arrayNa){

        $n = 0;

        foreach ($arrayNa as $k => $v) {
            
            if($k == 'status' && $v == 'published'){
                $n++;
            }

        }

        return $n;

    }

    private function formatTimeInData($arrayNa){
        
        if(is_array($arrayNa))        
        foreach ($arrayNa as $k) {
            
            $k->date_created = date('D, d-m-Y H:i', strtotime($k->date_created)) . " WIB";
       

        }

        if(is_array($arrayNa))
        return $arrayNa;

        if(!is_array($arrayNa))
        return false;
    }

    private function protectLogin(){
        if($this->isLoggedOn() === false){
           header("Location: /portal");
           exit(0);  
        }
    }

     private function protectAdminAccess(){
        if($this->isAdminAccess() === false){
           header("Location: /portal");
           exit(0);  
        }
    }

    public function display_dashboard()
    {   

        // for security reasons
        $this->protectLogin();

        $session = session();
        $r = $session->get('role');

        //echo var_dump($r);

       $data = $this->getDashboardData($r);
       $data['search_display'] = 'search-hide';
       $data['role'] = $r;

         // we pass the library to help
       // the view in rendering cash value
       $data['currency_helper'] = new CurrencyHelper();
       $data['date_helper'] = new DateHelper();

        if(!empty($r)){

            $data['page_name'] = "Dashboard";
         
            if($r == 'admin'){
                //echo "admin";
                return view('dashboard_admin', $data);
            }else{
                //echo "client";
                $data['filter_month'] = $this->get4QuartalMonths();
                return view('dashboard_client', $data);
            } 

        }


    }

    private function get4QuartalMonths(){
        
        $prev_month = array();

        for($i = 1; $i <= 3; $i++){
            $month = date('F Y', strtotime("-$i month"));
            $prev_month[] = $month;
        }

        return $prev_month;

    }

    private function isLoggedOn(){
        return $this->getSessionData('role') != null;
    }

    private function isAdminAccess(){
        return $this->getSessionData('role') == 'admin';
    }

    private function getSessionData($key){
            $session = session();
            $u = $session->get($key);
            return $u;
    }

    private function getDBData($targetKey, $condition, $entity){
            
            $result = '';
           
            $raw = $this->db->selectDataBy($condition, $entity);
            
            if(!empty($raw)){
            $result = $raw->$targetKey;
            }

            return $result;
    }

    

    public function changeAllNumberIntoCurrency($dataArray){
   

    foreach($dataArray as $obj){
        foreach($obj as $n => $v){
            if(is_numeric($obj->$n)){
                if($n != 'id'){
               $rp = $this->asRupiah($obj->$n);
               $obj->$n = $rp;
               }
            }    
        }
    }

    return ($dataArray);

    }

    private function asRupiah($number) {
        if(!empty($number)){
            $formattedNumber = number_format($number, 0, ',', '.');
            return 'Rp ' . $formattedNumber;
        }

        return 0;
    }

    private function convertRupiahToNumber($rupiahString) {
    // Remove 'Rp' and any non-numeric characters except dots and commas
    $cleanString = str_replace(['Rp', ' ', '.'], '', $rupiahString);

    // Now $cleanString should be like "1500000"
    return (int) $cleanString;
    }

    private function getDashboardDataSimple() {

         $status_email_notif_on = "";
        $status_email_notif_off = "";

        $status_approval_mode_auto = "";
        $status_approval_mode_manual = "";

        $data_system_work = $this->db->selectData(1, 'system_works');


        if(!empty($data_system_work)){
            $apmode = $data_system_work->approval_mode;
            $ean  = $data_system_work->email_activity_notification;

            if($apmode == 'automatic'){
                $status_approval_mode_auto = "checked";
            }else{
                $status_approval_mode_manual = "checked";
            }

             if($ean == 'on'){
                $status_email_notif_on = "checked";
            }else{
                $status_email_notif_off = "checked";
            }

        }

       $mode_affiliator = ($this->getSessionData('is_affiliator'));

        $cond = array(
            'username' => $this->getSessionData('username')
        );

        $cari = array(
            'user_id' => $this->getSessionData('user_id')
        );

        $data_shop_profile = $this->db->selectDataBy($cari, 'affiliate_shop_profile');

        $cash = $this->getDBData('balance', $cond, 'users');
        $sex_type = $this->getSessionData('sex');

        if($sex_type == 'male'){
            $sex_male_radio = "checked";
            $sex_female_radio = "";
        }else{
            $sex_male_radio = "";
            $sex_female_radio = "checked";
        }

        $data = array(
            'approval_mode_auto' => $status_approval_mode_auto,
            'approval_mode_manual' => $status_approval_mode_manual,
            'email_notif_on' => $status_email_notif_on,
            'email_notif_off' => $status_email_notif_off,
            'sex_male_radio' => $sex_male_radio,
            'sex_female_radio' => $sex_female_radio,
            'mode_affiliator' => $mode_affiliator,
            'search_display' => '',
            'whatsapp'   => $this->getSessionData('whatsapp'),
            'user_id'   => $this->getSessionData('user_id'),
            'propic'    => $this->getSessionData('propic'),
            'username'   => $this->getSessionData('username'),
            'pass'   => $this->getSessionData('pass'),
            'email'   => $this->getSessionData('email'),
            'occupation'   => $this->getSessionData('occupation'),
            'fullname'   => $this->getSessionData('fullname'),
            'role'   => $this->getSessionData('role'),
            'balance'   => $this->getSessionData('balance'),
            'balance_rp'    => $this->asRupiah($cash)
        );


         if($mode_affiliator == true){
              

                if(!empty($data_shop_profile)){
                    $data['shop_profile_id'] = $data_shop_profile->id;
                    $data['shop_profile_title'] = $data_shop_profile->shop_title;
                    $data['shop_banner_1'] = $data_shop_profile->shop_banner_url_1;
                    $data['shop_banner_2'] = $data_shop_profile->shop_banner_url_2;
                    $data['shop_banner_3'] = $data_shop_profile->shop_banner_url_3;

                    $data['shop_banner_file_1'] = basename($data_shop_profile->shop_banner_url_1);
                    $data['shop_banner_file_2'] = basename($data_shop_profile->shop_banner_url_2);
                    $data['shop_banner_file_3'] = basename($data_shop_profile->shop_banner_url_3);
                    $data['affiliator_code'] = $data_shop_profile->affiliate_reff_code;

                    $data['shop_title'] = $data_shop_profile->shop_title;
                }
            }

        return $data;

    }

    private function getDashboardData($usage){

            $data_users = $this->db->selectAllData('users');
            !empty($data_users) ? arsort($data_users) : null;

            $u = $this->getSessionData('username');
            $u_id = $this->getSessionData('user_id');

            $mode_affiliator = ($this->getSessionData('is_affiliator'));

            $data_themeslp = $this->db->selectAllData('themes_landingpage');
            !empty($data_themeslp) ? arsort($data_themeslp) : null;
           

        if($usage == 'admin'){
        
        $status_email_notif_on = "";
        $status_email_notif_off = "";

        $status_approval_mode_auto = "";
        $status_approval_mode_manual = "";

        $data_system_work = $this->db->selectData(1, 'system_works');

        if(!empty($data_system_work)){
            $apmode = $data_system_work->approval_mode;
            $ean  = $data_system_work->email_activity_notification;

            if($apmode == 'automatic'){
                $status_approval_mode_auto = "checked";
            }else{
                $status_approval_mode_manual = "checked";
            }

             if($ean == 'on'){
                $status_email_notif_on = "checked";
            }else{
                $status_email_notif_off = "checked";
            }

        }

        $data_order_types = $this->db->selectAllData('order_types');
        !empty($data_order_types) ? arsort($data_order_types) : null;
        
        $data_apps = $this->db->selectAllData('apps');
        !empty($data_apps) ? arsort($data_apps) : null;

        $data_packages = $this->db->selectAllData('packages');
         !empty($data_packages) ? arsort($data_packages) : null;

        $data_orders = $this->db->selectAllData('order_jasa');
        !empty($data_orders) ? arsort($data_orders) : null;

        $data_deposits = $this->db->selectAllData('deposits');
        !empty($data_deposits) ? arsort($data_deposits) : null;

        $data_deposits = $this->changeAllNumberIntoCurrency($data_deposits);

        $data_vvisitors = $this->db->selectAllData('data_virtualvisitors');
        !empty($data_vvisitors) ? arsort($data_vvisitors) : null;

        $data_format_os = $this->db->selectAllData('order_format_os');
             !empty($data_format_os) ? arsort($data_format_os) : null;

            $data_ketik_document = $this->db->selectAllData('order_ketik_document');
             !empty($data_ketik_document) ? arsort($data_ketik_document) : null;
           
        $data_wa_chat_rotator = $this->db->selectAllData('order_wa_chat_rotator');
        !empty($data_wa_chat_rotator) ? arsort($data_wa_chat_rotator) : null;
        
        $kategori1 = array('order_type'=>'wa_chat_rotator', 'status'=>'pending');
        $kategori2 = array('order_type'=>'wa_chat_rotator', 'status'=>'success');

        $data_wa_chat_rotator_pending = $this->db->selectAllDataBy($kategori1, 'order_jasa');    
        $data_wa_chat_rotator_success = $this->db->selectAllDataBy($kategori2, 'order_jasa');
        $data_no_cs_chat_rotator = $this->db->selectAllData('cs_wa_chat_rotator');

        }else{

            // for clients
            $fsales  = array(
                'user_id' => $u_id
            );

            $data_affiliate_sales = $this->db->selectAllDataBy($fsales, 'affiliate_sales');

            $total_affiliate_profit = $this->db->getAffiliateTotalCommissionAmount($fsales);
            $total_affiliate_product_sales_this_month = $this->db->getAffiliateCountThisMonth($fsales);
            $total_affiliate_product_sales_last_month = $this->db->getAffiliateCountLastMonth($fsales);

            $data_shop_profile = $this->db->selectDataBy($fsales, 'affiliate_shop_profile');

            $data_wa_chat_rotator = $this->db->selectAllDataByUsername($u, 'order_wa_chat_rotator');
            !empty($data_wa_chat_rotator) ? arsort($data_wa_chat_rotator) : null;
         
            $data_format_os = $this->db->selectAllDataByUsername($u, 'order_format_os');
             !empty($data_format_os) ? arsort($data_format_os) : null;

            $data_ketik_document = $this->db->selectAllDataByUsername($u, 'order_ketik_document');
             !empty($data_ketik_document) ? arsort($data_ketik_document) : null;
            
            $data_apps = $this->db->selectAllDataByUsername($u, 'apps');
            !empty($data_apps) ? arsort($data_apps) : null;

            $data_packages = $this->db->selectAllData('packages');
            !empty($data_packages) ? arsort($data_packages) : null;
  
            $data_orders = $this->db->selectAllDataByUsername($u, 'order_jasa');
            !empty($data_orders) ? arsort($data_orders) : null;

            $data_deposits = $this->db->selectAllDataByUsername($u, 'deposits');
            !empty($data_deposits) ? arsort($data_deposits) : null;

            $data_vvisitors = $this->db->selectAllDataByUsername($u, 'order_virtualvisitors');
            !empty($data_vvisitors) ? arsort($data_vvisitors) : null;

            $kategori1 = array('order_type'=>'wa_chat_rotator', 'status'=>'pending', 'username'=>$u);
            $kategori2 = array('order_type'=>'wa_chat_rotator', 'status'=>'success', 'username'=>$u);

        $data_wa_chat_rotator_pending = $this->db->selectAllDataBy($kategori1, 'order_jasa');    
        $data_wa_chat_rotator_success = $this->db->selectAllDataBy($kategori2, 'order_jasa');

            // get all phonenumbers for this user
        $data_no_cs_chat_rotator = $this->db->selectAllCSNumberWAChatRotatorByUsername($u, 'cs_wa_chat_rotator');

        }

        $bpc = $this->db->getLowestBasePricePackage('comment');
        $bpv = $this->db->getLowestBasePricePackage('view');
        $bpfm = $this->db->getLowestBasePricePackage('follow_marketplace');
        $bpp = $this->db->getLowestBasePricePackage('pembuatanaplikasi');
        $bpr = $this->db->getLowestBasePricePackage('rating');
        $bps = $this->db->getLowestBasePricePackage('subscriber');
        $bpuf = $this->db->getLowestBasePricePackage('upgrade_fituraplikasi');
        $bpvv = $this->db->getLowestBasePricePackage('virtualvisitors');
        $bpwm = $this->db->getLowestBasePricePackage('wishlist_marketplace');

        $bfos = $this->db->getLowestBasePricePackage('format_os');
        $bkdoc = $this->db->getLowestBasePricePackage('ketik_document');
        $buap = $this->db->getLowestBasePricePackage('uploadaplikasi');

        $bwacr = $this->db->getLowestBasePricePackage('wa_chat_rotator');
        $blp = $this->db->getLowestBasePricePackage('landingpage');

        $base_price_comment = $this->asRupiah($bpc);
        $base_price_view = $this->asRupiah($bpv);
        $base_price_follow_marketplace = $this->asRupiah($bpfm);
        $base_price_pembuatanaplikasi = $this->asRupiah($bpp);
        $base_price_rating = $this->asRupiah($bpr);
        $base_price_subscriber = $this->asRupiah($bps);
        $base_price_upgrade_fituraplikasi = $this->asRupiah($bpuf);
        $base_price_virtualvisitors = $this->asRupiah($bpvv);
        $base_price_wishlist_marketplace = $this->asRupiah($bpwm);

        $base_price_format_os = $this->asRupiah($bfos);
        $base_price_ketik_document = $this->asRupiah($bkdoc);
        $base_price_upload_aplikasi = $this->asRupiah($buap);

        $base_price_wa_chat_rotator = $this->asRupiah($bwacr);
        $base_price_landing_page = $this->asRupiah($blp);

        $m_balance          = $this->db->getTotalAmountDepositsThisMonth();
        $monthly_balance    = $this->asRupiah($m_balance);

        $total_users        = 0;
        $total_packages     = 0;
        $total_apps         = 0;
        $total_orders       = 0;
        $total_deposits     = 0;
        $total_deposit_purchased = 0;
        $total_deposit_pending = 0;
        $total_deposit_purchased_count = 0;
        $total_deposit_pending_count = 0;

        $total_vvisitors    = 0;
        $total_apps_published = 0;
        $total_layananmanual = 0;
        $total_wa_chat_rotator = 0;
        $total_order_pending_wa_chat_rotator = 0;
        $total_order_success_wa_chat_rotator = 0;
        $total_no_cs_wa_chat_rotator = 0;
        $total_themes_landingpage = 0;

        $percent_pending = 0;
        $percent_purchased = 0;

        $percent_cash_pending = 0;
        $percent_cash_purchased = 0;

        if(is_array($data_themeslp)){
            $total_themes_landingpage = count($data_themeslp);
        }

        if(is_array($data_no_cs_chat_rotator)){
            $total_no_cs_wa_chat_rotator = count($data_no_cs_chat_rotator);
        }

        if(is_array($data_wa_chat_rotator_pending)){
            $total_order_pending_wa_chat_rotator = count($data_wa_chat_rotator_pending);
        }

        if(is_array($data_wa_chat_rotator_success)){
            $total_order_success_wa_chat_rotator = count($data_wa_chat_rotator_success);
        }

        if(is_array($data_format_os) || is_array($data_ketik_document)){
            $total_layananmanual = count($data_ketik_document) + count($data_format_os);
        }

        if(is_array($data_wa_chat_rotator)){
            $total_wa_chat_rotator = count($data_wa_chat_rotator);
        }


        if(is_array($data_deposits)){
            $total_deposits = count($data_deposits);

            // calculate the pending cash and purchased cash
            $cash_purchased = 0;
            $cash_pending = 0;
            $total_cash_deposit = 0;

            foreach($data_deposits as $dp){
                if($dp->status=='purchased'){
                    $cash_purchased += $this->convertRupiahToNumber($dp->amount);
                    $total_deposit_purchased_count++;
                }else if($dp->status=='pending'){
                    $cash_pending += $this->convertRupiahToNumber($dp->amount);
                    $total_deposit_pending_count++;
                }

                $total_cash_deposit += $this->convertRupiahToNumber($dp->amount);
            }

            $total_deposit_purchased = $cash_purchased;
            $total_deposit_pending = $cash_pending;

            $percent_pending = ($total_deposit_pending_count/$total_deposits) * 100;
            $percent_purchased = ($total_deposit_purchased_count/$total_deposits) * 100;

            $percent_cash_pending = ($cash_pending/$total_cash_deposit) * 100;
            $percent_cash_purchased = ($cash_purchased/$total_cash_deposit) * 100;

            $percent_cash_pending = number_format($percent_cash_pending, 2);
            $percent_cash_purchased = number_format($percent_cash_purchased, 2);

        }

        if(is_array($data_users)){
            $total_users = count($data_users);
        }

         if(is_array($data_packages)){
            $total_packages = count($data_packages);
        }

          if(is_array($data_vvisitors)){
            $total_vvisitors = count($data_vvisitors);
        }

        if(is_array($data_apps)){
            $total_apps = count($data_apps);
            $total_apps_published =  $this->countPublishedApp($data_apps);

        }

         if(is_array($data_orders)){
            $total_orders = count($data_orders);
        }

        $sex_type = $this->getSessionData('sex');

        if($sex_type == 'male'){
            $sex_male_radio = "checked";
            $sex_female_radio = "";
        }else{
            $sex_male_radio = "";
            $sex_female_radio = "checked";
        }

        $cond = array(
            'username' => $u
        );

        $cash = $this->getDBData('balance', $cond, 'users');
        $app_name = "Solusi Digital";

        $data = array(
            'user_id'   => $this->getSessionData('user_id'),
            'propic'    => $this->getSessionData('propic'),
            'balance_rp'    => $this->asRupiah($cash),
            'balance'    => $cash,
            'username'  => $this->getSessionData('username'),
            'fullname'  => $this->getSessionData('fullname'),
            'pass'  => $this->getSessionData('pass'),
            'email'  => $this->getSessionData('email'),
            'occupation'  => $this->getSessionData('occupation'),
            'whatsapp'  => $this->getSessionData('whatsapp'),
            'sex_male_radio'  => $sex_male_radio,
            'sex_female_radio'  => $sex_female_radio,
            'data_users' => $this->formatTimeInData($data_users),
            'mode_affiliator' => $mode_affiliator,
            'data_apps' => $this->formatTimeInData($data_apps),
            'data_themeslp' => $this->formatTimeInData($data_themeslp),
            'data_orders' => $this->formatTimeInData($data_orders),
            'data_deposits' => $this->formatTimeInData($data_deposits),
            'data_vvisitors' => $this->formatTimeInData($data_vvisitors),
            'data_format_os' => $this->formatTimeInData($data_format_os),
            'data_ketik_document' => $this->formatTimeInData($data_ketik_document),
            'data_wa_chat_rotator' => $this->formatTimeInData($data_wa_chat_rotator),
            


            'monthly_balance' => $monthly_balance,
            'total_users' => $total_users,
            'total_themes_landingpage' => $total_themes_landingpage,
            'total_packages' => $total_packages,
            'total_vvisitors' => $total_vvisitors,
            'total_deposits' => $total_deposits,
            'total_apps' => $total_apps,
            'total_orders' => $total_orders,
            'total_apps_published' => $total_apps_published,
            'total_layananmanual' => $total_layananmanual,
            'total_wa_chat_rotator' => $total_wa_chat_rotator,
            'total_no_cs_wa_chat_rotator' => $total_no_cs_wa_chat_rotator,
            'total_order_pending_wa_chat_rotator' => $total_order_pending_wa_chat_rotator,
            'total_order_success_wa_chat_rotator' => $total_order_success_wa_chat_rotator,

            'base_price_comment' => $base_price_comment,
            'base_price_subscriber' => $base_price_subscriber,
            'base_price_follow_marketplace' => $base_price_follow_marketplace,
            'base_price_pembuatanaplikasi' => $base_price_pembuatanaplikasi,
            'base_price_rating' => $base_price_rating,
            'base_price_upgrade_fituraplikasi' => $base_price_upgrade_fituraplikasi,
            'base_price_view' => $base_price_view,
            'base_price_virtualvisitors' => $base_price_virtualvisitors,
            'base_price_wishlist_marketplace' => $base_price_wishlist_marketplace,

            'base_price_upload_aplikasi' => $base_price_upload_aplikasi,
            'base_price_format_os' => $base_price_format_os,
            'base_price_ketik_document' => $base_price_ketik_document,

            'base_price_wa_chat_rotator' => $base_price_wa_chat_rotator,
            'base_price_landing_page' => $base_price_landing_page,
            'app_name' => $app_name



        );

        if($usage == 'admin'){

              // now sorting the order_type
          

             $data['data_order_types'] = $data_order_types;

             $data['data_packages'] = $this->formatTimeInData($data_packages);
             $data['monthly_balance'] = $monthly_balance;

            $data['email_notif_on'] = $status_email_notif_on;
            $data['email_notif_off'] = $status_email_notif_off;
            $data['approval_mode_auto'] = $status_approval_mode_auto;
            $data['approval_mode_manual'] = $status_approval_mode_manual;

            $data['total_deposit_purchased_count'] = $total_deposit_purchased_count;
            $data['total_deposit_pending_count'] = $total_deposit_pending_count;
            $data['total_deposit_pending'] = $this->asRupiah($total_deposit_pending);
            $data['total_deposit_purchased'] = $this->asRupiah($total_deposit_purchased);

            $data['percent_cash_pending'] = $percent_cash_pending . '%';
            $data['percent_cash_purchased'] = $percent_cash_purchased . '%';

            $data['percent_pending'] = number_format($percent_pending,2) . '%';
            $data['percent_purchased'] = number_format($percent_purchased,2) . '%';

        }else{
            // for non admin
            // we just need the data as casual

            if($mode_affiliator == true){
                $data['total_affiliate_profit'] = $this->asRupiah($total_affiliate_profit);
                $data['total_affiliate_product_sales_this_month'] = $total_affiliate_product_sales_this_month;
                $data['total_affiliate_product_sales_last_month'] = $total_affiliate_product_sales_last_month;

                if(!empty($data_shop_profile)){
                    $data['shop_profile_id'] = $data_shop_profile->id;
                    $data['shop_profile_title'] = $data_shop_profile->shop_title;
                    $data['shop_banner_1'] = $data_shop_profile->shop_banner_url_1;
                    $data['shop_banner_2'] = $data_shop_profile->shop_banner_url_2;
                    $data['shop_banner_3'] = $data_shop_profile->shop_banner_url_3;

                    $data['shop_banner_file_1'] = basename($data_shop_profile->shop_banner_url_1);
                    $data['shop_banner_file_2'] = basename($data_shop_profile->shop_banner_url_2);
                    $data['shop_banner_file_3'] = basename($data_shop_profile->shop_banner_url_3);
                    $data['affiliator_code'] = $data_shop_profile->affiliate_reff_code;

                    $data['shop_title'] = $data_shop_profile->shop_title;
                }
            }
           
             $data['data_packages'] = $data_packages;
        }

        return $data;
    }


    public function display_settings(): string
    {   
    	return view('settings');
    }

	public function app_management(): string
    {   
          // for security reasons
        $this->protectLogin();


            $r = $this->getSessionData('role');
    	    $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;
            $data['page_name'] = 'Management Apps &amp; Web';
            $data['username'] = $this->getSessionData('username');
            $data['user_id'] = $this->getSessionData('user_id');

        return view('manage_apps', $data);
    }

    public function virtualvisitors_management(): string
    {   
          // for security reasons
        $this->protectLogin();

            $u = $this->getSessionData('username');
            $r = $this->getSessionData('role');
            $data = $this->getDashboardData($r);

            // we tried to make a default value
            $data['order_id'] = '-1';
           
            // then we search for the real order_id of virtualvisitors
            // with an approved status last (DESC order) for this user;
            $dataFilter = array(
                'status'=> 'approved',
                'username' => $u,
                'order_type' => 'virtualvisitors'
            );

            $dataOrderJasaFound = $this->db->selectDataLastBy($dataFilter, 'order_jasa');
            
            $data_vvisitors = array();

            // we then update the orderid once it's found here
            if($dataOrderJasaFound != false){
                $data['order_id'] = $dataOrderJasaFound->order_id;
                $data['order_client_reff'] = $dataOrderJasaFound->order_client_reff;

                    // also we count the latest data he has so far
            $filter = array(
                'order_id' => $dataOrderJasaFound->order_id
            );

            $data_vvisitors = $this->db->selectAllDataBy($filter, 'data_virtualvisitors');
            }

        

            if(!empty($data_vvisitors))
            $data['data_virtualvisitors'] = ($data_vvisitors);
            
            // take out the client names only
            $client_name = array();
            $product_name = array();
            $product_link = array();

            foreach($data_vvisitors as $dv){
                $client_name [] = $dv->client_name;
                $product_name [] = $dv->product_bought;
                $product_link [] = $dv->product_url;
            }

            $unique_cnames = array_unique($client_name);
            $data['data_vvisitors_name_clients'] = implode(PHP_EOL, $unique_cnames);

            $unique_pnames = array_unique($product_name);
            $data['data_vvisitors_name_products'] = implode(PHP_EOL, $unique_pnames);

            $unique_plinks  = array_unique($product_link);
            $data['data_vvisitors_link_products'] = implode(PHP_EOL, $unique_plinks);

            $data['page_name'] = 'Management Popup Sales Notification';
             $data['total_vvisitors'] = count($unique_cnames);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;
            $data['username'] = $u;
            $data['user_id'] = $this->getSessionData('user_id');

        return view('manage_virtualvisitors', $data);
    }

    public function deposit_management(): string
    {   
          // for security reasons
        $this->protectLogin();


            $r = $this->getSessionData('role');
            $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;
            $data['page_name'] = "Management Deposits";
            $data['username'] = $this->getSessionData('username');
            $data['user_id'] = $this->getSessionData('user_id');

        return view('manage_deposits', $data);
    }

    public function order_jasa_management(): string
    {   
          // for security reasons
        $this->protectLogin();
         

            $r = $this->getSessionData('role');
            $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;
            $data['username'] = $this->getSessionData('username');
            $data['user_id'] = $this->getSessionData('user_id');
            $data['balance'] = $this->getSessionData('balance');

        
        if($r == 'admin')    {
            $this->protectAdminAccess();
             $data['page_name'] = "Management Status Order";
            return view('manage_order_jasa', $data);
        }

        if($r != 'admin'){
            $data['page_name'] = "Management Status Order";
            return view('manage_order_status', $data);    

        }
    }

    public function user_management(): string
    {   

          // for security reasons
        $this->protectLogin();

            $r = $this->getSessionData('role');
           $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;
             $data['page_name'] = "Management Users";

    	return view('manage_users', $data);
    }

    public function themes_management(): string
    {   

          // for security reasons
        $this->protectLogin();

            $r = $this->getSessionData('role');
           $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;
            $data['page_name'] = 'Management Landing Page Themes';

        return view('manage_themes', $data);
    }

    public function layananmanual_management(): string
    {   

          // for security reasons
        $this->protectLogin();

            $r = $this->getSessionData('role');
           $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;

        return view('manage_layananmanual', $data);
    }

     public function socialmedia_management(): string
    {   

          // for security reasons
        $this->protectLogin();

            $r = $this->getSessionData('role');
            $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;

        return view('manage_socialmedia', $data);
    }

    public function display_roadmap(){

        return view('roadmap');

    }

    public function wa_chat_rotator_analysis(){

           // for security reasons
        $this->protectLogin();

        $total_wa_group = 0;
        $data = $this->getDashboardDataSimple();

        $data['page_name'] = "Analysis Performa WA Chat Rotator";

        $username = $this->getSessionData('username');

        $data_wa_chat_rotator = $this->db->getWAChatRotatorAnalysisGroupDataByUsername($username);

        if(!empty($data_wa_chat_rotator)){
            $total_wa_group = count($data_wa_chat_rotator);

        }

        $data['total_wa_chat_rotator_groups'] = $total_wa_group;
        $data['data_wa_chat_rotator_groups'] = $data_wa_chat_rotator;

        return view('manage_wa_chat_rotator_analysis', $data);

    }

      public function wa_chat_rotator_management(): string
    {   

          // for security reasons
        $this->protectLogin();

            $r = $this->getSessionData('role');
           $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;
            $data['page_name'] = "Management WA Chat Rotator";

        // custom call
        // mau pkai last order for this person
        $filter = array(
            'order_type'    => 'wa_chat_rotator'
        );

        if($r!='admin'){
            $filter['username']  = $data['username'];
        }

        $data_order_jasa = $this->db->selectAllDataBy($filter, 'order_jasa');
        // data ini kita inverse dulu dan ambil yg terakhir
        $data_orderan = array_reverse($data_order_jasa);

        $data['data_orderan_latest'] = $data_orderan[0];

        $order_id = $data_orderan[0]->order_id;
        $data_group_and_cs = $this->db->getWAChatRotatorManagementData($order_id);

        $data['data_group_and_cs'] = $data_group_and_cs;

        return view('manage_wa_chat_rotator_latest', $data);
    }

    public function package_management(): string
    {   

          // for security reasons
            $this->protectLogin();

            $r = $this->getSessionData('role');
            $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;
            $data['page_name'] = 'Management Packages';

        return view('manage_packages', $data);
    }

    public function app_add(): string
    {   
        return view('form_app');
    }

    public function user_add(): string
    {   
        return view('form_user');
    }

}

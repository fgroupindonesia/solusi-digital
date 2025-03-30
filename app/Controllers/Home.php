<?php

namespace App\Controllers;

use App\Models\DataModel;
use App\Libraries\CurrencyHelper;

class Home extends BaseController
{

    public $db = null;

    public function __construct(){

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
        
        return view('testing_wa_chat_rotator');

    }

    //public $cache = new TempCache();

    public function index()
    {
       //return redirect()->to('http://fgroupindonesia.com/pelayanan/solusi-digital'); 
         return view('landing_page');
    }

     public function order_jasa(): string
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

        if(!empty($r)){
         
          //echo "client";
                $data['filter_month'] = $this->get4QuartalMonths();
                return view('dashboard_order_jasa', $data);
           }
        
    }

    public function display_registration(): string {

         return view('registration');

    }

	public function display_login(): string
    {
       $st = $this->request->getGet('status');
       $data = array();

       if(isset($st)){
        $data['status'] = 'wrong username or password!';
       }else{
        $data['status'] = '';
       }

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
        
        foreach ($arrayNa as $k) {
            
            $k->date_created = date('D, d-m-Y H:i', strtotime($k->date_created)) . " WIB";

        }

        return $arrayNa;

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

        if(!empty($r)){
         
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
            $u = $condition['username'];

            $raw = $this->db->selectAllDataByUsername($u, $entity);
            
            if(count($raw)>0){
            $result = $raw[0]->$targetKey;
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
        $formattedNumber = number_format($number, 0, ',', '.');
        return 'Rp ' . $formattedNumber;
    }

    private function getDashboardData($usage){

            $data_users = $this->db->selectAllData('users');
            arsort($data_users);

            $u = $this->getSessionData('username');

            $data_themeslp = $this->db->selectAllData('themes_landingpage');
            arsort($data_themeslp);
           

        if($usage == 'admin'){
        


        $data_apps = $this->db->selectAllData('apps');
            arsort($data_apps);
        $data_packages = $this->db->selectAllData('packages');
            arsort($data_packages);
        $data_orders = $this->db->selectAllData('order_jasa');
            arsort($data_orders);
        $data_deposits = $this->db->selectAllData('deposits');
            arsort($data_deposits);
            $data_deposits = $this->changeAllNumberIntoCurrency($data_deposits);

        $data_vvisitors = $this->db->selectAllData('data_virtualvisitors');
            arsort($data_vvisitors);

             $data_layananmanual = $this->db->selectAllData('layananmanual');
            arsort($data_layananmanual);
           
        $data_wa_chat_rotator = $this->db->getWAChatRotatorManagementData();
            arsort($data_wa_chat_rotator);

        $kategori1 = array('order_type'=>'wa_chat_rotator', 'status'=>'pending');
        $kategori2 = array('order_type'=>'wa_chat_rotator', 'status'=>'success');

        $data_wa_chat_rotator_pending = $this->db->selectAllDataBy($kategori1, 'order_jasa');    
        $data_wa_chat_rotator_success = $this->db->selectAllDataBy($kategori2, 'order_jasa');
        $data_no_cs_chat_rotator = $this->db->selectAllData('cs_wa_chat_rotator');

        }else{

             $data_wa_chat_rotator = $this->db->getWAChatRotatorManagementData($u);
            arsort($data_wa_chat_rotator);
         
             $data_layananmanual = $this->db->selectAllDataByUsername($u, 'layananmanual');
            
            $data_apps = $this->db->selectAllDataByUsername($u, 'apps');
            arsort($data_apps);

            $data_packages = $this->db->selectAllData('packages');
            arsort($data_packages);

             $data_orders = $this->db->selectAllDataByUsername($u, 'order_jasa');
            arsort($data_orders);
              $data_deposits = $this->db->selectAllDataByUsername($u, 'deposits');
            arsort($data_deposits);
              $data_vvisitors = $this->db->selectAllDataByUsername($u, 'data_virtualvisitors');
            arsort($data_vvisitors);

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
        $buap = $this->db->getLowestBasePricePackage('upload_aplikasi');

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
        $total_vvisitors    = 0;
        $total_apps_published = 0;
        $total_layananmanual = 0;
        $total_wa_chat_rotator = 0;
        $total_order_pending_wa_chat_rotator = 0;
        $total_order_success_wa_chat_rotator = 0;
        $total_no_cs_wa_chat_rotator = 0;
        $total_themes_landingpage = 0;

        if(isset($data_themeslp)){
            $total_themes_landingpage = count($data_themeslp);
        }

        if(isset($data_no_cs_chat_rotator)){
            $total_no_cs_wa_chat_rotator = count($data_no_cs_chat_rotator);
        }

        if(isset($data_wa_chat_rotator_pending)){
            $total_order_pending_wa_chat_rotator = count($data_wa_chat_rotator_pending);
        }

        if(isset($data_wa_chat_rotator_success)){
            $total_order_success_wa_chat_rotator = count($data_wa_chat_rotator_success);
        }

        if(isset($data_layananmanual)){
            $total_layananmanual = count($data_layananmanual);
        }

        if(isset($data_wa_chat_rotator)){
            $total_wa_chat_rotator = count($data_wa_chat_rotator);
        }


        if(isset($data_deposits)){
            $total_deposits = count($data_deposits);
        }

        if(isset($data_users)){
            $total_users = count($data_users);
        }

         if(isset($data_packages)){
            $total_packages = count($data_packages);
        }

          if(isset($data_vvisitors)){
            $total_vvisitors = count($data_vvisitors);
        }

        if(isset($data_apps)){
            $total_apps = count($data_apps);
            $total_apps_published =  $this->countPublishedApp($data_apps);
        }

         if(isset($data_orders)){
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

        $data = array(
            'user_id'   => $this->getSessionData('user_id'),
            'propic'    => $this->getSessionData('propic'),
            'balance'    => $this->asRupiah($cash),
            'username'  => $this->getSessionData('username'),
            'fullname'  => $this->getSessionData('fullname'),
            'pass'  => $this->getSessionData('pass'),
            'email'  => $this->getSessionData('email'),
            'occupation'  => $this->getSessionData('occupation'),
            'whatsapp'  => $this->getSessionData('whatsapp'),
            'sex_male_radio'  => $sex_male_radio,
            'sex_female_radio'  => $sex_female_radio,
            'data_users' => $this->formatTimeInData($data_users),
           
            'data_apps' => $this->formatTimeInData($data_apps),
            'data_themeslp' => $this->formatTimeInData($data_themeslp),
            'data_orders' => $this->formatTimeInData($data_orders),
            'data_deposits' => $this->formatTimeInData($data_deposits),
            'data_vvisitors' => $this->formatTimeInData($data_vvisitors),
            'data_layananmanual' => $this->formatTimeInData($data_layananmanual),
            'data_wa_chat_rotator' => $this->formatTimeInData($data_wa_chat_rotator),
            
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
            'base_price_landing_page' => $base_price_landing_page
        );

        if($usage == 'admin'){
             $data['data_packages'] = $this->formatTimeInData($data_packages);
             $data['monthly_balance'] = $monthly_balance;
        }else{
            // for non admin
            // we just need the data as casual
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
            $data['campaign_id'] = 0;

            // then we search for the real order_id of virtualvisitors
            // with an approved status last (DESC order) for this user;
            $dataFilter = array(
                'status'=> 'approved',
                'username' => $u,
                'order_type' => 'virtualvisitors'
            );

            $data_campaign = $this->db->selectAllDataByUsername($u, 'campaign_virtualvisitors');
            $dataOrderJasaFound = $this->db->selectAllDataBy($dataFilter, 'order_jasa');

            
            // we then update the orderid once it's found here
            if($dataOrderJasaFound != false){
                $data['order_id'] = $dataOrderJasaFound->order_id;
                // we get the 1st campaign data only
                $data['campaign_id'] = $data_campaign[0]->id;
            }

            $data['data_campaign'] = $data_campaign;
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
            $data['username'] = $this->getSessionData('username');
            $data['user_id'] = $this->getSessionData('user_id');

        return view('manage_deposits', $data);
    }

    public function order_jasa_management(): string
    {   
          // for security reasons
        $this->protectLogin();
         $this->protectAdminAccess();

            $r = $this->getSessionData('role');
            $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;
            $data['username'] = $this->getSessionData('username');
            $data['user_id'] = $this->getSessionData('user_id');
            $data['balance'] = $this->getSessionData('balance');

        return view('manage_order_jasa', $data);
    }

    public function user_management(): string
    {   

          // for security reasons
        $this->protectLogin();

            $r = $this->getSessionData('role');
           $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;

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

      public function wa_chat_rotator_management(): string
    {   

          // for security reasons
        $this->protectLogin();

            $r = $this->getSessionData('role');
           $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;

        return view('manage_wa_chat_rotator', $data);
    }

    public function package_management(): string
    {   

          // for security reasons
            $this->protectLogin();

            $r = $this->getSessionData('role');
            $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;

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

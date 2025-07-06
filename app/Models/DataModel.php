<?php
namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table_users      = 'table_users';
    protected $table_packages      = 'table_packages';
    protected $table_ticketing  = 'table_ticketing';
    protected $table_apps       = 'table_apps';
    protected $table_socialmedia       = 'table_socialmedia';
    protected $table_layananmanual       = 'table_layananmanual';
    protected $table_cs_wa_chat_rotator       = 'table_cs_wa_chat_rotator';
    protected $table_cs_map_wa_chat_rotator     = 'table_cs_map_wa_chat_rotator';
    protected $table_cs_record_wa_chat_rotator  = 'table_cs_record_wa_chat_rotator';
    protected $table_cs_schedule_wa_chat_rotator  = 'table_cs_schedule_wa_chat_rotator';
    protected $table_web_wa_chat_rotator       = 'table_web_wa_chat_rotator';
    protected $table_system_works      = 'table_system_works';


    protected $table_purchased_order       = 'table_purchased_order';
    protected $table_themes_landingpage       = 'table_themes_landingpage';
    protected $table_data_virtualvisitors       = 'table_data_virtualvisitors';
    protected $table_campaign_virtualvisitors       = 'table_campaign_virtualvisitors';
    protected $table_deposits       = 'table_deposits';
    protected $table_order_jasa       = 'table_order_jasa';
    protected $table_order_ketik_document      = 'table_order_ketik_document';
    protected $table_order_format_os       = 'table_order_format_os';
    protected $table_order_upgrade_fituraplikasi = 'table_order_upgrade_fituraplikasi';
    protected $table_order_pembuatanaplikasi     = 'table_order_pembuatanaplikasi';
    protected $table_order_uploadaplikasi     = 'table_order_uploadaplikasi';
    protected $table_order_virtualvisitors       = 'table_order_virtualvisitors';
    protected $table_order_comment       = 'table_order_comment';
    protected $table_order_follow_marketplace       = 'table_order_follow_marketplace';
    protected $table_order_rating       = 'table_order_rating';
    protected $table_order_subscriber       = 'table_order_subscriber';
    protected $table_order_view       = 'table_order_view';
    protected $table_order_types       = 'table_order_types';
    protected $table_order_revisions       = 'table_order_revisions';
    protected $table_order_wa_chat_rotator       = 'table_order_wa_chat_rotator';
    protected $table_order_landing_page       = 'table_order_landing_page';
    protected $table_order_wishlist_marketplace       = 'table_order_wishlist_marketplace';
    protected $table_group_wa_chat_rotator       = 'table_group_wa_chat_rotator';

    protected $table_affiliate_products         = 'table_affiliate_products';
    protected $table_affiliate_carts            = 'table_affiliate_carts';
    protected $table_affiliate_cart_items       = 'table_affiliate_cart_items';
    protected $table_affiliate_custom_prices    = 'table_affiliate_custom_prices';
    protected $table_affiliate_product_categories   = 'table_affiliate_product_categories';
    protected $table_affiliate_product_images       = 'table_affiliate_product_images';
    protected $table_affiliate_product_reviews      = 'table_affiliate_product_reviews';
    protected $table_affiliate_sales                = 'table_affiliate_sales';
    protected $table_affiliate_shop_profile                = 'table_affiliate_shop_profile';
    

    private function getEntity($entity)
{
    $map = [
        'system_works' => $this->table_system_works,
        'order_revisions' => $this->table_order_revisions,
        'order_types' => $this->table_order_types,
        'purchased_order' => $this->table_purchased_order,
        'users' => $this->table_users,
        'packages' => $this->table_packages,
        'themes_landingpage' => $this->table_themes_landingpage,
        'ticketing' => $this->table_ticketing,
        'apps' => $this->table_apps,
        'deposits' => $this->table_deposits,
        'data_virtualvisitors' => $this->table_data_virtualvisitors,
        'campaign_virtualvisitors' => $this->table_campaign_virtualvisitors,
        'order_ketik_document' => $this->table_order_ketik_document,
        'order_format_os' => $this->table_order_format_os,
        'order_jasa' => $this->table_order_jasa,
        'order_virtualvisitors' => $this->table_order_virtualvisitors,
        'order_upgrade_fituraplikasi' => $this->table_order_upgrade_fituraplikasi,
        'order_pembuatanaplikasi' => $this->table_order_pembuatanaplikasi,
        'order_uploadaplikasi' => $this->table_order_uploadaplikasi,
        'order_comment' => $this->table_order_comment,
        'order_follow_marketplace' => $this->table_order_follow_marketplace,
        'order_wishlist_marketplace' => $this->table_order_wishlist_marketplace,
        'order_rating' => $this->table_order_rating,
        'order_landing_page' => $this->table_order_landing_page,
        'order_subscriber' => $this->table_order_subscriber,
        'order_view' => $this->table_order_view,
        'order_wa_chat_rotator' => $this->table_order_wa_chat_rotator,
        'wa_chat_rotator' => $this->table_order_wa_chat_rotator, 
        'group_wa_chat_rotator' => $this->table_group_wa_chat_rotator,
        'layananmanual' => $this->table_layananmanual,
        'socialmedia' => $this->table_socialmedia,
        'cs_wa_chat_rotator' => $this->table_cs_wa_chat_rotator,
        'web_wa_chat_rotator' => $this->table_web_wa_chat_rotator,
        'cs_map_wa_chat_rotator' => $this->table_cs_map_wa_chat_rotator,
        'cs_record_wa_chat_rotator' => $this->table_cs_record_wa_chat_rotator,
        'cs_schedule_wa_chat_rotator' => $this->table_cs_schedule_wa_chat_rotator,
        'affiliate_products' => $this->table_affiliate_products,
        'affiliate_carts' => $this->table_affiliate_carts,
        'affiliate_cart_items' => $this->table_affiliate_cart_items,
        'affiliate_custom_prices' => $this->table_affiliate_custom_prices,
        'affiliate_product_categories' => $this->table_affiliate_product_categories,
        'affiliate_product_images' => $this->table_affiliate_product_images,
        'affiliate_product_reviews' => $this->table_affiliate_product_reviews,
        'affiliate_sales' => $this->table_affiliate_sales,
        'affiliate_shop_profile' => $this->table_affiliate_shop_profile,

    ];

    return $map[$entity] ?? null;
}


    // for system works usage
    public function isSystemApprovalAutomatic()
    {

        $table_na = $this->getEntity('system_works');

        $cari = array(
            'id' => 1
        );

        $stat = false;

        $data_system = $this->db->table($table_na)->where($cari)->get()->getRow(); 

        if(!empty($data_system))
            $stat = $data_system->approval_mode;

        return ($stat == 'automatic') ? true : false;
    }

    // for system works usage
    public function isSystemEmailNotificationOn()
    {

        $table_na = $this->getEntity('system_works');

        $cari = array(
            'id' => 1
        );

        $stat = false;

        $data_system = $this->db->table($table_na)->where($cari)->get()->getRow(); 

        if(!empty($data_system))
            $stat = $data_system->email_activity_notification;

        return ($stat == 'on') ? true : false;
    }

    public function isDuplicate($data, $entity){
        $table_na = $this->getEntity($entity);

        if($entity == 'users'){
            $kriteria = array(
                'email' => $data['email']
            );
        }else if($entity == 'apps'){
            $kriteria = array(
                'apps_name' => $data['apps_name'],
                'user_id' => $data['user_id']
            );
        }else if($entity == 'web_wa_chat_rotator'){
            $kriteria = array(
                'order_id'  => $data['order_id'],
                'url' => $data['url']
            );
        }else if($entity == 'cs_record_wa_chat_rotator'){
            $kriteria = array(
                'order_id' => $data['order_id']
            );
        }

        $res = $this->db->table($table_na)->where($kriteria)->get();
        
        $val = false;

        if(count($res->getResult())>0){
            $val = true;
        }

        return $val;
        
    }

    public function decreasedBalance($username, $cash){

        $table_na = $this->getEntity('users');

        $res = $this->db->table($table_na)
        ->set('balance', "balance - {$cash}", false) // false = no escaping
        ->where('username', $username)
        ->update();

        return $res;

    }

    public function getWAChatRotatorAnalysisGroupDataByUsername($username){

        $table_1 = $this->getEntity('order_wa_chat_rotator');
        $table_2 = $this->getEntity('group_wa_chat_rotator');

        // sebutkan kebutuhan column disini
        $columnNeeds = array();
        $columnNeeds[] = $table_1 . '.package';
        $columnNeeds[] = $table_1 . '.username';
        $columnNeeds[] = $table_2 . '.order_id';
        $columnNeeds[] = $table_2 . '.nama as group_name';
        $columnNeeds[] = $table_2 . '.total_clicks';
        $columnNeeds[] = $table_2 . '.id as group_id';

        $columnNeedsString = implode(', ', $columnNeeds);

        // sebutkan kolom yg ingin dibandingkan
        $columnsCompared = array();
        $columnsCompared[] = $table_2 . '.order_id';
        $columnsCompared[] = $table_1 . '.id';

        $columnsComparedString = implode('=', $columnsCompared);        

        $filter = array(
            $table_1 . '.username' => $username
        );

          $builder = $this->db->table($table_1);
         

        $hasil = $builder->select($columnNeedsString)
                    ->join($table_2, $columnsComparedString)
                    ->where($filter)->get()
                    ->getResult(); // Mengambil semua hasil yang cocok

        return $hasil;

    }

    public function getWAChatRotatorAnalysisDistribusiDataByGroupId($id){

        $table_1 = $this->getEntity('group_wa_chat_rotator');
        $table_2 = $this->getEntity('cs_wa_chat_rotator');

        // sebutkan kebutuhan column disini
        $columnNeeds = array();
        $columnNeeds[] = $table_1 . '.nama as group_name';
        $columnNeeds[] = $table_1 . '.distribusi as group_distribution';
        $columnNeeds[] = $table_2 . '.cs_nama as cs_name';
        $columnNeeds[] = $table_2 . '.cs_number';
        $columnNeeds[] = $table_2 . '.cs_status';
        $columnNeeds[] = $table_2 . '.total_leads';

        $columnNeedsString = implode(', ', $columnNeeds);

        // sebutkan kolom yg ingin dibandingkan
        $columnsCompared = array();
        $columnsCompared[] = $table_2 . '.group_id';
        $columnsCompared[] = $table_1 . '.id';

        $columnsComparedString = implode('=', $columnsCompared);        

        $filter = array(
            $table_1 . '.id' => $id
        );

          $builder = $this->db->table($table_1);
         

        $hasil = $builder->select($columnNeedsString)
                    ->join($table_2, $columnsComparedString)
                    ->where($filter)->get()
                    ->getResult(); // Mengambil semua hasil yang cocok

        return $hasil;

    }

    public function getAffiliateTotalCommissionAmount($filter){

    $table_na1 = $this->getEntity('affiliate_sales');        
    $data_na1 = $this->db->table($table_na1)->where($filter)->get()->getResult(); 

    $cash = 0;

    if(!empty($data_na1)){
        foreach($data_na1 as $data){
            $cash += $data->commision_amount;
        }
    }

    return $cash;

    }

    public function getAffiliateCountThisMonth($filter){

    // perbaiki
    $currentMonth = date('Y-m'); 
    $filter['DATE_FORMAT(sale_date, "%Y-%m")'] = $currentMonth;

    $table_na1 = $this->getEntity('affiliate_sales');        
    $data_na1 = $this->db->table($table_na1)->where($filter)->get()->getResult(); 

    $total_sales_count = 0;

    if(!empty($data_na1)){
        $total_sales_count = count($data_na1);
    }

    return $total_sales_count;

    }

    public function getAffiliateCountLastMonth($filter){

    // perbaiki
    $lastMonth = date('Y-m', strtotime('-1 month'));
    $filter['DATE_FORMAT(sale_date, "%Y-%m")'] = $lastMonth;

    $table_na1 = $this->getEntity('affiliate_sales');        
    $data_na1 = $this->db->table($table_na1)->where($filter)->get()->getResult(); 

    $total_sales_count = 0;

    if(!empty($data_na1)){
        $total_sales_count = count($data_na1);
    }

    return $total_sales_count;

    }

    public function getNextScheduleCSNumberBy($filter){

        $table_na1 = $this->getEntity('cs_record_wa_chat_rotator');
        $table_na2 = $this->getEntity('cs_wa_chat_rotator');
        $table_na3 = $this->getEntity('cs_schedule_wa_chat_rotator');

        $cari = array(
            'order_id' => $filter['order_id']
        );

        $time_now = $filter['order_time'];
        $day_now = $filter['order_day'];

        $phone = null;
        $index = 0;
        $last_index = -1;
        $how_many_cs_can = 0;

        $index_can = array();

        $data_cs_wa = $this->db->table($table_na2)->where($cari)->get()->getResult(); 
        $data_cs_schedule = $this->db->table($table_na3)->where($cari)->get()->getResult();
        $data_cs_last_record = $this->db->table($table_na1)->where($cari)->get()->getRow(); 

        if(!empty($data_cs_last_record)){
            $last_index = $data_cs_last_record->last_index;
        }

         if(!empty($data_cs_schedule)){
            foreach($data_cs_schedule as $data){

                $d_mode = $data->day_mode;
                $d_selected = $data->days_selected;

                if($d_mode == 'all'){
                    $h_open = $data->hour_open;
                    $h_closed = $data->hour_closed;

                    if($this->is_within_service_time($time_now, $h_open, $h_closed)){
                        //$phone = $data->cs_number;
                        $how_many_cs_can++;
                        $index_can [] = $index;
                    }

                }else if($d_mode == 'custom' && !empty($d_selected)){
                    $harian = json_decode($d_selected, true);

                    if(sizeof($harian)>0){
                        // we check the day matching
                        if(in_array($day_now, $harian)){
                            $h_open = $data->hour_open;
                            $h_closed = $data->hour_closed;

                            if($this->is_within_service_time($time_now, $h_open, $h_closed)){
                                //$phone = $data->cs_number;
                                $how_many_cs_can++;
                                $index_can [] = $index;
                            }
                        }
                    }

                }

                $index++;
            }

            if($how_many_cs_can==1){
                // jika hanya 1 cs
                // maka hanya padanya saja
                $index = $index_can[0]; 
            }else if($how_many_cs_can>1){
                // jika banyak cs bisa

                // maka rotate
                foreach ($index_can as $val){ 
                    if($val != $last_index){
                        $index = $val;
                        break;
                    }
                }



            }

            $phone = $data_cs_schedule[$index];


            if($phone!=null && $index>-1){

                    $update_data = array(
                        'total_cs_numbers'  => sizeof($data_cs_wa),
                        'last_index'        => $index
                    );

                     $this->db->table($table_na1)->where($cari)->update($update_data);
            }


         } else {

            // if this person has no scheduled cs team yet
            // so we proceed the normal data
            // update the index used internally
            $phone = $this->getNextCSNumberBy($filter);

         }

         
         

         return $phone;

    }

    private function is_within_service_time($time, $hour_open, $hour_closed) {
        // Convert times to integers for comparison
        $time_int = intval(str_replace(":", "", $time));
        $open_int = intval(str_replace(":", "", $hour_open));
        $close_int = intval(str_replace(":", "", $hour_closed));

        // Handle cases where closing time is past midnight (e.g., 22:00 - 02:00)
        if ($open_int < $close_int) {
            return ($time_int >= $open_int && $time_int < $close_int);
        } else { 
            return ($time_int >= $open_int || $time_int < $close_int);
        }

    }

    public function getDifferentUsername($username_used){

        $table = $this->getEntity('users');

        $filter = array(
            'username' => $username_used
        );

        $res = $this->db->table($table)->where($filter)->get()->getResult();

        $username_preferred = $username_used;

        // 4 digit random with 0000 leading front
        $generated_code = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);

        if(!empty($res)){
            $username_preferred = $username_used . $generated_code;
        }

        return $username_preferred;

    }

    public function getNextCSNumberBy($filter){

        $table_na1 = $this->getEntity('cs_record_wa_chat_rotator');
        $table_na2 = $this->getEntity('cs_wa_chat_rotator');

        $res = $this->db->table($table_na1)->where($filter)->get();

         $phone = null;
        
        if($res){
            $hasil = $res->getRow();
            $total_data = $hasil->total_cs_numbers;
            $last_index = $hasil->last_index;

            if($last_index<$total_data && $last_index+1<$total_data){
                $last_index++;
            }else{
                $last_index=0;
            }

            // update the current row
            $data_new = array(
                'last_index' => $last_index
            );

            $this->updateDataBy($filter, $data_new, 'cs_record_wa_chat_rotator');

            $data_phone = $this->db->table($table_na2)->where($filter)->get()->getResult();

           
            if(!empty($data_phone)){
                $phone = $data_phone[$last_index];
            }

        }

        return $phone;

    }

    public function getWAChatRotatorManagementData($order_id = null){

         $table_na = $this->getEntity('group_wa_chat_rotator');
         $table_na2 = $this->getEntity('cs_wa_chat_rotator');

         $filter = array(
            'order_id' => $order_id
         );

        $builder = $this->db->table($table_na);
        $builder->where($filter);
        $builder->orderBy('id', 'ASC');

        $groups = $builder->get()->getResult();

        // Untuk setiap grup, ambil data CS terkait
        foreach ($groups as &$group) {

            $filter2 = array(
            'order_id' => $order_id,
            'group_id' => $group->id
            );

           $builder = $this->db->table($table_na2);
           $builder->where($filter2);
            
            $group->cs_list = $builder->get()->getResult();
        }

        return $groups;

    }

    public function getTotalAmountDepositsThisMonth(){

        $table_na = $this->getEntity('deposits');

        $filter = array(
        'MONTH(date_created) = ' => date('m'),
        'YEAR(date_created) = ' => date('Y')
        );

    $builder = $this->db->table($table_na);
    $builder->selectSum('amount')->where($filter);

    $result = $builder->get();

    //echo $this->db->getLastQuery()->getQuery();

    if ($result->getResult() != false) {
         return $result->getRow()->amount;
    } else {
        return 0; // or some default value
    }

    }

    public function insertData($data, $entity)
    {
        $table_na = $this->getEntity($entity);

        // this is for non-order tables
        if($entity == 'users' || $entity == 'apps' || $entity == 'web_wa_chat_rotator' ){

        if(!$this->isDuplicate($data, $entity)){
        $this->db->table($table_na)->insert($data);
        return $this->db->insertID();    
        }

    }else{

        $this->db->table($table_na)->insert($data);
        return $this->db->insertID();
        
    }

        return 0;

    }


    public function updateDataBy($filter, $data, $entity)
    {
        $table_na = $this->getEntity($entity);

        $this->db->table($table_na)->where($filter)->update($data);
        return $this->db->affectedRows();
    }

    public function updateData($id, $data, $entity)
    {
        $table_na = $this->getEntity($entity);

        $this->db->table($table_na)->where('id', $id)->update($data);
        return $this->db->affectedRows();
    }

    public function deleteData($id, $entity)
    {
        $table_na = $this->getEntity($entity);

        $this->db->table($table_na)->where('id', $id)->delete();
        return $this->db->affectedRows();
    }

      public function deleteDataBy($whereFilter, $entity)
    {
        $table_na = $this->getEntity($entity);

        $this->db->table($table_na)->where($whereFilter)->delete();
        return $this->db->affectedRows();
    }
	
    public function selectAllDataBy($arrayFilter, $entity)
    {
        $table_na = $this->getEntity($entity);

        $res = $this->db->table($table_na)->where($arrayFilter)->get();
        
        return $res->getResult();
    }

     public function selectLastDataBy($arrayFilter, $entity)
    {
        $table_na = $this->getEntity($entity);

        $res = $this->db->table($table_na)
    ->where($arrayFilter)
    ->orderBy('id', 'DESC') // assuming 'id' is the primary key
    ->get(1)->getRow();

    return $res;
    }

    public function selectAllDataAffiliateProducts(){

         $table_na  = $this->getEntity('affiliate_products');
         $table_2   = $this->getEntity('affiliate_product_categories');

        $builder = $this->db->table($table_na . ' as af_prod');

          $res = $builder->select('
            af_prod.id as id,
            af_prod.name as name,
            af_prod.description,
            af_prod.base_price,
            af_prod.status,
            af_prod.admin_commission_rate,
            af_prod.date_created,
            af_prod_cat.name as category'
    )
            ->join($table_2 . ' as af_prod_cat', 'af_prod_cat.id = af_prod.category_id', 'inner')
            ->get();

        return $res->getResult();

    }

    public function selectDataAffiliateProductByID($id){

         $table_na  = $this->getEntity('affiliate_products');
         $table_2   = $this->getEntity('affiliate_product_categories');

         $filter = array(
            "af_prod.id" => $id
         );

        $builder = $this->db->table($table_na . ' as af_prod');

        $res = $builder->select('
            af_prod.id as id,
            af_prod.name as name,
            af_prod.description,
            af_prod.base_price,
            af_prod.status,
            af_prod.admin_commission_rate,
            af_prod.date_created,
            af_prod_cat.name as category'
    )->join($table_2 . ' as af_prod_cat', 'af_prod_cat.id = af_prod.category_id', 'inner')
            ->where($filter)
            ->get();

        //return $filter;

        return $res->getRow();

    }

    public function selectAllCSNumberWAChatRotatorByUsername($username, $entity){

        $table_na = $this->getEntity($entity);
        $table_2 = $this->getEntity('order_jasa');

        $builder = $this->db->table($table_na . ' as cs');

        $res = $builder->select('cs.id, cs.order_id, cs.cs_number')
            ->join($table_2 . ' as tor', 'tor.order_id = cs.order_id', 'inner')
            ->where('tor.username', $username)
            ->get();

        return $res->getResult();


    }

    public function isWAChatRotatorExist($filter){


       $table1 = $this->getEntity('order_wa_chat_rotator');

       $data1 = $this->db->table($table1)->where($filter)->get()->getRow();

       if(!empty($data1)){

            return $data1;

       }

       return false;


    }

    public function isWAChatRotatorReady($code_come, $as_text){

        // ready state is :
        // 0. order jasa for this (is paid not pending)
        // 1. custom name & message (set)
        // 2. at least have 1 single cs number
        // 3. website (set)
        $filter0 = array(
            'order_client_reff' => $code_come
        );

        $stage0 = false;
        $stage1 = false;
        $stage2 = false;
        $stage3 = false;

        $error_message = "";
        $error0 = "belum bayar tagihan";
        $error1 = "belum diset Nama Tema & Message WA";
        $error2 = "belum diset Nomor Tim CS WA";
        $error3 = "belum diset Website Penggunaan CS WA Rotator";

        $order_id = null;

        $table_na1 = $this->getEntity('order_jasa');
        $table_na2 = $this->getEntity('order_wa_chat_rotator');
        $table_na3 = $this->getEntity('cs_wa_chat_rotator');
        $table_na4 = $this->getEntity('web_wa_chat_rotator');

        $data1 = $this->db->table($table_na1)->where($filter0)->get()->getRow();

        // if this person has paid order
        if(!empty($data1)){
            if($data1->status != 'pending' && $data1->status != 'error'){
                $stage0 = true;

                $order_id = $data1->order_id;

                $filter1 = array(
                    'id' => $order_id
                );

                $data2 = $this->db->table($table_na2)->where($filter1)->get()->getRow();

                // if this person has a message & custom name (SET)
                if(!empty($data2)){
                    if(!empty($data2->custom_name) && !empty($data2->message) ){
                        $stage1 = true;

                        $filter2 = array(
                            'order_id' => $order_id
                        );

                        $data3 = $this->db->table($table_na3)->where($filter2)->get()->getResult();

                        // if this person has a team of CS number (SET)
                        if(!empty($data3)){
                            if(sizeof($data3) > 0){
                                $stage2 = true;

                                $data4 = $this->db->table($table_na4)->where($filter2)->get()->getResult();

                                // if this person has a web (SET)
                                if(!empty($data4)){
                                    $found_empty = false;
                                    foreach($data4 as $k){
                                        if(empty($k->url)){
                                            $found_empty = true;
                                            break;
                                        }
                                    }

                                    if(!$found_empty){
                                        $stage3 = true;
                                    }

                                }
                            }
                        }

                    }
                }

            }
        }

       if($as_text){

        if($stage0==false){
            $error_message = $error0;
        }else if($stage1==false){
            $error_message = $error1;
        }else if($stage2==false){
            $error_message = $error2;
        }else if($stage3==false){
            $error_message = $error3;
        }else{
            $error_message = "ready";
        }

        return $error_message;
       }else {

        if($stage0 && $stage1 && $stage2 && $stage3){
            return true;
        }

       }

        return false;

    }

    public function selectDataBy($arrayFilter, $entity)
    {
        $table_na = $this->getEntity($entity);

        $res = $this->db->table($table_na)->where($arrayFilter)->get();
        
        return $res->getRow();
    }

    public function selectDataLastBy($arrayFilter, $entity)
    {
        $table_na = $this->getEntity($entity);

        $res = $this->db->table($table_na)->where($arrayFilter)->orderBy('date_created', 'DESC')->get();
        
        return $res->getRow();
    }

    public function selectData($id, $entity)
    {
        $table_na = $this->getEntity($entity);

        $res = $this->db->table($table_na)->where('id', $id)->get();
        
		return $res->getRow();
    }

     public function selectAllData($entity)
    {
        $table_na = $this->getEntity($entity);

        $res = $this->db->table($table_na)->get();
        
        return $res->getResult();
    }

      public function selectAllDataByUsername($username, $entity)
    {
        $table_na = $this->getEntity($entity);

        if($entity === 'apps' ){
           $res = $this->db->table($table_na)->where('username_owned', $username)->get();
        }else{
            $res = $this->db->table($table_na)->where('username', $username)->get();
        }

        return $res->getResult();
    }

    public function verify_login($data){

        $table_na = $this->getEntity('users');

        $res = $this->db->table($table_na)->where($data)->get();
        
        return $res->getResult();   
    }

    public function getAffiliateProductForShopBy($filter){

        $table1 = $this->getEntity('affiliate_products'); // 'products'
        $table2 = $this->getEntity('affiliate_product_categories'); // 'categories'

        $builder = $this->db->table($table1 . ' as p');
        $builder->select('p.name as product_name, p.id as product_id, p.short_info, p.description, p.rating_overall, p.base_price, c.name as category_name');
        $builder->where($filter);
        $builder->join($table2 . ' as c', 'p.category_id = c.id', 'left'); // LEFT JOIN

        $query = $builder->get();
        return $query->getRow();


    }

   

     public function getAffiliateProductRatingShopBy($filter){

        $table1 = $this->getEntity('affiliate_product_reviews'); 
        $table2 = $this->getEntity('users'); 

        $builder = $this->db->table($table1 . ' as r');
        $builder->select('r.rating, r.comment, u.propic, u.username, r.date_created');
        $builder->where($filter);
        $builder->join($table2 . ' as u', 'u.id = r.user_id', 'left'); 

        $query = $builder->get();
        return $query->getRow();


    }
	
    public function getAllAffiliateProductsForShop(){

        $table_1 = $this->getEntity('affiliate_products');        
        $table_2 = $this->getEntity('affiliate_product_images');        

     
 $sql = "SELECT 
            p.id AS product_id, 
            p.name AS product_name, 
            p.base_price, 
            i.id AS image_id, 
            i.image_url, 
            i.is_thumbnail
        FROM {$table_1} p
        LEFT JOIN {$table_2} i ON i.id = (
            SELECT id
            FROM {$table_2}
            WHERE product_id = p.id
            ORDER BY is_thumbnail DESC, id ASC
            LIMIT 1
        )
    ";

    $query = $this->db->query($sql);
    return $query->getResult();


    }

     public function getAllAffiliateProductsForShopByPrice($min, $max){

        $table_1 = $this->getEntity('affiliate_products');        
        $table_2 = $this->getEntity('affiliate_product_images');        

     
       $sql = "SELECT 
            p.id AS product_id, 
            p.name AS product_name, 
            p.base_price, 
            i.id AS image_id, 
            i.image_url, 
            i.is_thumbnail
        FROM {$table_1} p
        LEFT JOIN {$table_2} i ON i.id = (
            SELECT id
            FROM {$table_2}
            WHERE product_id = p.id
            ORDER BY is_thumbnail DESC, id ASC
            LIMIT 1
        )
        WHERE p.base_price BETWEEN ? AND ?";

    $query = $this->db->query($sql, [$min, $max]);

    return $query->getResult();


    }

    public function getAffiliateProductHighestPrice(){

        $table_na = $this->getEntity('affiliate_products');        


        $res = $this->db->table($table_na)->orderBy('base_price','desc')->limit(0)->get();
        
        if(!empty($res)){
            return $res->getRow()->base_price;   
        }

        return 0;

    }

     public function getAffiliateProductLowestPrice(){

        $table_na = $this->getEntity('affiliate_products');        


        $res = $this->db->table($table_na)->orderBy('base_price','asc')->limit(0)->get();
        
        if(!empty($res)){
            return $res->getRow()->base_price;   
        }

        return 0;

    }

     public function getAllAffiliateProductsForShopByPriceMinimum($min){

        $table_1 = $this->getEntity('affiliate_products');        
        $table_2 = $this->getEntity('affiliate_product_images');        

     
         $sql = "SELECT p.*, i.* 
            FROM {$table_1} p
            LEFT JOIN {$table_2} i ON i.id = (
                SELECT id
                FROM {$table_2}
                WHERE product_id = p.id
                ORDER BY is_thumbnail DESC, id ASC
                LIMIT 1
            )
            WHERE p.base_price >= ?";

    $query = $this->db->query($sql, [$min]);
    
    return $query->getResult();


    }

    public function getAllAffiliateProductCategoriesForShop(){

         $table1 = $this->getEntity('affiliate_products');   // Assuming 'product'
         $table2 = $this->getEntity('affiliate_product_categories'); // Assuming 'category'

    $builder = $this->db->table($table2 . ' as c');
    $builder->select('c.name as category_name, c.slug, COUNT(p.id) as total_products');
    $builder->join($table1 . ' as p', 'p.category_id = c.id', 'left');
    $builder->groupBy('c.id');

    $query = $builder->get();
    return $query->getResult();

    }

    public function getLowestBasePricePackage($ordertype){

        $table_na = $this->getEntity('packages');        

        $filterData = array(
            'order_type' => $ordertype
        );

         $res = $this->db->table($table_na)->where($filterData)->orderBy('base_price','asc')->limit(0)->get();
        
        $hasil = $res->getResult();   

        if($hasil != false){
            return $res->getRow()->base_price;   
        }

    }

    public function getPackageByOrder($order_id, $entity){

        $data = null;

        $data_detail = $this->selectData($order_id, $entity);

        if(!empty($data_detail)){
            $package_name = $data_detail->package;

            // buang kata order didepannya
            // save jenis order typenya saja
            $o_type = str_replace('order_', '', $entity);

            $filter = array(
                'name' => $package_name,
                'order_type' => $o_type
            );

            $data_package = $this->selectDataBy($filter, 'packages');

            if(!empty($data_package))
                $data = $data_package;

        }

        return $data;

    }

    public function requestStatistics($gender, $column, $entity){


        $table_na = $this->getEntity($entity);
        $currentYear = date('Y');
        $currentMonth = date('m');
        
        $dataArray = array();

        for($i=1; $i <= $currentMonth; $i++){

        $filterData = array(
            $column => $gender,
            'YEAR(date_created)' => $currentYear,
            'MONTH(date_created)' => $i
        );

        $res = $this->db->table($table_na)->where($filterData)->get();
        
        $jumlah = count($res->getResult());   
        $dataArray [] = $jumlah;

        }

        // end result would be a numeric array only
        // such [2, 5, 2, 6, 2, 5, 2, 4, 2,1, 3, 3];
        return $dataArray;

    }

}

?>
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


    protected $table_data_virtualvisitors       = 'table_data_virtualvisitors';
    protected $table_campaign_virtualvisitors       = 'table_campaign_virtualvisitors';
    protected $table_deposits       = 'table_deposits';
    protected $table_order_jasa       = 'table_order_jasa';
    protected $table_order_upgrade_fituraplikasi = 'table_order_upgrade_fituraplikasi';
    protected $table_order_pembuatanaplikasi     = 'table_order_pembuatanaplikasi';
    protected $table_order_virtualvisitors       = 'table_order_virtualvisitors';
    protected $table_order_comment       = 'table_order_comment';
    protected $table_order_follow_marketplace       = 'table_order_follow_marketplace';
    protected $table_order_rating       = 'table_order_rating';
    protected $table_order_subscriber       = 'table_order_subscriber';
    protected $table_order_view       = 'table_order_view';
    protected $table_order_wa_chat_rotator       = 'table_order_wa_chat_rotator';
    protected $table_order_landingpage       = 'table_order_landingpage';
    protected $table_order_wishlist_marketplace       = 'table_order_wishlist_marketplace';

    private function getEntity($entity){
        $table_na = null;
        if($entity == 'users'){
            $table_na = $this->table_users;
            
        }else if($entity == 'packages'){
            $table_na = $this->table_packages;

        }else if($entity == 'ticketing'){
            $table_na = $this->table_ticketing;

        }else if($entity == 'apps'){
            $table_na = $this->table_apps;

        }else if($entity == 'deposits'){
            $table_na = $this->table_deposits;

        }else if($entity == 'data_virtualvisitors'){
            $table_na = $this->table_data_virtualvisitors;

        }else if($entity == 'campaign_virtualvisitors'){
            $table_na = $this->table_campaign_virtualvisitors;

        }else if($entity == 'order_jasa'){
            $table_na = $this->table_order_jasa;

        }else if($entity == 'order_virtualvisitors'){
            $table_na = $this->table_order_virtualvisitors;

        }else if($entity == 'order_upgrade_fituraplikasi'){
            $table_na = $this->table_order_upgrade_fituraplikasi;

        }else if($entity == 'order_pembuatanaplikasi'){
            $table_na = $this->table_order_pembuatanaplikasi;

        }else if($entity == 'order_comment'){
            $table_na = $this->table_order_comment;

        }else if($entity == 'order_follow_marketplace'){
            $table_na = $this->table_order_follow_marketplace;

        }else if($entity == 'order_wishlist_marketplace'){
            $table_na = $this->table_order_wishlist_marketplace;

        }else if($entity == 'order_rating'){
            $table_na = $this->table_order_rating;

        }else if($entity == 'order_subscriber'){
            $table_na = $this->table_order_subscriber;

        }else if($entity == 'order_view'){
            $table_na = $this->table_order_view;

        }else if($entity == 'order_wa_chat_rotator'){
            $table_na = $this->table_order_wa_chat_rotator;

        }else if($entity == 'layananmanual'){
            $table_na = $this->table_layananmanual;

        }else if($entity == 'socialmedia'){
            $table_na = $this->table_socialmedia;

        } else if($entity == 'cs_wa_chat_rotator'){
            $table_na = $this->table_cs_wa_chat_rotator;

        } else if($entity == 'web_wa_chat_rotator'){
            $table_na = $this->table_web_wa_chat_rotator;

        }  else if($entity == 'cs_map_wa_chat_rotator'){
            $table_na = $this->table_cs_map_wa_chat_rotator;

        }else if($entity == 'cs_record_wa_chat_rotator'){
            $table_na = $this->table_cs_record_wa_chat_rotator;

        }else if($entity == 'cs_schedule_wa_chat_rotator'){
            $table_na = $this->table_cs_schedule_wa_chat_rotator;

        }


        return $table_na;
    }

    public function isDuplicate($data, $entity){
        $table_na = $this->getEntity($entity);

        if($entity == 'users'){
            $kriteria = array(
                'username' => $data['username'],
                'email' => $data['email']
            );
        }else if($entity == 'apps'){
            $kriteria = array(
                'apps_name' => $data['apps_name'],
                'user_id' => $data['user_id']
            );
        }else if($entity == 'cs_wa_chat_rotator' || $entity == 'cs_schedule_wa_chat_rotator' || $entity == 'cs_map_wa_chat_rotator'){
            $kriteria = array(
                'order_id' => $data['order_id'],
                'cs_number' => $data['cs_number']
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

    public function getWAChatRotatorManagementData($username = null){


        // end result is
        // package, total_no_wa, total_web, date_created, id, and also
        // the phone and web structured in array
        // for ul li elements expanded later
        $table_wa = $this->getEntity('order_wa_chat_rotator');
        $table_cs = $this->getEntity('cs_wa_chat_rotator');
        $table_web = $this->getEntity('web_wa_chat_rotator');
        $table_order_jasa = $this->getEntity('order_jasa');

        $query_combine_hp = "IFNULL(GROUP_CONCAT(DISTINCT cs.cs_number ORDER BY cs.cs_number SEPARATOR ', '), '-') AS details_cs";
        $query_combine_url = "IFNULL(GROUP_CONCAT(DISTINCT web.url ORDER BY web.url SEPARATOR ', '), '-') AS details_web";

       $builder = $this->db->table($table_wa . " as wa");
       $builder->select("wa.id, wa.package, COUNT(DISTINCT cs.id) AS total_cs, COUNT(DISTINCT web.id) AS total_web, ". $query_combine_hp. "," . $query_combine_url . ", wa.date_created, wa.custom_name, wa.rotator_mode, jasa.order_client_reff");

       if(!empty($username)){
        
        $builder->join($table_cs." as cs", "wa.id = cs.order_id", "left")
        ->join($table_web." as web", "wa.id = web.order_id", "left")
        ->join($table_order_jasa." as jasa", "jasa.order_id = wa.id AND order_type='wa_chat_rotator'", "left")
        ->where('wa.username', $username)
        ->groupBy("wa.id, wa.package, wa.date_created")
        ->orderBy("wa.id");

       }else{

        $builder->join($table_cs." as cs", "wa.id = cs.order_id", "left")
        ->join($table_web." as web", "wa.id = web.order_id", "left")
        ->join($table_order_jasa." as jasa", "jasa.order_id = wa.id AND order_type='wa_chat_rotator'", "left")
        ->groupBy("wa.id, wa.package, wa.date_created")
        ->orderBy("wa.id");

       }

       $result = $builder->get()->getResult();

       if(!empty($result)){
            return $result;
       }

       return false;

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
        if($entity == 'users' || $entity == 'apps' || $entity == 'web_wa_chat_rotator' || $entity == 'cs_wa_chat_rotator'){

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

    public function selectData($id, $entity)
    {
        $table_na = $this->getEntity($entity);

        $res = $this->db->table($table_na)->where('id', $id)->get();
        
		return $res->getResult();
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

        if($entity === 'apps' || $entity === 'layananmanual'){
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
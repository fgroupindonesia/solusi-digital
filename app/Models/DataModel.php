<?php
namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table_users      = 'table_users';
    protected $table_packages      = 'table_packages';
    protected $table_ticketing  = 'table_ticketing';
    protected $table_apps       = 'table_apps';
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
        }

        $res = $this->db->table($table_na)->where($kriteria)->get();
        
        $val = false;

        if(count($res->getResult())>0){
            $val = true;
        }

        return $val;
        
    }

    public function insertData($data, $entity)
    {
        $table_na = $this->getEntity($entity);

        // this is for non-order tables
        if($entity == 'users' || $entity == 'apps'){

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
	
    public function selectSingleLastData($arrayFilter, $entity)
    {
        $table_na = $this->getEntity($entity);

        $res = $this->db->table($table_na)->where($arrayFilter)->get();
        
        return $res->getResult();
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

        if($entity === 'apps'){
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
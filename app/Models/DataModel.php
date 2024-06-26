<?php
namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table_users      = 'table_users';
    protected $table_ticketing  = 'table_ticketing';
    protected $table_apps       = 'table_apps';

    private function getEntity($entity){
        $table_na = null;
        if($entity == 'users'){
            $table_na = $this->table_users;
        }else if($entity == 'ticketing'){
            $table_na = $this->table_ticketing;
        }else if($entity == 'apps'){
            $table_na = $this->table_apps;
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

        if(!$this->isDuplicate($data, $entity)){
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

        $res = $this->db->table($table_na)->where('username_owned', $username)->get();
        
        return $res->getResult();
    }

    public function verify_login($data){

        $table_na = $this->getEntity('users');

        $res = $this->db->table($table_na)->where($data)->get();
        
        return $res->getResult();   
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
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

        $kriteria = array(
            'username' => $data['username'],
            'email' => $data['email']
        );

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
	
}

?>
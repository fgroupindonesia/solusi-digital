<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\DataModel;

class Works extends BaseController
{
	
	protected $helpers = ['form', 'filesystem', 'directory'];
	
    public $db = null;

    public function __construct(){

        $this->db = new DataModel();
        //echo var_dump($this->db);

    }

    public function verify_login()
    {
        $u = $this->request->getPost('username');
        $p = $this->request->getPost('password');

        $data = array(
            'username'=>$u,
            'pass'=>$p
        );

        $rest = $this->db->verify_login($data);
        

        if(empty($rest)){
            return redirect()->to('/portal?status=error');
        }

        $session = session();
        //echo var_dump($rest);
        $session->set('role', $rest[0]->role);
        $session->set('username', $rest[0]->username);
         $session->set('propic', $rest[0]->propic);

        echo "processing...";

        return redirect()->to('/dashboard');


    }

	public function app_add()
    {

    }

	public function app_delete()
    {

         $id = $this->request->getPost('id');

          $rest = $this->db->deleteData($id, 'apps');
     
         if($rest != 0){
            echo "valid";
         }else{
            echo "none";
         }


    }

	public function app_edit()
    {

    }

    public function user_add()
    {
         $u = $this->request->getPost('username');
           $p = $this->request->getPost('pass');
             $e = $this->request->getPost('email');
               $s = $this->request->getPost('sex');
                 $o = $this->request->getPost('occupation');
                   $pro = $this->request->getPost('propic');
                     $role = $this->request->getPost('role');
                       $wa = $this->request->getPost('whatsapp');

        if(!isset($role)){
            $role = 'client';
        }

        if(!isset($pro)){
            if($s == 'male')
            $pro = 'default-male.png';

            if($s == 'female')
            $pro = 'default-female.png';

        }        

        $data = array(
            'username'  => $u,
            'pass'      => $p,
            'email'     => $e,
            'sex'       => $s,
            'occupation' => $o,
            'propic'    => $pro,
            'role'      => $role,
            'whatsapp'  => $wa
        );

     $rest = $this->db->insertData($data, 'users');
     
     if($rest == 0){
        echo "none";
     }else {
        echo "valid";
     }


    }

    public function user_update(){

            $id = $this->request->getPost('id');
        
            $u = $this->request->getPost('username');
           $p = $this->request->getPost('pass');
             $e = $this->request->getPost('email');
               $s = $this->request->getPost('sex');
                 $o = $this->request->getPost('occupation');
                   $pro = $this->request->getPost('propic');
                     $role = $this->request->getPost('role');
                       $wa = $this->request->getPost('whatsapp');

        if(!isset($role)){
            $role = 'client';
        }

        if(!isset($pro)){
            if($s == 'male')
            $pro = 'default-male.png';

            if($s == 'female')
            $pro = 'default-female.png';

        }        

        $data = array(
            'username'  => $u,
            'pass'      => $p,
            'email'     => $e,
            'sex'       => $s,
            'occupation' => $o,
            'propic'    => $pro,
            'role'      => $role,
            'whatsapp'  => $wa
        );

     $rest = $this->db->updateData($id, $data, 'users');
     
     if($rest == 0){
        echo "none";
     }else {
        echo "valid";
     }




    }

    public function user_delete()
    {
         $id = $this->request->getPost('id');

          $rest = $this->db->deleteData($id, 'users');
     
         if($rest != 0){
            echo "valid";
         }else{
            echo "none";
         }

    }

    public function user_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'users');
        
        if(count($rest)==0){
            // no value
            echo "none";
        }else{
            echo json_encode($rest[0]);
        }

    }

    public function logout(){
    	$session = session();
        $session->remove('role');
        $session->remove('username');
      return redirect()->route('portal');

    }

}

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

    public function send_email($jenis, $id){

        //echo "AAA";
        //$jenis = $this->request->getPost('type');
        //   $id = $this->request->getPost('id');

        //echo $id;

        if($jenis == 'activation'){
            $this->send_activation($id);
        }else if($jenis == 'registration'){
            $this->send_registration($id);
        }else{
            echo "invalid";
        }

    }

  public function send_activation($idNa){
       $dataNa = $this->db->selectData($idNa, 'users');

        // when we found it
        if(count($dataNa) == 1){

        $username   = $dataNa[0]->username;
        $email      = $dataNa[0]->email;
        $pass       = $dataNa[0]->pass;

        $passedData = 'type=activation&email=' . $email . "&username=" . $username . "&pass=" . 
        urlencode($pass);

        $urlEmailSender = 'https://demo.fgroupindonesia.com/email/sending.php?' . ($passedData);
            //echo $urlEmailSender . "<br>";

            // call the email sending
            $this->callURL($urlEmailSender);

            echo "valid";

        }else{

            echo "none";

        }
 }

    public function send_registration($idNa){
     
        $dataNa = $this->db->selectData($idNa, 'users');

        // when we found it
        if(count($dataNa) == 1){

        $fullname   = $dataNa[0]->fullname;
        $email      = $dataNa[0]->email;

        $passedData = 'type=registration&email=' . $email . "&fullname=" . urlencode($fullname);

        $urlEmailSender = 'https://demo.fgroupindonesia.com/email/sending.php?' . ($passedData);
        //echo $urlEmailSender . "<br>";

            // call the email sending
            $this->callURL($urlEmailSender);

            //echo "valid";

        }else{

            echo "none";

        }



    }

    private function callURL($urlNa){

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlNa);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec($ch);
curl_close($ch);


    }

    private function getTotalDataByMonth($monthNumeric){

        $n = 0;

        return $n;

    }

    public function statistics_data(){

         $gender = $this->request->getPost('sex');

         $rest = $this->db->requestStatistics($gender, 'sex', 'users');
 
         // we populate the result as array numeric with a total of 12 column (month names)
         $endDataByMonth = array();

         $bulanNow = date('m');

         // starting is month of 0 as january
         for($i = 0; $i < $bulanNow; $i++){
            $endDataByMonth [] = $this->getTotalDataByMonth($rest, $i);
         }

         if(count($rest) == 0){
            echo "none";
         }  else {
            echo json_encode($rest);
         }

    }

    public function settings_update(){

        $id = $this->request->getPost('id');
        
        $u = $this->request->getPost('username');
        $p = $this->request->getPost('pass');
        $e = $this->request->getPost('email');
        $s = $this->request->getPost('sex');
        $o = $this->request->getPost('occupation');
        $wa = $this->request->getPost('whatsapp');

        $data = array(
            'username'  => $u,
            'pass'      => $p,
            'email'     => $e,
            'sex'       => $s,
            'occupation' => $o,
            'whatsapp'  => $wa
        );

     $rest = $this->db->updateData($id, $data, 'users');
     
     if($rest == 0){
        echo "none";
     }else {
        echo "valid";
        // we need to rewrite the session because it
        // is used in the actual form 
     }




    }

    public function verify_login_manual(){

        $u = $this->request->getGet('username');
        $p = $this->request->getGet('pass');

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
        $session->set('pass', $rest[0]->pass);
        $session->set('email', $rest[0]->email);
        $session->set('sex', $rest[0]->sex);
        $session->set('occupation', $rest[0]->occupation);
        $session->set('whatsapp', $rest[0]->whatsapp);
        $session->set('propic', $rest[0]->propic);
        $session->set('user_id', $rest[0]->id);

        echo "processing...";

        return redirect()->to('/dashboard');

    }

    public function verify_user_to_dashboard($data)
    {
       
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
        $session->set('pass', $rest[0]->pass);
        $session->set('email', $rest[0]->email);
        $session->set('sex', $rest[0]->sex);
        $session->set('occupation', $rest[0]->occupation);
        $session->set('whatsapp', $rest[0]->whatsapp);
        $session->set('propic', $rest[0]->propic);
        $session->set('user_id', $rest[0]->id);

        echo "processing...";

        return redirect()->to('/dashboard');

    }

    public function app_update()
    {
        
      $id = $this->request->getPost('id');
        
      $a_name = $this->request->getPost('apps_name');
      $d = $this->request->getPost('descriptions');
      $i = $this->request->getPost('icon');
      $b = $this->request->getPost('best_screenshot');
      $p = $this->request->getPost('privacy_url');

      $u_own = $this->request->getPost('username_owned');

        $data = array(
            'apps_name'  => $a_name,
            'descriptions' => $d,
            'icon'     => $i,
            'best_screenshot' => $b,
            'privacy_url' => $p
        );

     $rest = $this->db->updateData($id, $data, 'apps');
     
     if($rest == 0){
        echo "none";
     }else {
        echo "valid";
     }

    }

	public function app_add()
    {
        $u = $this->request->getPost('username_owned');
        $u_id = $this->request->getPost('user_id');
        $a_name = $this->request->getPost('apps_name');
        $d = $this->request->getPost('descriptions');
        $i = $this->request->getPost('icon');
        $b_s = $this->request->getPost('best_screenshot');
        $p_u = $this->request->getPost('privacy_url');
        
        $data = array(
            'username_owned'    => $u,
            'user_id'           => $u_id,
            'apps_name'         => $a_name,
            'descriptions'      => $d,
            'icon'              => $i,
            'best_screenshot'   => $b_s,
            'privacy_url'       => $p_u,
            'status'            => 'pending'
        );

     $rest = $this->db->insertData($data, 'apps');
     
     if($rest == 0){
        echo "none";
     }else {
        echo "valid";
     }

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
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'apps');
        
        if(count($rest)==0){
            // no value
            echo "none";
        }else{
            echo json_encode($rest[0]);
        }
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

    private function getFromEmail($dataEmail){

        $dataNa = explode("@", $dataEmail);
        $u = $dataNa[0];
        $d = $dataNa[1];

        if(count($dataNa)==0){
            return null;
        }
        return $u;
    }

    private function generateRandomPass($manyLength){

        // we dont use 1 number
        // nor i nor l characters
    $characters = 'abcdefghjkmnopqrstuvwxyz0123456789';
    $randomString = '';

    for ($i = 0; $i < $manyLength; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;

    }

    public function user_register()
    {
        
        $p = $this->generateRandomPass(7);
        $e = $this->request->getGet('email');
        $f = $this->request->getGet('fullname');
        $u = $this->getFromEmail($e);

        $s = $this->request->getGet('sex');
        $o = 'none';
        $wa = $this->request->getGet('whatsapp');

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
            'fullname'  => $f,
            'whatsapp'  => $wa
        );

     $rest = $this->db->insertData($data, 'users');

     
     if($rest == 0){
        echo "none";
     }else {
        echo "valid";
        $idUser = $rest;

        $this->send_email('registration', $idUser);
        return view('wa_call');
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

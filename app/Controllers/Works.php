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

    public function jasa_order_data(){

         $id = $this->request->getPost('order_id');
         $o_type = $this->request->getPost('order_type');
         $datana = null;


         if(isset($o_type)){
            $entityName = 'order_' . $o_type;
            $datana = $this->db->selectData($id, $entityName);
         }

         $result = array(
            'status'=> 'success',
            'data' => $datana[0]
         );

         if(empty($datana)){
            
            $result['status'] = 'none';
            $result['data'] = null;
            
         }

         echo json_encode($result);

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

    public function jasa_order_update(){

        $status = $this->request->getPost('status');
        $id = $this->request->getPost('id');

        $datana = array(
            'id'     => $id,
            'status' => $status
        );

        $res = $this->db->updateData($id, $datana, 'order_jasa');

        if($res > 0){
            echo "success";
        }else{
            echo "none";
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
        $session->set('balance', $rest[0]->balance);
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

    public function deposit_update()
    {
        
      $id = $this->request->getPost('id');
        
      $u = $this->request->getPost('username');
      $s = $this->request->getPost('status');
      $a = $this->request->getPost('amount');
        
        $data = array(
            'username'  => $u,
            'status' => $s,
            'amount'     => $a
        );

     $rest = $this->db->updateData($id, $data, 'deposits');
     
    if($s == 'purchased'){
     // insert the balance into user account
     $this->updateUserBalance($a, $u);
    }

     if($rest == 0){
        echo "none";
     }else {
        echo "valid";
     }

    }


    public function jasa_comment_order(){

        $social_media = $this->request->getPost('social_media');
        // social media probably in array form
        if(isset($social_media)){
            $datasocmed = json_decode($social_media, true);
            $datasocmedString = implode(', ', $datasocmed);
            $social_media = $datasocmedString;
        }

       $url = $this->request->getPost('url');
        $title = $this->request->getPost('title');
        $package = $this->request->getPost('package');
        $gender = $this->request->getPost('gender');
        $notes = $this->request->getPost('notes');
        $user = $this->request->getPost('username');

           $data1 = array(
            'social_media'  => $social_media,
            'url'           => $url,
            'title'         => $title,
            'package'       => $package,
            'gender'        => $gender,
            'notes'         => $notes,
            'username'      => $user
        );

         //  echo var_dump($data1);
        $rest1 = $this->db->insertData($data1, 'order_comment');
        $order_id = $rest1;
        $order_type = 'comment';

        $sixDigitRandomRef = $this->generateRandomPass(6);

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => 'pending',
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
     }

    }

     public function jasa_follow_marketplace_order(){

      $marketplace = $this->request->getPost('marketplace');
        // marketplace probably in array form
        if(isset($marketplace)){
            $datamarketplace = json_decode($marketplace, true);
            $datamarketplaceString = implode(', ', $datamarketplace);
            $marketplace = $datamarketplaceString;
        }

        $url = $this->request->getPost('url');
        $shop_name = $this->request->getPost('shop_name');
        $package = $this->request->getPost('package');
        $gender = $this->request->getPost('gender');
        $notes = $this->request->getPost('notes');
        $user = $this->request->getPost('username');

        // we insert 2 things : into table_order_jasa, order_follow_marketplace
     
        $data1 = array(
            'marketplace'  => $marketplace,
            'url'           => $url,
            'shop_name'     => $shop_name,
            'package'       => $package,
            'gender'        => $gender,
            'notes'         => $notes,
            'username'      => $user
        );

        $rest1 = $this->db->insertData($data1, 'order_follow_marketplace');
        $order_id = $rest1;
        $order_type = 'follow_marketplace';

         $sixDigitRandomRef = $this->generateRandomPass(6);

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => 'pending',
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
     }

    }

     public function jasa_wishlist_marketplace_order(){

        $marketplace = $this->request->getPost('marketplace');
        // marketplace probably in array form
        if(isset($marketplace)){
            $datamarketplace = json_decode($marketplace, true);
            $datamarketplaceString = implode(', ', $datamarketplace);
            $marketplace = $datamarketplaceString;
        }

        $url = $this->request->getPost('url');
        $shop_name = $this->request->getPost('shop_name');
        $package = $this->request->getPost('package');
        $gender = $this->request->getPost('gender');
        $notes = $this->request->getPost('notes');
        $user = $this->request->getPost('username');

        // we insert 2 things : into table_order_jasa, order_wishlist_marketplace
     
        $data1 = array(
            'marketplace'  => $marketplace,
            'url'           => $url,
            'shop_name'     => $shop_name,
            'package'       => $package,
            'gender'        => $gender,
            'notes'         => $notes,
            'username'      => $user
        );

        $rest1 = $this->db->insertData($data1, 'order_wishlist_marketplace');
        $order_id = $rest1;
        $order_type = 'wishlist_marketplace';

        $sixDigitRandomRef = $this->generateRandomPass(6);

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => 'pending',
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
     }

    }

     public function jasa_rating_order(){

       $social_media = $this->request->getPost('social_media');
         // social media probably in array form
        if(isset($social_media)){
            $datasocmed = json_decode($social_media, true);
            $datasocmedString = implode(', ', $datasocmed);
            $social_media = $datasocmedString;
        }

        $url = $this->request->getPost('url');
        $business_name = $this->request->getPost('business_name');
        $package = $this->request->getPost('package');
        $gender = $this->request->getPost('gender');
        $notes = $this->request->getPost('notes');
        $user = $this->request->getPost('username');

        // we insert 2 things : into table_order_jasa, table_order_rating
     
        $data1 = array(
            'social_media'  => $social_media,
            'url'           => $url,
            'business_name' => $business_name,
            'package'       => $package,
            'gender'        => $gender,
            'notes'         => $notes,
            'username'      => $user
        );

        $rest1 = $this->db->insertData($data1, 'order_rating');
        $order_id = $rest1;
        $order_type = 'rating';

      $sixDigitRandomRef = $this->generateRandomPass(6);

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => 'pending',
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
     }

    }



     public function jasa_subscriber_order(){

        $social_media = $this->request->getPost('social_media');
         // social media probably in array form
        if(isset($social_media)){
            $datasocmed = json_decode($social_media, true);
            $datasocmedString = implode(', ', $datasocmed);
            $social_media = $datasocmedString;
        }

        $url = $this->request->getPost('url');
        $account_name = $this->request->getPost('account_name');
        $package = $this->request->getPost('package');
        $gender = $this->request->getPost('gender');
        $user = $this->request->getPost('username');

        // we insert 2 things : into table_order_jasa, table_order_subscriber
     
        $data1 = array(
            'social_media'  => $social_media,
            'url'           => $url,
            'account_name' => $account_name,
            'package'       => $package,
            'gender'        => $gender,
            'username'      => $user
        );

        $rest1 = $this->db->insertData($data1, 'order_subscriber');
        $order_id = $rest1;
        $order_type = 'subscriber';

       $sixDigitRandomRef = $this->generateRandomPass(6);

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => 'pending',
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
     }

    }

     public function jasa_view_order(){

        $social_media = $this->request->getPost('social_media');
         // social media probably in array form
        if(isset($social_media)){
            $datasocmed = json_decode($social_media, true);
            $datasocmedString = implode(', ', $datasocmed);
            $social_media = $datasocmedString;
        }

        $url = $this->request->getPost('url');
        $title = $this->request->getPost('title');
        $package = $this->request->getPost('package');
        $gender = $this->request->getPost('gender');
        $user = $this->request->getPost('username');
        $question = $this->request->getPost('question');
        $valid_answer = $this->request->getPost('valid_answer');
        $answer_a = $this->request->getPost('answer_a');
        $answer_b = $this->request->getPost('answer_b');
        $answer_c = $this->request->getPost('answer_c');
        $answer_d = $this->request->getPost('answer_d');

        // we insert 2 things : into table_order_jasa, table_order_view
     
        $data1 = array(
            'title'  => $title,
            'social_media'  => $social_media,
            'url'    => $url,
            'question' => $question,
            'valid_answer' => $valid_answer,
            'answer_a' => $answer_a,
            'answer_b' => $answer_b,
            'answer_c' => $answer_c,
            'answer_d' => $answer_d,
            'package'       => $package,
            'gender'        => $gender,
            'username'      => $user
        );

        $rest1 = $this->db->insertData($data1, 'order_view');
        $order_id = $rest1;
        $order_type = 'view';

        $sixDigitRandomRef = $this->generateRandomPass(6);

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => 'pending',
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
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

    private function updateUserBalance($amount, $user){
       $dataUser = $this->db->selectAllDataByUsername($user, 'users');

        $currentBalance = $dataUser[0]->balance;
        $currentBalance += $amount;

        $user_id = $dataUser[0]->id;

        $data = array(
            'balance' => $currentBalance
        );

        $this->db->updateData($user_id, $data, 'users');
    }

    public function deposit_add()
    {
        $u = $this->request->getPost('username');
        $stat = $this->request->getPost('status');

        if(!isset($stat)){
            $stat = 'pending';
        }

        $a = $this->request->getPost('amount');
        
        $data = array(
            'username'    => $u,
            'status'      => $stat,
            'amount'      => $a
        );

     $rest = $this->db->insertData($data, 'deposits');
     
     if($stat == 'purchased'){
        // insert the balance into user account
        $this->updateUserBalance($a, $u);
     }

     if($rest == 0){
        echo "none";
     }else {
        echo "valid";
     }

    }

    public function jasa_order_delete()
    {

         $id = $this->request->getPost('id');

          $rest = $this->db->deleteData($id, 'order_jasa');
     
         if($rest != 0){
            echo "valid";
         }else{
            echo "none";
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

    public function deposit_delete()
    {

         $id = $this->request->getPost('id');

          $rest = $this->db->deleteData($id, 'deposits');
     
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

    public function deposit_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'deposits');
        
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

<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\DataModel;
use App\Libraries\XLSXReader;

class Works extends BaseController
{
	
	protected $helpers = ['form', 'filesystem', 'directory'];
	
    public $db = null;

    public function __construct(){

        $this->db = new DataModel();
        //echo var_dump($this->db);

    }

    public function testing(){
        return view('popup');
    }

    public function upload_data_virtualvisitors(){

       
        
        $validated = $this->validate([
            'virtualvisitorsfile' => [
                'uploaded[virtualvisitorsfile]',
                'ext_in[virtualvisitorsfile,xls,xlsx]',
                'max_size[virtualvisitorsfile,2024]',
            ],
        ]);


        //echo var_dump( $validated);

        if ($validated) {

            $docs = $this->request->getFile('virtualvisitorsfile');

            // create folder by date
          

             $dname = explode(".", $_FILES['virtualvisitorsfile']['name']);
            $ext = end($dname);

              $folderName = date('ymd');
            $folderPath = WRITEPATH . 'uploads/' . $folderName;
            $newName = date('ymdhis') . '_vvisitors.' . $ext;

            echo 'moved';

             if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

             $docs->move($folderPath, $newName);

             $this->readExtractToDB($folderPath, $newName);   

        }

       
        //echo var_dump($data);
    }


    private function readExtractToDB($folderPath, $newName){

        $theme  = 'default';
        $u      = $this->request->getPost('username');
        $order_id = $this->request->getPost('order_id');    
        $campaign_id = $this->request->getPost('campaign_id');    

        $file = $folderPath .'/'. $newName;
        // echo $file;
        
        $coba = new XLSXReader($file);
        
        $sheets = $coba->getSheetNames();

        // this xlsx didnt have array 0
        $sh1 = $sheets[1];

        $lembar = $coba->getSheet($sh1);

        $data = $lembar->getData();
        

        if($data != false){
            // there is an array
            $index = 0;
            foreach( $data as $key){
                if($index!=0){
                   
                   $n = 0;
                            
                        $dataVisitors = array(
                            'order_id'      => $order_id,
                            'campaign_id'   => $campaign_id,
                            'client_name'   => $key[$n+1],
                            'gender'        => $key[$n+2],
                            'city'          => $key[$n+3],
                            'product_bought'=> $key[$n+4],
                            'product_url'   => $key[$n+5],
                            'username'      => $u,
                            'theme_display' => $theme
                        );

                        //echo var_dump(  $dataVisitors  );
                        if(!is_null($key[$n+1])) 
                        $this->db->insertData($dataVisitors, 'data_virtualvisitors');

                        }
                $index++;
            }
        }
        

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

    public function campaign_data(){

        $u = $this->request->getPost('username');

        $datana = $this->db->selectAllDataByUsername($u, 'campaign_virtualvisitors');

        if($datana != false){
            echo json_encode($datana);
        }else{
            echo "none";
        }

    }


     public function campaign_single_data(){

        $n = $this->request->getPost('name');

        $param = array(
            'name' => $n
        );

        $datana = $this->db->selectSingleLastData($param, 'campaign_virtualvisitors');

        if($datana != false){
            echo json_encode($datana[0]);
        }else{
            echo "none";
        }

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
        $session->set('fullname', $rest[0]->fullname);
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
        $session->set('fullname', $rest[0]->fullname);
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


    public function jasa_upgrade_fituraplikasi_order(){

        $app_base = $this->request->getPost('app_base');
        // app_base probably in array form
        if(isset($app_base)){
            $dataappbase = json_decode($app_base, true);
            $dataappbaseString = implode(', ', $dataappbase);
            $app_base = $dataappbaseString;
        }

        $url = $this->request->getPost('url');
        $title = $this->request->getPost('title');
        $package = $this->request->getPost('package');
        $notes = $this->request->getPost('notes');
        $user = $this->request->getPost('username');

           $data1 = array(
            'app_base'  => $app_base,
            'url'           => $url,
            'title'         => $title,
            'package'       => $package,
            'notes'         => $notes,
            'username'      => $user
        );

         //  echo var_dump($data1);
        $rest1 = $this->db->insertData($data1, 'order_upgrade_fituraplikasi');
        $order_id = $rest1;
        $order_type = 'upgrade_fituraplikasi';

        $sixDigitRandomRef = $this->generateRandomPass(6);

          $data2 = array(
            'order_id'              => $order_id,
            'order_type'            => $order_type,
            'order_client_reff'     => $sixDigitRandomRef,
            'status'                => 'pending',
            'username'              => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
     }

    }


    public function jasa_virtualvisitors_order(){

        $website = $this->request->getPost('website');
        // website probably in array form
        if(isset($website)){
            $dataappbase = json_decode($website, true);
            $dataappbaseString = implode(', ', $dataappbase);
            $website = $dataappbaseString;
        }

        $url = $this->request->getPost('url');
        $business_name = $this->request->getPost('business_name');
        $package = $this->request->getPost('package');
        $gender = $this->request->getPost('gender');
      
        $user = $this->request->getPost('username');

           $data1 = array(
            'website'       => $website,
            'url'           => $url,
            'business_name' => $business_name,
            'package'       => $package,
            'gender'        => $gender,
            'username'      => $user
        );

         //  echo var_dump($data1);
        $rest1 = $this->db->insertData($data1, 'order_virtualvisitors');
        $order_id = $rest1;
        $order_type = 'virtualvisitors';

        $sixDigitRandomRef = $this->generateRandomPass(6);

          $data2 = array(
            'order_id'              => $order_id,
            'order_type'            => $order_type,
            'order_client_reff'     => $sixDigitRandomRef,
            'status'                => 'pending',
            'username'              => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
     }

    }


 public function jasa_pembuatanaplikasi_order(){

        $app_base = $this->request->getPost('app_base');
        // website probably in array form
        if(isset($app_base)){
            $dataappbase = json_decode($app_base, true);
            $dataappbaseString = implode(', ', $dataappbase);
            $app_base = $dataappbaseString;
        }

        $title = $this->request->getPost('title');
        $notes = $this->request->getPost('notes');
        $package = $this->request->getPost('package');
      
        $user = $this->request->getPost('username');

           $data1 = array(
            'app_base'       => $app_base,
            'title'           => $title,
            'package'       => $package,
            'notes'       => $notes,
            'username'      => $user
        );

         //  echo var_dump($data1);
        $rest1 = $this->db->insertData($data1, 'order_pembuatanaplikasi');
        $order_id = $rest1;
        $order_type = 'pembuatanaplikasi';

        $sixDigitRandomRef = $this->generateRandomPass(6);

          $data2 = array(
            'order_id'              => $order_id,
            'order_type'            => $order_type,
            'order_client_reff'     => $sixDigitRandomRef,
            'status'                => 'pending',
            'username'              => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
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

    public function campaign_add(){

        $n = $this->request->getPost('name');
        $u = $this->request->getPost('username');

        $datana = array(
            'name'=> $n,
            'username'=> $u,
            'code'=> strtoupper($this->generateRandomPass(4))
        );

       $rest = $this->db->insertData($datana, 'campaign_virtualvisitors');

         if($rest == 0){
            echo "none";
         }else {
            echo "valid";
         }

    }

	public function app_add()
    {
        $u      = $this->request->getPost('username_owned');
        $u_id   = $this->request->getPost('user_id');
        $a_name = $this->request->getPost('apps_name');
        $d      = $this->request->getPost('descriptions');
        $i      = $this->request->getPost('icon');
        $b_s    = $this->request->getPost('best_screenshot');
        $p_u    = $this->request->getPost('privacy_url');
        
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
         $order_type    = $this->request->getPost('order_type');
         
         $data_jasa = $this->db->selectData($id, 'order_jasa');

        $order_id = 0;

         if($data_jasa != false){
            $order_id = $data_jasa[0]->order_id;
         }

         
         $rest         = $this->db->deleteData($id, 'order_jasa');
     
         if($rest != 0){
            echo "valid";

            $ordername = "order_" . $order_type;
            $rest = $this->db->deleteData($order_id, $ordername);

         }else{
            echo "none";
         }


    }

    public function campaign_delete()
    {

         $n = $this->request->getPost('name');
         $u = $this->request->getPost('username');

         $dataFilter = array(
            'name' => $n,
            'username' => $u
         );

          $rest = $this->db->deleteDataBy($dataFilter, 'campaign_virtualvisitors');
     
         if($rest != 0){
            echo "valid";
         }else{
            echo "none";
         }


    }

    public function virtualvisitors_delete()
    {

         $id = $this->request->getPost('id');

          $rest = $this->db->deleteData($id, 'data_virtualvisitors');
     
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

    public function user_email_check(){

        $e = $this->request->getPost('email');
        $u = $this->request->getPost('username');

        $data = array(
            'username'  => $u,
            'email'     => $e
        );

        $hasil = $this->db->isDuplicate($data, 'users');

        if($hasil != false){
            // duplicate
            echo "error";
        }else {
            // this user can be used to be registered
            echo "valid";
        }

    }

    public function user_add()
    {
        $u = $this->request->getPost('username');
        $p = $this->request->getPost('pass');
        $f = $this->request->getPost('fullname');
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
            'fullname'  => $f,
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

    public function package_add()
    {
        
        $n = $this->request->getPost('name');
        $q = $this->request->getPost('quota');
        $bp = $this->request->getPost('base_price');
        $tp = $this->request->getPost('total_price');
        $ot = $this->request->getPost('order_type');
        
        $data = array(
            'name'          => $n,
            'quota'         => $q,
            'base_price'    => $bp,
            'total_price'   => $tp,
            'order_type'    => $ot
        );

     $rest = $this->db->insertData($data, 'packages');

     
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

    public function package_update(){

        $id = $this->request->getPost('id');
        
        $n = $this->request->getPost('name');
        $q = $this->request->getPost('quota');
        $bp = $this->request->getPost('base_price');
        $tp = $this->request->getPost('total_price');
        $ot = $this->request->getPost('order_type');
        
        $data = array(
            'name'          => $n,
            'quota'         => $q,
            'base_price'    => $bp,
            'total_price'   => $tp,
            'order_type'    => $ot
        );


     $rest = $this->db->updateData($id, $data, 'packages');
     
     if($rest == 0){
        echo "none";
     }else {
        echo "valid";
     }

    }

     public function package_delete()
    {
         $id = $this->request->getPost('id');

          $rest = $this->db->deleteData($id, 'packages');
     
         if($rest != 0){
            echo "valid";
         }else{
            echo "none";
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

    public function virtualvisitors_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'data_virtualvisitors');
        
        if(count($rest)==0){
            // no value
            echo "none";
        }else{
            echo json_encode($rest[0]);
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

    public function package_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'packages');
        
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

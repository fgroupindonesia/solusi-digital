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

    public function generate_js(){

        $code = $this->request->getGet('code');
        $debug = $this->request->getGet('debug');

        $identifier = "#btn_ok";
        $phone = "6285795569337";
        $message = "hello!";

        $jqueryScript = null;
        $jsSmart = null;

        $result = array(
            'status' => 'invalid'
        );

        $filter = array(
            'order_client_reff' => $code
        );

        // check first existance
        $datana = $this->db->selectDataBy($filter, 'order_jasa');

        if(!empty($datana)){

            $filter2 = array(
                'id' => $datana->order_id
            );

            $filter3 = array(
                'order_id' => $datana->order_id
            );

            $data_wa_chat = $this->db->selectDataBy($filter2, 'order_wa_chat_rotator');
            $data_cs = $this->db->selectAllDataBy($filter3, 'cs_wa_chat_rotator');

            $phones_cs = $this->getPhoneNumbersOnly($data_cs);

            $rotator_mode = $data_wa_chat->rotator_mode;
            $message = $data_wa_chat->message;
            $id_mode = $data_wa_chat->identifier_mode;
            $id_tag = $data_wa_chat->identifier_tag;

            // default
            $identifier_chosen = '';

            if(!empty($id_mode)){
                if($id_mode == 'manual'){
                    $identifier_chosen = "[" . $id_tag . "]";
                }else if($id_mode == 'all links'){
                    $identifier_chosen = "a";
                }else if($id_mode == 'all buttons'){
                    $identifier_chosen = "button";
                }else if($id_mode == 'button contains'){
                    $identifier_chosen = "button:contains('" . $id_tag . "')";
                }else if($id_mode == 'link contains'){
                    $identifier_chosen = "a:contains('" . $id_tag . "')";
                }
            }

                $file0 = FCPATH . 'assets/js/sweetalert2@11.js';
                $file1 = FCPATH . 'assets/js/jquery-3.6.0.min.js';
                $file2 = null;


                
            $file2 = FCPATH . 'assets/js/js-smart/wa-chat-rotator-' . $rotator_mode . '.js';
                
                if (file_exists($file1)) {

                $jsweet =       file_get_contents($file0);                  
                $jqueryScript = file_get_contents($file1);
                $jsSmart = file_get_contents($file2);

                if($rotator_mode == 'schedule')
            $jsSmart = $this->generate_js_for_schedule($jsSmart, $code, $datana->order_id, $message, $identifier_chosen);


                if($rotator_mode == 'order')
            $jsSmart = $this->generate_js_for_order($jsSmart, $code, $datana->order_id, $message, $identifier_chosen);

                if($rotator_mode == 'random')
                $jsSmart = $this->generate_js_for_random($jsSmart, $phones_cs, $message, $identifier_chosen);

                if($rotator_mode == 'device'){

                    $cari_iphone = array('client_target_device'=>'iphone', 'order_id' => $datana->order_id);
                    $cari_android = array('client_target_device'=>'android', 'order_id' => $datana->order_id);
                    $cari_laptop = array('client_target_device'=>'laptop', 'order_id' => $datana->order_id);
                    $cari_generic = array('client_target_device'=>'all', 'order_id' => $datana->order_id);

             $cs_iphone = $this->db->selectAllDataBy($cari_iphone, 'cs_wa_chat_rotator');
             $cs_iphone = $this->getPhoneNumbersOnly($cs_iphone);

             $cs_generic = $this->db->selectAllDataBy($cari_generic, 'cs_wa_chat_rotator');
             $cs_generic = $this->getPhoneNumbersOnly($cs_generic);

             $cs_android = $this->db->selectAllDataBy($cari_android, 'cs_wa_chat_rotator');
             $cs_android = $this->getPhoneNumbersOnly($cs_android);

             $cs_laptop = $this->db->selectAllDataBy($cari_laptop, 'cs_wa_chat_rotator');
             $cs_laptop = $this->getPhoneNumbersOnly($cs_laptop);

            $jsSmart = $this->generate_js_for_device($jsSmart, $cs_generic, $cs_iphone, $cs_android, $cs_laptop, $message, $identifier_chosen);

                }

                $result['data'] = $jqueryScript . " " . $jsweet . " " . $jsSmart;

                }
        }


        if($debug == 1){
            print_r($result);
            exit();
        }

       
        return    $this->response
            ->setContentType('application/javascript')
             ->setBody($jqueryScript . " " . $jsweet . " " . $jsSmart);
       

    }

    private function getPhoneNumbersOnly($data_result){

        $data = array();

        foreach($data_result as $k){


           $data[] = $k->cs_number;

        }

        return $data;

    }


    private function generate_js_for_schedule($jsContent, $data_code, $data_order_id, $data_message, $identifier_chosen){

        $data_baru = str_replace('_code_', $data_code, $jsContent);
        $data_baru = str_replace('_orderid_', $data_order_id, $data_baru);
        $data_baru = str_replace('_message_', $data_message, $data_baru);
        $data_baru = str_replace('_identifier_', $identifier_chosen, $data_baru);

        return $data_baru;

    }

    private function generate_js_for_order($jsContent, $data_code, $data_order_id, $data_message, $identifier_chosen){

        $data_baru = str_replace('_code_', $data_code, $jsContent);
        $data_baru = str_replace('_orderid_', $data_order_id, $data_baru);
        $data_baru = str_replace('_message_', $data_message, $data_baru);
        $data_baru = str_replace('_identifier_', $identifier_chosen, $data_baru);

        return $data_baru;

    }

    private function generate_js_for_random($jsContent, $data_phone, $data_message, $identifier_chosen){

        // replace the number as an array
        $json = json_encode($data_phone);
        $data_baru = str_replace('_phone_', $json, $jsContent);
        $data_baru = str_replace('_message_', $data_message, $data_baru);
        $data_baru = str_replace('_max_', sizeof($data_phone), $data_baru);
        $data_baru = str_replace('_identifier_', $identifier_chosen, $data_baru);

        return $data_baru;

    }

    private function generate_js_for_device($jsContent, $data_generic, $data_phone_iphone, $data_phone_android, $data_laptop, $data_message, $identifier_chosen){

        // replace the number as an array
        $json_generic = json_encode($data_generic);
        $json_p_iphone = json_encode($data_phone_iphone);
        $json_p_android = json_encode($data_phone_android);
        $json_laptop = json_encode($data_laptop);

        $data_baru = str_replace('_phoneandroid_', $json_p_android, $jsContent);
        $data_baru = str_replace('_phoneiphone_', $json_p_iphone, $data_baru);
        $data_baru = str_replace('_phonegeneric_', $json_generic, $data_baru);
        $data_baru = str_replace('_phonelaptop_', $json_laptop, $data_baru);

        $data_baru = str_replace('_message_', $data_message, $data_baru);
        
        $data_baru = str_replace('_identifier_', $identifier_chosen, $data_baru);

        return $data_baru;

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

    public function upload_data_themes(){

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
            
             // now we saved as the dir / file name only
             $nama_lengkap = $folderWaktu . '/' . $newName;   
             return $nama_lengkap;
        }

       
        //echo var_dump($data);
        return null;
        
    }

     public function upload_data_layananmanual(){

        $validated = $this->validate([
            'lampiran' => [
                'uploaded[lampiran]',
                'ext_in[lampiran,jpg,jpeg,png,xls,xlsx,doc,docx,pdf,mp3,zip,rar]',
                'max_size[lampiran,2024]',
            ],
        ]);


        //echo var_dump( $validated);

        if ($validated) {

            $docs = $this->request->getFile('lampiran');

            // create folder by date
          

             $dname = explode(".", $_FILES['lampiran']['name']);
            $ext = end($dname);

            $folderWaktu = date('ymd');
              $folderName = 'layananmanual/' . $folderWaktu;
            $folderPath = WRITEPATH . 'uploads/' . $folderName;
            $newName = date('ymdhis') . '_layananmanual.' . $ext;

            //echo 'moved';

             if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

             $docs->move($folderPath, $newName);

            
             return $nama_lengkap = $folderWaktu . '/' . $newName;
        }

       
        //echo var_dump($data);
        return null;
        
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

        $datana = $this->db->selectAllDataBy($param, 'campaign_virtualvisitors');

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


     public function wa_chat_rotator(){

        $package = $this->request->getPost('package');
        $user = $this->request->getPost('username');
       
        
          $data1 = array(
            'package'  => $package,
            'username' => $user
        );

           $rest1 = $this->db->insertData($data1, 'order_wa_chat_rotator');
            $order_id = $rest1;
            $order_type = 'wa_chat_rotator';

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


    public function wa_chat_rotator_script_ready()
    {
        
       $c =  $this->request->getPost('code');

       $end_result = array(
        'status' => 'invalid',
        'message' => null
       );

       // i need a message error if not ready
       $data = $this->db->isWAChatRotatorReady($c, true);

       if(!empty($data)){
            $end_result['status'] = 'valid';
            $end_result['message'] = $data;
       }

       echo json_encode($end_result);

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

    public function layananmanual_delete()
    {
         $id = $this->request->getPost('id');

          $rest = $this->db->deleteData($id, 'layananmanual');
     
         if($rest != 0){
            echo "valid";
         }else{
            echo "none";
         }

    }

     public function layananmanual_add()
    {
        $u = $this->request->getPost('username_owned');
        $ui = $this->request->getPost('user_id');
        $j = $this->request->getPost('jenis_layanan');
        $q = $this->request->getPost('quantity');
        
        $data = array(
            'username_owned'    => $u,
            'user_id'           => $ui,
            'jenis_layanan'     => $j,
            'quantity'     => $q,
            'status' => 'pending'
        );

       
            $nama = $this->upload_data_layananmanual();
            $data['attachment'] = $nama;
      

     $rest = $this->db->insertData($data, 'layananmanual');
     
     if($rest == 0){
        echo "none";
     }else {
        echo "valid";
     }

    }

     public function theme_add()
    {
        $name = $this->request->getPost('name');
        $genre = $this->request->getPost('genre');
        $desc = $this->request->getPost('description');
        
        $file = $this->upload_data_themes();

        $data = array(
            'name'  => $name,
            'genre'  => $genre,
            'description'      => $desc,
            'file_preview'     => $file
        );

     $rest = $this->db->insertData($data, 'themes_landingpage');
     
     if($rest == 0){
        echo "none";
     }else {
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

     public function layananmanual_update(){

            $id = $this->request->getPost('id');
        
            $u = $this->request->getPost('username_owned');
            $ui = $this->request->getPost('user_id');
            $q = $this->request->getPost('quantity');
            $j = $this->request->getPost('jenis_layanan');
            
        $data = array(
            'username_owned'  => $u,
            'user_id'      => $ui,
            'jenis_layanan'     => $j,
            'quantity'       => $q
        );

     $rest = $this->db->updateData($id, $data, 'layananmanual');
     
     if($rest == 0){
        echo "none";
     }else {
        echo "valid";
     }

    }

    
    public function wa_chat_rotator_cs_schedule_edit(){

        $order_id       = $this->request->getPost('order_id');
        $cs_num         = $this->request->getPost('cs_number');

        $filter = array(
            'order_id'  => $order_id,
            'cs_number' => $cs_num
        );

        $datana = $this->db->selectDataBy($filter, 'cs_schedule_wa_chat_rotator');

        $end_result = array(
            'status'    => 'invalid',
            'data'      => null
        );

        if(!empty($datana)){
            $end_result['data'] = $datana;
        }


        echo json_encode($end_result);

    }

    public function wa_chat_rotator_cs_schedule_update(){

        $updated = false;

        $cs_number = $this->request->getPost('cs_number');
        $cs_days_selected = $this->request->getPost('cs_days_selected');
        $cs_day_mode = $this->request->getPost('cs_day_mode');
        $hour_closed = $this->request->getPost('hour_closed');
        $hour_open = $this->request->getPost('hour_open');

        $order_id = $this->request->getPost('order_id');

        $cari1 = array(
            'order_id' => $order_id,
            'cs_number' => $cs_number
        );

        $data_baru = array(
            'day_mode' => $cs_day_mode,
            'days_selected' => json_encode($cs_days_selected),
            'hour_open' => $hour_open,
            'hour_closed' => $hour_closed,
            'cs_number' => $cs_number,
            'order_id' => $order_id
        );

        $found = $this->db->isDuplicate($cari1, 'cs_schedule_wa_chat_rotator');

        if($found){
            //updating
            $this->db->updateDataBy($cari1, $data_baru, 'cs_schedule_wa_chat_rotator');
        }else{
            $this->db->insertData($data_baru, 'cs_schedule_wa_chat_rotator');
        }

        $updated = true;

         if(!$updated){
                echo "none";
             }else {
                echo "valid";
             }

    }

    public function wa_chat_rotator_cs_region_update(){

        $updated = false;


        $o = $this->request->getPost('order_id');
        $cs_no = $this->request->getPost('cs_number');
        $country = $this->request->getPost('country');
        $region = $this->request->getPost('region');
        $city = $this->request->getPost('city');

        $cari = array(
            'order_id' => $o,
            'cs_number' => $cs_no
        );

        $data_baru = array(
            'order_id' => $o,
            'cs_number' => $cs_no,
            'country' => $country,
            'region' => $region,
            'city' => $city
        );


        $ketemu = $this->db->isDuplicate($cari, 'cs_map_wa_chat_rotator');

        if($ketemu){
            // do updates
            $this->db->updateDataBy($cari, $data_baru, 'cs_map_wa_chat_rotator');
            $updated = true;
        }else {
            // do insert
            $this->db->insertData($data_baru, 'cs_map_wa_chat_rotator');
            $updated = true;
        }

         if(!$updated){
                echo "none";
             }else {
                echo "valid";
             }

    }

    public function wa_chat_rotator_update(){

        $updated = false;

            $id = $this->request->getPost('id');
        
            $r = $this->request->getPost('rotator_mode');
            $c = $this->request->getPost('custom_name');
            $it = $this->request->getPost('identifier_tag');
            $im = $this->request->getPost('identifier_mode');
            $m = $this->request->getPost('message');

            $nomor_wa_cs = $this->request->getPost('nomor_wa_cs');
           
            $web_url = $this->request->getPost('web_url');

            $client_target_device = $this->request->getPost('client_target_device');


            if(!empty($nomor_wa_cs)){

                // clear first then re-add
                $orderna = array(
                    'order_id' => $id
                );

                $this->db->deleteDataBy($orderna, 'cs_wa_chat_rotator');

                $urut=0;
                foreach($nomor_wa_cs as $no){

                        $datana = array(
                        'cs_number' => $no,
                        'order_id' => $id,
                        'client_target_device' => $client_target_device[$urut]
                        );

                        if(!empty($no))
                        $this->db->insertData($datana, 'cs_wa_chat_rotator');

                    $updated = true;

                $urut++;

                }

                // now we add record for order mode
                if($r == 'order'){
                   $stat = $this->db->isDuplicate($orderna, 'cs_record_wa_chat_rotator');
                   $data_baru = array(
                        'order_id' => $id,
                        'total_cs_numbers' => sizeof($nomor_wa_cs),
                        'last_index' => 0
                   );

                   if($stat){
                    $this->db->updateDataBy($orderna, $data_baru, 'cs_record_wa_chat_rotator');
                   }else{
                    $this->db->insertData($data_baru, 'cs_record_wa_chat_rotator');
                   }

                }

            }

            if(!empty($web_url)){

                // clear first then re-add
                $orderna = array(
                    'order_id' => $id
                );

                $this->db->deleteDataBy($orderna, 'web_wa_chat_rotator');

                foreach($web_url as $url){
                    $datana = array(
                    'url' => $url,
                    'order_id' => $id
                    );

                    if(!empty($url))
                    $this->db->insertData($datana, 'web_wa_chat_rotator');

                $updated = true;
                }

            }
            
            
        $data = array(
            'rotator_mode'  => $r,
            'custom_name'      => $c,
            'identifier_tag' => $it,
            'identifier_mode' => $im,
            'message' => $m

        );

     $rest = $this->db->updateData($id, $data, 'order_wa_chat_rotator');

     if(!empty($rest)){
        $updated = true;
     }
     
     if(!$updated){
        echo "none";
     }else {
        echo "valid";
     }

    }

    public function wa_chat_rotator_next_schedule_cs(){

         $end_result = array(
            'data' => null,
            'status' => 'invalid'
        );

        $order_id = $this->request->getPost('order_id');
        $code = $this->request->getPost('code');

           // time is 24 hour format ie : 01:30, 23:00
        // day is english based format : sunday, monday, etc...
        $client_time = $this->request->getPost('time');
        $client_day = $this->request->getPost('day');

        $filter1 = array(
            'order_id'      => $order_id,
            'order_time'    => $client_time,
            'order_day'     => $this->change_to_bahasa($client_day)
        );

        $filter0 = array(
            'order_id' => $order_id,
            'order_client_reff' => $code
        );

        $data_ordered = $this->db->selectAllDataBy($filter0, 'order_jasa');

        if(!empty($data_ordered)){
        
                $data_cs = $this->db->getNextScheduleCSNumberBy($filter1);

                if(!empty($data_cs)){
                    $end_result['data'] = $data_cs;
                    $end_result['status'] = 'valid';
                }

        }

        
        echo json_encode($end_result);

    }

    private function change_to_bahasa($english_day) {
    $days = [
        'sunday'    => 'minggu',
        'monday'    => 'senin',
        'tuesday'   => 'selasa',
        'wednesday' => 'rabu',
        'thursday'  => 'kamis',
        'friday'    => 'jumat',
        'saturday'  => 'sabtu'
    ];

    $short_days = [
        'sun' => 'sunday',
        'mon' => 'monday',
        'tue' => 'tuesday',
        'wed' => 'wednesday',
        'thu' => 'thursday',
        'fri' => 'friday',
        'sat' => 'saturday'
    ];

    $english_day = strtolower($english_day); // Ensure lowercase

    // Check if input is a 3-letter day and convert to full name
    if (isset($short_days[$english_day])) {
        $english_day = $short_days[$english_day];
    }

    return $days[$english_day] ?? $english_day; // Return translated day or original if not found
}


    public function wa_chat_rotator_next_cs(){


        $end_result = array(
            'data' => null,
            'status' => 'invalid'
        );

        $order_id = $this->request->getPost('order_id');
        $code = $this->request->getPost('code');

     

        $filter1 = array(
            'order_id' => $order_id
        );

        $filter0 = array(
            'order_id' => $order_id,
            'order_client_reff' => $code
        );

        $data_ordered = $this->db->selectAllDataBy($filter0, 'order_jasa');

        if(!empty($data_ordered)){
        
                $data_cs = $this->db->getNextCSNumberBy($filter1);

                $end_result['data'] = $data_cs;
                $end_result['status'] = 'valid';

        }

        
        echo json_encode($end_result);


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

    public function theme_update(){

            $id = $this->request->getPost('id');
        
        $name = $this->request->getPost('name');
        $genre = $this->request->getPost('genre');
        $desc = $this->request->getPost('description');
        
        $file = $this->upload_data_themes();



        $data = array(
            'name'  => $name,
            'genre'  => $genre,
            'description'      => $desc
        );

        if(!empty($file)){
            $data['file_preview'] = $file;
        }
        
     $rest = $this->db->updateData($id, $data, 'themes_landingpage');

     
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

    public function theme_delete()
    {
         $id = $this->request->getPost('id');

          $rest = $this->db->deleteData($id, 'themes_landingpage');
     
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

     public function wa_chat_rotator_delete()
    {
         $id = $this->request->getPost('id');

          $rest = $this->db->deleteData($id, 'order_wa_chat_rotator');

          // delete any related data
          $id2 = array(
            'order_id' => $id
          );

          $rest2 = $this->db->deleteDataBy($id2, 'order_jasa');
          $rest3 = $this->db->deleteDataBy($id2, 'cs_wa_chat_rotator');
          $rest4 = $this->db->deleteDataBy($id2, 'web_wa_chat_rotator');
     
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

     public function wa_chat_rotator_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'order_wa_chat_rotator');
          $data_result = array();

          if(!empty($rest)){
            
            $filter = array(
                'order_id' => $id
            );

            $rest2 = $this->db->selectAllDataBy($filter, 'cs_wa_chat_rotator');
            $rest3 = $this->db->selectAllDataBy($filter, 'web_wa_chat_rotator');

          // because all is object based 
            // we transform them into associative array
            $rest_array = json_decode(json_encode($rest[0]), true);

            $data_sisipan = array();
          $data_sisipan['data_web'] = $rest3;
          $data_sisipan['data_cs'] = $rest2;

            $data_result =  array_merge($data_sisipan, $rest_array);

          }
        
        if(count($rest)==0){
            // no value
            echo "none";
        }else{
            echo json_encode($data_result);
        }

    }

     public function layananmanual_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'layananmanual');
        
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

     public function theme_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'themes_landingpage');
        
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

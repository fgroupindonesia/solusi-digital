<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\DataModel;
use App\Libraries\XLSXReader;
use App\Libraries\DateHelper;
use App\Libraries\URLShortenerHelper;

class Works extends BaseController
{
	
	protected $helpers = ['form', 'filesystem', 'directory'];
	
    public $db = null;
    public $date_helper = null;

    public function __construct(){

        $this->db = new DataModel();
        //echo var_dump($this->db);
        $this->date_helper = new DateHelper();
        $this->url_shortener = new URLShortenerHelper();

    }

    public function url_shortener(){

        $status = 'invalid';
        $result = array(
            'status' => $status
        );
        $urlna = $this->request->getPost('url');

        $pendek = $this->url_shortener->makeShort($urlna);

        if(!empty($pendek)){
            $status = 'valid';
            $result['url'] = $pendek;
        }

        echo json_encode($result);

    }

    public function generate_php(){

        
        $code = $this->request->getGet('code');
        $debug = $this->request->getGet('debug');
        
        $identifier = "#btn_ok";
        $phone = "6285795569337";
        $message = "hello!";

        $result = "working...";

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

            $message = $data_wa_chat->message;
               
           $cari_generic = array('client_target_device'=>'all', 'order_id' => $datana->order_id);

           $rotator_mode = $data_wa_chat->rotator_mode;

           $phone_cs = '';

            // random works started
           if($rotator_mode == 'random'){

                $cari_cs_semua = array('order_id' => $datana->order_id);
                $cs_all = $this->db->selectAllDataBy($cari_cs_semua, 'cs_wa_chat_rotator');
                $cs_all = $this->getPhoneNumbersOnly($cs_all);

                $data_record = $cs_all;

                if(!empty($cs_all)){
                    $ran_post = rand(0, sizeof($cs_all)-1);
                    $phone_cs = $cs_all[$ran_post];
                }else{
                    // if empty
                    $ran_post = 0;
                    // send to admin
                    $phone_cs = "6285795569337";
                }

                
           } // random works done

             // order works started
           if($rotator_mode == 'order'){

                $cari_cs_semua = array('order_id' => $datana->order_id);
                $cs_all = $this->db->selectAllDataBy($cari_cs_semua, 'cs_wa_chat_rotator');
                $cs_all = $this->getPhoneNumbersOnly($cs_all);

                $data_record = $this->db->selectDataBy($cari_cs_semua, 'cs_record_wa_chat_rotator');
                $idna = $data_record->id;

                $index_terakhir = $data_record->last_index;
                $total_banyak_cs = sizeof($cs_all);

                if($index_terakhir < $total_banyak_cs-1){
                    $index_terakhir++;
                }else{
                    $index_terakhir = 0;
                }

                // update the record
                $up = array(
                    'last_index' => $index_terakhir
                );

                $this->db->updateData($idna, $up, 'cs_record_wa_chat_rotator');

                if(!empty($cs_all)){
                    $phone_cs = $cs_all[$index_terakhir];
                }else{
                    // if empty
                    // send to admin
                    $phone_cs = "6285795569337";
                }

                
           } // order works done

             // schedule works started
           if($rotator_mode == 'schedule'){

                $cari_cs_semua = array('order_id' => $datana->order_id);
                $cs_all = $this->db->selectAllDataBy($cari_cs_semua, 'cs_wa_chat_rotator');
                $cs_all = $this->getPhoneNumbersOnly($cs_all);

                $data_record = $this->db->selectAllDataBy($cari_cs_semua, 'cs_schedule_wa_chat_rotator');

                $ketemu_cocok_day = false;

                foreach($data_record as $dr){
                    $harian = json_decode($dr->days_selected);
                    
                    $hari_ini = $this->date_helper->getDayNameNow();
                    if(!empty($harian)){
                        if(in_array($hari_ini, $harian)){
                            $phone_ketemu = $dr->cs_number;
                            $ketemu_cocok_day = true;
                            break;
                        }
                    }

                }

                if(!empty($cs_all)){
                    if($ketemu_cocok_day)
                    $phone_cs = $phone_ketemu;

                    // jika tidak cocok
                   // maka acak saja
                    if($ketemu_cocok_day==false){
                       

                        $data_record = $this->db->selectDataBy($cari_cs_semua, 'cs_record_wa_chat_rotator');
                        $idna = $data_record->id;

                        $index_terakhir = $data_record->last_index;
                        $total_banyak_cs = sizeof($cs_all);

                        if($index_terakhir < $total_banyak_cs-1){
                            $index_terakhir++;
                        }else{
                            $index_terakhir = 0;
                        }

                        // update the record
                        $up = array(
                            'last_index' => $index_terakhir
                        );

                        $this->db->updateData($idna, $up, 'cs_record_wa_chat_rotator');

                        $phone_cs = $cs_all[$index_terakhir];

                    }
                    

                }else{
                    // if empty
                    // send to admin
                    $phone_cs = "6285795569337";
                }

                
           } // schedule works done

             // origin works started
           if($rotator_mode == 'origin'){

                $cari_cs_semua = array('order_id' => $datana->order_id);
                $cs_all = $this->db->selectAllDataBy($cari_cs_semua, 'cs_wa_chat_rotator');
                $cs_all = $this->getPhoneNumbersOnly($cs_all);

                $data_record = $this->db->selectAllDataBy($cari_cs_semua, 'cs_map_wa_chat_rotator');

                // origin works in client detection
                
           } // origin works done

             // device works started
           if($rotator_mode == 'device'){

                $cari_cs_semua = array('order_id' => $datana->order_id);
                $cs_all = $this->db->selectAllDataBy($cari_cs_semua, 'cs_wa_chat_rotator');
                //$cs_all = $this->getPhoneNumbersOnly($cs_all);

                $data_record = $cs_all;

                // origin works in client detection
                
           } // device works done

           $result = "done";
            
        }


        if($debug == 1){
            print_r($result);
            exit();
        }

        $data = array(
            'data' => $datana->order_id,
            'data_cs' => json_encode($data_record),
            'cs_number' => $phone_cs,
            'message' => $message,
            'rotator_mode' => $rotator_mode,
            'order_id' => $datana->order_id
        );

       
        return   view('php-smart/client_forwarder', $data);
       
    }

    // obtaining the next number based on their device matching
    public function wa_chat_rotator_next_device_cs(){

        $result = array(
            'status' => 'invalid'
        );

        $device      = $this->request->getPost('device');
        $order_id       = $this->request->getPost('order_id');

        $filter = array(
            'order_id' => $order_id
        );

        $data_cs = $this->db->selectAllDataBy($filter, 'cs_wa_chat_rotator');
        $data_record = $this->db->selectDataBy($filter, 'cs_record_wa_chat_rotator');

        if(!empty($data_cs)){
            $last_index = $data_record->last_index;

            $total_cs = sizeof($data_cs);
            $chosen_post = -1;
            $starting = $last_index;
            $total_match_device = 0;

            if($last_index == $total_cs-1){
                $starting = 0;
            }

            for($post = $starting; $post < $total_cs; $post++){
                $device_na = $data_cs[$post]->client_target_device;

                if($device_na=='all' || strcmp($device, $device_na) == 0 ){
                    $total_match_device++;
                    $precious_post = $post;

                    if($last_index != $post){
                        $chosen_post = $post;
                        break;
                    }
                }

            
            }

            // we use it anyway if no other device matched
            if($chosen_post == -1 && $total_match_device == 1){
                $chosen_post = $precious_post;
            }

            // if we found already
            if($chosen_post != -1){
                // we take the phone number
                $result['cs_number'] = $data_cs[$chosen_post]->cs_number;
                $result['status'] = "valid";

                // update the index
                $data_baru = array(
                    'last_index' => $chosen_post
                );

                $this->db->updateDataBy($filter, $data_baru, 'cs_record_wa_chat_rotator');
            }

        }

        //$result['data'] = $chosen_post;
        echo json_encode($result);

    }

     // obtaining the next number based on their origin matching    
    public function wa_chat_rotator_next_origin_cs(){

        $result = array(
            'status' => 'invalid'
        );

        $origin      = $this->request->getPost('origin');
        $order_id       = $this->request->getPost('order_id');

        $filter = array(
            'order_id' => $order_id
        );

        $data_cs = $this->db->selectAllDataBy($filter, 'cs_map_wa_chat_rotator');
        $data_record = $this->db->selectDataBy($filter, 'cs_record_wa_chat_rotator');

        if(!empty($data_cs)){
            $last_index = $data_record->last_index;

             $total_cs = sizeof($data_cs);
            $chosen_post = -1;
            $starting = $last_index;
            $total_same_city = 0;

            if($last_index == $total_cs-1){
                $starting = 0;
            }

             for($post = $starting; $post < $total_cs; $post++){
                $city_na = $data_cs[$post]->city;
                $city_na = strtolower($city_na);

                if($post==0){
                    //break;
                }

                if(strpos($city_na, $origin) !== false){
                    $total_same_city++;
                    $precious_post = $post;

                    if($last_index != $post){
                        $chosen_post = $post;
                        break;
                    }
                }

            }

            // if the same city exist
            // and no other data found // we shall use it anyway
            if($chosen_post == -1 && $total_same_city == 1){
                $chosen_post = $precious_post;
            }


            // if we found already
            if($chosen_post != -1){
                // we take the phone number
                $result['cs_number'] = $data_cs[$chosen_post]->cs_number;
                $result['status'] = "valid";

                // update the index
                $data_baru = array(
                    'last_index' => $chosen_post
                );
                
                $this->db->updateDataBy($filter, $data_baru, 'cs_record_wa_chat_rotator');
            }

        }
        
        //$result['data'] = $total_cs;
        echo json_encode($result);

    }

    // we check is this cs number already called by the record?
    // if so then say valid!
    public function wa_chat_rotator_update_index_check(){

        $index      = $this->request->getPost('index');
        $cs_number  = $this->request->getPost('cs_number');
        $order_id   = $this->request->getPost('order_id');

        $filter = array(
            'order_id' => $order_id
        );

        $data = $this->db->selectDataBy($filter, 'cs_record_wa_chat_rotator');

        $result = "invalid";

        if(!empty($data)){
            $post = $data->last_index;
            $data_cs = $this->db->selectAllDataBy($filter, 'cs_wa_chat_rotator');

            foreach($data_cs as $dc){
                if($dc->cs_number == $cs_number){
                    $result = "valid";
                    break;
                }
            }
        }

        echo $result;

    }

    public function generate_js(){

        $origin = $this->request->getServer('HTTP_ORIGIN');

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
            ->setHeader('Access-Control-Allow-Origin', '*')
    ->setHeader('Access-Control-Allow-Methods', 'GET, OPTIONS')
    ->setHeader('Access-Control-Allow-Headers', 'Content-Type')
             ->setBody($jqueryScript . " " . $jsweet . " " . $jsSmart);
       

    }

// accessing the uploaded image from writeable folder directly
    public function preview_image($folder, $filename)
{

    $path = WRITEPATH . "uploads/themes/{$folder}/{$filename}";

    if (!is_file($path)) {
        $path = FCPATH . 'assets/images/question.png';
    }

    $mime = mime_content_type($path);
    return $this->response->setHeader('Content-Type', $mime)->setBody(file_get_contents($path));
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

        $x = $this->db->isSystemEmailNotificationOn();
        echo var_dump($x);

        //return view('popup');
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

    public function send_email($jenis, $data_passed){

        //echo "AAA";
        //$jenis = $this->request->getPost('type');
        //   $id = $this->request->getPost('id');

        //echo $id;

        if($jenis == 'order'){
            // object is passed
            $id = $data_passed->user_id;
            $data = $data_passed->ordered_data;

            $stat = $this->send_order($id, $data);
        }else if($jenis == 'activation'){
            $id = $data_passed;
            $this->send_activation($id);
        }else if($jenis == 'registration'){
            $id = $data_passed;
            $stat = $this->send_registration($id);
        }else{
            $stat = "invalid";
        }

        return $stat;

    }


   public function send_order($id_user, $data_package){
     
        $dataNa = $this->db->selectData($id_user, 'users');
        $status = "invalid";

        // when we found it
        if(!empty($dataNa)){

        $url = "https://solusi-digital.fgroupindonesia.com/portal";
        $fullname   = $dataNa->fullname;
        $email      = $dataNa->email;

        $year = date('Y');

        $render_data = array(
                'company' => 'FGroupIndonesia',
                'year' => $year,
                'fullname' => $fullname,
                'login_url' => $url,
                'ordered_date' => $data_package->date_created,
                'total_price' => $data_package->total_price,
                'order_type' => $data_package->order_type,
                'quantity' => 1,
                'package' => $data_package->name

        ); 

        $render_data2 = array(
                'company' => 'FGroupIndonesia',
                'year' => $year,
                'fullname' => $fullname,
                'login_url' => $url,
                'ordered_date' => $data_package->date_created,
                'total_price' => $data_package->total_price,
                'order_type' => $data_package->order_type,
                'quantity' => 1,
                'package' => $data_package->name

        ); 

        $from = "support@fgroupindonesia.com";
        $sender = "Support Team";
        $subject = "✔️ Solusi Digital : Order Jasa Success! ";
        $subject2 = "✔️ Solusi Digital : Permintaan Order Jasa! ";

        $html = view('email/order_jasa_success', $render_data, ['debug' => false]);
        $html2 = view('email/admin_notif_user_order', $render_data2, ['debug' => false]);

        try {
           // echo $html;
            $this->send_email_now($email, $from, $sender, $subject, $html);

            // this is for admin purposes
            if($this->db->isSystemEmailNotificationOn()){
                $cari = array(
                    'role' => 'admin'
                );

                $data_admin = $this->db->selectAllDataBy($cari, 'users');

                if(!empty($data_admin)){
                    foreach($data_admin as $dm){
                    $email2 = $dm->email;

                    if(!empty($email2))
                    $this->send_email_now($email2, $from, $sender, $subject2, $html2);
                    
                    }
                }
            }

            $status = 'valid';
        } catch(E){
            $status = 'error';
        }
        


        }else{

            $status = "none";

        }

        return $status;    

    }

  public function send_activation($idNa){
       $dataNa = $this->db->selectData($idNa, 'users');

        // when we found it
        if(!empty($dataNa)){

        $username   = $dataNa->username;
        $email      = $dataNa->email;
        $pass       = $dataNa->pass;

        $passedData = 'type=activation&email=' . $email . "&username=" . $username . "&pass=" . 
        urlencode($pass);

        $urlEmailSender = 'https://demo.fgroupindonesia.com/email/sending.php?' . ($passedData);
            //echo $urlEmailSender . "<br>";

            // call the email sending
            $this->callURL($urlEmailSender);

            //echo "valid";

        }else{

            //echo "none";

        }
 }

    public function send_registration($idNa){
     
        $dataNa = $this->db->selectData($idNa, 'users');
        $status = "invalid";

        // when we found it
        if(!empty($dataNa)){

        $url = "https://solusi-digital.fgroupindonesia.com/portal";
        $fullname   = $dataNa->fullname;
        $email      = $dataNa->email;
        $pass       = $dataNa->pass;
        $role       = $dataNa->role;
        $username      = $dataNa->username;
        $year = date('Y');

        $render_data = array(
                'company' => 'FGroupIndonesia',
                'year' => $year,
                'pass' => $pass,
                'username' => $username,
                'fullname' => $fullname,
                'login_url' => $url
            ); 

        $render_data2 = array(
                'company' => 'FGroupIndonesia',
                'year' => $year,
                'role' => $role,
                'username' => $username,
                'login_url' => $url
            ); 

        $from = "support@fgroupindonesia.com";
        $sender = "Support Team";
        $subject = "✔️ Solusi Digital : Registrasi Berhasil! ";
        $html = view('email/registration_success', $render_data, ['debug' => false]);


        $email_admin = "fgroupindonesia@gmail.com";
        $subject2 = "✔️ Solusi Digital : Registrasi User Baru Berhasil!";
        $html2 = view('email/admin_notif_user_registration', $render_data2, ['debug' => false]);

        try {
            $this->send_email_now($email, $from, $sender, $subject, $html);

            // send another one for admin
            $this->send_email_now($email_admin, $from, $sender, $subject2, $html2);
            
            $status = 'valid';
        } catch(E){
            $status = 'error';
        }
        


        }else{

            $status = "none";

        }

        return $status;    

    }

    private function send_email_now($to, $from, $sender, $subject, $html){
$email = service('email');

        $config = array();
$config['protocol'] = 'smtp';
$config['mailType'] = 'html';
$config['SMTPHost'] = 'mail.fgroupindonesia.com';
$config['SMTPUser'] = 'support@fgroupindonesia.com';
$config['SMTPPass'] = 'weAreAlways100_success';
$config['SMTPCrypto'] = 'ssl';
$config['SMTPPort'] = 465;

$email->initialize($config);

//$email->set_newline("\r\n");

$email->setFrom($from, $sender);
$email->setTo($to);
$email->setSubject($subject);
$email->setMessage($html);

$email->send();


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
            'data' => $datana
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

        $order_id = $id;
        $this->process_purchased_order($order_id);

     if($res>0)
      echo "valid";

    if($res<=0)
        echo "none";


    }

    public function process_purchased_order($id){
        $data_order = $this->db->selectData($id, 'order_jasa');

        $data_package = null;

        if(!empty($data_order)){
             $order_id      = $data_order->order_id;
             $order_type    = $data_order->order_type;
             $user    = $data_order->username;
            
            $data_package = $this->db->getPackageByOrder($order_id, $order_type);

            $price = $data_package->total_price;

            $data_terbeli = array(
                'order_type' => $order_type,
                'total_price' => $price,
                'username' => $user
            );

            $this->db->insertData($data_terbeli, 'purchased_order');
            $this->db->decreasedBalance($user, $price);

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
     
     // if admin usage
        $en = $this->request->getPost('email_notif');
        $am = $this->request->getPost('approval_mode');

        if(!empty($en) && !empty($am)){

            $datana_admin = array(
                'email_activity_notification' => $en,
                'approval_mode' => $am
            );

            $this->db->updateData(1, $datana_admin, 'system_works');
        }

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
        $e = $this->request->getPost('email');
        $u = null;
        $valid_email = false;

        if (str_contains($e, '@')) {
            $data_user = explode('@', $e);
            $u = $data_user[0];
            $valid_email = true;
        } else {
            // this is username
            $u = $e;
        }

        $p = $this->request->getPost('password');

        if($valid_email){

            $data = array(
                'email'=>$e,
                'pass'=>$p
            );

        }else {

            $data = array(
                'username'=>$u,
                'pass'=>$p
            );

        }

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
       
        $status = 'pending';
        $resut = "invalid";

          $data1 = array(
            'package'  => $package,
            'username' => $user
        );

           $rest1 = $this->db->insertData($data1, 'order_wa_chat_rotator');
            $order_id = $rest1;
            $order_type = 'wa_chat_rotator';

            

        $sixDigitRandomRef = $this->generateRandomPass(6);

        if($package == 'gratis'){
            $status = 'approved';
        }

        // for system easiness
        if($this->db->isSystemApprovalAutomatic()){
            $status = 'approved';
        }

          $data2 = array(
            'order_id'              => $order_id,
            'order_type'            => $order_type,
            'order_client_reff'     => $sixDigitRandomRef,
            'status'                => $status,
            'username'              => $user
        );



       $rest2 = $this->db->insertData($data2, 'order_jasa');

       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $this->process_purchased_order($order_id);
        }
     
     if($rest1 == 0){
        $resut = "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        $this->process_order_email_notification($package, $order_type, $user);
     }

     echo $resut;

    }

    public function process_order_email_notification($package, $order_type, $user)
    {
         $filter = array(
                'name' => $package,
                'order_type' => $order_type
            );

            $filter1 = array(
                'username' => $user
            );

            $rest_temp = $this->db->selectDataBy($filter, 'packages');
            $data_user_temp = $this->db->selectDataBy($filter1, 'users');
            
            $rest_data = array();
            $rest_data['user_id'] = $data_user_temp->id;
            $rest_data['ordered_data'] = $rest_temp;

            // convert to object
            $obj_data = (object) $rest_data;

            // this is object based
            $resut = $this->send_email('order', $obj_data);
    }

    public function jasa_upgrade_fituraplikasi_order(){

        $app_base = $this->request->getPost('app_base');
        // app_base probably in array form
        if(isset($app_base)){
            $dataappbase = json_decode($app_base, true);
            $dataappbaseString = implode(', ', $dataappbase);
            $app_base = $dataappbaseString;
        }

        $status = 'pending';
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

         // for system works
        if($this->db->isSystemApprovalAutomatic()){
            $status = 'approved';
        }

          $data2 = array(
            'order_id'              => $order_id,
            'order_type'            => $order_type,
            'order_client_reff'     => $sixDigitRandomRef,
            'status'                => $status,
            'username'              => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');

       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $this->process_purchased_order($order_id);
        }
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
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

        $status = 'pending';
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

        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
         $status = 'approved';
        }

          $data2 = array(
            'order_id'              => $order_id,
            'order_type'            => $order_type,
            'order_client_reff'     => $sixDigitRandomRef,
            'status'                => $status,
            'username'              => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $this->process_purchased_order($order_id);
        }

     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
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

        $status = 'pending';
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

        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
           $status = 'approved';
        }

          $data2 = array(
            'order_id'              => $order_id,
            'order_type'            => $order_type,
            'order_client_reff'     => $sixDigitRandomRef,
            'status'                => $status,
            'username'              => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');

       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $this->process_purchased_order($order_id);
        }
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
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

        $status = 'pending';
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

        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $status = 'approved';
        }

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => $status,
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');

       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $this->process_purchased_order($order_id);
        }
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
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

        $status = 'pending';
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

          // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $status = 'approved';
        }

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => $status,
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $this->process_purchased_order($order_id);
        }

     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
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

        $status = 'pending';
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

         // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
         $status = 'approved';
        }

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => $status,
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $this->process_purchased_order($order_id);
        }

     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
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

        $status = 'pending';
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

       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
         $status = 'approved';
        }

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => $status,
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');

        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $this->process_purchased_order($order_id);
        }
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
     }

    }


    public function wa_chat_rotator_script_gratis()
    {
        
       $u =  $this->request->getPost('username');

       $end_result = array(
        'status' => 'invalid',
        'message' => null
       );

       $filter = array(
        'package' => 'gratis',
        'username' => $u
       );

       // i need a message error if not exist
       $data = $this->db->isWAChatRotatorExist($filter);

       if(!empty($data)){
            $end_result['status'] = 'valid';
            $end_result['message'] = $data;
       }

       echo json_encode($end_result);

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

        $status = 'pending';
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

        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
         $status = 'approved';
        }

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => $status,
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');

        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $this->process_purchased_order($order_id);
        }
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
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

        $status = 'pending';
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

         // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $status = 'approved';
        }

          $data2 = array(
            'order_id'    => $order_id,
            'order_type'     => $order_type,
            'order_client_reff'      => $sixDigitRandomRef,
            'status'         => $status,
            'username'       => $user
        );

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $this->process_purchased_order($order_id);
        }

     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
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

         if(!empty($data_jasa)){
            $order_id = $data_jasa->order_id;
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
        
        if(empty($rest)){
            // no value
            echo "none";
        }else{
            echo json_encode($rest);
        }
    }

    public function deposit_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'deposits');
        
        if(empty($rest)){
            // no value
            echo "none";
        }else{
            echo json_encode($rest);
        }
    }

    public function user_email_check(){

        $e = $this->request->getPost('email');
        $u = $this->request->getPost('username');

        $data = array(
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

        // we need to ensure the username is not same with the existing
        // from the db
        $u = $this->db->getDifferentUsername($u);


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
        
        $end_result = "invalid";

        //$p = $this->generateRandomPass(7);
        $p = $this->request->getPost('pass');
        $e = $this->request->getPost('email');
        $f = $this->request->getPost('fullname');
        $u = $this->getFromEmail($e);

        $s = $this->request->getPost('sex');
        $o = 'none';
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
            'fullname'  => $f,
            'whatsapp'  => $wa
        );

     $rest = $this->db->insertData($data, 'users');

     
     if($rest == 0){
        $end_result = "none";
     }else {
        
        $idUser = $rest;

         $end_result = $this->send_email('registration', $idUser);
        //return view('wa_call');
     }

     echo $end_result;


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

            if(empty($client_target_device)){
                // set default for all devices
                $client_target_def = "all";
            }

            if(!empty($nomor_wa_cs)){

                // clear first then re-add
                $orderna = array(
                    'order_id' => $id
                );

                $this->db->deleteDataBy($orderna, 'cs_wa_chat_rotator');

                $urut=0;
                foreach($nomor_wa_cs as $no){

                    if(!empty($client_target_device))
                        $client_target_def = $client_target_device[$urut];

                        $datana = array(
                        'cs_number' => $no,
                        'order_id' => $id,
                        'client_target_device' => $client_target_def
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
        
        if(empty($rest)){
            // no value
            echo "none";
        }else{
            echo json_encode($rest);
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
            $rest_array = json_decode(json_encode($rest), true);

            $data_sisipan = array();
          $data_sisipan['data_web'] = $rest3;
          $data_sisipan['data_cs'] = $rest2;

            $data_result =  array_merge($data_sisipan, $rest_array);

          }
        
        if(empty($rest)){
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
        
        if(empty($rest)){
            // no value
            echo "none";
        }else{
            echo json_encode($rest);
        }

    }

     public function user_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'users');
        
        if(empty($rest)){
            // no value
            echo "none";
        }else{
            echo json_encode($rest);
        }

    }

     public function theme_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'themes_landingpage');
        
        if(empty($rest)){
            // no value
            echo "none";
        }else{
            echo json_encode($rest);
        }

    }

    public function package_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

          $rest = $this->db->selectData($id, 'packages');
        
        if(empty($rest)){
            // no value
            echo "none";
        }else{
            echo json_encode($rest);
        }

    }

    public function logout(){
    	$session = session();
        $session->remove('role');
        $session->remove('username');
      return redirect()->route('portal');

    }

}

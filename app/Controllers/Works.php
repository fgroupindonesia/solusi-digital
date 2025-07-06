<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\DataModel;
use App\Libraries\XLSXReader;
use App\Libraries\DateHelper;
use App\Libraries\URLShortenerHelper;
use App\Libraries\PDFGenerator;


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

    public function load_lp_vvvweb(){

        return view('demo/landing_page');

    }

    public function virtualvisitors_data_delete(){


        $order_id = $this->request->getPost('order_id');

         $result = [
            'status' => 'invalid',
            'message' => 'Terjadi kesalahan tidak terduga.'
        ];

        $filter = array(
            'order_id'=>$order_id
        );

        $h = $this->db->deleteDataBy($filter, 'data_virtualvisitors');

        if(!empty($h)){
            $result['status'] = 'success';
            $result['message'] = 'Berhasil Di Clear!';
        }

        echo json_encode($result);

    }

    public function virtualvisitors_message_update(){

        $id = $this->request->getPost('id');
        $m = $this->request->getPost('message');

        $result = array(
            'status' => 'invalid',
            'message' => 'Data Tidak Ditemukan!'
        );

        $datana = array(
            'message'=> $m
        );

        $hasil = $this->db->updateData($id, $datana, 'order_virtualvisitors');

        if(!empty($hasil)){
            $result['status'] = 'success';
            $result['message'] = 'Data Berhasil Terupdate!';
        }

        echo json_encode($result);

    }

  public function virtualvisitors_data_update()
    {
        // Mengambil data dari POST request
        $client_names_raw = $this->request->getPost('nama_client');
        $product_names_raw = $this->request->getPost('nama_produk');
        $product_links_raw = $this->request->getPost('link_produk');
        $username = $this->request->getPost('username'); // Ditambahkan
        $order_id = $this->request->getPost('order_id'); // Ditambahkan

        $result = [
            'status' => 'invalid',
            'message' => 'Terjadi kesalahan tidak terduga.'
        ];



        // Memecah string menjadi array berdasarkan baris baru (ENTER)
        $client_names = preg_split('/\r\n|\r|\n/', $client_names_raw, -1, PREG_SPLIT_NO_EMPTY);
        $product_names = preg_split('/\r\n|\r|\n/', $product_names_raw, -1, PREG_SPLIT_NO_EMPTY);
        $product_links = preg_split('/\r\n|\r|\n/', $product_links_raw, -1, PREG_SPLIT_NO_EMPTY);

        // Membersihkan setiap baris dari spasi di awal/akhir
        $client_names = array_map('trim', $client_names);
        $product_names = array_map('trim', $product_names);
        $product_links = array_map('trim', $product_links);

        // Filter kembali untuk memastikan tidak ada baris kosong setelah trim (jika ada baris hanya spasi)
        // Ini sudah dilakukan oleh PREG_SPLIT_NO_EMPTY jika baris hanya berisi whitespace.
        // Array_filter tanpa callback akan menghapus elemen yang 'empty()' (false, null, '', 0, '0', [])
        $client_names = array_filter($client_names);
        $product_names = array_filter($product_names);
        $product_links = array_filter($product_links);

        // --- DEBUG POINT 1: Cek isi array sebelum loop ---
        // echo json_encode([
        //     'debug_client_names' => $client_names,
        //     'debug_product_names' => $product_names,
        //     'debug_product_links' => $product_links,
        //     'debug_username' => $username,
        //     'debug_order_id' => $order_id
        // ]);
        // return; // Hentikan eksekusi di sini untuk melihat output debug

        // Pastikan setidaknya ada data client untuk diproses
        if (empty($client_names)) {
            $result['message'] = 'Daftar Nama Client tidak boleh kosong!';
            echo json_encode($result);
            return;
        }
        // Tambahkan validasi untuk produk juga, agar tidak ada loop yang kosong
        if (empty($product_names)) {
            $result['message'] = 'Daftar Nama Produk tidak boleh kosong!';
            echo json_encode($result);
            return;
        }


        // mau clear up dulu data yg ada di db jika ada
        $filter = array(
            'order_id'=> $order_id
        );
        $this->db->deleteDataBy($filter, 'data_virtualvisitors');

        $insert_count = 0;
        // success_flag ini yang salah penempatannya dan tidak pernah diubah
        // Hapus saja atau pastikan diubah di dalam loop
        // $success_flag = false; // TIDAK DIBUTUHKAN LAGI JIKA KITA PAKAI $insert_count > 0

        // Iterasi untuk setiap nama client
        foreach ($client_names as $client_name) {
            // Iterasi untuk setiap nama produk dan mendapatkan indeksnya
            foreach ($product_names as $product_name_index => $product_name) {
                // Ambil link produk yang sesuai berdasarkan indeks.
                // Jika tidak ada link yang cocok, gunakan '#'
                $product_url = isset($product_links[$product_name_index]) ? $product_links[$product_name_index] : '#';

                $dataToInsert = [
                    'client_name'    => $client_name,
                    'product_bought' => $product_name,
                    'product_url'    => $product_url,
                    'username'       => $username, // Tambahkan ini
                    'order_id'       => $order_id   // Tambahkan ini
                ];

                // --- DEBUG POINT 2: Cek data yang akan di-insert ---
                // error_log("Attempting to insert: " . json_encode($dataToInsert));

                // Lakukan insert data ke database
                // ASUMSI: $this->db->insertData() mengembalikan boolean (true on success, false on failure)
                $insert_success = $this->db->insertData($dataToInsert, 'data_virtualvisitors');

                if ($insert_success) {
                    $insert_count++;
                } else {
                    // Log error jika insert gagal untuk debugging
                    error_log("Gagal insert data untuk client: '{$client_name}', produk: '{$product_name}', link: '{$product_url}' (Database error)");
                }
            }
        }

        // Cek $insert_count untuk menentukan status
        if ($insert_count > 0) {
            $result['status'] = 'success';
            $result['message'] = 'Berhasil menyimpan ' . $insert_count . ' data.';
        } else {
            $result['status'] = 'error';
            $result['message'] = 'Gagal menyimpan data apapun. Pastikan koneksi database dan query insert benar. Periksa log server.';
        }

        echo json_encode($result);
    }

    public function wa_chat_rotator_analysis_data(){

        $username = $this->request->getPost('username');
        $group_id = $this->request->getPost('id');
        $jenis = $this->request->getPost('jenis');

               $result = array(
                    'status' => 'invalid',
                    'message' => 'Tidak ada data!'
                );

        // kebutuhan kerja GROUP RINGKAS
        if($jenis == 'group-ringkas'){

                $data_wa_chat_rotator = $this->db->getWAChatRotatorAnalysisGroupDataByUsername($username);

                if(!empty($data_wa_chat_rotator)){
                    $result['status']   = 'success';
                    $result['message']  = 'Data Analysis Siap!';
                    $result['data']   = $data_wa_chat_rotator;
                }

        }

        // kebutuhan kerja DISTRIBUSI CS
        if($jenis == 'distribusi-cs'){

                $data_wa_chat_rotator = $this->db->getWAChatRotatorAnalysisDistribusiDataByGroupId($group_id);


                if(!empty($data_wa_chat_rotator)){
                    $result['status']   = 'success';
                    $result['message']  = 'Data Analysis Siap!';
                    $result['data']   = $data_wa_chat_rotator;
                }

        }



        echo json_encode($result);

    }



    public function affiliate_shop_profile_banner_delete(){

        // delete image banner nya
        $num    = $this->request->getPost('banner');
        $id     = $this->request->getPost('id');
        $nama_file     = $this->request->getPost('nama_file');

        // 1 2 or 3?
        $data = array(
            'shop_banner_url_' . $num => null
        );

        $hasil = $this->db->updateData($id, $data, 'affiliate_shop_profile');

        $result = array(
            'status' => 'invalid',
            'message' => 'ada yang error'
        );

        if(!empty($hasil)){
            $result['status'] = 'success';
            $result['message'] = 'Berhasil Terupdate!';

            // delete filenya dari folder uploads\affiliateshops
            $file_path = FCPATH . 'uploads/affiliateshops/' . ($nama_file);

            if (file_exists($file_path)) {
                    unlink($file_path);
            }

        }

        echo json_encode($result);

    }

    private function affiliate_shop_banner_upload($name){

         // upload gbrnya
         $fileUrl = null;
     
        // Validasi file upload
        $validated = $this->validate([
            $name => [
                'uploaded['.$name .']',
                'ext_in['.$name.',jpg,jpeg,png,gif]',
                'max_size['.$name.',2048]', // max 2mb
            ],
        ]);

        if ($validated) {
            $file = $this->request->getFile($name);

            $originalName = $_FILES[$name]['name'];
            $ext = pathinfo($originalName, PATHINFO_EXTENSION);

         
            $folderPath  = WRITEPATH . 'uploads/';

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            // Rename file dengan format waktu unik
            $newName = date('ymdhis') . '_' . uniqid() . '.' . $ext;

            // Pindahkan file ke folder writable
            $file->move($folderPath, $newName);

            // Buat file bisa diakses publik via URL
            $publicPath = FCPATH . 'uploads/affiliateshops';
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }

            copy($folderPath . '/' . $newName, $publicPath . '/' . $newName);

            $tempPath = WRITEPATH . 'uploads/' . $newName;

             if (file_exists($tempPath)) {
                unlink($tempPath);
            }

            // Set URL untuk disimpan
            $fileUrl = 'uploads/affiliateshops/' . $newName;
       
         }

         return $fileUrl;

    }

    public function affiliate_shop_profile_update(){

        // we got the id then it is updating
        // if we dont have the id then it is inserting
          $id    = $this->request->getPost('id');
          $title = $this->request->getPost('shop_title');
         
          $u_id = $this->request->getPost('user_id');

           $data = array(
                'user_id' => $u_id,
                'shop_title' => $title
             );

         if ($this->request->getFile('shop_banner_file_1')->isValid() && !$this->request->getFile('shop_banner_file_1')->hasMoved()) {
            $url1 = $this->affiliate_shop_banner_upload('shop_banner_file_1');
            $data['shop_banner_url_1'] = $url1;
        }

        if ($this->request->getFile('shop_banner_file_2')->isValid() && !$this->request->getFile('shop_banner_file_2')->hasMoved()) {
            $url2 = $this->affiliate_shop_banner_upload('shop_banner_file_2');
            $data['shop_banner_url_2'] = $url2;
        }

        if ($this->request->getFile('shop_banner_file_3')->isValid() && !$this->request->getFile('shop_banner_file_3')->hasMoved()) {
            $url3 = $this->affiliate_shop_banner_upload('shop_banner_file_3');
            $data['shop_banner_url_3'] = $url3;
        }

          if(!empty($id)){
                $this->db->updateData($id, $data, 'affiliate_shop_profile');
          } else {
                // generate 7 digit code
                $data['affiliate_reff_code'] = $this->generateRandomPass(7);
                $this->db->insertData($data, 'affiliate_shop_profile');
          } 

           $result = array(
                'status' => 'success',
                'message' => 'Berhasil disimpan!',
            );

           echo json_encode($result);

    }

    public function affiliate_product_category_add()
    {
            
             $name    = $this->request->getPost('category_name');

             // ubah nama ke huruf kecil smua,
             // dan spasi jadi strip -
             // simbol lain buang jadinya hanya : abcd-asdbasd gitu aja
             $slug = strtolower($name);                  // huruf kecil semua
            $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);  // hapus simbol asing
            $slug = preg_replace('/[\s\-]+/', '-', $slug);      // ganti spasi/lebih dari 1 strip jadi 1 strip
            $slug = trim($slug, '-'); 

             $data = array(
                'name' => $name,
                'slug' => $slug
             );

             $this->db->insertData($data, 'affiliate_product_categories');

           $result = array(
                'status' => 'success',
                'message' => 'Berhasil disimpan!',
            );

           echo json_encode($result);

    }

     public function affiliate_product_edit()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

       
          $rest = $this->db->selectDataAffiliateProductByID($id);
        
        if(empty($rest)){
            $result = array(
                'status' => 'error',
                'message' => 'Data Tidak ada!',
            );
        }else{
            $result = array(
                'status' => 'success',
                'message' => 'Ada Data!',
                'data' => $rest
            );
        }


        echo json_encode($result);

    }

     public function affiliate_product_delete()
    {
        $id = $this->request->getPost('id');
        //$id = 5;

        $cari = array('id'=>$id);

          $rest = $this->db->deleteDataBy($cari, 'affiliate_products');
        
        if(empty($rest)){
            $result = array(
                'status' => 'error',
                'message' => 'Data Tidak ada!',
            );
        }else{
            $result = array(
                'status' => 'success',
                'message' => 'Berhasil!'
            );
        }


        echo json_encode($result);

    }

    public function affiliate_product_images_data(){

        $id = $this->request->getPost('product_id');

        $filter = array(
            'product_id' => $id
        );

        $hasil = $this->db->selectAllDataBy($filter, 'affiliate_product_images');

        $result = array(
            'status' => 'error',
            'message' => 'invalid!'
        );

        if(!empty($hasil)){
            $result['status'] = 'success';
            $result['message'] = 'Ada ' . sizeof($hasil) . ' data!';
            $result['data'] = $hasil;

        }

        echo json_encode($result);

    }

    public function affiliate_activate(){

        $username = $this->request->getPost('username');

        $cari = array(
            'username' => $username
        );

        $datana = array(
            'is_affiliator' => 1
        );

        $hasil = $this->db->updateDataBy($cari, $datana, 'users');

        $result = array(
            'status' => 'invalid',
            'message' => 'Data Tidak nyambung!'
        );


        if(!empty($hasil)){
            $result['status'] = "success";
            $result['message'] = "Data Berhasil diaktifkan!";
        }

        echo json_encode($result);


    }

    public function affiliate_product_images_delete(){

         $imageId      = $this->request->getPost('image_id');

         $cari = array(
            'id' => $imageId
            );

          $hasil = $this->db->deleteDataBy($cari, 'affiliate_product_images');

        $result = array(
            'status'    => 'error',
            'message'   => ''
        );

        if(!empty($hasil)){
            $result['status'] = 'success';
            $result['message'] = 'terhapus!';
        }

        echo json_encode($result);

    }

     public function affiliate_product_image_add()
    {

        $productId      = $this->request->getPost('product_id');
        $title      = $this->request->getPost('image_title');
        $desc      = $this->request->getPost('image_description');
        $thumb      = $this->request->getPost('is_thumbnail');

        // upload gbrnya
         $fileUrl = null;
     
        // Validasi file upload
        $validated = $this->validate([
            'image_file' => [
                'uploaded[image_file]',
                'ext_in[image_file,jpg,jpeg,png,gif]',
                'max_size[image_file,2048]', // max 2mb
            ],
        ]);

        if ($validated) {
            $file = $this->request->getFile('image_file');

            $originalName = $_FILES['image_file']['name'];
            $ext = pathinfo($originalName, PATHINFO_EXTENSION);

         
            $folderPath  = WRITEPATH . 'uploads/';

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            // Rename file dengan format waktu unik
            $newName = date('ymdhis') . '.'. $ext;

            // Pindahkan file ke folder writable
            $file->move($folderPath, $newName);

            // Buat file bisa diakses publik via URL
            $publicPath = FCPATH . 'uploads/affiliateproducts';
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }

            copy($folderPath . '/' . $newName, $publicPath . '/' . $newName);

            $tempPath = WRITEPATH . 'uploads/' . $newName;

             if (file_exists($tempPath)) {
                unlink($tempPath);
            }

            // Set URL untuk disimpan
            $fileUrl = base_url('uploads/affiliateproducts/' . $newName);
       
         }

         if($thumb==1){
            // when this image is used as thumbnails
            // so tohers should be none
            $cari = array(
                'product_id' => $productId
            );

            $datana = array(
                'is_thumbnail' => 0
            );
            
            $this->db->updateDataBy($cari, $datana, 'affiliate_product_images');
        }

        $data = array(
            'product_id' => $productId,
            'image_url' => $fileUrl,
            'image_title' => $title,
            'image_description' => $desc,
            'is_thumbnail' => $thumb
        );

        $hasil = $this->db->insertData($data, 'affiliate_product_images');


        
        $result = array(
            'status'    => 'error',
            'message'   => ''
        );

        if(!empty($hasil)){
            $result['status'] = 'success';
            $result['message'] = 'tersimpan!';
        }

        echo json_encode($result);

    }

   public function affiliate_product_add()
    {
        
        // Ambil data dari POST
        $productId      = $this->request->getPost('id');
        $productName    = $this->request->getPost('name');
        $category       = $this->request->getPost('category');
        $description    = $this->request->getPost('description');
        $basePrice      = $this->request->getPost('base_price');
        $status         = $this->request->getPost('status');
        $adminCommission = $this->request->getPost('admin_commission'); // Hanya ada jika role admin

        $cari = array(
            'name' => $category
        );

        $data_category = $this->db->selectDataBy($cari, 'affiliate_product_categories');

        $cat_id = -1;

        if(!empty($data_category)){
            $cat_id = $data_category->id;
        }

        // Validasi data (sangat penting!)
        $rules = [
            'name'       => 'required|min_length[3]|max_length[255]',
            'category'   => 'required',
            'description'=> 'permit_empty|max_length[1000]',
            'base_price' => 'required|numeric|greater_than[0]',
            'status'     => 'required|in_list[active,inactive]',
            'admin_commission' => 'permit_empty|numeric|greater_than_equal_to[0]|less_than_equal_to[100]'
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembalikan error
            $result = array(
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $this->validator->getErrors()
            );

        }

        // Siapkan data untuk disimpan
        $data = [
            'name'        => $productName,
            'category_id'    => $cat_id,
            'description' => $description,
            'base_price'  => $basePrice,
            'status'      => $status,
        ];

      
        if (isset($adminCommission)) {
             // Anda bisa menambahkan logika di sini untuk memeriksa role dari session pengguna
             // Misalnya: if (session('role') == 'admin') { ... }
            $data['admin_commission_rate'] = $adminCommission;
        }

        try {
            if (!empty($productId)) {
                $carian2 = array(
                    'id'=>$productId
                );

                $this->db->updateDataBy($carian2, $data, 'affiliate_products');
                $message = 'Produk afiliasi berhasil diperbarui!';
            } else {
                // Ini adalah penambahan produk baru
                $this->db->insertData($data, 'affiliate_products');
                $message = 'Produk afiliasi berhasil ditambahkan!';
            }

         
            // Beri respons sukses dalam format JSON
            $result = array(
                'status' => 'success',
                'message' => $message
            );

        } catch (\Exception $e) {
            // Tangani error jika ada masalah saat menyimpan ke database
            $result = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()
            );
        } 

        echo json_encode($result);
    }

     public function request_revisions_detail_order(){

         $orderId     = $this->request->getPost('order-id');

         $filter = array(
            'order_id' => $orderId
         );

         $data = $this->db->selectAllDataBy($filter, 'order_revisions');

         $result = array(
            'status' => 'invalid'
         );

         if(!empty($data)){
            $result['status'] = 'valid';
            $result['data'] = $data;
         }

         echo json_encode($result);


    }


    public function request_end_result_detail_order(){

         $orderId     = $this->request->getPost('order-id');
         $orderType     = $this->request->getPost('order-type');

         $filter = array(
            'order_id' => $orderId,
            'order_type' => $orderType,
         );

         $data = $this->db->selectDataBy($filter, 'order_jasa');

         $result = array(
            'status' => 'invalid'
         );

         if(!empty($data)){
            $result['status'] = 'valid';
            $result['data'] = $data;
         }

         echo json_encode($result);

    }

    public function update_revisions_detail_order_as_clients(){

        $result = array();

        $id      = $this->request->getPost('id');
        $desc    = $this->request->getPost('client_descriptions');
        $status  = $this->request->getPost('status');

        $datana = array(
            'status'                => $status,
            'client_descriptions'   => $desc
        );

       $hasil = $this->db->updateData($id, $datana, 'order_revisions');

       $result['status'] = 'invalid';

       if(!empty($hasil)){
            $result['status'] = 'valid';
       }

       echo json_encode($result);

    }

    // update as admin

    public function update_revisions_detail_order() {

    $order_id     = $this->request->getPost('order-id');
    $id_list      = $this->request->getPost('id');
    $links        = $this->request->getPost('end_result_link');
    $descriptions = $this->request->getPost('admin_descriptions');

    // Validasi panjang data
    if (!is_array($links) || !is_array($descriptions) || count($links) !== count($descriptions)) {
        return $this->response->setStatusCode(400)->setJSON(['error' => 'Data tidak valid']);
    }

    // Ambil info tambahan dari order_jasa
    $data_order = $this->db->selectDataBy(['order_id' => $order_id], 'order_jasa');
    $order_type = $data_order->order_type ?? null;
    $username   = $data_order->username ?? null;

    $result = ['status' => 'valid'];

    try {
        for ($i = 0; $i < count($links); $i++) {
            $data = [
                'order_id'          => $order_id,
                'order_type'        => $order_type,
                'username'          => $username,
                'end_result_link'   => $links[$i],
                'admin_descriptions'=> $descriptions[$i],
                'status'            => 'on progress'
            ];

            $id_val = isset($id_list[$i]) ? trim($id_list[$i]) : '';

            if (!empty($id_val)) {
                // Update revisi yang sudah ada
                $this->db->updateData($id_val, $data, 'order_revisions');
            } else {
                // Tambah revisi baru
                $this->db->insertData($data, 'order_revisions');
            }

            $data3 = array(
                'status' => 'revision'
            );

            // lastly baru update status nya order ini karena masuk tahapan revisi
            $this->db->updateDataBy(['order_id' => $order_id], $data3, 'order_jasa');
        }
    } catch (\Exception $e) {
        $result['status'] = 'invalid';
        $result['error'] = $e->getMessage();
    }

    echo json_encode($result);
}

     public function update_end_result_detail_order_as_clients(){


        $stat       = $this->request->getPost('status');
        $order_id   = $this->request->getPost('order-id');

        $filter = array(
            'order_id' => $order_id
        );

        $data = array(
            'status' => $stat
        );

        $hasil = $this->db->updateDataBy($filter, $data, 'order_jasa');

        $result['status'] = 'invalid';

        if(!empty($hasil)){
            $result['status'] = 'valid';
        }

        echo json_encode($result);

     }

    public function update_end_result_detail_order(){

        // Tangkap input dari POST
        $orderId     = $this->request->getPost('order-id');
        $resultType  = $this->request->getPost('resultType');
        $description = $this->request->getPost('description');
        $username    = $this->request->getPost('detail-order-end-result-hidden-username');

        $fileUrl = null;
        if ($resultType === 'upload') {
        // Validasi file upload
        $validated = $this->validate([
            'endFile' => [
                'uploaded[endFile]',
                'ext_in[endFile,pdf,xls,xlsx,rar,zip,jpg,jpeg,png,doc,docx]',
                'max_size[endFile,5120]', // max 5MB
            ],
        ]);

        if ($validated) {
            $file = $this->request->getFile('endFile');

            $originalName = $_FILES['endFile']['name'];
            $ext = pathinfo($originalName, PATHINFO_EXTENSION);

         
            $folderPath  = WRITEPATH . 'uploads/';

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            // Rename file dengan format waktu unik
            $newName = date('ymdhis') . '.'. $ext;

            // Pindahkan file ke folder writable
            $file->move($folderPath, $newName);

            // Buat file bisa diakses publik via URL
            $publicPath = FCPATH . 'uploads/endresults';
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }

            copy($folderPath . '/' . $newName, $publicPath . '/' . $newName);

            $tempPath = WRITEPATH . 'uploads/' . $newName;

             if (file_exists($tempPath)) {
                unlink($tempPath);
            }

            // Set URL untuk disimpan
            $fileUrl = base_url('uploads/endresults/' . $newName);
       
         }
        } elseif ($resultType === 'manual') {
            $fileUrl = $this->request->getPost('endUrl');
        }

        $data_baru = array(
            'end_result_type' => $resultType,
            'admin_descriptions' => $description,
            'end_result_link' => $fileUrl,
            'status' => 'delivered'
        );
        
        $filter = array(
            'order_id'=> $orderId 
        );

            $hasil = $this->db->updateDataBy($filter, $data_baru, 'order_jasa');

            $result = array(
                'status' => 'invalid'
            );

            if($hasil>0){
                $result['status'] = 'valid';
            } 
        

        echo json_encode($result);


    }

    public function delete_revisions_detail_order(){

        $id = $this->request->getPost('id');

        $hasil = $this->db->deleteData($id, 'order_revisions');

        $result = array();
        $result['status'] = 'invalid';

        if(!empty($hasil)){
            $result ['status'] = 'valid';
        }

        echo json_encode($result);

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

    public function virtualvisitors_request_message(){

        $id = $this->request->getPost('id');

        $result = array(
            'status'=>'invalid',
            'message'=>'Data Tidak Lengkap!'
        );

        $hasil = $this->db->selectData($id, 'order_virtualvisitors');

        if(!empty($hasil)){
            $result['status'] = "success";
            $result['message'] = "Data Tersedia!";
            $result['data'] = $hasil;
        }

        echo json_encode($result);

    }

    public  function test_virtualvisitors()
    {
         $code = $this->request->getPost('code');
         $filter = ['order_client_reff' => $code]; 
        

        // It's better to use the query builder directly for clarity and type hinting
        $data_orderan = $this->db->selectDataBy($filter, 'order_jasa');

        $filter2 = ['order_id' => $data_orderan->order_id ]; 
        $data_vvisitors = $this->db->selectAllDataBy($filter2, 'data_virtualvisitors');

        $order_id = $data_orderan->order_id;
        $data_orderan_vvisitors = $this->db->selectData($order_id, 'order_virtualvisitors');

        $formatPesan = $data_orderan_vvisitors->message;

        if(empty($formatPesan)){
            $formatPesan = "empty message";
        }

        $result = array(
            'status' => 'invalid',
            'message' => 'Data Tidak Lengkap!'
        );

        if(!empty($data_vvisitors)){
            $result['status'] = "success";
            $result['message'] = "Data Siap Pakai!";
            $result['data'] = $data_vvisitors;
            $result['extra'] = $formatPesan;
        }

        echo json_encode($result);
    }

    public function generate_virtualvisitors_js()
    {
        // You mentioned $filter and $filter2 in your original code,
        // but they were not defined. I'm assuming for now that they
        // might come from somewhere else or are simple arrays.
        // If they are based on $code, you'd need to define them.
        $code = $this->request->getGet('code');

        // Example filters (adjust as per your actual logic)
        $filter = ['order_client_reff' => $code]; 
        

        // It's better to use the query builder directly for clarity and type hinting
        $data_orderan = $this->db->selectDataBy($filter, 'order_jasa');

        $order_id = $data_orderan->order_id;    
        $data_order_vvisitors = $this->db->selectData($order_id, 'order_virtualvisitors');

        $format_pesan = $data_order_vvisitors->message;

        if(empty($format_pesan)){
            // default
            $format_pesan = "telah membeli";
        }

        $filter2 = ['order_id' => $data_orderan->order_id ]; 
        $data_vvisitors = $this->db->selectAllDataBy($filter2, 'data_virtualvisitors');

        $nama_client = [];
        $nama_product = [];
        $link_product = [];

        foreach ($data_vvisitors as $dv) {
            $nama_client[] = $dv->client_name;
            $nama_product[] = $dv->product_bought;
            $link_product[] = $dv->product_url;
        }

        // Convert PHP arrays to JSON arrays
        // JSON_UNESCAPED_SLASHES is often useful to prevent forward slashes from being escaped
        // JSON_UNESCAPED_UNICODE is good if you have non-ASCII characters
        $data_nama_client = json_encode($nama_client, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $data_nama_product = json_encode($nama_product, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $data_link_product = json_encode($link_product, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        // Define the path to your JavaScript file
        // FCPATH is a CodeIgniter constant that points to your public directory
        $js_file_path = FCPATH . 'assets/js/js-smart/virtualvisitors.js';

        // Check if the file exists before attempting to read it
        if (!file_exists($js_file_path)) {
            // Handle the error, e.g., log it or return an error message
            log_message('error', 'VirtualVisitors JS file not found: ' . $js_file_path);
            return $this->response->setStatusCode(404)->setBody('Virtual visitors JS file not found.');
        }

        // Read the content of the JavaScript file
        $konten_js = file_get_contents($js_file_path);



        // Perform the replacements
        $konten_js = str_replace('_identifier_array_nama_client_', $data_nama_client, $konten_js);
        $konten_js = str_replace('_identifier_array_nama_product_', $data_nama_product, $konten_js);
        $konten_js = str_replace('_identifier_array_link_product_', $data_link_product, $konten_js);

        $konten_js = str_replace('_identifier_message_', $format_pesan, $konten_js);

        // Set the Content-Type header to JavaScript
        $this->response->setHeader('Content-Type', 'application/javascript');

        // Output the modified JavaScript content
        echo $konten_js;
    }

    // this is new version
    // for 13 juni 2025
    public function generate_php2(){

         $phone_cs = "";
         $message = "";
         $rotator_mode = "";
         $order_id = -1;
         $data_record = null;

         $code = $this->request->getGet('code');

         $filter = array(
            'group_code_reff' => $code
         );

         // update the counter for this group
         $data_group = $this->db->selectDataBy($filter, 'group_wa_chat_rotator');

         if(!empty($data_group)){
            $tc = $data_group->total_clicks;
            $tc++;

            $new_data = array(
                'total_clicks' => $tc
            );

            $this->db->updateDataBy($filter, $new_data, 'group_wa_chat_rotator');

            // now we go on to the clients
            $rotator_mode = $data_group->distribusi;
            $group_id = $data_group->id;

            $order_id = $data_group->order_id;

            $filter2 = array(
                'id' => $order_id
            );

            $data_wa_chat = $this->db->selectDataBy($filter2, 'order_wa_chat_rotator');
             $message = $data_wa_chat->message;

              // random works started
           if($rotator_mode == 'random'){

                $cari_cs_semua = array('group_id' => $group_id);
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

                $cari_cs_semua = array('group_id' => $group_id);
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

                $cari_cs_semua = array('group_id' => $group_id);
                $cs_all = $this->db->selectAllDataBy($cari_cs_semua, 'cs_wa_chat_rotator');
                $cs_all = $this->getPhoneNumbersOnly($cs_all);

                // the mapping is located from the same table too
                $data_record = $this->db->selectAllDataBy($cari_cs_semua, 'cs_wa_chat_rotator');

                // origin works in client detection
                
           } // origin works done

             // device works started
           if($rotator_mode == 'device'){

                $cari_cs_semua = array('group_id' => $group_id);
                $cs_all = $this->db->selectAllDataBy($cari_cs_semua, 'cs_wa_chat_rotator');
                //$cs_all = $this->getPhoneNumbersOnly($cs_all);

                $data_record = $cs_all;

                // origin works in client detection
                
           } // device works done



         }


         $data = array(
            'data' => $order_id,
            'data_cs' => json_encode($data_record),
            'cs_number' => $phone_cs,
            'message' => $message,
            'rotator_mode' => $rotator_mode,
            'order_id' => $order_id,
            'group_id' => $group_id
        );

       
        return   view('php-smart/client_forwarder', $data);


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
        $group_id       = $this->request->getPost('group_id');

        $filter = array(
            'group_id' => $group_id
        );

        $data_cs = $this->db->selectAllDataBy($filter, 'cs_wa_chat_rotator');
        $data_record = $this->db->selectDataBy($filter, 'cs_record_wa_chat_rotator');

          $data_phone_stored = array();
        $data_index_stored = array();

        if(!empty($data_cs)){
            $chosen_phone = null;
            $last_index = $data_record->last_index;

            $total_cs = sizeof($data_cs);
            $chosen_post = -1;
            $starting = $last_index;
            $total_same_device = 0;

            if($last_index == $total_cs-1){
                $starting = 0;
            }

            // we do 2 iteration, first to match the device
            // second to take the data only

             for($post = $starting; $post < $total_cs; $post++){
                $device_na = $data_cs[$post]->client_target_device;
                $device_na = strtolower($device_na);

                
                if(strpos($device_na, $device) !== false || $device_na == 'all'){
                    $total_same_device++;

                    $data_phone_stored [] = $data_cs[$post]->cs_number;
                    $data_index_stored [] = $post;
                }

            }

            // if it has more phones for that device
            if($total_same_device >= 1){

                $post_from_last =  array_search($last_index, $data_index_stored);

                // if it is the last item
                // thus we start from beginning
                if($post_from_last == sizeof($data_phone_stored)-1){
                    $post_from_last = 0;
                }

                for ($i=$post_from_last; $i < sizeof($data_phone_stored) ; $i++) { 
                   
                   // take the index
                    $chosen_post = $data_index_stored[$i];
                    
                        // check if this is not the same index as previous?
                        // and it is located after the last index?
                        if($chosen_post != $last_index){
                            $chosen_phone = $data_phone_stored[$i];
                            break;
                        } 


                }

            }else if($total_same_device == 0) {

                // if it has no matched to the device
                // mark it as error
                $chosen_post = -1;

            }


            // if we found already
            if($chosen_post != -1){
                // we take the phone number
                $result['cs_number'] = $chosen_phone;
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

        $origin         = $this->request->getPost('origin');
        $order_id       = $this->request->getPost('order_id');
        $group_id       = $this->request->getPost('group_id');

        $filter = array(
            'group_id' => $group_id
        );

        $data_cs = $this->db->selectAllDataBy($filter, 'cs_wa_chat_rotator');
        $data_record = $this->db->selectDataBy($filter, 'cs_record_wa_chat_rotator');

        $data_phone_stored = array();
        $data_index_stored = array();

        if(!empty($data_cs)){
            $chosen_phone = null;
            $last_index = $data_record->last_index;

            $total_cs = sizeof($data_cs);
            $chosen_post = -1;
            $starting = $last_index;
            $total_same_city = 0;

            if($last_index == $total_cs-1){
                $starting = 0;
            }

            // we do 2 iteration, first to match the city
            // second to take the data only

             for($post = $starting; $post < $total_cs; $post++){
                $city_na = $data_cs[$post]->city;
                $city_na = strtolower($city_na);

                
                if(strpos($city_na, $origin) !== false){
                    $total_same_city++;

                    $data_phone_stored [] = $data_cs[$post]->cs_number;
                    $data_index_stored [] = $post;
                }

            }

            // if it has more phones for that cities
            if($total_same_city >= 1){

                 $post_from_last =  array_search($last_index, $data_index_stored);

                // if it is the last item
                // thus we start from beginning
                if($post_from_last == sizeof($data_phone_stored)-1){
                    $post_from_last = 0;
                }

                for ($i=$post_from_last; $i < sizeof($data_phone_stored) ; $i++) { 
                   
                   // take the index
                    $chosen_post = $data_index_stored[$i];
                    
                        // check if this is not the same index as previous?
                        // and it is located after the last index?
                        if($chosen_post != $last_index){
                            $chosen_phone = $data_phone_stored[$i];
                            break;
                        }
                    

                }

            }else if($total_same_city == 0) {

                // if it has no matched to the city
                // mark it as error
                $chosen_post = -1;

            }


            // if we found already
            if($chosen_post != -1){
                // we take the phone number
                $result['cs_number'] = $chosen_phone;
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

        //$x = $this->db->isSystemEmailNotificationOn();
        //echo var_dump($x);

        //$al = $this->db->selectAllData('order_types');

        //echo json_encode($al);
        echo WRITEPATH . 'uploads/endresults/';

        //return view('testing');
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

            //echo 'moved';

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
        $id_po = -1;

        if(!empty($data_order)){
             $order_id      = $data_order->order_id;
             $order_type    = $data_order->order_type;
             $user    = $data_order->username;
            
             $tableref = (strpos($order_type, 'order') !== true ) ? 'order_' . $order_type : $order_type;

            // echo json_encode($tableref);

            $data_package = $this->db->getPackageByOrder($order_id, $tableref);

            $price          = $data_package->total_price;
            $package_name   = $data_package->name;

            $data_terbeli = array(
                'order_type' => $order_type,
                'total_price' => $price,
                'package_name' => $package_name,
                'username' => $user
            );

            $id_po = $this->db->insertData($data_terbeli, 'purchased_order');
            $this->db->decreasedBalance($user, $price);

        }

        return $id_po;
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
        $session->set('is_affiliator', (bool)$rest[0]->is_affiliator);

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

    public function deposite_update_bulk(){

      
        // id come as array
          $id = $this->request->getPost('id');
           $s = $this->request->getPost('status');

    foreach($id as $idna){

      $data = array(       
            'status' => $s
    );

     $rest = $this->db->updateData($idna, $data, 'deposits');

     $datana = $this->db->selectData($idna, 'deposits');
     
     $amount = $datana->amount;
     $user = $datana->username;

    if($s == 'purchased'){
     // insert the balance into user account
     $this->updateUserBalance($amount, $user);
    }


    }

        

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

          $data3 = array();


       $rest2 = $this->db->insertData($data2, 'order_jasa');

       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;

            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
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
            //$resut = $this->send_email('order', $obj_data);
    }

    public function jasa_landingpage_order(){

        $app_base = $this->request->getPost('app_base');
        // app_base probably in array form
        if(isset($app_base)){
            $dataappbase = json_decode($app_base, true);
            $dataappbaseString = implode(', ', $dataappbase);
            $app_base = $dataappbaseString;
        }

        $status = 'pending';
        
        $package    = $this->request->getPost('package');
        $user       = $this->request->getPost('username');
        $integrasi  = $this->request->getPost('integrasi');
       

           $data1 = array(
            'username'              => $user,
            'integrasi'             => $integrasi,
            'platform_integrasi'    => $app_base,
            'package'               => $package
        );

         //  echo var_dump($data1);
        $rest1 = $this->db->insertData($data1, 'order_landing_page');
        $order_id = $rest1;
        $order_type = 'landing_page';

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
            'username'              => $user,
            'has_revision'          => 1,
            'max_revisions'         => 2
        );

          $data3 = array();

       $rest2 = $this->db->insertData($data2, 'order_jasa');

       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
             $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;
            
            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
        }
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
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
            'username'              => $user,
            'has_revision'          => 1,
            'max_revisions'         => 2
        );

          $data3 = array();

       $rest2 = $this->db->insertData($data2, 'order_jasa');

       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
             $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;
            
            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
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

          $data3 = array();

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
             $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;
            
            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
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

          $data3 = array();

       $rest2 = $this->db->insertData($data2, 'order_jasa');

       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
             $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;
            
            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
        }
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
     }

    }

    public function jasa_uploadaplikasi_order()
{
    $status = 'pending';
    $order_type = 'uploadaplikasi';

    // Ambil data dari form POST
    $username = $this->request->getPost('username_owned');
    $package = $this->request->getPost('package');
    $app_name = $this->request->getPost('uploadaplikasi-app-name');
    $description = $this->request->getPost('uploadaplikasi-description');
    $privacy_url = $this->request->getPost('uploadaplikasi-privacy-url');

    // Validasi dan simpan ICON
    $icon_path = null;
    if ($this->request->getFile('uploadaplikasi-icon')->isValid()) {
        $file = $this->request->getFile('uploadaplikasi-icon');

        $originalName = $file->getName();
        $ext = $file->getClientExtension();

        $folderPath = WRITEPATH . 'uploads/';
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $newName = date('ymdhis') . '_icon.' . $ext;
        $file->move($folderPath, $newName);

        // Copy ke public folder
        $publicPath = FCPATH . 'uploads/apps/';
        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0777, true);
        }

        copy($folderPath . $newName, $publicPath . $newName);
        unlink($folderPath . $newName);

        $icon_path = base_url('uploads/apps/' . $newName);
    }

    // Validasi dan simpan SCREENSHOT
    $screenshot_path = null;
    if ($this->request->getFile('uploadaplikasi-screenshot')->isValid()) {
        $file = $this->request->getFile('uploadaplikasi-screenshot');

        $originalName = $file->getName();
        $ext = $file->getClientExtension();

        $folderPath = WRITEPATH . 'uploads/';
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $newName = date('ymdhis') . '_screenshot.' . $ext;
        $file->move($folderPath, $newName);

        // Copy ke public folder
        $publicPath = FCPATH . 'uploads/apps/';
        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0777, true);
        }

        copy($folderPath . $newName, $publicPath . $newName);
        unlink($folderPath . $newName);

        $screenshot_path = base_url('uploads/apps/' . $newName);
    }

    // Data untuk order_upload_aplikasi
    $data1 = [
        'username'        => $username,
        'package'         => $package,
        'app_name'        => $app_name,
        'description'     => $description,
        'privacy_url'     => $privacy_url,
        'icon_path'       => $icon_path,
        'screenshot_path' => $screenshot_path,
    ];

    // Insert ke tabel khusus
    $rest1 = $this->db->insertData($data1, 'order_uploadaplikasi');
    $order_id = $rest1;

    $sixDigitRandomRef = $this->generateRandomPass(6);
    if ($this->db->isSystemApprovalAutomatic()) {
        $status = 'approved';
    }

    // Data untuk order_jasa (utama)
    $data2 = [
        'order_id'          => $order_id,
        'order_type'        => $order_type,
        'username'          => $username,
        'order_client_reff' => $sixDigitRandomRef,
        'status'            => $status,
        'has_revision'      => 0,
        'max_revisions'     => 0,
    ];

    $data3 = [];
    $rest2 = $this->db->insertData($data2, 'order_jasa');

    // Kalau approval otomatis, proses PO langsung
    if ($this->db->isSystemApprovalAutomatic()) {
        $id_po = $this->process_purchased_order($rest2);
        $filter = ['id' => $rest2];
        $data3['purchased_order_id'] = $id_po;
        $this->db->updateDataBy($filter, $data3, 'order_jasa');
    }

    // Balikan
    if ($rest1 == 0) {
        echo "none";
    } else if ($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $username);
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

          $data3 = array();

       $rest2 = $this->db->insertData($data2, 'order_jasa');

       // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
             $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;
            
            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
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

          $data3 = array();

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;
            
            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
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

          $data3 = array();

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;
            
            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
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

          $data3 = array();

       $rest2 = $this->db->insertData($data2, 'order_jasa');

        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;
            
            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
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

          $data3 = array();

       $rest2 = $this->db->insertData($data2, 'order_jasa');

        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
            $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;
            
            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
        }
     
     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
     }

    }

    public function obtain_data_format_os(){

         $model = $this->request->getPost('model');
        $descriptions = $this->request->getPost('descriptions');
        $delivery = $this->request->getPost('delivery');
        $contact_person_name = $this->request->getPost('contact_person_name');
        $contact_person_wa = $this->request->getPost('contact_person_wa');
        $contact_type = $this->request->getPost('contact_person_type');
        $package = $this->request->getPost('package');
        $username = $this->request->getPost('username');

            $data1 = array(
                'model'         => $model,
                'descriptions'  => $descriptions,
                'delivery'      => $delivery,
                'contact_person_name'      => $contact_person_name,
                'contact_person_wa'      => $contact_person_wa,
                'contact_type'      => $contact_type,
                'package'      => $package,
                'username'      => $username
            );

            return $data1;

    }

    public function obtain_data_ketik_document(){

       
        $username = $this->request->getPost('username');
         $document_name = $this->request->getPost('document_name');
          $total_pages = $this->request->getPost('total_pages');
           $package = $this->request->getPost('package');
            $date_limit = $this->request->getPost('date_limit');
            $desc = $this->request->getPost('descriptions');

            $data1 = array(
                'document_name'     => $document_name,
                'total_pages'       => $total_pages,
                'date_limit'        => $date_limit,
                'descriptions'        => $desc,
                'package'           => $package,
                'username'          => $username
            );

            return $data1;

    }

    public function jasa_lain_order(){

     
        $status = 'pending';
        
        $order_type = $this->request->getPost('form_type');

        // saat ini jasa lain cuma 2 
        // format os atau ketik document

        $data2 = array();

        $data2['order_type'] = $order_type;
        
        if($order_type == 'format_os'){

            $data1 = $this->obtain_data_format_os();

            // 0 means false
            $data2['has_revision'] = 0;

        }else if($order_type == 'ketik_document'){

            $data1 = $this->obtain_data_ketik_document();

            // 1 means yes
            $data2['has_revision'] = 1;
            $data2['max_revisions'] = 2;

        }

        $db_identifier_ending = "order_" . $order_type;

        $username = $data1['username'];
        $package = $data1['package'];

        // we insert 2 things : into table_order_jasa, 
        // then to specific : table_order_format_os
     
        $rest1 = $this->db->insertData($data1, $db_identifier_ending);
        $order_id = $rest1;

        

        $sixDigitRandomRef = $this->generateRandomPass(6);



         // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $status = 'approved';
        }

        $data2['order_id'] = $order_id;
        $data2['order_client_reff'] = $sixDigitRandomRef;
        $data2['status'] = $status;
        $data2['username'] = $username;



          $data3 = array();

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
             $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;
            
            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
        }

     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $username);
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

          $data3 = array();

       $rest2 = $this->db->insertData($data2, 'order_jasa');
     
        // for system calculation profit purchased order
        if($this->db->isSystemApprovalAutomatic()){
            $order_id = $rest2;
             $id_po = $this->process_purchased_order($order_id);
            // update back to the order_jasa
            $filter = array();
            $filter['id'] = $order_id;
            
            $data3['purchased_order_id'] = $id_po;
            $this->db->updateDataBy($filter, $data3, 'order_jasa');
        }

     if($rest1 == 0){
        echo "none";
     }else if($rest1 != 0 && $rest2 != 0) {
        echo "valid";
        $this->process_order_email_notification($package, $order_type, $user);
     }

    }

    public function order_type_add(){

         $n = $this->request->getPost('name');

         // slug name is
         // small letters
         // spaces into underscore
            $slug_name = strtolower($n);            // Ubah ke huruf kecil semua
            $slug_name = str_replace(' ', '_', $slug_name); // Ganti spasi dengan underscore
            
      

         $datana = array(
            'name' => $n,
            'slug_name' => $slug_name
         );

         $rest = $this->db->insertData($datana, 'order_types');

         $end_result = array();

         if($rest == 0){
            $status = "none";
         }else {
            $status = "valid";
         }

         $end_result['status'] = $status;

         echo json_encode($end_result);

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

       $result = array(
        'status' => 'invalid!',
        'message' => 'Data Tidak Sesuai!'
       );

        $cs_id = $this->request->getPost('cs_id');
        $cs_days_selected = $this->request->getPost('cs_days_selected');
        $cs_day_mode = $this->request->getPost('cs_day_mode');
        $hour_closed = $this->request->getPost('hour_closed');
        $hour_open = $this->request->getPost('hour_open');

        $gpid = $this->request->getPost('group_id');

        $cari1 = array(
            'id' => $cs_id
        );

        $data_baru = array(
            'day_mode' => $cs_day_mode,
            'days_selected' => json_encode($cs_days_selected),
            'hour_open' => $hour_open,
            'hour_closed' => $hour_closed
        );

       

        $hasil =  $this->db->updateDataBy($cari1, $data_baru, 'cs_wa_chat_rotator');
        $result['message'] = 'Data Berhasil Diupdate!';
       

        if(!empty($hasil)){
            $result['status'] = 'success';
        }

            echo json_encode($result);
       

    }

    public function wa_chat_rotator_cs_region_update(){

        $result = array(
            'status'=> 'invalid',
            'message' => 'Data Tidak Sesuai!'
        );


        $o = $this->request->getPost('group_id');
        $country = $this->request->getPost('country');
        $region = $this->request->getPost('region');
        $city = $this->request->getPost('city');

        $cari = array(
            'id' => $o
        );

        $data_baru = array(
            'country' => $country,
            'region' => $region,
            'city' => $city
        );


      
            $hasil = $this->db->updateDataBy($cari, $data_baru, 'group_wa_chat_rotator');
            

            if(!empty($hasil)){
                $result['status'] = 'success';
                $result['message'] = 'Data Terupdate!';

            }

            echo json_encode($result);

    }

    public function wa_chat_rotator_request_cs_schedule(){

        $id = $this->request->getPost('id');

        $data_cs = $this->db->selectData($id, 'cs_wa_chat_rotator');

        $result = array(
            'status' => 'invalid',
            'message' => 'Data Not Found!'
        );

        if(!empty($data_cs)){
            $result['status'] = 'success';
            $result['message'] = 'Data Ditemukan!';
            $result['data'] = $data_cs;
        }

        echo json_encode($result);

    }

    public function wa_chat_rotator_request_message()
    {
            $code = $this->request->getPost('code');        

              $filter = array(
                'group_code_reff'=>$code
            );

            $hasil = $this->db->selectDataBy($filter, 'group_wa_chat_rotator');

            $result = array(
                'status' => 'invalid',
                'message' => 'System Halted!'
            );

            if(!empty($hasil)){

                $result['status'] = 'success';
                $result['message'] = 'Data Ditemukan!';
                $result['data'] = $hasil;

            }

            echo json_encode($result);

    }

    public function wa_chat_rotator_update_message(){


            $code = $this->request->getPost('code');
            $m = $this->request->getPost('message');

            $filter = array(
                'group_code_reff'=>$code
            );

            $datana = array(
                'message'=>$m
            );

           $hasil = $this->db->updateDataBy($filter, $datana, 'group_wa_chat_rotator');

            $result = array(
                'status' => 'invalid',
                'message' => 'System Halted!'
            );

            if(!empty($hasil)){

                $result['status'] = 'success';
                $result['message'] = 'Data Terupdate!';

            }

            echo json_encode($result);


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

    public function download_invoice(){

        // this is the code by client request
        $code_reff = $this->request->getGet('order_client_reff');

        $filter = array(
            'order_client_reff' => $code_reff
        );

        $filter2 = array();
        $data_order = $this->db->selectDataBy($filter, 'order_jasa');

        $filter2['username'] = $data_order->username;

        $data_user = $this->db->selectDataBy($filter2, 'users');

        $filter3 = array();
        $filter3['id'] = $data_order->purchased_order_id;

        $data_purchased = $this->db->selectDataBy($filter3, 'purchased_order');

        $filena = "Invoice_" . $data_order->order_client_reff;

       $Pdfgenerator = new Pdfgenerator();
        
        $data = array();
        $data['title_pdf'] = $filena;
        $data['order_client_reff'] = $data_order->order_client_reff;
        $data['order_type'] = $data_order->order_type;
        $data['status'] = $data_order->status;
        $data['date_created'] = $data_order->date_created;
        $data['fullname'] = $data_user->fullname;
        $data['total_price'] = $data_purchased->total_price;
        $data['package_name'] = $data_purchased->package_name;


       $path = FCPATH . 'assets/images/solusi-digital-logo.png'; 
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_img);

        $data['image_source'] = $base64;

        $file_pdf = $filena;

        $paper = 'A4';

        $orientation = "portrait";

        $html = view('reporting\invoice_layout', $data);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }


    public function wa_chat_rotator_delete_group()
    {
        // Ambil group_id dari request
        $group_id = $this->request->getPost('group_id');
        
       $result = array();
        
        try {
          
            $filter = array(
                'group_id' => $group_id
            );

            // karena hapus group otomatis hapus data maka hapus juga nomer cs nya yg segroup
            $hasil1  = $this->db->deleteData($group_id, 'group_wa_chat_rotator');
            $hasil2  = $this->db->deleteDataBy($filter, 'cs_wa_chat_rotator');

            $result['status'] = 'valid';
             $result['message'] = 'Group berhasil dihapus';
        } catch (\Exception $e) {
            $result['status'] = 'invalid';
            $result['message'] = 'Gagal menghapus Group: ' . $e->getMessage();
        }

        echo json_encode($result);
    }


    public function wa_chat_rotator_update_group()
{
    $group_id = $this->request->getPost('group_id');
    $order_id = $this->request->getPost('order_id');
    $group_name = $this->request->getPost('group_name');
    $distribusi = $this->request->getPost('distribusi');
    $device = $this->request->getPost('device');
    
    $data = array(
        'nama' => $group_name,
        'distribusi' => $distribusi,
        'order_id' => $order_id,
        'client_target_device' => $device,
    );

    $result = array();
    
    // Jika group_id = 'new', berarti insert baru
    if($group_id == 'new') {
      
        // we also generate random code for later usage
        $code = $this->generateRandomPass(7);
        $data['group_code_reff'] = $code;

        $rest = $this->db->insertData($data, 'group_wa_chat_rotator');
        
        if($rest == 0) {
            $result['status'] = 'invalid';
        } else {
            $result['status'] = 'valid';
            $result['data'] = $rest;
            $result['code'] = $code;
        }

    } 
    // Jika bukan new, berarti update existing
    else {

        $filter = array('id'=>$group_id);
        $data_group = $this->db->selectDataBy($filter, 'group_wa_chat_rotator');

        $rest = $this->db->updateData($group_id, $data, 'group_wa_chat_rotator');
        
        if($rest == 0) {
            $result['status'] = 'invalid';
        } else {
            $result['status'] = 'valid';
            $result['data'] = $rest;
            $result['code'] = $data_group->group_code_reff;

        }
    }

    echo json_encode($result);

}

    public function wa_chat_rotator_delete_cs()
    {
        // Ambil id dari request
        $cs_id = $this->request->getPost('cs_id');
        
      
       $result = array();
        
        try {
          

            $data_cs = $this->db->selectData($cs_id, 'cs_wa_chat_rotator');
            $group_id = $data_cs->group_id;
            $order_id = $data_cs->order_id;

            $hasil  = $this->db->deleteData($cs_id, 'cs_wa_chat_rotator');

            // ini untuk
            // kita update juga record yg ada sebagai indexing
            // lihat dulu untuk group ini ada brp orang cs?
            $filter = array(
                'group_id'=>$group_id
            );

            $data_cs = $this->db->selectAllDataBy($filter, 'cs_wa_chat_rotator');
            $total_cs = count($data_cs);
            
            $data_baru = array(
                'order_id'=>$order_id,
                'group_id'=>$group_id,
                'last_index'=>0,
                'total_cs_numbers'=>$total_cs
            );


            // check dulu adakah data itu direcord?
            $data_record = $this->db->selectDataBy($filter, 'cs_record_wa_chat_rotator');

            if(!empty($data_record)){
                // berarti ada
                // so kita update aja
                $this->db->updateDataBy($filter, $data_baru, 'cs_record_wa_chat_rotator');    

            }else{
                // masukkin record tracker nya
                $this->db->insertData($data_baru, 'cs_record_wa_chat_rotator');    
            }

            

            $result['status'] = 'valid';
            $result['message'] = 'CS berhasil dihapus';
        } catch (\Exception $e) {
            $result['status'] = 'invalid';
             $result['message'] = 'Gagal menghapus CS: ' . $e->getMessage();
        }

        echo json_encode($result);
    }

    public function wa_chat_rotator_update_cs(){


    $cs_id = $this->request->getPost('cs_id');
    $group_id = $this->request->getPost('group_id');
     $order_id = $this->request->getPost('order_id');
    $cs_name = $this->request->getPost('cs_name');
    $cs_phone = $this->request->getPost('cs_phone');
    $cs_status = $this->request->getPost('cs_status');
    $device = $this->request->getPost('device');
    
    $stat_cs = 'enabled';

    if(empty($cs_status)){
        $stat_cs = 'disabled';
    }

    if(empty($device)){
        $device = "all";
    }
    
    $data = array(
        'cs_nama'   => $cs_name,
        'cs_number' => $cs_phone,
        'cs_status' => $cs_status,
        'client_target_device' => $device
    );

    $result = array();
    

    if($cs_id == 'new') {
      
      //nyelip
        $data['group_id'] = $group_id;
        $data['order_id'] = $order_id;
        $data['total_leads'] = 0;

        $rest = $this->db->insertData($data, 'cs_wa_chat_rotator');
        
        if($rest == 0) {
            $result['status'] = 'invalid';
        } else {

            // idna 
            $data['id'] = $rest;
            $result['status'] = 'valid';
            $result['data'] = $data;
        }


        

    } 
    // Jika bukan new, berarti update existing
    else {

        $filter = array(
            'id' => $cs_id,
            'group_id' => $group_id,
            'order_id' => $order_id
        );

        $rest = $this->db->updateDataBy($filter, $data, 'cs_wa_chat_rotator');
        
        if($rest == 0) {
            $result['status'] = 'invalid';
        } else {
            $data['id'] = $cs_id;
            $result['status'] = 'valid';
            $result['data'] = $data;
        }
    }

        // ini untuk
        // kita update juga record yg ada sebagai indexing
        // lihat dulu untuk group ini ada brp orang cs?
        $filter = array(
            'group_id'=>$group_id
        );

        $data_cs = $this->db->selectAllDataBy($filter, 'cs_wa_chat_rotator');
        $total_cs = count($data_cs);
        
        $data_baru = array(
            'order_id'=>$order_id,
            'group_id'=>$group_id,
            'last_index'=>0,
            'total_cs_numbers'=>$total_cs
        );

         // check dulu adakah data itu direcord?
            $data_record = $this->db->selectDataBy($filter, 'cs_record_wa_chat_rotator');

            if(!empty($data_record)){
                // berarti ada
                // so kita update aja
                $this->db->updateDataBy($filter, $data_baru, 'cs_record_wa_chat_rotator');    

            }else{
                // masukkin record tracker nya
                $this->db->insertData($data_baru, 'cs_record_wa_chat_rotator');    
            }

    echo json_encode($result);

    }

}

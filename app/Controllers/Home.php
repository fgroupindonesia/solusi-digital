<?php

namespace App\Controllers;

use App\Models\DataModel;

class Home extends BaseController
{

    public $db = null;

    public function __construct(){

        $this->db = new DataModel();
        //echo var_dump($this->db);

    }

    //public $cache = new TempCache();

    public function index()
    {
       return redirect()->to('http://www.yahoo.com'); 
        //return "something  x"  . base_url();
    }

     public function order_jasa(): string
    {
        // for security reasons
        $this->protectLogin();

        $session = session();
        $r = $session->get('role');

        //echo var_dump($r);

       $data = $this->getDashboardData($r);
       $data['search_display'] = 'search-hide';
       $data['role'] = $r;

        if(!empty($r)){
         
          //echo "client";
                $data['filter_month'] = $this->get4QuartalMonths();
                return view('dashboard_order_jasa', $data);
           }
        
    }

	public function display_login(): string
    {
       $st = $this->request->getGet('status');
       $data = array();

       if(isset($st)){
        $data['status'] = 'wrong username or password!';
       }else{
        $data['status'] = '';
       }

        return view('login_portal', $data);
    }

    public function display_login_error(): string
    {
        $data = array('message' => 'invalid login!');
        return view('login_portal', $data);
    }

    private function countPublishedApp($arrayNa){

        $n = 0;

        foreach ($arrayNa as $k => $v) {
            
            if($k == 'status' && $v == 'published'){
                $n++;
            }

        }

        return $n;

    }

    private function formatTimeInData($arrayNa){
        
        foreach ($arrayNa as $k) {
            
            $k->date_created = date('D, d-m-Y H:i', strtotime($k->date_created)) . " WIB";

        }

        return $arrayNa;

    }

    private function protectLogin(){
        if($this->isLoggedOn() === false){
           header("Location: /portal");
           exit(0);  
        }
    }

     private function protectAdminAccess(){
        if($this->isAdminAccess() === false){
           header("Location: /portal");
           exit(0);  
        }
    }

    public function display_dashboard()
    {   

        // for security reasons
        $this->protectLogin();

        $session = session();
        $r = $session->get('role');

        //echo var_dump($r);

       $data = $this->getDashboardData($r);
       $data['search_display'] = 'search-hide';
       $data['role'] = $r;

        if(!empty($r)){
         
            if($r == 'admin'){
                //echo "admin";
                return view('dashboard_admin', $data);
            }else{
                //echo "client";
                $data['filter_month'] = $this->get4QuartalMonths();
                return view('dashboard_client', $data);
            } 

        }


    }

    private function get4QuartalMonths(){
        
        $prev_month = array();

        for($i = 1; $i <= 3; $i++){
            $month = date('F Y', strtotime("-$i month"));
            $prev_month[] = $month;
        }

        return $prev_month;

    }

    private function isLoggedOn(){
        return $this->getSessionData('role') != null;
    }

    private function isAdminAccess(){
        return $this->getSessionData('role') == 'admin';
    }

    private function getSessionData($key){
            $session = session();
            $u = $session->get($key);
            return $u;
    }

    private function getDashboardData($usage){

        if($usage == 'admin'){
            $data_users = $this->db->selectAllData('users');
            arsort($data_users);
            $data_apps = $this->db->selectAllData('apps');
            arsort($data_apps);
            $data_orders = $this->db->selectAllData('order_jasa');
            arsort($data_orders);
        }else{
            $u = $this->getSessionData('username');
            $data_users = $this->db->selectAllData('users');
            arsort($data_users);
            $data_apps = $this->db->selectAllDataByUsername($u, 'apps');
            arsort($data_apps);
             $data_orders = $this->db->selectAllDataByUsername($u, 'order_jasa');
            arsort($data_orders);
        }
        $total_users = 0;
        $total_apps = 0;
        $total_orders = 0;
        $total_apps_published = 0;

        if(isset($data_users)){
            $total_users = count($data_users);
        }

        if(isset($data_apps)){
            $total_apps = count($data_apps);
         $total_apps_published =  $this->countPublishedApp($data_apps);

        }

         if(isset($data_orders)){
            $total_orders = count($data_orders);
        }

        $sex_type = $this->getSessionData('sex');

        if($sex_type == 'male'){
            $sex_male_radio = "checked";
            $sex_female_radio = "";
        }else{
            $sex_male_radio = "";
            $sex_female_radio = "checked";
        }

        $data = array(
            'user_id'   => $this->getSessionData('user_id'),
            'propic'    => $this->getSessionData('propic'),
            'username'  => $this->getSessionData('username'),
            'pass'  => $this->getSessionData('pass'),
            'email'  => $this->getSessionData('email'),
            'occupation'  => $this->getSessionData('occupation'),
            'whatsapp'  => $this->getSessionData('whatsapp'),
            'sex_male_radio'  => $sex_male_radio,
            'sex_female_radio'  => $sex_female_radio,
            'data_users' => $this->formatTimeInData($data_users),
            'data_apps' => $this->formatTimeInData($data_apps),
            'data_orders' => $this->formatTimeInData($data_orders),
            'total_users' => $total_users,
            'total_apps' => $total_apps,
            'total_orders' => $total_orders,
            'total_apps_published' => $total_apps_published
        );

        return $data;
    }


    public function display_settings(): string
    {   
    	return view('settings');
    }

	public function app_management(): string
    {   
          // for security reasons
        $this->protectLogin();


            $r = $this->getSessionData('role');
    	    $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;
            $data['username'] = $this->getSessionData('username');
            $data['user_id'] = $this->getSessionData('user_id');

        return view('manage_apps', $data);
    }

    public function order_jasa_management(): string
    {   
          // for security reasons
        $this->protectLogin();
         $this->protectAdminAccess();

            $r = $this->getSessionData('role');
            $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;
            $data['username'] = $this->getSessionData('username');
            $data['user_id'] = $this->getSessionData('user_id');

        return view('manage_order_jasa', $data);
    }

    public function user_management(): string
    {   

          // for security reasons
        $this->protectLogin();

            $r = $this->getSessionData('role');
           $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';
            $data['role'] = $r;

    	return view('manage_users', $data);
    }

    public function app_add(): string
    {   
        return view('form_app');
    }

    public function user_add(): string
    {   
        return view('form_user');
    }

}

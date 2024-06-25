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

    public function index(): string
    {
        return "something";
    }

	public function display_login(): string
    {
        return view('login_portal');
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

    public function display_dashboard()
    {   

        $session = session();
        $r = $session->get('role');

        //echo var_dump($r);

       $data = $this->getDashboardData($r);
       $data['search_display'] = 'search-hide';

        if(!empty($r)){
         
            if($r == 'admin'){
                //echo "admin";
                return view('dashboard_admin', $data);
            }else{
                //echo "client";
                return view('dashboard_client', $data);
            } 

        }

         return redirect()->route('portal');
        

    }

    private function getCurrentPropic(){
            $session = session();
            $u = $session->get('propic');
            return $u;
    }

    private function getCurrentUsername(){
            $session = session();
            $u = $session->get('username');
            return $u;
    }

    private function getCurrentRole(){
            $session = session();
            $u = $session->get('role');
            return $u;
    }

    private function getDashboardData($usage){

        if($usage == 'admin'){
            $data_users = $this->db->selectAllData('users');
            $data_apps = $this->db->selectAllData('apps');
        }else{
            $u = $this->getCurrentUsername();
            $data_users = $this->db->selectAllData('users');
            $data_apps = $this->db->selectAllDataByUsername($u, 'apps');
        }
        $total_users = 0;
        $total_apps = 0;
        $total_apps_published = 0;

        if(isset($data_users)){
            $total_users = count($data_users);
        }

        if(isset($data_apps)){
            $total_apps = count($data_apps);
         $total_apps_published =  $this->countPublishedApp($data_apps);

        }


        $data = array(
            'propic'    => $this->getCurrentPropic(),
            'username'  => $this->getCurrentUsername(),
            'data_users' => $this->formatTimeInData($data_users),
            'data_apps' => $this->formatTimeInData($data_apps),
            'total_users' => $total_users,
            'total_apps' => $total_apps,
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
            $r = $this->getCurrentRole();
    	    $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';

        return view('manage_apps', $data);
    }

    public function user_management(): string
    {   
            $r = $this->getCurrentRole();
           $data = $this->getDashboardData($r);
            $data['search_display'] = 'search-shown';

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

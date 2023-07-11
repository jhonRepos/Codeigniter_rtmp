<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	    $this->load->model('Login_model');
	}
	public function index()
	{
		$this->load->view('templates/Header');	
		$this->load->view('login');
		$this->load->view('templates/Footer');
	}

	function auth(){
		 
	
				$username = $this->input->post('username',TRUE);
                $password =$this->input->post('password',TRUE);

                
                $validate = $this->Login_model->validate($username,$password); 
				if($validate->num_rows() > 0){
                    
                    $data                     = $validate->row_array();
					$users_id  	              = $data['userId'];
                    $username  	              = $data['username'];
                    $name  	              = $data['name'];
          
                    
                    $sesdata  = array(
                        'username'  	       => $username,
                        'users_id'  	       => $users_id,
                        'name'  	           => $name,
                        'logged_in' 	       => TRUE,
                   
                    );
                    $this->session->set_userdata($sesdata);
                    
                    $actionby= $name;
                    $action='login';
                    $idadress=$this->input->ip_address();
                    activity($actionby,$action,$idadress);
                    
                    
      
                    redirect('homepage');
                }else{
					$this->session->set_flashdata("success", 'No Account Found');
                    redirect('login');
                }

	}
	function logout(){
	    if(!empty($this->session->userdata('name'))){
	        $actionby= $this->session->userdata('name');
	        $action='logout';
	        $idadress=$this->input->ip_address();
	        activity($actionby,$action,$idadress);
	        
	    }
	    
		$this->session->sess_destroy();

        redirect("login");
	}
}

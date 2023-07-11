<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_log extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	    $this->load->model('Activity_model');
        $this->load->library('user_agent');
        
        $logged_in = $this->session->userdata('logged_in');
        
        if($logged_in !== TRUE || empty($logged_in))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('login'); # Login view
        }
	}
    public function index()
    {
     
        $this->load->view('templates/Header');
		$this->load->view('templates/NavHead');
		$this->load->view('templates/NavSide');
        $this->load->view('activity_view');
		$this->load->view('templates/Footer');
		$this->load->view('activity_footer');
    }

  
    
   
    
    function fetch(){
        $query= $this->db->query("SELECT * FROM activity_logs");
        
        
        
        $this->db->limit(10000);
        if($query->num_rows()>0){
            $count=0;
            foreach($query->result() as $rows){
                
                
                $json[]=array(
                    date("M j, Y ",strtotime($rows->actionDate)),
                    $rows->actiobBy,
                    $rows->action,
                    $rows->ipaddress,
                   
                    
                );
                
                
            }
            
            $response['success']=true;
            $response['aaData']=$json;
            echo json_encode($response);
            
        }
        else{
            $response =array();
            $response['sEcho']=0;
            $response['iTotalRecords']=0;
            $response['iTotalDisplayRecords']=0;
            $response['aaData']=[];
            echo json_encode($response);
        }
        
    }
    

    
    
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	    $this->load->model('Category_model');
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
        $this->load->view('category_view');
		$this->load->view('templates/Footer');
		$this->load->view('category_footer');
    }

    public function add() {
        // Load the form helper and validation library
        
        
        // Set validation rules for the form fields
        $this->form_validation->set_error_delimiters('<span style="color:red;">(',')</span>');
        $this->form_validation->set_rules('catName', 'Category Name', 'required');
        $this->form_validation->set_rules('catDescription', 'Description ', 'required');

        $this->form_validation->set_message('is required');
        
        if ($this->form_validation->run() === FALSE) {
            // Display the form again if validation fails
            $this->session->set_flashdata("catName",form_error('catName'));
            $this->session->set_flashdata("catDescription",form_error('catDescription'));
       
            $this->session->set_flashdata("catNameVal",$this->input->post('catName'));
            $this->session->set_flashdata("catDescriptionVal",$this->input->post('catDescription'));
            
            
            $this->session->set_flashdata("success","Failed to insert");
            redirect('category');
        } else {
            // Insert the new channel into the database
            
            $this->Category_model->addCategory();
            // Redirect to the channel list page
            $this->session->set_flashdata("success","Success to insert");
      
            redirect('category');
        }
    }
    
    function fetch(){
        $query= $this->db->query("SELECT * FROM categories");
        
        $this->db->limit(10000);
        if($query->num_rows()>0){
            $count=0;
            foreach($query->result() as $rows){
                
                
                $json[]=array(
                    '<div id="namedis'.$rows->catId.'" >'.$rows->catName.'</div><input type="text" value="'.$rows->catName.'" id="name'.$rows->catId.'"  style="display:none">',
                    '<div id="desdis'.$rows->catId.'" >'.$rows->catDescription.'</div><input type="text" value="'.$rows->catDescription.'" id="des'.$rows->catId.'"  style="display:none ;width:100%;">',
                    '<center>
<a href="#" class="editbtn" id="editbtn'.$rows->catId.'" data-id="'.$rows->catId.'" ><i class="fas fa-edit fa-lg" style="color: #0561ff;"></i> </a>
<a href="#" class="check"   id="check'.$rows->catId.'"  data-id="'.$rows->catId.'" style="display:none"><i class="far fa-check-square fa-lg" style="color: #00ff40;"></i></a>
<a href="#" class="close"   id="close'.$rows->catId.'"  data-id="'.$rows->catId.'" style="display:none"><i class="far fa-window-close fa-sm" style="color: #ff2600;"></i></a>
</center>',
                    
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

    
    function editcategory(){
        
        $output=$this->Category_model->editcat();
        
        echo json_encode($output);
        
    }
}

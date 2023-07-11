<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channel extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	    $this->load->model('Channel_model');
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
        $data['channels'] = $this->Channel_model->getChannels();
        $this->load->view('templates/Header');
		$this->load->view('templates/NavHead');
		$this->load->view('templates/NavSide');
        $this->load->view('channel_view',  $data);
		$this->load->view('templates/Footer');
		$this->load->view('channel_footer');
		
    }
    
    public function player($id)
    {
        $data['channels'] = $this->Channel_model->getChannelsDetails($id);
        $this->load->view('templates/Header');
        $this->load->view('templates/NavHead');
        $this->load->view('templates/NavSide');
        $this->load->view('channel_player',  $data);
        $this->load->view('templates/Footer');
        $this->load->view('channel_footer');
        
    }
    

    public function add() {
        // Load the form helper and validation library


        // Set validation rules for the form fields
        $this->form_validation->set_error_delimiters('<span style="color:red;">(',')</span>');
        $this->form_validation->set_rules('name', 'Channel Name', 'required');
        $this->form_validation->set_rules('url', 'Stream URL', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('thumbnail', 'Thumbnail', 'callback_file_check');
        $this->form_validation->set_message('is required');

        if ($this->form_validation->run() === FALSE) {
            // Display the form again if validation fails
            $this->session->set_flashdata("name",form_error('name'));
            $this->session->set_flashdata("category",form_error('category'));
            $this->session->set_flashdata("url",form_error('url'));
            $this->session->set_flashdata("thumbnail",form_error('thumbnail'));

            $this->session->set_flashdata("nameVal",$this->input->post('name'));
            $this->session->set_flashdata("urlVal",$this->input->post('url'));


            $this->session->set_flashdata("success","Failed to insert");
            redirect('channel');   
        } else {
            // Insert the new channel into the database
            
            $this->Channel_model->addChannel();
            // Redirect to the channel list page
            $this->session->set_flashdata("success","Success to insert");
            redirect('channel');
        }
    }
public function file_check($str)
{
    $allowed_mime_types = array('image/gif', 'image/jpeg', 'image/png', 'image/jpg');
    $mime_type = get_mime_by_extension($_FILES['thumbnail']['name']);
   
    if (in_array($mime_type, $allowed_mime_types)) {
        return true;
    }
    else {
        $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
        return false;
    }
}



    
function fetch(){
    $query= $this->db->query("SELECT * FROM channels");
    
    $this->db->limit(10000);
    if($query->num_rows()>0){
        $count=0;
        foreach($query->result() as $rows){
            
            
            $json[]=array(
                '<center><img class="img-fluid" type="image/gif" width="50px" src="public/uploads/thumbnails/'.$rows->thumbnail.'"></center>',        
                $rows->name,
                '<a href="channel/player/'.$rows->id.'">'.$rows->url.'</a>',
                ' <a href="channel/delete/'.$rows->id.'"><i class="fas fa-trash-alt" style="color: #db0606;"></i></a>',
                
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
function delete($id){
    $this->db->where('id', $id);
    $query = $this->db->get('channels');
    $row = $query->row();
    if (isset($row->thumbnail)) {
        unlink('./public/uploads/thumbnails/'.$row->thumbnail);
    }
    
    
    $success=$this->db->query("DELETE FROM `channels` WHERE `id`='".$id."' ");
    if($success){

    
        
        
        $actionby=  $this->session->userdata('name');;
        $action='Delete Channel Name: '.$row->name;
        $idadress=$this->input->ip_address();
        activity($actionby,$action,$idadress);
        
        $this->session->set_flashdata("success","Success to Delete");
        
    }else{
        $this->session->set_flashdata("success","Failed to Delete");
    }
   
    
    redirect('channel');
}
    
    
}

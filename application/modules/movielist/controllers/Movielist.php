<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movielist extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	    $this->load->model('Movielist_model');
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
        $this->load->view('movielist_view');
		$this->load->view('templates/Footer');
		$this->load->view('movielist_footer');
    }

    public function player($channel_id) {
        $movie = $this->db->get_where('videos', array('vidId' => $channel_id))->row();
        if ($movie) {
            $data['video'] = $movie;
            $this->load->view('templates/Header');
            $this->load->view('templates/NavHead');
            $this->load->view('templates/NavSide');
            $this->load->view('movieplay',$data);
            $this->load->view('templates/Footer');
          
        } else {
            show_404();
        }
    }
    
    
   
    
    function fetch(){
        $query= $this->db->query("SELECT tbl1.*,tbl2.catName FROM videos as tbl1
            LEFT JOIN categories as tbl2
    ON tbl1.catId= tbl2.catId
");
        
        
        
        $this->db->limit(10000);
        if($query->num_rows()>0){
            $count=0;
            foreach($query->result() as $rows){
                
                
                $json[]=array(
                    '<center><img class="img-fluid" type="image/gif" width="50px" src="public/uploads/thumbnails/'.$rows->vidBanner.'"></center>', 
                    '<a href="movielist/player/'.$rows->vidId.'">'.$rows->vidTitle.'</a>', 
                    $rows->vidDescription,
                    $rows->vidDuration,
                    $rows->catName,
                    ' <a href="#"><i class="fas fa-edit px-2" style="color: #0561ff;"></i> </a>
                  <a href="movielist/delete/'.$rows->vidId.'"><i class="fas fa-trash-alt" style="color: #db0606;"></i></a>',
                    
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
        $this->db->where('vidId', $id);
        $query = $this->db->get('videos');
        $row = $query->row();
        if (isset($row->vidBanner)) {
            unlink('./public/uploads/thumbnails/'.$row->vidBanner);
        }
        if (isset($row->vibSubtitle)) {
            unlink('./public/uploads/subs/'.$row->vibSubtitle);
        }
        if (isset($row->vidName)) {
            unlink('./public/uploads/movie/'.$row->catId.'/'.$row->vidName);
        }
        
        $success=$this->db->query("DELETE FROM `videos` WHERE `vidId`='".$id."' ");
        if($success){
            
            
            
            
            $actionby=  $this->session->userdata('name');;
            $action='Delete Moview Name: '.$row->vidTitle;
            $idadress=$this->input->ip_address();
            activity($actionby,$action,$idadress);
            
            $this->session->set_flashdata("success","Success to Delete");
            
        }else{
            $this->session->set_flashdata("success","Failed to Delete");
        }
        
        
        redirect('movielist');
    }
    
    
    
    
}

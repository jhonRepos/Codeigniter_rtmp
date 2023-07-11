<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channel_model extends CI_Model {



    function __construct()
    {
        parent::__construct();
    
    }

    public function getChannels(){

        return   $this->db->get('channels')->result();
         
      
    }
    public function getChannelsDetails($Id){
        $this->db->where('Id',$Id);
        return   $this->db->get('channels')->row();
        
        
    }
    
    public function getChannelRow($channel_id){

        $this->db->get_where('channels', array('id' => $channel_id))->row();
    }
    public function addChannel(){
    
        $data = array(
            'name' => $this->input->post('name'),
            'url' => $this->input->post('url'),
            'category' => $this->input->post('category'),
            'thumbnail' => $this->thumbnail(),
        );
        $this->db->insert('channels', $data);
        
        $actionby=  $this->session->userdata('name');;
        $action='Add Channel Name: '.$this->input->post('name');
        $idadress=$this->input->ip_address();
        activity($actionby,$action,$idadress);
        
        

    }

    public function thumbnail(){
  

        $config['upload_path'] = './public/uploads/thumbnails/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '5000';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('thumbnail')) {

            $fileData =    $this->upload->data();
            return $fileData['file_name'];
        } else {
            return 'null';
        }
        
    }

}
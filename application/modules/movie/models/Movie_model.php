<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie_model extends CI_Model {



    function __construct()
    {
        parent::__construct();
    
    }
    
    public function getCategory(){
        
        return   $this->db->get('categories')->result();
        
        
    }
    
    public function addMovie(){
        
        $data = array(
            'catId' => $this->input->post('category'),
            'vidName' => $this->input->post('video_nameses'),
            'vidTitle' => $this->input->post('title'),
            'vidDescription ' => $this->input->post('description'),
            'vidDuration ' => $this->input->post('duration'),
            'vidBanner' => $this->thumbnail(),
            'vibSubtitle' => $this->subtitle(),
        );
        $this->db->insert('videos', $data);
        
        $this->subtitle($vidId);
        
        $actionby=  $this->session->userdata('name');;
        $action='Add Movie Title: '.$this->input->post('title');
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
    public function subtitle(){
        
        
        $config['upload_path'] = './public/uploads/subs/';
        $config['allowed_types'] = 'vtt|srt';
        $config['max_size'] = '5000';
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('subtitle')) {
            
            $fileData =    $this->upload->data();
            return $fileData['file_name'];
        } else {
            return 'null';
        }
        
    }

}
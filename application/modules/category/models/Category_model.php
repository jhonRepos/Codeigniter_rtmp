<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {



    function __construct()
    {
        parent::__construct();
    
    }
    public function addCategory(){
        
        $data = array(
            'catName' => $this->input->post('catName'),
            'catDescription' => $this->input->post('catDescription'),
        
        );
        $this->db->insert('categories', $data);
        $catId=$this->db->insert_id();
        
        $actionby=  $this->session->userdata('name');;
        $action='Add Category Name: '.$this->input->post('catName');
        $idadress=$this->input->ip_address();
        activity($actionby,$action,$idadress);
        
        
        
        $folder_path='./public/uploads/movie/'.$catId;
        mkdir($folder_path);
    }
    
    function editcat(){
        $data = array(
            'catName' => $this->input->post('name'),
            'catDescription' => $this->input->post('des'),
            
        );
        $this->db->where('catId', $this->input->post('id'));
        $this->db->update('categories', $data);
        
        return 'success';
    }
 
}
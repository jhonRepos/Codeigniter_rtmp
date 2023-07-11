<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    
    }

    
	function countChannel(){

		$data=$this->db->query('SELECT COUNT(`id`)as count FROM `channels`')->row();
		return $data->count;
	}

    function countMovie(){

		$data=$this->db->query('SELECT COUNT(`vidId`)as count FROM `videos`')->row();
		return $data->count;
	}
	function countCategory(){
	    
	    $data=$this->db->query('SELECT COUNT(`catId`)as count FROM `categories`')->row();
	    return $data->count;
	}
	
	

}
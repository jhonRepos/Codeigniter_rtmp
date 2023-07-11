<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {



    function __construct()
    {
        parent::__construct();
    
    }

    public function validate($username,$password){

        
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $result = $this->db->get('users',1);

        return $result;
      
    }

}
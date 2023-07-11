<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if ( ! function_exists('activity')){
    
    
    function activity($actionby,$action,$idadress){
        $ci =& get_instance();

        
        $logs=array(
            'actiobBy'          =>$actionby,
            'action'         =>$action,
            'ipaddress'         =>$idadress,
        );
        
        $ci->db->insert('activity_logs',$logs);
        
     
        
        
       }
       
       
       
      
   }
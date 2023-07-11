<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rtmp extends CI_Controller {

    public function index()
    {
//         $data['channels'] = $this->db->get('channels')->result();
//         $this->load->view('templates/Header');
// 		$this->load->view('templates/NavHead');
// 		$this->load->view('templates/NavSide');
//         $this->load->view('rtmp_view',  $data);
// 		$this->load->view('templates/Footer');
        $this->load->view('player');
    }

    public function play($channel_id) {
//         $channel = $this->db->get_where('channels', array('id' => $channel_id))->row();
//         if ($channel) {
//             $data['channel'] = $channel;
//             $this->load->view('templates/Header');
//             $this->load->view('templates/NavHead');
//             $this->load->view('templates/NavSide');
//             $this->load->view('play_view',  $data);
//             $this->load->view('templates/Footer');
//         } else {
//             show_404();
//         }


    }


    public function live()
    {
        header('Content-Type: application/x-mpegURL');
        header('Access-Control-Allow-Origin: *');
        echo file_get_contents('https://rtmp.jomalig.com:1888/hls/live.m3u8');
    }
    
}

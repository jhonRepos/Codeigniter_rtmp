<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	function __construct()
	{

		parent::__construct();
		$this->load->model('Homepage_model');
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
	    $data['countChannel'] = $this->Homepage_model->countChannel();
	    $data['countMovie'] = $this->Homepage_model->countMovie();
	    $data['countCategory'] = $this->Homepage_model->countCategory();
		$this->load->view('templates/Header');
		$this->load->view('templates/NavHead');
		$this->load->view('templates/NavSide');
		$this->load->view('homepage_view',$data);
		$this->load->view('templates/Footer');

	  
	}


}

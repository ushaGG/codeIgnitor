<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$admin = $this->session->userdata('admin');
		if(empty($admin)){
			$this->session->set_flashdata('msg','Your session has been expired');
			redirect(base_url().'index.php/admin/login/index');

		}
	}

	public function index()
	{
		$this->session->userdata('admin');
		$this->load->view('admin/dashboard');
	}
}

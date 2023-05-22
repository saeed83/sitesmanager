<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('role'))
			redirect('Login');
	}

	public function userDashboard()
	{
		$data['news'] = $this->Queries->get_news();
		$this->load->view('Dashboard/main');
	}
}

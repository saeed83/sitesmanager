<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data['all_news'] = $this->Queries->get_news();

		$this->load->view('Main/index',$data);
	}
}

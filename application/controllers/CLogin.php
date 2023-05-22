<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author @psydoz
 */
class CLogin extends CI_Controller
{
	public function index()
	{
		if (!$this->session->userdata('role_permission')) {
			$this->load->view('Login/main');
		} else {
			redirect('Dashboard');
		}
	}

	public function userLogin()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Login/main');
		} else {

			$userName = html_escape($this->security->xss_clean($this->input->post('username')));
			$userPass = html_escape($this->security->xss_clean($this->input->post('password')));
			$result = $this->Login->can_login($userName, $userPass);
		
			if ($result == 'done') {
				redirect('Dashboard');
			} else {
				$this->session->set_flashdata('message', $result);
				$this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
				$this->load->view('Login/main');
			}
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CNews extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('role'))
			redirect('Login');
	}


	public function index()
	{
		$data['all_news'] = $this->Queries->get_news();
		$data['title'] = "All News";

		$this->load->view('Dashboard/news', $data);
	}

	public function view_news($id)
	{
		$data['news'] = $this->Queries->get_news($id);
		$this->load->view('Dashboard/news_view', $data);
	}


	public function add_new()
	{
		$data['title'] = "Add new";

		$this->load->view('Dashboard/add', $data);
	}


	public function edit_news($id)
	{
		$data['title'] = "Edit";
		$data['news'] = $this->Queries->get_news($id);
		$this->load->view('Dashboard/edit', $data);
	}

	public function save_news()
	{
		$data['title'] = "Add new";

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');

		$title = html_escape($this->security->xss_clean($this->input->post('title')));
		$body = html_escape($this->security->xss_clean($this->input->post('body')));
		$date_time = html_escape($this->security->xss_clean($this->input->post('date')));

		$aktiv = $this->input->post('aktiv');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Dashboard/add',$data);
		} else {

			// -- Upload config
			$config['upload_path']		=	'assets/uploads/';
			$config['allowed_types']	=	'jpg|jpeg|png';
			$config['max_size']			=	20240;
			$config['file_name']		=	date("Ymd") . "_" . uniqid(); // i can put any name for this image.
			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('image')) {
				$data['error'] = array('error' => $this->upload->display_errors());

				return $this->load->view('Dashboard/add', $data);
			} else {
				$upload_data = $this->upload->data();
				$img = $upload_data['file_name'];
			}

			$aktiv_box = empty($aktiv) ? 0 : 1;

			$news_array = array(
				'title' => $title,
				'body' => $body,
				'image' => $img,
				'aktiv' => $aktiv_box,
				'date' => date('Y-m-d',strtotime($date_time)),
				'created_at' => date('Y-m-d', time()),
			);
			
			$insert_article = $this->Queries->insert($news_array, " articles");
			redirect('News', 'refresh');
		}
	}

	public function update_news()
	{

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		$id = html_escape($this->security->xss_clean($this->input->post('id')));
		$news_array = $this->Queries->get_news($id);


		$title = html_escape($this->security->xss_clean($this->input->post('title')));
		$body = html_escape($this->security->xss_clean($this->input->post('body')));
		$date_time = html_escape($this->security->xss_clean($this->input->post('date')));

		$aktiv = $this->input->post('aktiv');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Dashboard/edit');
		} else {

			if ($_FILES['image']['size'] == 0) {
				$img = $news_array['image'];
			} else {
				// -- Upload config
				$config['upload_path']		=	'assets/uploads/';
				$config['allowed_types']	=	'jpg|jpeg|png';
				$config['max_size']			=	20240;
				$config['file_name']		=	date("Ymd") . "_" . uniqid(); // i can put any name for this image.
				$this->load->library('upload', $config);

				$this->upload->initialize($config);

				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());

					return $this->load->view('Dashboard/edit', $error);
				} else {
					$upload_data = $this->upload->data();
					$tmp_img = FCPATH .'assets/uploads/'.$news_array['image'];
					
					unlink($tmp_img);
					$img = $upload_data['file_name'];
				}
			}
			$aktiv_box = empty($aktiv) ? 0 : 1;
			$news_array = array(
				'title' => $title,
				'body' => $body,
				'image' => $img,
				'date' => date('Y-m-d', strtotime($date_time)),
				'created_at' => date('Y-m-d', time()),
				'aktiv' => $aktiv_box,
			);

			$update_article = $this->Queries->update($id,$news_array,"articles");
			redirect('News', 'refresh');
		}
	}

	public function delete_news($id){
		$news_array = $this->Queries->get_news($id);
		$tmp_img = FCPATH .'assets/uploads/'.$news_array['image'];
		unlink($tmp_img);

		$delete = $this->Queries->delete($id);
		redirect('News', 'refresh');

	}
}
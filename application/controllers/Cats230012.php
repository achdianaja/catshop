<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cats230012 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cats230012_model');
	}

	public function index()
	{
		$data['cats'] = $this->Cats230012_model->read();
		$this->load->view('cats/cats_list_230012', $data);
	}

	public function add()
	{
		if($this->input->post('submit')){
			$this->load->model('Cats230012_model');
			$this->Cats230012_model->create();
			redirect('/');
		}

		$this->load->view('cats/cats_form_230012');
	}

	public function edit($id)
	{
		if($this->input->post('submit')){
			$this->Cats230012_model->update($id);
			redirect('/');
		}

		$data['cat'] = $this->Cats230012_model->read_by($id);
		$this->load->view('cats/cats_edit_230012', $data);
	}

	public function delete($id)
	{
		$this->Cats230012_model->delete($id);
		redirect('/');
	}
}

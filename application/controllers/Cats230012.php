<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cats230012 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cats230012_model');
		$this->load->model('Category230012_model');
	}

	public function index()
	{
		$data['cats'] = $this->Cats230012_model->read();
		$this->load->view('cats/cats_list_230012', $data);
	}

	public function add()
	{
		if($this->input->post('submit')){
			if($this->Cats230012_model->validation()){
				$this->Cats230012_model->create();
				if($this->db->affected_rows() > 0){
					$this->session->set_flashdata('msg', '<p style="color:green">Cat successfuly added!</p>');
				} else {
					$this->session->set_flashdata('msg', '<p style="color:red">Cat failed to added!</p>');
				}

				redirect('/cats230012');
			}	
		}

		$data['category'] = $this->Category230012_model->read();
		$this->load->view('cats/cats_form_230012', $data);
	}

	public function edit($id)
	{
		if($this->input->post('submit')){
			if($this->Cats230012_model->validation()){
				$this->Cats230012_model->update($id);
				if($this->db->affected_rows() > 0){
					$this->session->set_flashdata('msg', '<p style="color:green">Cat successfuly updated!</p>');
				} else {
					$this->session->set_flashdata('msg', '<p style="color:red">Cat failed to updated!</p>');
				}
				redirect('/cats230012');
			}
		}

		$data['category'] = $this->Category230012_model->read();
		$data['cat'] = $this->Cats230012_model->read_by($id);
		$this->load->view('cats/cats_form_230012', $data);
	}

	public function delete($id)
	{
		$this->Cats230012_model->delete($id);
		if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('msg', '<p style="color:green">Cat successfuly deleted!</p>');
			} else {
				$this->session->set_flashdata('msg', '<p style="color:red">Cat failed to deleted!</p>');
			}
		redirect('/cats230012');
	}

	public function sale($id)
	{
		if(!$this->session->userdata('username_230012')) redirect('auth230012/login');
		if($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

		if($this->input->post('submit')){
			if($this->Cats230012_model->validate_sale()){
				$this->Cats230012_model->sale($id);
				if($this->db->affected_rows() > 0){
					$this->session->set_flashdata('msg', '<p style="color:green">Cat successfully sold!</p>');
				} else {
					$this->session->set_flashdata('msg', '<p style="color:red">Cat failed to sell!</p>');
				}

				redirect('/cats230012');
			}
		}

		$data['cat'] = $this->Cats230012_model->read_by($id);
		$this->load->view('cats/cats_sale_230012', $data);
	}

	public function sales()
	{
		if(!$this->session->userdata('username_230012')) redirect('auth230012/login');
		if($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

		$data['sales'] = $this->Cats230012_model->sales();
		$this->load->view('cats/sale_list_230012', $data);
	}
}

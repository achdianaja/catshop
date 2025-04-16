<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Category230012 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category230012_model');
    }

    public function index()
	{
		$data['category'] = $this->Category230012_model->read();
		$this->load->view('categories/category_list_230012', $data);
	}

	public function add()
	{
		if ($this->Category230012_model->validate() == FALSE) {
			$this->load->view('categories/category_form_230012');
		} else {
			$this->Category230012_model->create();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<p style="color:green">Category successfully added!</p>');
			} else {
				$this->session->set_flashdata('msg', '<p style="color:red">Category failed to add!</p>');
			}
			redirect('/category230012');
		}
	}

	public function edit($id)
	{
		if ($this->Category230012_model->validate() == FALSE) {
			$data['category'] = $this->Category230012_model->read_by($id);
			$this->load->view('categories/category_form_230012', $data);
		} else {
			$this->Category230012_model->update($id);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<p style="color:green">Category successfully updated!</p>');
			} else {
				$this->session->set_flashdata('msg', '<p style="color:red">Category failed to update!</p>');
			}
			redirect('/category230012');
		}
	}

	public function delete($id)
	{
		$this->Category230012_model->delete($id);
		if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('msg', '<p style="color:green">Category successfuly deleted!</p>');
			} else {
				$this->session->set_flashdata('msg', '<p style="color:red">Category failed to deleted!</p>');
			}
		redirect('/category230012');
	}
}

/* End of file Category230012.php and path \application\controllers\Category230012.php */

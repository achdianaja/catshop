<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User230012 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User230012_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
		if(!$this->session->userdata('username_230012')) redirect('auth230012/login');
		if($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

        $data['users'] = $this->User230012_model->read();
        $this->load->view('users/user_list_230012', $data);
    }

    public function add()
    {
        if(!$this->session->userdata('username_230012')) redirect('auth230012/login');
		if($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

        if($this->input->post('submit')){
            if($this->User230012_model->validate()){
                $this->User230012_model->create();

                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('msg', '<div style="color:green;">User added successfully!</div>');
                    redirect('user230012');
                } else {
                    $this->session->set_flashdata('msg', '<div style="color:red;">Failed to add user</div>');
                    redirect('user230012/add');
                }
                redirect('user230012');
            }
        }

        $this->load->view('users/user_form_230012');
    }

    public function edit($id)
    {
        if(!$this->session->userdata('username_230012')) redirect('auth230012/login');
		if($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

        if($this->input->post('submit')){
            if($this->User230012_model->validate()){
                $this->User230012_model->update($id);

                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('msg', '<div style="color:green;">User successfully updated!</div>');
                    redirect('user230012');
                } else {
                    $this->session->set_flashdata('msg', '<div style="color:red;">Failed to update user!</div>');
                    redirect('user230012/add');
                }
                redirect('user230012');
            }
        }
        $data['users'] = $this->User230012_model->read_by($id);

        $this->load->view('users/user_form_230012', $data);
    }

    public function delete($id)
    {
        $this->User230012_model->delete($id);
        $this->session->set_flashdata('msg', '<div style="color:green;">User deleted successfully</div>');
        redirect('user230012');
    }

    public function reset_password($id)
    {
        $user = $this->User230012_model->read_by($id);
        $usertype = $user->usertype_230012;

        $this->User230012_model->reset_password($id, $usertype);
        
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msg', '<div style="color:green;">Password berhasil direset</div>');
        } else {
            $this->session->set_flashdata('msg', '<div style="color:red;">Gagal mengubah password</div>');
        }

        return redirect('user230012');
    }
}

/* End of file User230012.php and path \application\controllers\User230012.php */

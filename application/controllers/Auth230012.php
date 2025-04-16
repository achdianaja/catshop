<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth230012 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth230012_model');
        $this->load->library('form_validation');
    }

    public function login()
    {
        if ($this->input->post('login') && $this->validate('login')) {
            $login = $this->Auth230012_model->getUser($this->input->post('username_230012'));

            if ($login != NULL) {
                if (password_verify($this->input->post('password_230012'), $login->password_230012)) {
                    $data = array(
                        'username_230012' => $login->username_230012,
                        'fullname_230012' => $login->fullname_230012,
                        'usertype_230012' => $login->usertype_230012,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data);

                    $this->session->set_flashdata('msg', '<div style="color:green;">Login berhasil</div>');
                    redirect('welcome');
                } else {
                    $this->session->set_flashdata('msg', '<div style="color:red;">Password salah</div>');
                }
            } else {
                $this->session->set_flashdata('msg', '<div style="color:red;">Username tidak ditemukan</div>');
            }
        }

        $this->load->view('auth/form_login_230012');
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth230012/login');
    }

    public function changepassword()
    {
        if(!$this->session->userdata('username_230012')) redirect('auth230012/login');

        if($this->input->post('change') && $this->validate('change')) {
            $login = $this->Auth230012_model->getUser($this->session->userdata('username_230012'));

            if (password_verify($this->input->post('old_password_230012'), $login->password_230012)) {
                $this->Auth230012_model->change_password($login->id_230012);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('msg', '<div style="color:green;">Password berhasil diubah</div>');
                } else {
                    $this->session->set_flashdata('msg', '<div style="color:red;">Gagal mengubah password</div>');
                }
            } else {
                $this->session->set_flashdata('msg', '<div style="color:red;">Password lama salah</div>');
            }
            
        }

        $this->load->view('auth/form_change_password_230012');
    }

    public function validate($type)
    {
        $this->load->library('form_validation');

        if($type == 'login') {
            $this->form_validation->set_rules('username_230012', 'Username', 'required');
            $this->form_validation->set_rules('password_230012', 'Password', 'required');
        } else {
            $this->form_validation->set_rules('old_password_230012', 'Old Password', 'required');
            $this->form_validation->set_rules('new_password_230012', 'New Password', 'required');
        }

        if($this->form_validation->run()){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

/* End of file Auth230012.php and path \application\controllers\Auth230012.php */

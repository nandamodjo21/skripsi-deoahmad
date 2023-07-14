<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');

    }
    

    public function index()
    {
        // if ($this->session->userdata('email')) {
        //     redirect('user');
        // }

        $this->form_validation->set_rules('user', 'user', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            // $data['title'] = 'RSUD BOLIYOHUTO';
            // $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            // $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('user');
        $password = $this->db->query("SELECT md5('" . $this->input->post('password') . "') as pass")->row_array();

        $wr = array(

            'username' => $email
        );

        $user = $this->db->get_where('t_login', $wr)->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if ($password['pass'] == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'id_role' => $user['id_role']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_role'] == 1) {
                        redirect('materi');
                    } else if ($user['id_role'] == 2) {
                        redirect('soal');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('login');
    }

}
 
   
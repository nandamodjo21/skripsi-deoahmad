<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_prodi');
    }
    public function index()
    {
        $data['title'] = 'Halaman Data Periode';
        $data['t_prodi'] = $this->M_prodi->SemuaData()->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/v_prodi', $data);
        $this->load->view('templates/footer');
    }
    public function addProdi(){
        $prodi = $this->input->post('prodi');

        $data = [
            'prodi' => $prodi
        ];

        $this->db->insert('t_prodi',$data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Sukses!
        </div>');
        redirect('prodi');
    }
}
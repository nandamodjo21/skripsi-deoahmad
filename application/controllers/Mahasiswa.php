<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_mahasiswa');
    }
    public function index()
    {
        $data['title'] = 'Halaman Data Mahasiswa';
        $data['t_mahasiswa'] = $this->M_mahasiswa->SemuaData()->result_array();
        $data['biodata'] = $this->M_mahasiswa->getBiodata();
        $data['prodi'] = $this->M_mahasiswa->getProdi();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/v_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function addMahasiswa(){
        $nim = $this->input->post('nim');
        $nama = $this->input->post('mahasiswa');
        $prodi = $this->input->post('prodi');

        $data = [
            'nim' => $nim,
            'id_biodata' => $nama,
            'id_prodi' => $prodi
        ];

        $this->db->insert('t_mahasiswa',$data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Sukses!
        </div>');
        redirect('mahasiswa');
    }
    public function hapus_data($nim)
    {
        $this->M_mahasiswa->hapus_data($nim);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Data Telah Berhasil Di Hapus!</div>');
        redirect('mahasiswa');
    }
}
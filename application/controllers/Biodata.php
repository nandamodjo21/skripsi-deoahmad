<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_biodata');
    }
    public function index()
    {
        $data['title'] = 'Halaman Data Periode';
        $data['t_biodata'] = $this->M_biodata->SemuaData()->result_array();
        $data['jenis'] = $this->M_biodata->getJk()->result_array();
        $data['agama'] = $this->M_biodata->getAgama()->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/v_biodata', $data);
        $this->load->view('templates/footer');
    }
    public function addBiodata(){
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $agama = $this->input->post('agama');

        $data = [
            'nik' => $nik,
            'nama_lengkap' => $nama,
            'jk' => $jk,
            'id_agama' => $agama
        ];

        $this->db->set('id_biodata','UUID()', false);
        $this->db->insert('t_biodata',$data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Sukses!
        </div>');
        redirect('biodata');
    }
    public function hapus_data($id_biodata)
    {
        $this->M_biodata->hapus_data($id_biodata);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Materi Telah Berhasil Di Hapus!</div>');
        redirect('biodata');
    }
}
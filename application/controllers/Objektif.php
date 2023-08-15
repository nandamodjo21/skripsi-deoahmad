<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objektif extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_objektif');
    }

    public function index()
    {
        $data['title'] = 'Halaman Data objektif';
        $data['t_objektif'] = $this->M_objektif->SemuaData();
        $data['nilai'] = $this->M_objektif->nilai()->result_array();
        // $data['soal'] = $this->M_objektif->SemuaSoal();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('objektif/index', $data);
        $this->load->view('templates/footer');   
    }

   

    public function proses_tambah_data()
    {
        $this->M_objektif->proses_tambah_data();
        $this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert"> Berhasil Menambahkan objektif</div>');
        redirect('objektif');
    }

    public function hapus_data($id_jawaban)
    {
        $this->M_objektif->hapus_data($id_jawaban);
        $this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert"> jawaban Telah Berhasil Di Hapus!</div>');
        redirect('objektif');
    }

  

    public function proses_edit_data($id_objektif)
    {
        $this->M_objektif->proses_edit_data($id_objektif);
        $this->session->set_flashdata('data' , '<div class="alert alert-success" role="alert">
                                        objektif Telah Berhasil Di Edit!
                                        </div>');
        redirect('objektif');
    }

    public function nilai(){
        $nilai = $this->input->post('nilai');
        $id_jawaban = $this->input->post('id');

        $data = [
            'id_nilai' => $nilai
        ];
        $where = [
            'id_jawaban' => $id_jawaban
        ];

        $this->M_objektif->updateData($where,$data,'t_jawaban');
        $this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert"> Berhasil memberikan nilai!</div>');
        redirect('objektif');
        
    }
}
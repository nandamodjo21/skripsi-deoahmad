<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_soal');
        $this->load->model('M_materi');
    }

    public function index()
    {
        $data['title'] = 'Halaman Data Soal';
        $data['t_soal'] = $this->M_soal->SemuaData();
        $data['materi'] = $this->M_materi->SemuaData();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('soal/soal', $data); 
        $this->load->view('templates/footer');
        
    }
   
    public function proses_tambah_data()
    {
        $this->M_soal->proses_tambah_data();
        redirect('soal');
    }

    public function hapus_data($id_soal)
    {
        $this->M_soal->hapus_data($id_soal);
        redirect('soal');
    }

   

    public function proses_edit_data($id_soal)
    {
        $this->M_soal->proses_edit_data($id_soal);
        redirect('soal');
    }
}
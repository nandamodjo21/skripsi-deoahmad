<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_penilaian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_proses_penilaian');
    }
    public function index()
    {
        $data['title'] = 'Halaman Data penilaian';
        $data['t_proses_penilaian'] = $this->M_proses_penilaian->SemuaData();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('proses_penilaian/index', $data);
        $this->load->view('templates/footer');
    }
}
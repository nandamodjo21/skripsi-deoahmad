<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_periode');
    }
    public function index()
    {
        $data['title'] = 'Halaman Data Periode';
        $data['t_periode'] = $this->M_periode->SemuaData();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('periode/index', $data);
        $this->load->view('templates/footer');
    }
}
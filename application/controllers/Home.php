<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {
        $data['title'] = 'HOME';
       
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/home', $data);
        $this->load->view('templates/footer');
    }
}
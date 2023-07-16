<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
    }

    public function index()
    {
        // Mendapatkan data dari REST API Spring Boot
        $url = 'http://localhost:8081/api/todo';
        $response = $this->curl->simple_get($url);
        $data = json_decode($response);

        // Memuat view dan mengirim data
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('todo/todo', ['data' => $data]);
        $this->load->view('templates/footer');
        
    }
}
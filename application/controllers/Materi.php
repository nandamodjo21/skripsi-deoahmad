<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_materi');
        $this->load->helper('url');
        $this->load->library('curl');
    }


    public function index()
    {
        $data['title'] = 'Halaman Data Materi';
        $data['t_materi'] = $this->M_materi->SemuaData();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('materi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data()
    {
        $data['t_////materi'] = $this->M_materi->SemuaData();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('materi/tambah_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah_data()
    {
        $m = $this->input->post('materi');
        $apiurl = 'http://localhost:8089/api/upload';
        $config['upload_path'] = './uploads/'; // Tentukan direktori penyimpanan file
        $config['allowed_types'] = 'pdf|doc|docx'; // Jenis file yang diizinkan (dalam contoh ini, PDF, DOC, dan DOCX)
        $config['min_size'] = 1048; // Ukuran maksimum file dalam kilobita
        $this->load->library('upload', $config);


        //kondisi upload
        if ($this->upload->do_upload('userfile')) {
            // Jika upload berhasil, lakukan sesuatu seperti menyimpan data ke database atau menampilkan pesan sukses
            $file = $this->upload->data();
            $file_path = $file['full_path'];
            $nama_file = $file['file_name'];
            $data = array(
                'materi' => $m,
                'file_materi' => new CURLFile($file_path, 'application/pdf', $nama_file)
            );
           
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiurl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            echo $response;
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Berhasil Menambahkan Materi</div>');
            redirect('materi');

        } else {
            // Jika upload gagal, tampilkan pesan error
            $error = $this->upload->display_errors();
            echo $error;
        }    
       
    }

    public function hapus_data($id_materi)
    {
        $this->M_materi->hapus_data($id_materi);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Materi Telah Berhasil Di Hapus!</div>');
        redirect('materi');
    }

    public function edit_data($id_materi)
    {
        $data['t_materi'] = $this->M_materi->ambil_id_materi_materi($id_materi);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('materi/edit_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_edit_data($id_materi)
    {
        $this->M_materi->proses_edit_data($id_materi);
        $this->session->set_flashdata('data', '<div class="alert alert-success" role="alert">
                                        Materi Telah Berhasil Di Edit!
                                        </div>');
        redirect('materi');
    }
}
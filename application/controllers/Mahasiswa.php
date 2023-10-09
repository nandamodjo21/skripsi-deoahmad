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
        $data['agama'] = $this->M_mahasiswa->agama()->result_array();
        $data['jenis'] = $this->M_mahasiswa->jk()->result_array();
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

    public function editMahasiswa(){
        $id = $this->input->post('idmhs');
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $agama = $this->input->post('agama');


       $data = array(
        'nim' => $nim,
        'nama_lengkap' => $nama,
        'jk' => $jk,
        'agama' => $agama
       );

       $where = array(
        'id_login' => $id
       );

       $this->M_mahasiswa->updateMhs($where,$data,'t_login');
       $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Oke Data Berhasil Di Ubah!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('mahasiswa');
    }
}
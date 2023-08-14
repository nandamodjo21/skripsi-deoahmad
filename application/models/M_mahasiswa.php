<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{

    public function SemuaData(){
        return $this->db->query("SELECT m.nim, b.nama_lengkap, p.prodi, m.status_mhs FROM t_mahasiswa m, t_biodata b, t_prodi p WHERE m.id_biodata=b.id_biodata AND m.id_prodi=p.id_prodi ORDER BY m.nim ASC");
    }

    public function getProdi(){
        return $this->db->query("SELECT * FROM t_prodi")->result_array();
    }
    public function getBiodata(){
        return $this->db->query("SELECT * FROM t_biodata")->result_array();
    }
    public function hapus_data($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->delete('t_mahasiswa');
    }

}
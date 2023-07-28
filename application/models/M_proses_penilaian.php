<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_proses_penilaian extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->query("SELECT m.nim,b.nama_lengkap,pr.prodi,p.* FROM `t_proses_penilaian` p LEFT JOIN t_mahasiswa m ON(p.nim=m.nim) LEFT JOIN t_biodata b ON(m.nik=b.id_biodata) JOIN t_prodi pr ON(m.id_prodi=pr.id_prodi)")->result_array();
    }
}
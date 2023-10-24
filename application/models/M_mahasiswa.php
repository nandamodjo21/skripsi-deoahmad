<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{

    public function SemuaData(){
        return $this->db->query("SELECT l.*, j.*,a.*, CASE WHEN l.status_mhs = 0 THEN 'tidak aktif' WHEN l.status_mhs = 1 THEN 'Aktif' END AS status  FROM `t_login` l, t_agama a, t_jenis_kelamin j WHERE a.id_agama=l.agama AND j.id_jk=l.jk");
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

    public function agama(){
        return $this->db->get('t_agama');
    }
    public function jk(){
        return $this->db->get('t_jenis_kelamin');
    }
    public function updateMhs($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data, $where);
    }
    // SELECT b.nama_lengkap,b.nik,j.jenis_kelamin, a.agama,
    // CASE
    // WHEN m.status_mhs = 1 THEN 'aktif'
    // WHEN m.status_mhs = 0 THEN 'tidak aktif'
    // END AS status, p.prodi FROM `t_mahasiswa` m, t_biodata b, t_jenis_kelamin j, t_agama a, t_prodi p WHERE m.id_biodata=b.id_biodata AND b.jk=j.id_jk AND b.id_agama=a.id_agama AND m.id_prodi=p.id_prodi order by m.idmhs ASC
}
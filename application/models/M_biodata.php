<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_biodata extends CI_Model
{

    public function SemuaData(){
        return $this->db->query("SELECT b.*, j.jenis_kelamin, a.agama FROM `t_biodata` b, t_jenis_kelamin j, t_agama a WHERE b.jk=j.id_jk AND b.id_agama=a.id_agama ORDER BY b.id_biodata ASC;");
    }

    public function getJk(){
        return $this->db->query("SELECT * FROM t_jenis_kelamin");
    }
    public function getAgama(){
        return $this->db->query("SELECT * FROM t_agama");
    }
    public function hapus_data($id_biodata)
    {
        $this->db->where('id_biodata', $id_biodata);
        $this->db->delete('t_biodata');
    }

    public function getNim(){
        return $this->db->query('SELECT * FROM t_biodata');
    }

   

}
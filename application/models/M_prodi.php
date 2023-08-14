<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prodi extends CI_Model
{

    public function SemuaData(){
        return $this->db->query("SELECT * FROM t_prodi ORDER BY id_prodi ASC;");
    }

}
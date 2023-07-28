<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_periode extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->query("SELECT p.*, pr.prodi FROM `t_periode` p, t_prodi pr WHERE pr.id_prodi=p.id_prodi")->result_array();
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_periode extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('t_periode')->result_array();
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_materi extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('t_materi')->result_array();
    }

    public function proses_tambah_data($data,$table)
    {
       
        $this->db->set('id_materi', 'uuid()', false);
        $this->db->insert($table, $data);
    }

    public function hapus_data($id_materi)
    {
        $this->db->where('id_materi', $id_materi);
        $this->db->delete('t_materi');
    }

    public function ambil_id_materi_materi($id_materi)
    {
        return $this->db->get_where('t_materi', ['id_materi' => $id_materi])->row_array();
    }

    public function proses_edit_data($id)
    {
        $data = array(
            "materi" => $this->input->post('materi')
        );
        $this->db->where('id_materi', $id);
        $this->db->update('t_materi', $data);
    }
}
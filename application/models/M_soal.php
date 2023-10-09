<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_soal extends CI_Model
{
    public function SemuaData()
    {
       return $this->db->query("select s.id_soal,s.soal,DATE_FORMAT(s.created_at,'%d-%m-%Y') AS tanggal,CASE when s.status = 0 then 'Tidak aktif' when s.status = 1 then 'Aktif' end as status ,m.materi from t_soal s
       , t_materi m 
       where m.id_materi=s.id_materi;")->result_array();
    }
    public function proses_tambah_data()
    {
        $data = [
        
            "id_materi" => $this->input->post('materi'),
            "soal" => $this->input->post('soal'),
            "status" => $this->input->post('status'),
            "created_at" => date('Y-m-d H:i:s.u')

        ];

            $this->db->set('id_soal','uuid()',false);
            
        $this->db->insert('t_soal' , $data);
    }

    public function hapus_data($id_soal)
    {
        $this->db->where('id_soal' ,$id_soal);
        $this->db->delete('t_soal');
    }
    public function ambil_id_soal($id_soal)
    {
        return $this->db->get_where('soal', ['id_soal' => $id_soal])-> row_array();
    }
 
    public function proses_edit_data($id)
    {
        $data = [
            "id_materi" => $this->input->post('materi'),
            "soal" => $this->input->post('soal'),
            "status" => $this->input->post('status')
        ];
        $this->db->where('id_soal', $id);
        $this->db->update('t_soal' , $data);
    }
}
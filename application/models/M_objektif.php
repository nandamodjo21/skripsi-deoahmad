<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_objektif extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->query("SELECT j.id_jawaban,m.materi,s.soal,DATE_FORMAT(s.created_at, '%Y-%m-%d %H:%i:%s') AS waktu_mulai, l.nama_lengkap,j.jawaban, CASE
        WHEN n.nilai IS NULL THEN 'belum di nilai'
        ELSE n.nilai
    END AS nilai, DATE_FORMAT(j.createt_at, '%Y-%m-%d %H:%i:%s') AS waktu_selesai FROM `t_jawaban` j LEFT JOIN t_soal s ON(j.id_soal=s.id_soal) LEFT JOIN t_materi m ON(s.id_materi=m.id_materi) LEFT JOIN t_nilai n ON(j.id_nilai=n.id_nilai) LEFT JOIN t_login l ON(j.id_user=l.id_login)
    ")->result_array();
    }
    

    public function SemuaSoal()
    {
        return $this->db->query('select s.* from t_soal s where s.id_soal not in(select id_soal from t_objektif ) and status="1"')->result_array();
    }


    public function proses_tambah_data()
    {
        // Mengambil data dari form
        $id_soal = $this->input->post('soal');
        $objektif = $this->input->post('objektif');
        $jawaban = $this->input->post('jawaban');

        // Memeriksa apakah terdapat data objektif yang diinputkan
        if (!empty($objektif)) {
            // Membuat array untuk menyimpan data objektif dan jawaban
            $data = array();

            // Menentukan jumlah data objektif yang diinputkan
            $num_objektif = count($objektif);

            // Mengisi array dengan data objektif dan jawaban yang diinputkan
            for ($i = 0; $i < $num_objektif; $i++) {
                $data[$i] = array(
                    'id_soal' => $id_soal,
                    'objektif' => $objektif[$i],
                    'jawaban' => $jawaban[$i]
                );
            }

            // Menyimpan data ke dalam tabel t_objektif
            $this->db->insert_batch('t_objektif', $data);
        }
    }



    public function hapus_data($id_jawaban)
    {
        $this->db->where('id_jawaban', $id_jawaban);
        $this->db->delete('t_jawaban');
    }

    public function ambil_id_objektif($id_objektif)
    {
        return $this->db->get_where('t_objektif', ['id_objektif' => $id_objektif])->row_array();
    }

    public function proses_edit_data($id)
    {
        // Mengambil data dari form
        $objektif = $this->input->post('objektif');
        $jawaban = $this->input->post('jawaban');

        // Memeriksa apakah terdapat data objektif yang diinputkan
        if (!empty($objektif)) {
            // Membuat array untuk menyimpan data objektif dan jawaban
            $data = array();

            // Menentukan jumlah data objektif yang diinputkan
            $num_objektif = count($objektif);

            // Mengisi array dengan data objektif dan jawaban yang diinputkan
            for ($i = 0; $i < $num_objektif; $i++) {
                $data[$i] = array(
                    'objektif' => $objektif[$i],
                    'jawaban' => $jawaban[$i]
                );
            }

            // Memperbarui data di tabel t_objektif berdasarkan id_soal
            $this->db->update_batch('t_objektif', $data, $id);
        }
    }

    public function nilai(){
        return $this->db->get('t_nilai');
    }

    public function updateData($where,$data,$table){

        $this->db->where($where);
        $this->db->update($table,$data);

         }
}
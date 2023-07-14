<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_objektif extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->query("SELECT s.id_soal, s.soal, 
    GROUP_CONCAT(o.objektif ORDER BY o.objektif SEPARATOR ',') AS objektif, 
    GROUP_CONCAT(o.jawaban ORDER BY o.objektif SEPARATOR ',') AS jawaban
FROM t_objektif o
JOIN t_soal s ON s.id_soal = o.id_soal
WHERE s.status='1'
GROUP BY s.id_soal 
ORDER BY s.id_soal, objektif;
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



    public function hapus_data($id_objektif)
    {
        $this->db->where('id_soal', $id_objektif);
        $this->db->delete('t_objektif');
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
}
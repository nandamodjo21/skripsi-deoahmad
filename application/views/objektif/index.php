<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Data Jawaban
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan') ?>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Mahasiswa</td>
                            <td>Materi</td>
                            <td>Soal</td>
                            <td>Jawaban</td>
                            <td>Nilai</td>
                            <td>Waktu Mulai</td>
                            <td>Waktu Selesai</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>

                    <body>
                        <?php
            $no = 1;
            foreach ($t_objektif as $tm) : ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?= $tm['nama_lengkap'];?></td>
                            <td><?= $tm['materi'];?></td>
                            <!-- Kolom Soal -->
                            <td>
                                <ol>
                                    <?php
        $soal = $tm['soal']; // Ambil teks soal dari $tm['soal']
        $soalArray = explode("\r\n", $soal); // Split teks soal berdasarkan newline (\r\n)
        foreach ($soalArray as $line) {
            echo "<li>" . $line . "</li>"; // Menampilkan setiap baris soal sebagai elemen dalam ordered list
        }
        ?>
                                </ol>
                            </td>

                            <!-- Kolom Jawaban -->
                            <td>
                                <ol>
                                    <?php
        $jawaban = $tm['jawaban']; // Ambil teks jawaban dari $tm['jawaban']
        $jawabanArray = explode(",", $jawaban); // Split teks jawaban berdasarkan koma
        foreach ($jawabanArray as $line) {
            echo "<li>" . $line . "</li>"; // Menampilkan setiap baris jawaban sebagai elemen dalam ordered list
        }
        ?>
                                </ol>
                            </td>

                            <td><?= $tm['nilai'];?></td>
                            <td><?= $tm['waktu_mulai'];?></td>
                            <td><?= $tm['waktu_selesai'];?></td>


                            <td>
                                <?php if ($tm['nilai'] == 0) : ?>
                                <a href="" data-toggle="modal" data-target="#nilaiModal<?php echo $tm['id_jawaban']; ?>"
                                    class="badge badge-success">nilai</a>
                                <?php endif; ?>

                                <a href="<?php echo base_url() ?>Objektif/hapus_data/<?php echo $tm['id_jawaban']; ?>"
                                    class="badge badge-danger">Hapus</a>

                            </td>


                        </tr>
                        <?php endforeach; ?>

            </div>
            <!-- /.container-fluid -->
            </body>
            </table>

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!-- Modal 
Untuk tambah Data -->
<!-- Button trigger modal -->


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="nilaiModal<?= $tm['id_jawaban']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Beri Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('objektif/nilai/'.$tm['id_jawaban']);?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?= $tm['id_jawaban']?>">
                    </div>
                    <div class="form-group">
                        <select name="nilai" id="nilai" class="form-control">
                            <option value="">Pilih</option>

                            <option value="1">Sangat Baik</option>
                            <option value="2">Baik</option>
                            <option value="3">Cukup</option>
                            <option value="4">Kurang</option>
                            <option value="5">Sangat Kurang</option>

                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Objektif/proses_tambah_data'); ?>


                <div class="form-group">
                    <select name="soal" id="soal" class="form-control">
                        <option value="">Pilih Soal</option>
                        <?php foreach ($soal as $m) { ?>
                        <option value="<?= $m['id_soal'] ?>"><?= $m['soal']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-12 col-md-12" id="set">
                    <div class="row">
                        <table class="table-stripped">
                            <?php
              $a = "A";
              for ($i = 0; $i < 4; $i++) {

              ?>
                            <tr>
                                <div class="form-group col-sm-8 col-md-8" id="ob">
                                    <label><?= $a ?></label>
                                    <input type="text" name="objektif[]" class="form-control">
                                </div>
                                <div class="form-group col-sm-4 col-md-4" id="jaw">
                                    <label>Jawaban</label>
                                    <select name="jawaban[]" class="form-control">
                                        <option value="1">Benar</option>
                                        <option value="2">Salah</option>
                                    </select>
                                </div>
                            </tr>
                            <?php
                $a++;
              }
              ?>
                            tambahkan lebih banyak baris objektif dan jawaban jika diperlukan
                        </table>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal -->

<!-- Modal Untuk Edit -->
<?php $no = 0;
foreach ($t_objektif as $tm) : $no++; ?>
<!-- <div class="modal fade" id="editmodal<?= $tm['id_soal']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Objektif/proses_edit_data/' . $tm['id_soal']); ?>

                <div class="form-group">
                    <select name="soal" id="soal" class="form-control">
                        <option value="">Pilih Soal</option>
                        <?php foreach ($soal as $m) { ?>
                        <option value="<?= $m['id_soal'] ?>"
                            <?= ($m['id_soal'] == $tm['id_soal']) ? 'selected' : ''; ?>><?= $m['soal']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-sm-12 col-md-12" id="set">
                    <div class="row">
                        <table class="table table-striped">
                            <?php
                // definisikan variabel $objektif
                $objektif = array();

                // cek apakah data objektif tersedia
                if (!empty($data_objektif)) {
                  // konversi data objektif menjadi array
                  $objektif = json_decode($data_objektif, true);
                }
                ?>

                            tampilkan data objektif pada tabel
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Objektif</th>
                                        <th>Jawaban</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($objektif as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $value['objektif']; ?></td>
                                        <td><?php echo ($value['jawaban'] == 1) ? 'Benar' : 'Salah'; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

                <?php echo form_close() ?>

            </div>

        </div>
    </div>
</div> -->
<?php endforeach; ?>

<!-- Akhir Edit-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#set').hide();

$(document).ready(function() {
    $('#soal').change(function() {
        $('#set').show();

    });
});
</script>
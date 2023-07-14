<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Data Objektif
                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                    data-target="#exampleModal">
                    Tambah Data
                </button>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan') ?>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Soal</td>
                            <td>Objektif</td>
                            <td>Jawaban</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>

                    <body>
                        <?php
            $no = 1;
            foreach ($t_objektif as $tm) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td class="text-left"><?php echo $tm['soal']; ?></td>
                            <td class="text-left"><?php echo $tm['objektif']; ?></td>
                            <td><?= $tm['jawaban']; ?>
                            </td>
                            <td>
                                <button type="button" class="badge badge-primary" data-toggle="modal"
                                    data-target="#editmodal<?php echo $tm['id_soal']; ?>">Edit</button>
                                <a href="<?php echo base_url() ?>Objektif/hapus_data/<?php echo $tm['id_soal']; ?>"
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <!-- tambahkan lebih banyak baris objektif dan jawaban jika diperlukan -->
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
<div class="modal fade" id="editmodal<?= $tm['id_soal']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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

                            <!-- tampilkan data objektif pada tabel -->
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
</div>
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
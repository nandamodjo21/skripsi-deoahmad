<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Data Soal
                <button type="button" class="btn btn-success float-right" data-toggle="modal"
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
                            <td>Materi</td>
                            <td>Soal</td>
                            <td>Data Created</td>
                            <td>Status</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>

                    <body>
                        <?php
                    $no = 1;
                foreach ($t_soal as $sl) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $sl['materi']; ?></td>
                            <td><?php echo $sl['soal']; ?></td>
                            <td><?php echo $sl['tanggal']; ?></td>
                            <td><?php echo $sl['status']; ?></td>
                            <td>
                                <button type="button" class="badge badge-primary" data-toggle="modal"
                                    data-target="#editmodal<?php echo $sl['id_soal'];?>">
                                    Edit
                                </button>

                                <button type="button" class="badge badge-danger" data-toggle="modal"
                                    data-target="#hapusmodal<?php echo $sl['id_soal'];?>">
                                    Hapus
                                </button>



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
<!-- Modal Untuk tambah Data -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Halaman Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('soal/proses_tambah_data'); ?>" method="post">



                    <div class="form-group">
                        <select name="materi" id="" class="form-control">
                            <option value="">Pilih Materi</option>
                            <?php foreach($materi as $m){ ?>
                            <option value="<?= $m['id_materi'] ?>"><?= $m['materi']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <lebel>Soal</lebel>
                        <input type="text" name="soal" class="form-control">
                    </div>

                    <div class="form-group">
                        <select name="status" id="" class="form-control">
                            <option value="">Pilih Materi</option>
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!-- Akhir Modal -->

<!-- Modal Untuk Edit -->
<?php $no = 0;
foreach ($t_soal as $sl) : $no++; ?>
<div class="modal fade" id="editmodal<?php echo $sl['id_soal'];?>
" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('soal/proses_edit_data/'.$sl['id_soal']); ?>" method="post">

                    <div class="form-group">
                        <select name="materi" id="" class="form-control">
                            <option value="">Pilih Materi</option>
                            <?php foreach($materi as $m){ ?>
                            <option value="<?= $m['id_materi'] ?>"
                                <?= ($m['id_materi']==$sl['id_materi'])?'selected':''; ?>><?= $m['materi']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <lebel>Soal</lebel>
                        <input type="text" name="soal" class="form-control" value="<?php echo $sl['soal']; ?>">
                    </div>

                    <div class="form-group">
                        <select name="status" id="" class="form-control">
                            <option value="">Pilih Materi</option>
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>







<?php $no = 0;
foreach ($t_soal as $sl) : $no++; ?>
<div class="modal fade" id="hapusmodal<?php echo $sl['id_soal'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('soal/hapus_data/'.$sl['id_soal']); ?>" method="post">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Akhir Edit-->
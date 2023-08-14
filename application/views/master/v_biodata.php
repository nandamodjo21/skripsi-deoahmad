<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Data Mahasiswa
                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                    data-target="#biodataModal">
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
                            <td>NIK</td>
                            <td>Nama Lengkap</td>
                            <td>Jenis Kelamin</td>
                            <td>Agama</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>

                    <body>
                        <?php
                    $no = 1;
                foreach ($t_biodata as $tb) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $tb['nik']; ?></td>
                            <td><?php echo $tb['nama_lengkap']; ?></td>
                            <td><?php echo $tb['jenis_kelamin']; ?></td>
                            <td><?php echo $tb['agama']; ?></td>
                            <td>
                                <button type="button" class="badge badge-primary" data-toggle="modal"
                                    data-target="#editmodal<?php echo $tb['id_biodata'];?>">
                                    Edit
                                </button>

                                <button type="button" class="badge badge-danger" data-toggle="modal"
                                    data-target="#hapusmodal<?php echo $tb['id_biodata'];?>">
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
<div class="modal fade" id="biodataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Halaman Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('biodata/addBiodata'); ?>" method="post">


                    <div class="form-group">
                        <lebel>NIK</lebel>
                        <input type="text" name="nik" id="nik" class="form-control">
                    </div>
                    <div class="form-group">
                        <lebel>Nama Lengkap</lebel>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <lebel>Jenis Kelamin</lebel>
                        <select name="jk" id="jk" class="form-control">
                            <option value="">--pilih--</option>
                            <?php foreach($jenis as $jk){ ?>
                            <option value="<?= $jk['id_jk'] ?>"><?= $jk['jenis_kelamin']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <lebel>Agama</lebel>
                        <select name="agama" id="agama" class="form-control">
                            <option value="">--pilih--</option>
                            <?php foreach($agama as $a){ ?>
                            <option value="<?= $a['id_agama'] ?>"><?= $a['agama']; ?></option>
                            <?php } ?>
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
foreach ($t_biodata as $tb) : $no++; ?>
<div class="modal fade" id="hapusmodal<?php echo $tb['id_biodata'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                <form action="<?= base_url('biodata/hapus_data/'.$tb['id_biodata']); ?>" method="post">

                    <h6 class="text-danger">apakah anda yakin ingin <?= $tb['nama_lengkap']?>?</h6>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Akhir Edit-->
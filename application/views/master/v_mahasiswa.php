<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Data Mahasiswa
                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                    data-target="#mahasiswaModal">
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
                            <td>NIM</td>
                            <td>Nama Mahasiswa</td>
                            <td>Prodi</td>
                            <td>Status</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>

                    <body>
                        <?php
                    $no = 1;
                foreach ($t_mahasiswa as $tm) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $tm['nim']; ?></td>
                            <td><?php echo $tm['nama_lengkap']; ?></td>
                            <td><?php echo $tm['prodi']; ?></td>
                            <td><?php echo $tm['status_mhs']; ?></td>
                            <td>
                                <button type="button" class="badge badge-primary" data-toggle="modal"
                                    data-target="#editmodal<?php echo $tm['nim'];?>">
                                    Edit
                                </button>

                                <button type="button" class="badge badge-danger" data-toggle="modal"
                                    data-target="#hapusmodal<?php echo $tm['nim'];?>">
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
<div class="modal fade" id="mahasiswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Halaman Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('mahasiswa/addMahasiswa'); ?>" method="post">


                    <div class="form-group">
                        <lebel>NIM</lebel>
                        <input type="text" name="nim" id="nim" class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="mahasiswa" id="mahasiswa" class="form-control">
                            <option value="">Mahasiswa</option>
                            <?php foreach($biodata as $b){ ?>
                            <option value="<?= $b['id_biodata'] ?>"><?= $b['nama_lengkap']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="prodi" id="prodi" class="form-control">
                            <option value="">Prodi</option>
                            <?php foreach($prodi as $p){ ?>
                            <option value="<?= $p['id_prodi'] ?>"><?= $p['prodi']; ?></option>
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
foreach ($t_mahasiswa as $tm) : $no++; ?>
<div class="modal fade" id="hapusmodal<?php echo $tm['nim'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                <form action="<?= base_url('mahasiswa/hapus_data/'.$tm['nim']); ?>" method="post">

                    <h6 class="text-danger">Apakah anda ingin menghapus <?php echo $tm['nama_lengkap'];?></h6>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Akhir Edit-->
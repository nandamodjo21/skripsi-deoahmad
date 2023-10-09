<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Data Mahasiswa
                <button type="button" class="btn btn-success float-right" data-toggle="modal"
                    data-target="#mahasiswaModal">
                    Tambah Data
                </button>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan') ?>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gradient-success">
                        <tr>
                            <td class="text-white">No</td>
                            <td class="text-white">NIM</td>
                            <td class="text-white">Nama Mahasiswa</td>
                            <td class="text-white">Username</td>
                            <td class="text-white">Jenis Kelamin</td>
                            <td class="text-white">Agama</td>
                            <td class="text-white">Status</td>
                            <td class="text-white">Aksi</td>
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
                            <td><?php echo $tm['username']; ?></td>
                            <td><?php echo $tm['jenis_kelamin']; ?></td>
                            <td><?php echo $tm['agama']; ?></td>
                            <td><?php echo $tm['status']; ?></td>

                            <td>
                                <button type="button" class="badge badge-primary" data-toggle="modal"
                                    data-target="#editModal<?php echo $tm['id_login'];?>">
                                    Edit
                                </button>

                                <button type="button" class="badge badge-danger" data-toggle="modal"
                                    data-target="#hapusmodal<?php echo $tm['id_login'];?>">
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
<?php
                    $no = 1;
                foreach ($t_mahasiswa as $tm) : ?>
<div class="modal fade" id="editModal<?= $tm['id_login']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Halaman Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('mahasiswa/editMahasiswa/'.$tm['id_login']); ?>" method="post">


                    <div class="form-group">
                        <lebel>NIM</lebel>
                        <input type="hidden" name="idmhs" id="idmhs" class="form-control"
                            value="<?= $tm['id_login']; ?>">
                        <input type="text" name="nim" id="nim" class="form-control" value="<?= $tm['nim'];?>">
                    </div>
                    <div class="form-group">
                        <lebel>Nama Mahasiswa</lebel>
                        <input type="text" name="nama" id="nama" class="form-control"
                            value="<?= $tm['nama_lengkap'];?>">
                    </div>
                    <div class="form-group">
                        <select name="jk" id="jk" class="form-control">

                            <?php foreach($jenis as $b){ ?>
                            <option value="<?= $b['id_jk'] ?>"><?= $b['jenis_kelamin']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="agama" id="agama" class="form-control">

                            <?php foreach($agama as $p){ ?>
                            <option value="<?= $p['id_agama'] ?>"><?= $p['agama']; ?></option>
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

<?php endforeach; ?>

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
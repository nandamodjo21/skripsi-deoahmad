<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Data Prodi
                <button type="button" class="btn btn-success float-right" data-toggle="modal"
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
                            <td>NAMA PRODI</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>

                    <body>
                        <?php
                    $no = 1;
                foreach ($t_prodi as $tp) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $tp['prodi']; ?></td>

                            <td>
                                <button type="button" class="badge badge-primary" data-toggle="modal"
                                    data-target="#editmodal<?php echo $tp['id_prodi'];?>">
                                    Edit
                                </button>

                                <button type="button" class="badge badge-danger" data-toggle="modal"
                                    data-target="#hapusmodal<?php echo $tp['id_prodi'];?>">
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
                <form action="<?= base_url('prodi/addProdi'); ?>" method="post">


                    <div class="form-group">
                        <lebel>PRODI</lebel>
                        <input type="text" name="prodi" id="prodi" class="form-control">
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
foreach ($t_prodi as $tp) : $no++; ?>
<div class="modal fade" id="hapusmodal<?php echo $tp['id_prodi'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                <form action="<?= base_url('soal/hapus_data/'.$tp['id_prodi']); ?>" method="post">

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
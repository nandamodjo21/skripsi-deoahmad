<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Data Materi
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
                            <td>Modul</td>
                            <td>File</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>

                    <body>
                        <?php
                    $no = 1;
                foreach ($t_materi as $tm) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $tm['materi']; ?></td>
                            <td><?= $tm['file_materi'];?></td>
                            <td>
                                <a href="<?= base_url('uploads/'. $tm['file_materi'])?>"
                                    target="_blank"><?=$tm['file_materi'];?></a>
                            </td>
                            <td>
                                <button type="button" class="badge badge-primary" data-toggle="modal"
                                    data-target="#editmodal<?php echo $tm['id_materi'];?>">
                                    Edit
                                </button>
                                <a href="<?php echo base_url() ?>materi/hapus_data/<?php echo $tm['id_materi']; ?>"
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

<!-- Modal Untuk tambah Data -->
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
                <form action="<?=base_url('materi/proses_tambah_data');?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <lebel>Nama materi</lebel>
                        <input type="text" name="materi" id="materi" class="form-control">
                    </div>

                    <input type="file" name="userfile">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>



                    </div>

                </form>
            </div>


        </div>
    </div>
</div>
<!-- Akhir Modal -->

<!-- Modal Untuk Edit -->
<?php $no = 0;
foreach ($t_materi as $tm) : $no++; ?>
<div class="modal fade" id="editmodal<?php echo $tm['id_materi'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                <?php echo form_open_multipart('materi/proses_edit_data/'.$tm['id_materi']); ?>



                <div class="form-group">
                    <lebel>materi</lebel>
                    <input type="text" name="materi" class="form-control" value="<?php echo $tm['materi']; ?>">
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
<?php endforeach; ?>

<!-- Akhir Edit-->
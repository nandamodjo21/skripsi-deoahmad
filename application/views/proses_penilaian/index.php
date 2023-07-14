 <!-- Begin Page Content -->
 <div class="container-fluid">

     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Halaman Data penilaian

         </div>
         <div class="card-body">
             <?php echo $this->session->flashdata('pesan') ?>
             <div class="table-responsive">
                 <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <td>No</td>
                             <td>Nim</td>
                             <td>Mahasiswa</td>
                             <td>Prodi</td>
                             <td>Id periode</td>
                             <td>Waktu Mulai</td>
                             <td>Waktu selesai</td>
                         </tr>
                     </thead>

                     <body>
                         <?php
                            $no = 1;
                            foreach ($t_proses_penilaian as $pp) : ?>
                         <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?= $pp['nim']; ?></td>
                             <td><?= $pp['nama_lengkap'];?></td>
                             <td><?= $pp['prodi'];?></td>
                             <td><?php echo $pp['id_periode']; ?></td>
                             <td><?php echo $pp['waktu_mulai']; ?></td>
                             <td><?php echo $pp['waktu_selesai']; ?></td>
                             <td>

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
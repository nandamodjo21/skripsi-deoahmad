 <!-- Begin Page Content -->
 <div class="container-fluid">

     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Halaman Data Periode

         </div>
         <div class="card-body">
             <?php echo $this->session->flashdata('pesan') ?>
             <div class="table-responsive">
                 <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <td>No</td>
                             <td>Id prodi</td>
                             <td>Mulai Periode</td>
                             <td>Selesai Periode</td>
                             <td>Status Periode</td>
                         </tr>
                     </thead>

                     <body>
                         <?php
                            $no = 1;
                            foreach ($t_periode as $pd) : ?>
                         <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $pd['prodi']; ?></td>
                             <td><?php echo $pd['mulai_periode']; ?></td>
                             <td><?php echo $pd['selesai_periode']; ?></td>
                             <td><?php echo $pd['status_periode']; ?></td>
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
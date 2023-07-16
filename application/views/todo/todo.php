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
                             <td>Id Periode</td>
                         </tr>
                     </thead>

                     <body>
                         <?php
                            $no = 1;
                            foreach ($data as $t) : ?>
                         <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $t->nama; ?></td>
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
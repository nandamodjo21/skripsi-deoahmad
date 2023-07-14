<div class="container-fluid">

    <h3>Halaman Edit Data</h3>
    <hr>
    <br>

    <form method="post" action="<?php echo base_url('t_materi/proses_edit_data');?>">

        <input type="hidden" name="id_materi" value="<?php echo $tm['id_materi']; ?>">


        <div class="form-group row">
            <label for="materi" class="col-sm-2 col-form-label">Nama materi</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="materi" required=""
                    value="<?php echo $t_materi['materi']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="materi" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>

    </form>
</div>
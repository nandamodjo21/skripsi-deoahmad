<div class="container-fluid">

    <h3>Halaman Edit Data</h3>
    <hr>
    <br>

    <form method="post" action="<?php echo base_url('t_soal/proses_edit_data');?>">

        <input type="hidden" name="id_soal" value="<?php echo $sl['id_soal']; ?>">


        <div class="form-group row">
            <label for="soal" class="col-sm-2 col-form-label">Soal</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="soal" required="" value="<?php echo $t_soal['soal']; ?>">
            </div>
        </div>


        <div class="form-group row">
            <label for="soal" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="soal" required="" value="<?php echo $t_soal['soal']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="soal" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-5">
                <input type="checkbox" class="form-control" name="status" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="soal" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>

    </form>
</div>
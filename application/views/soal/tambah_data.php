<div class="container-fluid">

    <h3>Tambah Data</h3>
    <br>

    <form method="post" action="<?php echo base_url('soal/proses_tambah_data/');?>">

        <div class="form-group row">
            <label for="soal" class="col-sm-2 col-form-label">Soal</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="soal">
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="status">
            </div>
        </div>

        <div class="form-group row">
            <label for="namapendata" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>

    </form>
</div>
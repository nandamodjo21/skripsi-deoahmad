<!-- Begin Page Content -->
<div class="container-fluid">

    <h2 class="text-secondary"><?= $title;?></h2>
    <?php if ($this->session->flashdata('alert')): ?>
    <div class="alert alert-success" style="position: fixed; top: 10px; right: 10px;">
        <?php echo $this->session->flashdata('alert'); ?>
    </div>
    <?php endif; ?>

</div>
</div>
</div>
</div>
<!-- Modal Untuk tambah Data -->
<!-- Button trigger modal -->
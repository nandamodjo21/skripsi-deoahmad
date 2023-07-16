<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Buku Saku MK Agama Islam</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider ">
    <!-- Heading -->

    <!-- Nav Item - Dashboard -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('materi/') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Materi</span>
        </a>
        <a class="nav-link" href="<?php echo base_url('soal/') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Soal</span>
        </a>
        <a class="nav-link" href="<?php echo base_url('objektif/') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Objektif</span>
        </a>
        <a class="nav-link" href="<?php echo base_url('proses_penilaian/') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Proses penilaian</span>
        </a>
        <a class="nav-link" href="<?php echo base_url('periode/') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Periode</span>
        </a>
        <a class="nav-link" href="<?php echo base_url('api/todo/') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Todo</span>
        </a>
    </li>
    <div class="sidebar-heading">
        LOGOUT
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('login/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>

<!-- End of Sidebar -->
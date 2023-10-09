<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Buku Saku MK Agama Islam</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider ">
    <!-- Heading -->

    <!-- Nav Item - Dashboard -->

    <div class="sidebar-heading">
        Dashboard
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('home/') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        MASTERS
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master Data</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url('mahasiswa/') ?>">MASTER MAHASISWA</a>
                <!-- <a class="collapse-item" href="<?php echo base_url('biodata') ?>">MASTER BIODATA</a> -->
                <a class="collapse-item" href="<?php echo base_url('biodata/user') ?>">MASTER USER</a>
                <a class="collapse-item" href="<?php echo base_url('prodi/') ?>">MASTER PRODI</a>
            </div>
        </div>
    </li>
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
            <span>Penilaian</span>
        </a>
        <!-- <a class="nav-link" href="<?php echo base_url('proses_penilaian/') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Proses penilaian</span>
        </a> -->
        <!-- <a class="nav-link" href="<?php echo base_url('periode/') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Periode</span>
        </a> -->



    </li>
    <hr class="sidebar-divider">
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
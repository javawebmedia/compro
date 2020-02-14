<!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url() ?>" target="_blank" class="nav-link">Beranda Website</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('admin/dasbor') ?>" class="nav-link">Dasbor</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item text-success text-strong">
        <a class="nav-link" href="<?php echo base_url('admin/akun') ?>">
          <i class="fa fa-user"></i> <?php echo $this->session->userdata('nama'); ?>
        </a>
      </li>
      <li class="nav-item text-danger text-strong">
        <a class="nav-link" href="<?php echo base_url('login/logout') ?>">
          <i class="fa fa-sign-out"></i> Keluar
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

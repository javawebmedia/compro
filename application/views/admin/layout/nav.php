<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin/dasbor') ?>" class="brand-link">
      <img src="<?php echo $this->website->icon() ?>"
           alt="<?php echo $this->website->namaweb(); ?>"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $this->konfigurasi_model->listing()->singkatan; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php 
          $user_aktif = $this->user_model->detail($this->session->userdata('id_user'));

          if($user_aktif->gambar =="") {
          echo $this->website->icon(); }else{ echo base_url('assets/upload/user/thumbs/'.$user_aktif->gambar); } ?>" class="img-circle elevation-2" alt="<?php echo $this->session->userdata('nama'); ?>">
        </div>
        <div class="info">
          <a href="<?php echo base_url('admin/akun') ?>" class="d-block"><?php echo $this->session->userdata('nama'); ?> (<?php echo $this->session->userdata('akses_level'); ?>)
          </a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- DASBOR -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/dasbor') ?>" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>

          
          <!-- BERITA DAN INFORMASI -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-newspaper-o"></i>
              <p>BERITA, PROFIL &amp; LAYANAN <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="<?php echo base_url('admin/berita') ?>" class="nav-link"><i class="fa fa-table nav-icon"></i><p>Data Berita &amp; Profil</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/berita/tambah') ?>" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Berita &amp; Profil</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/kategori') ?>" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Berita &amp; Profil</p></a>
              </li>
              
            </ul>
          </li> 

          <!-- GALERI -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-image"></i>
              <p>GALERI &amp; BANNER <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="<?php echo base_url('admin/galeri') ?>" class="nav-link"><i class="fa fa-table nav-icon"></i><p>Data Galeri &amp; Banner</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/galeri/tambah') ?>" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Galeri &amp; Banner</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/kategori_galeri') ?>" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Galeri &amp; Banner</p></a>
              </li>
              
            </ul>
          </li> 

          <!-- BERITA DAN INFORMASI -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-download"></i>
              <p>FILE DOWNLOAD <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="<?php echo base_url('admin/download') ?>" class="nav-link"><i class="fa fa-table nav-icon"></i><p>Data Download</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/download/tambah') ?>" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Download</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/kategori_download') ?>" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Kategori Download</p></a>
              </li>
            </ul>
          </li> 

          <!-- VIDEO -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-youtube"></i>
              <p>VIDEO YOUTUBE <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="<?php echo base_url('admin/video') ?>" class="nav-link"><i class="fa fa-table nav-icon"></i><p>Data Video Youtube</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/video/tambah') ?>" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Video Youtube</p></a>
              </li>
            </ul>
          </li>

          <!-- AGENDA KEGIATAN -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>AGENDA <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="<?php echo base_url('admin/agenda') ?>" class="nav-link"><i class="fa fa-sitemap nav-icon"></i><p>Data Agenda/Event</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/agenda/tambah') ?>" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Agenda/Event</p></a>
              </li>
              
            </ul>
          </li>

          <!-- CLIENT -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/client') ?>" class="nav-link">
              <i class="nav-icon fa fa-group"></i>
              <p>
                DATA CLIENT
              </p>
            </a>
          </li>
          <?php if($this->session->userdata('akses_level')=="Admin") { ?>
          <!-- STAFF -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>STAFF &amp; TEAM <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="<?php echo base_url('admin/staff') ?>" class="nav-link"><i class="fa fa-table nav-icon"></i><p>Data Staff &amp; Team</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/staff/tambah') ?>" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Staff &amp; Team</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/bagian') ?>" class="nav-link"><i class="fa fa-tags nav-icon"></i><p>Bagian/Departemen</p></a>
              </li>
              
            </ul>
          </li> 
        <?php } ?>
          
          <?php if($this->session->userdata('akses_level')=="Admin") { ?>
          <!-- MENU USER -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/user') ?>" class="nav-link">
              <i class="nav-icon fa fa-lock"></i>
              <p>
                PENGGUNA SISTEM
              </p>
            </a>
          </li>

          <!-- KONFIGURASI MENU -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-wrench"></i>
              <p>KONFIGURASI <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item"><a href="<?php echo base_url('admin/konfigurasi') ?>" class="nav-link"><i class="fa fa-wrench nav-icon"></i><p>Konfigurasi Umum</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/konfigurasi/direktur') ?>" class="nav-link"><i class="fa fa-sitemap nav-icon"></i><p>Update Data Pejabat</p></a>
              </li>
               <li class="nav-item"><a href="<?php echo base_url('admin/konfigurasi/email_setting') ?>" class="nav-link"><i class="fa fa-sitemap nav-icon"></i><p>Email Setting</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/konfigurasi/logo') ?>" class="nav-link"><i class="fa fa-home nav-icon"></i><p>Ganti Logo</p></a>
              </li>

              <li class="nav-item"><a href="<?php echo base_url('admin/konfigurasi/footer') ?>" class="nav-link"><i class="fa fa-home nav-icon"></i><p>Ganti Gambar Footer</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/konfigurasi/icon') ?>" class="nav-link"><i class="fa fa-upload nav-icon"></i><p>Ganti Icon</p></a>
              </li>
            </ul>
          </li>
        <?php } ?>
          <!-- Logout -->
          <li class="nav-item">
            <a href="<?php echo base_url('login/logout') ?>" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                LOGOUT
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dasbor') ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'.$this->uri->segment(2)) ?>"><?php echo ucfirst(str_replace('_',' ',$this->uri->segment(2))) ?></a></li>
              <li class="breadcrumb-item active"><?php echo character_limiter($title,10) ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
<div class="row">
  <div class="col-12">
    <!-- Custom Tabs -->
    <div class="card">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3"><strong><?php echo strtoupper($title) ?></strong></h3>
        <ul class="nav nav-pills ml-auto p-2">
          <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">DETAIL CLIENT</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">KURSUS</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">PEMBAYARAN</a></li>
          <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">ABSENSI</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/client/cetak/'.$client->id_client) ?>"><strong><i class="fa fa-print"></i> CETAK</strong></a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              ACTION <span class="caret"></span>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" tabindex="-1" href="<?php echo base_url('admin/client/edit/'.$client->id_client) ?>">Edit Client</a>
              <a class="dropdown-item" tabindex="-1" href="<?php echo base_url('admin/client/kursus/'.$client->id_client) ?>">Tambah Kursus</a>
              <a class="dropdown-item" tabindex="-1" href="<?php echo base_url('admin/client/edit/'.$client->id_client) ?>">Tambah Pembayaran</a>
              <div class="divider"></div>
              <a class="dropdown-item" tabindex="-1" href="<?php echo base_url('admin/client/edit/'.$client->id_client) ?>">Kelola Kehadiran</a>
            </div>
          </li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
           <?php include('detail_client.php') ?>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2">
            KURSUS
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_3">
            PEMBAYARAN
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_4">
            ABSENSI
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- ./card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
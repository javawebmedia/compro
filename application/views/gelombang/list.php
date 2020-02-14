
<section class="bg-servicesstyle2-section">
<div class="container">
    <div class="row">
        <div class="our-services-option">
            <div class="section-header">
                <h2><?php echo $title ?></h2>
                <p>Berikut adalah periode pendaftaran sebagai peneliti yang ada sampai saat ini.</p>
            </div>
            <!-- .section-header -->
            <div class="row">

        <?php if(count($gelombang) >0) { ?>
        
<table class="table table-striped table-bordered table-hover" id="example1" width="100%">
<thead>
    <tr>
        <th >#</th>
        <th>Gambar</th>
        <th>Nama/Judul</th>
        <th>Status</th>
        <th>Periode</th>
        <th>Tahun</th>
        <th></th>
    </tr>
</thead>
<tbody>
  <?php $i=1; foreach($gelombang as $gelombang) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?>.</td>
        <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$gelombang->gambar) ?>" width="60"></td>
        <td><?php echo $gelombang->judul ?></td>
        <td>
          <?php
          $sekarang = date('Y-m-d');
          if($sekarang >= $gelombang->tanggal_buka && $sekarang <= $gelombang->tanggal_tutup) {
          ?>
          <?php echo strtoupper($gelombang->status_gelombang); }else{ echo 'TUTUP'; } ?></td>
        <td><?php echo date('d M Y',strtotime( $gelombang->tanggal_buka)); ?> s/d <?php echo date('d M Y',strtotime(      $gelombang->tanggal_tutup)); ?>
            <br><small>Tgl Pengumuman: <?php echo date('d M Y',strtotime( $gelombang->tanggal_pengumuman)); ?></small>
        </td>
        <td><?php echo $gelombang->tahun_ajaran.' - '.$gelombang->tahun; ?></td>
        <td>
          <a href="<?php echo base_url('gelombang/read/'.$gelombang->slug) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Detail</a>
          <?php
          $sekarang = date('Y-m-d');
          if($sekarang >= $gelombang->tanggal_buka && $sekarang <= $gelombang->tanggal_tutup) {
          ?>
          <a href="<?php echo base_url('pendaftaran?gelombang='.$gelombang->slug) ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Daftar Online</a>
          <?php }else{ ?>
           <a href="#" class="btn btn-default disabled btn-sm"><i class="fa fa-pencil"></i> Daftar Online</a>
          <?php } ?>
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>
          <?php }else{ ?>
         <div class="col-md-8 col-lg-offset-2 alert alert-warning text-center">
        <h3>Oops...Mohon maaf</h3>
        <h4>Pendaftaran Online Saat Ini Belum dibuka</h4>
        </div>
  <?php } ?>


 </div>
                        <!-- .row -->
                    </div>
                    <!-- .our-services-option -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>

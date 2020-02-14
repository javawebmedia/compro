<div id="content" role="main">
<div class="page-header dark larger larger-desc">
<div class="container">
<div class="row">
    <div class="col-md-12">
        <h1><?php echo $title ?></h1>
    </div><!-- End .col-md-6 -->
</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .page-header -->

<div class="mb40"></div><!-- space -->

<div class="container">
<div class="row">

    <div class="col-sm-4 col-xs-12">
      <div class="teachersPhoto">
        <img src="<?php echo base_url('assets/filemanager/userfiles/image/thumbs/'.$staff->gambar) ?>" alt="<?php echo $staff->nama ?>" class="img-rounded img-responsive">
      </div>
    </div>
    <div class="col-sm-8 col-xs-12">
      <p class="text-right"><a href="<?php echo base_url('staff') ?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali ke halaman staff</a></p>
      
      <div class="teachersInfo">
        <h3><?php echo $staff->nama ?></h3>
        <p><a href="#" class="color-1"><i class="fa fa-trophy" aria-hidden="true"></i> Pendidikan: <?php echo $staff->education ?></a></p>
        <p><a href="#" class="color-2"><i class="fa fa-calendar" aria-hidden="true"></i> Jabatan: <?php echo $staff->jabatan ?></a></p>
        <hr>
        <?php echo $staff->isi ?>
        
      </div>
    </div>

</div><!-- End .row -->
</div><!-- End .container -->

<div class="mb20"></div><!-- space -->

</div><!-- End #content -->
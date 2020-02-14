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
    <ul id="portfolio-filter" class="text-center alert alert-success">
        <li class="active"><a href="#" data-filter="*">Lihat Semua</a></li>
        <?php if(count($kategori)>1) { foreach($kategori as $kategori) { ?>
            <li><a href="#" data-filter=".<?php echo $kategori->slug_kategori_staff ?>"><?php echo $kategori->nama_kategori_staff ?></a></li>
            <?php }}else{ ?>

            <li><a href="#" data-filter=".<?php echo $kategori->slug_kategori_staff ?>"><?php echo $kategori->nama_kategori_staff ?></a></li>
        <?php } ?>
      </ul>

<div id="portfolio-item-container" class="max-col-4 popup-gallery">
<?php foreach($staff as $staff) { ?>
 <div class="portfolio-item col-md-3 col-xs-6 team-member-container <?php echo $staff->slug_kategori_staff ?>">
    <div class="team-member team-member-box custom text-center">
        <figure>
            <a href="<?php echo base_url('staff/detail/'.$staff->id_staff) ?>">
            <img src="<?php echo base_url('assets/filemanager/userfiles/image/thumbs/'.$staff->gambar) ?>" alt="<?php echo $staff->nama ?>" class="img-responsive">
            </a>
        </figure>
        <h3><?php echo $staff->nama ?></h3>
        <p class="member-desc"><?php echo $staff->jabatan ?></p>
    </div><!-- End .team-member -->                          
</div><!-- End .portfolio-item -->

<?php } ?>  
</div>

 </div>
</div>

    <div class="clearfix"></div>
        <div class="col-md-12 text-center pagination pagin">
        <div class="clearfix"></div>
        <?php if(isset($pagin)) { echo $pagin; }  ?>
        <div class="clearfix"></div>
        </div>
 
 </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb20"></div><!-- space -->

</div><!-- End #content -->
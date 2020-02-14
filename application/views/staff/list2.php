<style type="text/css" media="screen">
  .teamImage img {
    height: 150px !important;
    width: 150px !important;
  }
</style>
<!-- WHITE SECTION -->
<section class="whiteSection full-width clearfix">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="sectionTitle text-center">
        <h2>
          <span class="shape shape-left bg-color-4"></span>
          <span><?php echo $title ?></span>
          <span class="shape shape-right bg-color-4"></span>
        </h2>
      </div>
    </div>
  </div>
  <div class="row">

  <?php foreach($staff as $staff) { ?>

  <div class="col-md-6">
    <div class="teamContent teamAdjust">
      <div class="teamImage">
      <img src="<?php echo base_url('assets/filemanager/userfiles/image/thumbs/'.$staff->gambar) ?>" alt="<?php echo $staff->nama ?>" class="img-circle img-responsive">
        <div class="maskingContent">
          <ul class="list-inline">
            <li><a href="<?php echo base_url('staff/detail/'.$staff->id_staff) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="teamInfo teamTeacher">
        <h5><a href="<?php echo base_url('staff/detail/'.$staff->id_staff) ?>"><?php echo $staff->nama ?></a></h5>
        <p><?php echo $staff->jabatan ?></p>
      </div>
    </div>
  </div>
  
  <?php } ?>

  </div>

<div class="clearfix"></div>
<div class="col-md-12 text-center pagination pagin">
  <div class="clearfix"></div>
  <?php if(isset($pagin)) { echo $pagin; }  ?>
  <div class="clearfix"></div>
</div>

</div>
</section>

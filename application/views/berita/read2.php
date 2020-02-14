<style type="text/css" media="screen">
  .thumbnail img {
    height: auto !important;
  }
</style>
<!-- PAGE TITLE SECTION-->
<section class="pageTitleSection">
<div class="container">
<div class="pageTitleInfo">
  <h2><?php echo $title ?></h2>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url() ?>">Home</a></li>
    <li class="active"><?php echo $title ?></li>
  </ol>
</div>
</div>
</section>

<!-- MAIN SECTION -->
<section class="mainContent full-width clearfix">
<div class="container">
<div class="row">

  <div class="col-md-9 col-sm-8 col-xs-12 block">
    <div class="thumbnail thumbnailContent">
      <img src="<?php echo base_url('assets/upload/image/'.$berita->gambar) ?>" alt="image" class="img-responsive">
      <div class="sticker-round bg-color-1"><?php echo date('d',strtotime($berita->tanggal)) ?> <br><?php echo date('M',strtotime($berita->tanggal)) ?></div>
      <div class="caption border-color-1 singleBlog">
        <h3 class="color-1"><?php echo $title ?></h3>
        <ul class="list-inline blogInfo">
          <li><i class="fa fa-user" aria-hidden="true"></i><?php echo $berita->nama ?></li>
          <li><i class="fa fa-tags" aria-hidden="true"></i><?php echo $berita->nama_kategori ?></li>
        </ul>
        <?php echo $berita->isi ?>
        <ul class="list-inline socailLink">
          <li><a href="<?php echo $site->facebook ?>" class="bg-color-1" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $site->twitter ?>" class="bg-color-2"  target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $site->instagram ?>" class="bg-color-3"  target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-4 col-xs-12">
    <aside>
      
      
      <div class="rightSidebar">
        <div class="panel panel-default">
          <div class="panel-heading bg-color-5 border-color-5">
            <h3 class="panel-title">Berita lainnya</h3>
          </div>
          <div class="panel-body">
            <ul class="media-list blogListing">
            
            <?php foreach($listing as $listing) { ?>

              <li class="media">
                <div class="media-left">
                  <a href="<?php echo base_url('berita/read/'.$listing->slug_berita) ?>"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$listing->gambar) ?>" alt="<?php echo $listing->judul_berita ?>" width="70"></a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="<?php echo base_url('berita/read/'.$listing->slug_berita) ?>"><?php echo $listing->judul_berita ?></a></h4>
                  <p><?php echo date('d M Y',strtotime($listing->tanggal)) ?></p>
                </div>
              </li>

            <?php } ?>
              
            </ul>
          </div>
        </div>
      </div>

      <div class="panel panel-default courseSidebar">
        <div class="panel-heading bg-color-2 border-color-2">
          <h3 class="panel-title">Categories</h3>
        </div>
        <div class="panel-body">
          <ul class="list-unstyled categoryItem">
          <?php foreach($kategori as $kategori) { ?>
            <li><a href="<?php echo base_url('berita/kategori/'.$kategori->slug_kategori) ?>"><?php echo $kategori->nama_kategori ?></a></li>
          <?php } ?>
          </ul>
        </div>
      </div>
    </aside>
  </div>
</div>
</div>
</section>

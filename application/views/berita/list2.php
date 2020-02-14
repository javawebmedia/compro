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
<div class="max-col-3" id="blog-item-container">
    
    <?php foreach($berita as $berita) { ?>

      <article class="entry entry-box">
        <?php if($berita->gambar != "") { ?>
        <div class="entry-media">
          <figure>
          <a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>">
            <img src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" alt="<?php echo $berita->judul_berita ?>" class="img-responsive">
          </a>
           </figure>
        </div><!-- End .entry-media -->
        <?php } ?>
        <div class="entry-content-wrapper">
          <span class="entry-date bg-info"><?php echo date('d',strtotime($berita->tanggal_publish)) ?><span><?php echo date('M',strtotime($berita->tanggal_publish)) ?></span></span>

         
            <h2 class="entry-title"><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" class="color-<?php echo(rand(1,6)); ?>"><?php echo $berita->judul_berita ?></a></h2>

            
            <div class="entry-content">
            <p><?php echo strip_tags(character_limiter($berita->isi,160)) ?></p>
            </div>
        </div>
        
        <footer class="entry-footer clearfix">
            <span class="entry-cats">
                <span class="entry-label"><i class="fa fa-tag"></i></span><a href="<?php echo base_url('berita/kategori/'.$berita->slug_kategori) ?>"><?php echo $berita->nama_kategori ?></a>
            </span><!-- End .entry-tags -->
            <span class="entry-separator">/</span>
            <a href="#" class="entry-comments"><i class="fa fa-eye"></i> <?php echo $berita->hits ?> hits</a>
            <span class="entry-separator">/</span>
            by <a href="#" class="entry-author"><i class="fa fa-user"></i> <?php if($berita->nama =="") { echo "Admin"; }else{ echo $berita->nama; } ?></a>
            
        </footer>

    </article>

    <?php } ?> 

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
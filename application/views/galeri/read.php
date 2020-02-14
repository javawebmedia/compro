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


<div class="col-md-12">

<div id="project-gallery" class="portfolio-media carousel slide" data-ride="carousel" data-interval="7000">

<!-- Indicators -->
<ol class="carousel-indicators">
    <li data-target="#project-gallery" data-slide-to="0" class="active"></li>
</ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="<?php echo base_url('assets/upload/image/'.$galeri->gambar) ?>" alt="<?php echo $galeri->judul_galeri ?>">
        </div><!-- End .item -->
    </div><!-- End .carousel-inner -->

    <!-- Controls -->
    <a class="left carousel-control" href="#project-gallery" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
    <a class="right carousel-control" href="#project-gallery" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
</div><!-- End .carousel -->
</div><!-- End .col-md-7 -->


<div class="col-md-12 portfolio-related-container">
    <h3 class="title-underblock custom mb30">Galeri lainnya</h3>

    <div class="portfolio-related-carousel owl-carousel popup-gallery">
        
        <?php foreach($listing as $listing) { ?>

        <div class="portfolio-item portfolio-image-zoom portfolio-meta-slideup">
            <figure>
                <a href="<?php echo base_url('assets/upload/image/'.$listing->gambar) ?>" class="zoom-item" title="<?php echo $listing->judul_galeri ?>"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$listing->gambar) ?>" alt="<?php echo $listing->judul_galeri ?>" class="img-responsive"></a>
            </figure>
            <div class="portfolio-meta dark">
                <h3 class="portfolio-title"><a href="<?php echo base_url('galeri/read/'.$listing->id_galeri) ?>"><?php echo $listing->judul_galeri ?></a></h3>
                <div class="portfolio-tags"><a href="<?php echo base_url('galeri/kategori/'.$listing->slug_kategori_galeri) ?>"><?php echo $listing->nama_kategori_galeri ?></a></div>
                <a class="portfolio-favourite" href="#" title="Favourite">
                    <i class="fa fa-heart-o"></i>
                    <span><?php echo $listing->hits ?></span>
                </a>
            </div><!-- End .portfolio-meta -->                            
        </div><!-- End .portfolio-item -->
		
		<?php } ?>

    </div><!-- end .portfolio-related-carousel -->
</div><!-- End .col-md-12 -->

</div><!-- End .row -->
</div><!-- End .container -->

<div class="mb20"></div><!-- space -->

</div><!-- End #content -->
<section class="bg-slider-option">
<div class="slider-option slider-two">
<div id="slider" class="carousel slide wow fadeInDown" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#slider" data-slide-to="0" class="active"></li>
<li data-target="#slider" data-slide-to="1"></li>
<li data-target="#slider" data-slide-to="2"></li>
</ol>
<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
<?php $i=1; foreach($slider as $slider): ?>
<div class="item <?php if($i==1) { echo 'active'; } ?>">
    <div class="slider-item">
        <img src="<?php echo base_url('assets/upload/image/'.$slider->gambar); ?>" alt="bg-slider-2">
        <div class="slider-content-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"></div>
                    <!-- .col-md-6 -->
                    <div class="col-md-6">
                        <div class="slider-content">
                            <!-- <h3><?php echo $site->namaweb ?></h3> -->
                            <h2><?php echo $slider->judul_galeri ?></h2>
                            <p><?php echo strip_tags($slider->isi) ?></p>
                            <div class="slider-btn">
                                <a href="<?php echo $slider->website ?>" class="btn btn-default">Baca selengkapnya...</a>
                            </div>
                            <!-- .slider-btn -->
                        </div>
                        <!-- .carousel-caption -->
                    </div>
                    <!-- .col-md-6 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
    </div>
</div>
<!-- .items -->
<?php $i++; endforeach; ?>

</div>
<!-- .carosoul-inner -->
<a class="left carousel-control" href="#slider" role="button" data-slide="prev">
<span class="fa fa-angle-left" aria-hidden="true"></span>
</a>
<a class="right carousel-control" href="#slider" role="button" data-slide="next">
<span class="fa fa-angle-right" aria-hidden="true"></span>
</a>
</div>
</div>
<!-- .slider-option -->
</section>

<!-- End Slider Section -->
<!-- Start Sponsors Section -->

<section class="bg-sponsors-section">
    <div class="container">
        <div class="row">
            <div class="sponsors-option">
                <div class="section-header">
                    <h2>Aplikasi/Link Terkait</h2>
                    <p>Berikut adalah link aplikasi/website terkait</p>
                </div>
                <!-- .section-header -->
                <div class="sponsors-container">
                    <div class="swiper-wrapper">
                        <?php foreach($aplikasi as $aplikasi) { ?>
                        <div class="swiper-slide">
                            <div class="sopnsors-items">
                                <a href="<?php echo $aplikasi->website; ?>" target="_blank"><img style="width:270px;height:120px;" src="<?php echo base_url('assets/upload/image/thumbs/' . $aplikasi->gambar); ?>" alt="sponsors-img-1" class="img-responsive" /></a>
                            </div>
                            <!-- .sponsors-items -->
                        </div>
                        <?php } ?>
                        <!-- .swiper-slide -->
                    </div>
                    <!-- .swiper-wrapper -->
                </div>
                <!-- .sponsors-container -->
            </div>
            <!-- .sponsors-option -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>


<!-- End Sponsors Section -->
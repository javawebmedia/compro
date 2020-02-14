<section class="bg-blog-style-2">
            <div class="container">
                <div class="row">
                    <div class="blog-style-2">
                        <div class="row">
                            <div class="col-md-8">
                                <?php foreach($berita as $berita) { ?>
                                <div class="blog-items">
                                    <div class="blog-img" style="width:770px;height:370px;">
                                        <a href="<?php echo base_url('berita/read/' . $berita->slug_berita); ?>"><img src="<?php echo base_url('assets/upload/image/'.$berita->gambar) ?>" alt="blog-img-10" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h4><a href="<?php echo base_url('berita/read/' . $berita->slug_berita); ?>"><?php echo $berita->judul_berita; ?></a></h4>
                                            <ul class="meta-post">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d M Y', strtotime($berita->tanggal_publish)); ?></li>
                                                <li><i class="fa fa-user"></i> <?php echo $berita->nama; ?></li>
                                                <!-- <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $berita->hits; ?> Viewer</a></li> -->
                                            </ul>
                                            <p class="text-justify"><?php echo character_limiter(strip_tags($berita->isi), 200); ?></p>
                                            <a href="<?php echo base_url('berita/read/' . $berita->slug_berita); ?>"><i class="fa fa-chevron-right"></i> Selengkapnya</a>
                                        </div>
                                        <!-- .blog-content -->
                                    </div>
                                    <!-- .blog-content-box -->
                                </div>
                                <?php } ?>
                                <div class="pagination-option">
                                    <nav aria-label="Page navigation">
                                        <?php if(isset($pagin)) { echo $pagin; }  ?>
                                        <!-- <ul class="pagination">
                                            <li>
                                                <a href="#" aria-label="Previous">
                                                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li><a href="#">1</a></li>
                                            <li class="active"><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">...</a></li>
                                            <li><a href="#">5</a></li>
                                            <li>
                                                <a href="#" aria-label="Next">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul> -->
                                    </nav>
                                </div>
                                <!-- .pagination_option -->
                            </div>
                            <!-- .col-md-8 -->
                            <div class="col-md-4">
                                <div class="sidebar">
                                    <div class="widget">
                                        <h4 class="sidebar-widget-title">Berita Terpopuler</h4>
                                        <div class="widget-content">
                                            <ul class="popular-news-option">
                                                <?php foreach($populer as $populer) { ?>
                                                    <li>
                                                        <div class="popular-news-img" style="width: 80px; height: 80px;">
                                                            <a href="#"><img src="<?php if($populer->gambar=="") { echo base_url('assets/upload/image/thumbs/'.$site->icon); }else{ echo base_url('assets/upload/image/thumbs/'.$populer->gambar); } ?>" alt="popular-news-img-1" /></a>
                                                        </div>
                                                        <!-- .popular-news-img -->
                                                        <div class="popular-news-contant">
                                                            <h5><a href="<?php echo base_url('berita/read/' . $populer->slug_berita); ?>"><?php echo $populer->judul_berita; ?></a></h5>
                                                            <p>
                                                                <i class="fa fa-calendar"></i> <?php echo date('d M Y', strtotime($populer->tanggal_publish)); ?> <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $populer->hits; ?> Viewer</a>
                                                            </p>
                                                        </div>
                                                        <!-- .popular-news-img -->
                                                    </li>
                                                <?php } ?>
                                            </ul>

                                        </div>
                                        <!-- .widget-content -->
                                    </div>
                                </div>
                                <!-- .sidebar -->
                            </div>
                            <!-- .col-md-4 -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .blog-style-2 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>

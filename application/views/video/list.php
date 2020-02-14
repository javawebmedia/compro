<section class="bg-upcoming-events">
            <div class="container">
                <div class="row">
                    <div class="upcoming-events">
                      <div class="section-header">
                    <h2><?php //echo $title ?> GALERI VIDEO</h2>
                </div>
                        <div class="row">
                          <?php foreach($video as $video) { ?>
                            <div class="col-md-6">
                                <div class="event-items">
                                    <div class="event-img">
                                        <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video->video ?>"></iframe>
              </div>
                                        <div class="date-box">
                                            <h3><?php echo date('d', strtotime($video->tanggal)); ?></h3>
                                            <h5><?php echo date('M', strtotime($video->tanggal)); ?></h5>
                                        </div>
                                        <!-- .date-box -->
                                    </div>
                                    <!-- .event-img -->
                                    <div class="events-content" style="min-height: 160px;">
                                        <h3><a href="<?php echo base_url('video/read/'.$video->id_video) ?>"><?php echo $video->judul ?></a></h3>
                                        <!-- <ul class="meta-post">
                                            <li><i class="fa fa-clock-o" aria-hidden="true"></i> 8:30am - 5:30pm</li>
                                            <li><i class="flaticon-placeholder"></i> Sahera Tropical Center Dhaka</li>
                                        </ul> -->
                                        <p><?php echo nl2br($video->keterangan) ?></p>
                                    </div>
                                    <!-- .events-content -->
                                </div>
                                <!-- .events-items -->
                            </div>
                          <?php } ?>
                        </div>
                        <!-- .row -->

                        <div class="pagination-option">
                            <nav aria-label="Page navigation">
                              <?php if(isset($pagin)) { echo $pagin; }  ?>
                            </nav>
                        </div>
                        <!-- .pagination_option -->

                    </div>
                    <!-- .upcoming-events -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
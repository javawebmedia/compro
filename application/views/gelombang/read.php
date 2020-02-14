
<section class="bg-servicesstyle2-section">
<div class="container">
    <div class="row">
        <div class="our-services-option">
            <div class="section-header">
                <h2><?php echo $title ?></h2>
            </div>
            <!-- .section-header -->
            <div class="row">

         
          <div class="col-md-3 col-sm-4 col-xs-12">
            <aside>
              <div class="panel panel-default eventSidebar">
                  <div class="panel-heading bg-color-1 border-color-1">
                    <h3 class="panel-title">Informasi Pendaftaran</h3>
                  </div>
                  <div class="panel-body">
                    <ul class="media-list">
                      <li class="media">
                        <div class="media-left iconContent bg-color-2">
                          <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        </div>
                        <div class="media-body iconContent">
                          <h4 class="media-heading color-2">Buka</h4>
                          <p><?php echo date('d M Y',strtotime($gelombang->tanggal_buka)) ?></p>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-left iconContent bg-color-3">
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                        <div class="media-body iconContent">
                          <h4 class="media-heading color-3">Tutup</h4>
                          <p><?php echo date('d M Y',strtotime($gelombang->tanggal_tutup)) ?></p>
                        </div>
                      </li>
                      <li class="media iconContet">
                        <div class="media-left iconContent bg-color-4">
                          <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <div class="media-body iconContent">
                          <h4 class="media-heading color-4">Status</h4>
                          <p><?php echo $gelombang->status_gelombang?></p>                          
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-left iconContent bg-color-5">
                          <i class="fa fa-table" aria-hidden="true"></i>
                        </div>
                        <div class="media-body iconContent">
                          <h4 class="media-heading color-5">Tahun Anggaran</h4>
                          <p><?php echo $gelombang->tahun_ajaran?></p>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-left iconContent bg-color-6">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <div class="media-body iconContent">
                          <h4 class="media-heading color-5">Tahun</h4>
                          <p><?php echo $gelombang->tahun ?></p>
                        </div>
                      </li>                      
                    </ul>
                  </div>
              </div>
            </aside>
          </div>

           <div class="col-md-9 col-sm-8 col-xs-12 block">
            <div class="thumbnail thumbnailContent alt">
              <img src="<?php echo base_url('assets/upload/image/thumbs/'.$gelombang->gambar) ?>" alt="image" class="img-responsive">
              <hr>
              <div class="caption border-color-1 singleBlog">
                <h3 class="color-1"><?php echo $gelombang->judul?></h3>
                <p><?php echo $gelombang->isi?></p>                
              </div>
            </div>
          </div>
    

 </div>
                        <!-- .row -->
                    </div>
                    <!-- .our-services-option -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>

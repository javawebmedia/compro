<div class="mb50"></div><!-- space -->
<div id="content" role="main">


<div class="container">
<div class="row">
<div class="col-md-7">

    <article class="entry single">

        <?php if($berita->gambar !="") { ?>
        <div class="entry-media">
            <figure>
                <img src="<?php echo base_url('assets/upload/image/'.$berita->gambar) ?>" alt="<?php echo $title ?>">
            </figure>
        </div>

        <?php } ?>

        <span class="entry-date"><?php echo date('d',strtotime($berita->tanggal_publish)) ?><span><?php echo date('M',strtotime($berita->tanggal_publish)) ?></span></span>
        <h1 class="entry-title"><?php echo $title ?></h1>

        <div class="entry-content">
            <?php echo $berita->isi ?>
        </div><!-- End .entry-content -->


    </article>
    
</div>


<div class="col-md-5">
    <div class="widget">
        <h3>Profil kami</h3>
        <ul class="latest-posts-list">

            <?php foreach($listing as $listing) { ?>
            <li class="clearfix" style="list-style:none;">
                <figure><img src="<?php if($listing->gambar=="") { echo base_url('assets/upload/image/thumbs/'.$site->icon); }else{ echo base_url('assets/upload/image/thumbs/'.$listing->gambar); } ?>" alt="<?php echo $listing->judul_berita ?>" class="img img-rounded img-thumbnail"></figure>
                <div class="entry-content">
                    <h5><a href="<?php echo base_url('berita/profil/'.$listing->slug_berita) ?>"><?php echo $listing->judul_berita ?></a></h5>
                    <p><?php echo date('d/m/Y',strtotime($listing->tanggal_publish)) ?> - <i class="fa fa-eye"></i> <a href="#"><?php echo $listing->hits ?></a></p>
                </div><!-- End .entry-content -->
            </li>
            <?php } ?>

        </ul>
    </div><!-- End .widget -->
</div>


</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End #content -->
<div class="mb20"></div><!-- space -->

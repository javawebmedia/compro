<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
<div class="container">
<div class="row justify-content-center mb-5 pb-3">
<div class="col-md-7 heading-section text-center ftco-animate">
<span class="subheading">Kontak</span>
<h2 class="mb-4">Menghubungi kami</h2>
<p>Anda dapat menghubungi kami melalui alamat kami berikut ini.</p>
</div>
</div>

<div class="row block-9">
<div class="col-md-7 order-md-last d-flex">
  <style type="text/css" media="screen">
    .petaku {
      width: 100%;
    }
    .petaku iframe {
      width: 100%;
    }
  </style>
<div class="petaku">
<?php echo $site->google_map ?>
</div>
</div>

<div class="col-md-5 d-flex">
<div class="row d-flex contact-info mb-5">
  <div class="col-md-12 ftco-animate">
  	<div class="box p-2 px-3 bg-light d-flex">
  		<div class="icon mr-3">
  			<span class="icon-map-signs"></span>
  		</div>
  		<div>
      		<h3 class="mb-3">Alamat kantor:</h3>
            <p><?php echo nl2br($site->alamat) ?></p>
        </div>
      </div>
  </div>
  <div class="col-md-12 ftco-animate">
  	<div class="box p-2 px-3 bg-light d-flex">
  		<div class="icon mr-3">
  			<span class="icon-phone2"></span>
  		</div>
  		<div>
      		<h3 class="mb-3">Telepon</h3>
            <p><a href="<?php echo $site->telepon ?>"><?php echo $site->telepon ?></a></p>
        </div>
      </div>
  </div>
  <div class="col-md-12 ftco-animate">
  	<div class="box p-2 px-3 bg-light d-flex">
  		<div class="icon mr-3">
  			<span class="icon-paper-plane"></span>
  		</div>
  		<div>
      		<h3 class="mb-3">Email</h3>
            <p><a href="mailto:<?php echo $site->email ?>"><?php echo $site->email ?></a></p>
        </div>
      </div>
  </div>
  <div class="col-md-12 ftco-animate">
  	<div class="box p-2 px-3 bg-light d-flex">
  		<div class="icon mr-3">
  			<span class="icon-globe"></span>
  		</div>
  		<div>
      		<h3 class="mb-3">Website</h3>
            <p><a href="<?php echo $site->website ?>"><?php echo $site->website ?></a></p>
        </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
</section>
<br><br>
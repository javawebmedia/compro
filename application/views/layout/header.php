<?php
$site = $this->konfigurasi_model->listing();
?>
<div class="box-style">
<div class="color-btn">
<a href="#"><i class="fa fa-cog fa-spin" aria-hidden="true"></i></a>
</div>
<div class="box-style-inner">
<h3>Box Layout</h3>
<div class="box-element">
<div class="box-heading">
<h5>HTML Layout</h5>
</div>
<div class="box-content">
<ul class="box-customize">
<li><a class="boxed-btn" href="#">Boxed</a></li>
<li><a class="wide-btn" href="#">Wide</a></li>
<li><a class="rtl-btn" href="#">Rtl</a></li>
<li><a class="ltl-btn" href="#">Ltl</a></li>
</ul>
</div>
</div>
<div class="box-element">
<div class="box-heading">
<h5>Backgroud Images</h5>
</div>
<div class="box-content">
<ul class="box-bg-img">
<li>
    <a class="bg-1" href="#"><img src="<?php echo base_url() ?>assets/tema/assets/images/box-style/01.jpg" alt=""></a>
</li>
<li>
    <a class="bg-2" href="#"><img src="<?php echo base_url() ?>assets/tema/assets/images/box-style/02.jpg" alt=""></a>
</li>
<li>
    <a class="bg-3" href="#"><img src="<?php echo base_url() ?>assets/tema/assets/images/box-style/03.jpg" alt=""></a>
</li>
<li>
    <a class="bg-4" href="#"><img src="<?php echo base_url() ?>assets/tema/assets/images/box-style/04.jpg" alt=""></a>
</li>
<li>
    <a class="bg-5" href="#"><img src="<?php echo base_url() ?>assets/tema/assets/images/box-style/05.jpg" alt=""></a>
</li>
<li>
    <a class="bg-6" href="#"><img src="<?php echo base_url() ?>assets/tema/assets/images/box-style/06.jpg" alt=""></a>
</li>
<li>
    <a class="bg-7" href="#"><img src="<?php echo base_url() ?>assets/tema/assets/images/box-style/07.jpg" alt=""></a>
</li>
<li>
    <a class="bg-8" href="#"><img src="<?php echo base_url() ?>assets/tema/assets/images/box-style/08.jpg" alt=""></a>
</li>
</ul>
</div>
</div>
<div class="box-element">
<div class="box-heading">
<h5>Backgroud Pattern</h5>
</div>
<div class="box-content">
<ul class="box-pattern-img">
<li>
    <a class="pt-1" href="#"><img src="../../../../www.codexcoder.com/images/auror/pt-image/01.png"" alt=""></a>
</li>
<li>
    <a class="pt-2" href="#"><img src="../../../../www.codexcoder.com/images/auror/pt-image/02.png"" alt=""></a>
</li>
<li>
    <a class="pt-3" href="#"><img src="../../../../www.codexcoder.com/images/auror/pt-image/03.png"" alt=""></a>
</li>
<li>
    <a class="pt-4" href="#"><img src="../../../../www.codexcoder.com/images/auror/pt-image/04.png"" alt=""></a>
</li>
<li>
    <a class="pt-5" href="#"><img src="../../../../www.codexcoder.com/images/auror/pt-image/05.png"" alt=""></a>
</li>
<li>
    <a class="pt-6" href="#"><img src="../../../../www.codexcoder.com/images/auror/pt-image/06.png"" alt=""></a>
</li>
<li>
    <a class="pt-7" href="#"><img src="../../../../www.codexcoder.com/images/auror/pt-image/07.png"" alt=""></a>
</li>
<li>
    <a class="pt-8" href="#"><img src="../../../../www.codexcoder.com/images/auror/pt-image/08.png"" alt=""></a>
</li>
</ul>
</div>
</div>
</div>
</div>


<!-- Start Pre-Loader-->

<div id="loading">
<div id="loading-center">
<div id="loading-center-absolute">
<div class="object" id="object_one"></div>
<div class="object" id="object_two"></div>
<div class="object" id="object_three"></div>
<div class="object" id="object_four"></div>
</div>
</div>
</div>


<div class="box-layout">

<!-- End Pre-Loader -->

<header class="header-style-2">
<div class="bg-header-top">
<div class="container">
<div class="row">
<div class="header-top">
    <ul class="h-contact">
        <li><i class="fa fa-map"></i> <?php echo $site->namaweb ?></li>
    </ul>
    <div class="donate-option">
        <?php if($this->session->userdata('userpeneliti')) { ?>
            <a href="<?php echo base_url('peneliti/dasbor') ?>"><i class="fa fa-dashboard" aria-hidden="true"></i> <?php echo $this->session->userdata('nama_peneliti'); ?></a>
            <a href="<?php echo base_url('masuk/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        <?php }else{ ?>
            <a href="https://wa.me/<?php echo str_replace('+','',$site->hp) ?>?text=Saya%20tertarik%20untuk%20Menggunakan%20Layanan%20di%20Perusahan%20Anda.%20Apakah%20bisa%20dibantu?"><i class="fa fa-whatsapp" aria-hidden="true"></i><?php echo $site->hp ?></a>
            <a href="tel:<?php echo $site->telepon ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $site->telepon ?></a>
        <?php } ?>
            <a href="<?php echo base_url('kontak') ?>"><i class="fa fa-envelope" aria-hidden="true"></i> Kontak</a>
    </div>
    <!-- .donate-option -->
</div>
<!-- .header-top -->
</div>
<!-- .header-top -->
</div>
<!-- .container -->
</div>
<!-- .bg-header-top -->

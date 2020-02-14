<style type="text/css" media="screen">
    label {
        color: #000;
    }
</style>
<div id="content" role="main">
<div class="page-header dark larger larger-desc">
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<h1><?php echo $title ?></h1>
</div><!-- End .col-md-6 -->
</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .page-header -->


<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
  
<?php 

echo validation_errors('<div class="alert alert-warning">','</div>');

if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success text-center">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>
   <?php echo form_open(base_url('member/login/lupa')); ?>
    <div class="col-md-12">
    
    <div class="form-group formField">
    	<label>Masukkan Email (Username) Anda</label>
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>

    </div>
    
   </div>
<div class="col-md-12"> 
     <div class="form-group xss-margin">
        <button type="submit" class="btn btn-success btn-lg btn-block">Reset Password</button>
    <br><br><strong><a href="<?php echo base_url('pendaftaran') ?>">Pendaftaran Online</a> | <a href="<?php echo base_url('member/login') ?>">Login</a></strong>
    </div>
</div>
<?php echo form_close(); ?>

</div><!-- End .row -->
</div><!-- End .container -->

<div class="mb20"></div><!-- space -->

</div><!-- End #content -->
</div>
</div>
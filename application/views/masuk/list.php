
<section class="bg-servicesstyle2-section">
<div class="container">
<div class="row">
<div class="our-services-option">
<div class="section-header">
    <h2><?php echo $title ?></h2>
    <p>Masukkan username dan password dengan benar</p>
</div>
<!-- .section-header -->
<div class="row">
<div class="col-md-6 col-md-offset-3">
<?php
if($this->session->flashdata('sukses'))
{
echo '<div class="alert alert-success text-justify">';
echo $this->session->flashdata('sukses');
echo '</div>';
}
if($this->session->flashdata('warning'))
{
echo '<div class="alert alert-warning text-justify"><i class="fa fa-warning"></i> ';
echo $this->session->flashdata('warning');
echo '</div>';
}
if($this->session->flashdata('gagal'))
{
echo '<div class="alert alert-danger text-justify"><i class="fa fa-warning"></i> ';
echo $this->session->flashdata('gagal');
echo '</div>';
}
?>

    <?php echo form_open(base_url('masuk'), 'class="contact-form"'); ?>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
    </div><!-- End .from-group -->
    <div class="form-group mb10">
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
    <!-- <div class="form-group text-right clear-margin helper-group">
        <a href="recover-password.html" title="Recover Password">Lupa password?</a>
    </div> -->
   
    <div class="form-group xss-margin">
        <button type="submit" class="btn btn-success btn-lg">Login</button>
        <button type="reset" class="btn btn-default btn-lg">Reset</button>
    </div><!-- End .from-group -->

    <p>Belum memiliki akun? Silakan <a href="<?php echo base_url('pendaftaran') ?>" title="Pendaftaran">Daftar Online</a> | <a href="<?php echo base_url('member/login/lupa') ?>" title="Lupa Password">Lupa Password</a></p>
    <?php echo form_close(); ?>

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

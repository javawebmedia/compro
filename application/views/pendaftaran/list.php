<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery-2.2.3.min.js"></script>
<!-- Jquery Chained -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-chained/jquery.chained.js"></script>

<section class="bg-servicesstyle2-section">
<div class="container">
<div class="row">
<div class="our-services-option">
<div class="section-header text-left">
  <?php if($gelombang) { ?>
    <h2><?php echo $title ?></h2>
    <p>Isi data pendaftaran Anda dengan lengkap dan benar.</p>
  <?php }else{ ?>
    <h2>Mohon maaf</h2>
  <?php } ?>
</div>
<!-- .section-header -->
<div class="row">

<?php if($gelombang) { ?>
<div class="col-md-8 col-md-offset-2">
      <?php
      if($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success"><i class="fa fa-check"></i> ';
        echo $this->session->flashdata('sukses');
        echo '</div>';
      }

      echo validation_errors('<div class="alert alert-danger">','</div>');

      if(isset($error)) {
        echo '<div class="alert alert-warning">';
        echo $error;
        echo '</div>';
      }
      ?>

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

    <?php echo form_open(base_url('pendaftaran'), 'class="contact-form"'); ?>
    <div class="row">
      <div class="col-md-12">
        <h4>Akun</h4><hr>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username" required>
        </div><!-- End .from-group -->
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" required>
        </div><!-- End .from-group -->
      </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi password" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h4>Data Peneliti</h4><hr>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Universitas/ Kampus</label>
            <select name="id_kampus" id="id_kampus" class="form-control select2" style="border: solid thin #EEE; padding: 10px 20px;">
              <option value="">Pilih Universitas/ Kampus</option>
              <?php foreach($kampus as $kampus) { ?>
                <option value="<?php echo $kampus->id_kampus ?>" <?php if(isset($_POST['id_kampus']) && $_POST['id_kampus']==$kampus->id_kampus) { echo "selected"; } ?>><?php echo $kampus->nama_kampus ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Nama Kampus <span class="text-danger">(jika tidak ada di daftar di atas)</span></label>
            <input type="text" class="form-control" id="nama_kampus" name="nama_kampus" value="<?php echo set_value('nama_kampus'); ?>" placeholder="Nama Kampus">
          </div><!-- End .from-group -->

          <div class="form-group">
            <label>Nama Lembaga Penelitian</label>
            <input type="text" class="form-control" id="nama_peneliti" name="nama_peneliti" value="<?php echo set_value('nama_peneliti'); ?>" placeholder="Nama Lembaga Penelitian" required>
          </div><!-- End .from-group -->
          <div class="form-group">
            <label>Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo set_value('telepon'); ?>" placeholder="Nomor Telepon" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Provinsi</label>
            <select name="id_provinsi" id="id_provinsi" class="form-control" required>
              <option value="">Pilih Provinsi</option>
              <?php foreach($provinsi as $provinsi) { ?>
                <option value="<?php echo $provinsi->id_provinsi ?>" <?php if(isset($_POST['id_provinsi']) && $_POST['id_provinsi']==$provinsi->id_provinsi) { echo "selected"; } ?>><?php echo $provinsi->nama_provinsi ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Kabupaten</label>
            <select name="id_kabupaten" id="id_kabupaten" class="form-control  select2" required>
              <option value="">Pilih Kabupaten</option>
              <?php foreach($kabupaten as $kabupaten) { ?>
                <option value="<?php echo $kabupaten->id_kabupaten ?>" class="<?php echo $kabupaten->id_provinsi ?>" <?php if(isset($_POST['id_kabupaten']) && $_POST['id_kabupaten']==$kabupaten->id_kabupaten) { echo "selected"; } ?>><?php echo $kabupaten->nama_kabupaten ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control text-area" id="alamat" name="alamat" placeholder="Alamat" required><?php echo set_value('alamat'); ?></textarea>
          </div>
        </div>
      </div>
    
    
    <!-- <div class="form-group text-right clear-margin helper-group">
        <a href="recover-password.html" title="Recover Password">Lupa password?</a>
    </div> -->
   
    <div class="form-group xss-margin text-center">
        <button type="submit" class="btn btn-success btn-lg">Daftar</button>
        <button type="reset" class="btn btn-info btn-lg">Reset</button>
    </div><!-- End .from-group -->

    <p>Belum memiliki akun? Silakan <a href="<?php echo base_url('pendaftaran') ?>" title="Pendaftaran">Daftar Online</a> | <a href="<?php echo base_url('member/login/lupa') ?>" title="Lupa Password">Lupa Password</a></p>
    <?php echo form_close(); ?>
</div>

<?php }else{ ?>

<div class="alert alert-warning text-center">
  <h4>Periode Pendaftaran sudah tutup</h4>

  <p>Silakan kembali <a href="<?php echo base_url() ?>" class="btn btn-success btn-xs"><i class="fa fa-home"></i>  Ke halaman utama</a> atau <a href="<?php echo base_url('gelombang') ?>" class="btn btn-success btn-xs"><i class="fa fa-calendar"></i> Lihat Periode Pendaftaran</a></p> </p>
</div>

<?php } ?>


 </div>
    <!-- .row -->
</div>
<!-- .our-services-option -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</section>
<script>
  $("#id_kabupaten").chained("#id_provinsi");
  // $("#id_kecamatan").chained("#id_kabupaten");
</script>
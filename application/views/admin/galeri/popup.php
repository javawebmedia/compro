<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>



<?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Error upload
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Form open
echo form_open_multipart(base_url('admin/popup/edit/'.$galeri->id_galeri));
?>

<div class="col-md-8">

<div class="form-group form-group-lg">
<label>Judul popup</label>
<input type="text" name="judul_galeri" class="form-control" placeholder="Judul galeri" value="<?php echo $galeri->judul_galeri ?>">
</div>

</div>

<div class="col-md-4">

<div class="form-group form-group-lg">
<label>Status popup</label>
  <select name="popup_status" class="form-control">
    <option value="Publish">Aktif</option>
    <option value="Draft" <?php if($galeri->popup_status=="Draft") { echo "selected"; } ?>>Non Aktif</option>
  </select>
</div>

</div>


<div class="col-md-4">
<div class="form-group">
<label>Upload gambar</label>
<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
</div>
</div>

<div class="col-md-8">
  <div class="form-group">
<label>Link/website terkait popup</label>
<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo $galeri->website ?>">
</div>
</div>

<div class="col-md-12">

<div class="form-group">
<label>Isi popup</label>
<textarea name="isi" id="isi" class="form-control konten" placeholder="Isi galeri"><?php echo $galeri->isi ?></textarea>
</div>



<div class="form-group">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
</div>

</div>

<?php
// Form close
echo form_close();
?>
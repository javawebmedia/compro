
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
echo form_open_multipart(base_url('admin/download/tambah'));
?>
<div class="row">
<div class="col-md-12">

<div class="form-group form-group-lg">
<label>Nama file/download</label>
<input type="text" name="judul_download" class="form-control" placeholder="Judul download" value="<?php echo set_value('judul_download') ?>">
</div>

</div>


<div class="col-md-4">

<div class="form-group">
<label>Jenis/Posisi Download</label>
<select name="jenis_download" class="form-control">
	<option value="Download">Download Biasa</option>
	<option value="Panduan">Panduan Penelitian</option>}
</select>

</div>
</div>

<div class="col-md-4">

<div class="form-group">
<label>Kategori Download</label>
<select name="id_kategori_download" class="form-control">

	<?php foreach($kategori_download as $kategori_download) { ?>
	<option value="<?php echo $kategori_download->id_kategori_download ?>"><?php echo $kategori_download->nama_kategori_download ?></option>
	<?php } ?>

</select>

</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Upload file</label>
<input type="file" name="gambar" class="form-control" required="required" placeholder="Upload gambar">
</div>
</div>

<div class="col-md-12">

<div class="form-group">
<label>Isi/keterangan</label>
<textarea name="isi" id="isi" class="form-control" placeholder="Isi download"><?php echo set_value('isi') ?></textarea>
</div>

<div class="form-group">
<label>Link / website yang terkait dengan Download</label>
<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo set_value('website') ?>">
</div>

<div class="form-group">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
</div>

</div>
</div>
<?php
// Form close
echo form_close();
?>
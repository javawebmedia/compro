  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/kategori_download/edit/'.$kategori_download->id_kategori_download));
?>

<div class="form-group">
<input type="text" name="nama_kategori_download" class="form-control" placeholder="Nama kategori download" value="<?php echo $kategori_download->nama_kategori_download ?>" required>
</div>

<div class="form-group">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kategori_download->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>


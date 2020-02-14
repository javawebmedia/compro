<?php
// Notifikasi error
echo validation_errors('<p class="alert alert-warning">','</p>');

// Form open
echo form_open(base_url('admin/bagian/edit/'.$bagian->id_bagian));
?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Nama Bagian <span class="text-danger">*</span></label>
			<input type="text" name="nama_bagian" class="form-control form-control-lg" value="<?php echo $bagian->nama_bagian ?>" placeholder="Nama Bagian" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Kode Bagian <span class="text-danger">*</span></label>
			<input type="text" name="kode_bagian" class="form-control form-control-lg" value="<?php echo $bagian->kode_bagian ?>" placeholder="Kode Bagian" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Status Bagian <span class="text-danger">*</span></label>
			<select name="status_bagian" class="form-control form-control-lg">
				<option value="Aktif">Aktif</option>
				<option value="Non Aktif" <?php if($bagian->status_bagian=="Non Aktif") { echo "selected"; } ?>>Non Aktif</option>
			</select>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label>Deskripsi Bagian</label>
			<textarea name="keterangan" class="form-control textarea" placeholder="Keterangan"><?php echo $bagian->keterangan ?></textarea>
		</div>

		<div class="form-group">
			<label>Wilayah yang dibawahi</label>
			<textarea name="wilayah" class="form-control" placeholder="Wilayah"><?php echo $bagian->wilayah ?></textarea>
		</div>

		<div class="form-group">
			<div class="btn-group">
				<button class="btn btn-success btn-lg" name="submit" type="submit">
					<i class="fa fa-save"></i> Simpan
				</button>
				<button class="btn btn-info btn-lg" name="reset" type="reset">
					<i class="fa fa-times"></i> Reset
				</button>
				<a href="<?php echo base_url('admin/bagian') ?>" class="btn btn-warning btn-lg">
					<i class="fa fa-backward"></i> Kembali
				</a>
			</div>
		</div>
	</div>
</div>
<?php 
// Form close
echo form_close();
?>
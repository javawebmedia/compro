<?php
// Notifikasi error
echo validation_errors('<p class="alert alert-warning">','</p>');

// Form open
echo form_open(base_url('admin/user/edit/'.$user->id_user));
?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Nama User <span class="text-danger">*</span></label>
			<input type="text" name="nama" class="form-control form-control-lg" value="<?php echo $user->nama ?>" placeholder="Nama User" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Username <span class="text-danger">*</span></label>
			<input type="text" name="username" class="form-control form-control-lg" value="<?php echo $user->username ?>" placeholder="username" readonly>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Password <span class="text-danger">*</span></label>
			<input type="password" name="password" class="form-control form-control-lg" value="" placeholder="Password" required>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label>Level Hak Akses <span class="text-danger">*</span></label>
			<select name="akses_level" class="form-control">
				<option value="User">User</option>
				<option value="Admin" <?php if($user->akses_level=="Admin") { echo "selected"; } ?>>Admin</option>
				<option value="Direktur" <?php if($user->akses_level=="Direktur") { echo "selected"; } ?>>Direktur</option>
			</select>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label>Bagian dan Unit Kerja <span class="text-danger">*</span></label>
			<select name="id_bagian" class="form-control">
				<option value="0">Semua Bagian dan Unit Kerja</option>
				<?php foreach($bagian as $bagian) { ?>
				<option value="<?php echo $bagian->id_bagian ?>" <?php if($user->id_bagian==$bagian->id_bagian) { echo "selected"; } ?>>
					<?php echo $bagian->nama_bagian ?>
				</option>
				<?php } ?>
			</select>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label>Email <span class="text-danger">*</span></label>
			<input type="email" name="email" class="form-control" value="<?php echo $user->email ?>" placeholder="Email" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label>Deskripsi User</label>
			<textarea name="keterangan" class="form-control textarea" placeholder="Keterangan"><?php echo $user->keterangan ?></textarea>
		</div>

		<div class="form-group">
			<div class="btn-group">
				<button class="btn btn-success btn-lg" name="submit" type="submit">
					<i class="fa fa-save"></i> Simpan
				</button>
				<button class="btn btn-info btn-lg" name="reset" type="reset">
					<i class="fa fa-times"></i> Reset
				</button>
				<a href="<?php echo base_url('admin/user') ?>" class="btn btn-warning btn-lg">
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
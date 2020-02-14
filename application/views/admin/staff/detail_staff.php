<p class="text-right">
	<a href="<?php echo base_url('admin/staff/cetak/'.$staff->id_staff) ?>" target="_blank" class="btn btn-success btn-sm">
      <i class="fa fa-print"></i> Cetak Profil
    </a>
    <a href="<?php echo base_url('admin/staff/edit/'.$staff->id_staff) ?>" class="btn btn-info btn-sm">
      <i class="fa fa-edit"></i> Update
    </a>
    <a href="<?php echo base_url('admin/staff/kursus/'.$staff->id_staff) ?>" class="btn btn-primary btn-sm">
      <i class="fa fa-graduation-cap"></i> Kursus
    </a>
</p>

<div class="row">
	<div class="col-md-5">
		 <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
		<?php if($staff->gambar != "") { ?>
			<img src="<?php echo base_url('assets/upload/staff/'.$staff->gambar) ?>" alt="<?php echo $staff->nama ?>" class="img img-thumbnail img-circle img-responsive">
		<?php }else{ ?>
			<img src="<?php echo base_url('assets/admin/dist/img/boxed-bg.jpg') ?>" alt="<?php echo $staff->nama ?>" class="img img-thumbnail img-circle">
		<?php } ?>
		</div>
				<hr>
                <h3 class="profile-username text-center"><?php echo $staff->nama ?></h3>

                <p class="text-muted text-center"><?php echo $staff->email ?></p>
                <table class="table">
                	<tbody>
                		<tr>
                			<td>Username</td>
                			<td>: <?php echo $staff->email ?></td>
                		</tr>
                		<tr>
                			<td>Password</td>
                			<td>: <?php echo $staff->password_hint ?></td>
                		</tr>
                	</tbody>
                </table>
            </div>
        </div>
	</div>
	<div class="col-md-7">
		<table class="table">
			<thead>
				<tr>
					<th width="30%">Nama</th>
					<th width="1%">:</th>
					<th><?php echo $staff->nama ?></th>
				</tr>
				<tr>
					<th width="25%">Tempat, tanggal lahir</th>
					<th width="1%">:</th>
					<th><?php echo $staff->tempat_lahir.', '.date('d-m-Y',strtotime($staff->tanggal_lahir)) ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $staff->email ?></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $staff->telepon ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $staff->alamat ?></td>
				</tr>
				<tr>
					<td>Urutan</td>
					<td>:</td>
					<td><?php echo $staff->urutan ?></td>
				</tr>
				<tr>
					<td>Staff Ditampilkan?</td>
					<td>:</td>
					<td><?php echo $staff->status_staff ?></td>
				</tr>
				<tr>
					<td>Jabatan</td>
					<td>:</td>
					<td><?php echo $staff->jabatan ?></td>
				</tr>
				
				<tr>
					<td>Keahlian</td>
					<td>:</td>
					<td><?php echo $staff->keahlian ?></td>
				</tr>
				<tr>
					<td>Keywords di Google</td>
					<td>:</td>
					<td><?php echo $staff->keywords ?></td>
				</tr>
				<tr>
					<td>IP Address</td>
					<td>:</td>
					<td><?php echo $staff->ip_address ?></td>
				</tr>
				<tr>
					<td>Tanggal update</td>
					<td>:</td>
					<td><?php echo $staff->tanggal ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
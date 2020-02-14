<?php
// Form buka utk delete multiple
echo form_open(base_url('admin/user/proses'));
?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php/', '', current_url()) ?>">
<p>
  <div class="btn-group">
    <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success btn-lg">
    <i class="fa fa-plus"></i> Tambah Baru</a>

    <button class="btn btn-danger btn-lg" name="hapus" type="submit">
      <i class="fa fa-trash"></i> Hapus
    </button>
  </div>
</p>

<div class="table-responsive mailbox-messages">
<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th class="text-center" width="5%">
       <!-- Check all button -->
        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
        </button>
    </th>
    <th>NAMA</th>
    <th>USERNAME</th>
    <th>AKSES LEVEL</th>
    <th>BAGIAN</th>
    <th>EMAIL</th>
    <th>ACTION</th>
  </tr>
  </thead>
  <tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($user as $user) {
  ?>

  <tr>
    <td class="text-center">
      <input type="checkbox" name="id_user[]" value="<?php echo $user->id_user ?>">
    </td>
    <td><?php echo $user->nama ?></td>
    <td><?php echo $user->username ?></td>
    <td><?php echo $user->akses_level ?></td>
    <td><?php if($user->id_bagian==0) { echo "Semua Bagian"; }else{ echo $user->nama_bagian; } ?></td>
    <td><?php echo $user->email ?></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
        <a href="<?php echo base_url('admin/user/delete/'.$user->id_user) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>

</div>
<!-- /.mail-box-messages -->
<?php 
// Form tutup
echo form_close(); 
?>

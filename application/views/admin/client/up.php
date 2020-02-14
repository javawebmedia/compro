<p class="text-right">
<div class="btn-group">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModal">
      <i class="fa fa-plus"></i> Tambah CP Baru
    </button>  
    <a href="<?php echo base_url('admin/client') ?>" class="btn btn-info btn-lg">
    	<i class="fa fa-backward"></i> Kembali
    </a>
  </div>
</p>
<?php 
echo validation_errors('<p class="alert alert-warning">','</p>');

include('tambah_up.php');
?>

<table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
<thead>
    <tr>
        <th width="5%">
            <div class="mailbox-controls">NO</div>
        </th>
        <th style="vertical-align: middle;" class="text-center" width="20%">NAMA</th>
        <th style="vertical-align: middle;" class="text-center" width="20%">EMAIL</th>
        <th style="vertical-align: middle;" class="text-center">TELEPON</th>
        <th style="vertical-align: middle;" class="text-center">KETERANGAN</th>
        <th width="20%"></th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($up as $up) {
  ?>

  <tr>
    <td class="text-center"><?php echo $i ?>.</td>
    <td><?php echo $up->nama_up ?>
    	<br><small><?php echo $up->bagian ?></small>
    </td>
    <td><?php echo $up->email ?></td>
    <td><?php echo $up->telepon ?></td>
    <td><?php echo $up->keterangan ?></td>
    <td>
      <div class="btn-group">
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Edit<?php echo $up->id_up ?>">
	      <i class="fa fa-edit"></i> Edit
	    </button>  
        <a href="<?php echo base_url('admin/client/delete_up/'.$up->id_up.'/'.$client->id_client) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"> Delete</i></a>
      </div>
      <?php include('edit_up.php') ?>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>
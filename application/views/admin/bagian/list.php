<?php
// Form buka utk delete multiple
echo form_open(base_url('admin/bagian/proses'));
?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php/', '', current_url()) ?>">
<p>
  <div class="btn-group">
    <a href="<?php echo base_url('admin/bagian/tambah') ?>" class="btn btn-success btn-lg">
    <i class="fa fa-plus"></i> Tambah Baru</a>

    <button class="btn btn-info btn-lg" name="aktifkan" type="submit">
      <i class="fa fa-check"></i> Aktifkan
    </button>

    <button class="btn btn-warning btn-lg" name="non_aktifkan" type="submit">
      <i class="fa fa-times"></i> Non Aktifkan
    </button>

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
    <th>KODE</th>
    <th>NAMA</th>
    <th>WILAYAH</th>
    <th>STATUS</th>
    <th>ACTION</th>
  </tr>
  </thead>
  <tbody>

  <?php 
  // Looping data bagian dg foreach
  $i=1;
  foreach($bagian as $bagian) {
  ?>

  <tr>
    <td class="text-center">
      <input type="checkbox" name="id_bagian[]" value="<?php echo $bagian->id_bagian ?>">
    </td>
    <td><?php echo $bagian->kode_bagian ?></td>
    <td><?php echo $bagian->nama_bagian ?></td>
    <td><?php echo $bagian->wilayah ?></td>
    <td><?php echo $bagian->status_bagian ?></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/bagian/edit/'.$bagian->id_bagian) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
        <a href="<?php echo base_url('admin/bagian/delete/'.$bagian->id_bagian) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"></i> Hapus</a>
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

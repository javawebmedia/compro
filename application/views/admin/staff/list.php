
<div class="row">
<div class="col-md-6">
    

<p>

    <?php include('tambah.php') ?>
</p>
</div>
</div>
<?php
echo form_open(base_url('admin/staff/proses'));
?>
<p class="text-right">
<div class="btn-group">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
      <i class="fa fa-plus"></i> Tambah Staff
    </button>

    
    <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fa fa-trash-o"></i> Hapus
    </button>
    <button class="btn btn-primary" type="submit" name="export" onClick="Export();" >
      <i class="fa fa-file-excel-o"></i> Export Excel (Terpilih)
    </button>

    <button class="btn btn-info" type="submit" name="exportAll" onClick="Export();" >
      <i class="fa fa-file-excel-o"></i> Export Excel (Semua)
    </button>
    
  </div>
</p>
<div class="table-responsive mailbox-messages">
<table id="example" class="display table table-bordered table-hover" cellspacing="0" width="100%">
<thead>
    <tr>
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-xs checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
            </div>
        </th>
        <th style="vertical-align: middle;" class="text-center" width="25%">NAMA</th>
        <th style="vertical-align: middle;" class="text-center" width="20%">JABATAN</th>
        <th style="vertical-align: middle;" class="text-center">STATUS</th>
        <th style="vertical-align: middle;" class="text-center">URUTAN</th>
        <th width="15%"></th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($staff as $staff) {
  ?>

  <tr>
    <td class="text-center">
      <input type="checkbox" name="id_staff[]" value="<?php echo $staff->id_staff ?>">
    </td>
    <td><?php echo $staff->nama ?><br>
        <small>Telepon: <?php echo $staff->telepon ?>
        <br>Email: <?php echo $staff->email ?></small></td>
    <td><?php echo $staff->jabatan ?></td>
    <td><?php echo $staff->status_staff ?></td>
    <td><?php echo $staff->urutan ?></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/staff/edit/'.$staff->id_staff) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
        <a href="<?php echo base_url('admin/staff/delete/'.$staff->id_staff) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>

<?php echo form_close(); ?>
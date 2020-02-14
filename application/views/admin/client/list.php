
<div class="row">
<div class="col-md-6">
    

<p>

    <?php include('tambah.php') ?>
</p>
</div>
</div>
<?php
echo form_open(base_url('admin/client/proses'));
?>
<p class="text-right">
<div class="btn-group">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
      <i class="fa fa-plus"></i> Tambah Client
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
<table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
<thead>
    <tr>
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-xs checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
            </div>
        </th>
        <th style="vertical-align: middle;" class="text-center" width="20%">NAMA</th>
        <th style="vertical-align: middle;" class="text-center" width="20%">EMAIL/USERNAME</th>
        <th style="vertical-align: middle;" class="text-center">CP</th>
        <th style="vertical-align: middle;" class="text-center">JENIS</th>
        <th width="20%"></th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($client as $client) {
    $id_client = $client->id_client;
    $up       = $this->up_model->listing($id_client);
  ?>

  <tr>
    <td class="text-center">
      <input type="checkbox" name="id_client[]" value="<?php echo $client->id_client ?>">
    </td>
    <td><?php echo $client->nama ?><br>
        <small>
        Pimpinan: <?php echo $client->pimpinan ?>
        <br>Telepon: <?php echo $client->telepon ?>
        <br>Alamat: <br><?php echo nl2br($client->alamat) ?></small></td>
    <td><?php echo $client->email ?></td>
    <td><?php if($up) { foreach($up as $up) { echo $up->nama_up.' ('.$up->bagian.'), '; }}else{ echo '-'; } ?></td>
    <td><?php echo $client->jenis_client ?></td>
    <td>
      <div class="btn-group">
        <?php if($client->email!="") { ?>
        <a href="<?php echo base_url('admin/client/approval/'.$client->id_client) ?>" class="btn btn-success btn-sm" onclick="akses(event)"><i class="fa fa-lock"></i> Beri Akses</a>
        <?php }else{ ?>
          <a href="#" class="btn btn-default btn-sm" onclick="akses(event)"><i class="fa fa-lock"></i> Beri Akses</a>
        <?php } ?>
        <a href="<?php echo base_url('admin/client/up/'.$client->id_client) ?>" class="btn btn-info btn-sm"><i class="fa fa-envelope"></i> Data CP</a>
        <a href="<?php echo base_url('admin/client/edit/'.$client->id_client) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
        <a href="<?php echo base_url('admin/client/delete/'.$client->id_client) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>


<?php echo form_close(); ?>
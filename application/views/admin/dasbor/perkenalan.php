
<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th class="text-center" width="5%">NO
    </th>
    <th width="25%">NAMA CLIENT</th>
    <th>PERIHAL</th>
    <th>EMAIL PENERIMA</th>
    <th>ACTION</th>
  </tr>
  </thead>
  <tbody>

  <?php 
  // Looping data perkenalan dg foreach
  $i=1;
  foreach($perkenalan as $perkenalan) {
  ?>

  <tr>
    <td class="text-center"><?php echo $i ?>
    </td>
    <td><?php echo $perkenalan->nama ?>
      <br><small>
        <?php echo $perkenalan->penerima ?>
      </small>
    </td>
    <td><?php echo $perkenalan->perihal ?>
      <br><small>
        UP: <?php echo $perkenalan->up ?>
        <br>Client: <?php echo $perkenalan->nama ?>
        <br>No Surat: <?php echo $perkenalan->nomor_surat ?>
        <br>Jenis: <em><?php echo $perkenalan->nama_template ?></em>
      </small>
    </td>
    <td><?php echo $perkenalan->email_penerima ?>
      <small>
        <br><i class="fa fa-envelope"></i> Kirim: <?php if($perkenalan->kirim==NULL) { echo '0'; }else{ echo $perkenalan->kirim; } ?> kali
        <br><i class="fa fa-paperclip"></i> Attachment: <?php if($perkenalan->gambar==NULL) { echo 'Tidak ada'; }else{ ?>
          <a href="<?php echo base_url('assets/upload/file/'.$perkenalan->gambar) ?>" target="_blank">
            <i class="fa fa-download"></i> Unduh</a>
        <?php } ?>
      </small>
    </td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/perkenalan/kirim/'.$perkenalan->id_perkenalan) ?>" class="btn btn-success btn-xs" onclick="kirim(event)"><i class="fa fa-envelope"></i> Kirim Surat</a>
        <a href="<?php echo base_url('admin/perkenalan/edit/'.$perkenalan->id_perkenalan) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
        <a href="<?php echo base_url('admin/perkenalan/delete/'.$perkenalan->id_perkenalan) ?>" class="btn btn-danger btn-xs" onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
      </div>
      <br>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/perkenalan/preview/'.$perkenalan->id_perkenalan) ?>" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-search"></i> Preview</a>
         <a href="<?php echo base_url('admin/perkenalan/cetak/'.$perkenalan->id_perkenalan) ?>" class="btn btn-info btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</a>
         <a href="<?php echo base_url('admin/perkenalan/word/'.$perkenalan->id_perkenalan) ?>" class="btn btn-success btn-xs"><i class="fa fa-file-word-o"></i> Word</a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>

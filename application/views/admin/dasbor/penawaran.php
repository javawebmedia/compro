<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th class="text-center" width="5%">
       NO
    </th>
    <th width="25%">NAMA CLIENT</th>
    <th>PERIHAL</th>
    <th>EMAIL PENERIMA</th>
    <th>ACTION</th>
  </tr>
  </thead>
  <tbody>

  <?php 
  // Looping data penawaran dg foreach
  $i=1;
  foreach($penawaran as $penawaran) {
  ?>

  <tr>
    <td class="text-center">
     <?php echo $i ?>
    </td>
    <td><?php echo $penawaran->nama ?>
      <br><small>
        <?php echo $penawaran->penerima ?>
      </small>
    </td>
    <td><?php echo $penawaran->perihal ?>
      <br><small>
        UP: <?php echo $penawaran->up ?>
        <br>Client: <?php echo $penawaran->nama ?>
        <br>No Surat: <?php echo $penawaran->nomor_surat ?>
        <br>Jenis: <em><?php echo $penawaran->nama_template ?></em>
      </small>
    </td>
    <td><?php echo $penawaran->email_penerima ?>
      <small>
        <br><i class="fa fa-envelope"></i> Kirim: <?php if($penawaran->kirim==NULL) { echo '0'; }else{ echo $penawaran->kirim; } ?> kali
        <br><i class="fa fa-paperclip"></i> Attachment: <?php if($penawaran->gambar==NULL) { echo 'Tidak ada'; }else{ ?>
          <a href="<?php echo base_url('assets/upload/file/'.$penawaran->gambar) ?>" target="_blank">
            <i class="fa fa-download"></i> Unduh</a>
        <?php } ?>
      </small>
    </td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/penawaran/kirim/'.$penawaran->id_penawaran) ?>" class="btn btn-success btn-xs" onclick="kirim(event)"><i class="fa fa-envelope"></i> Kirim Surat</a>
        <a href="<?php echo base_url('admin/penawaran/edit/'.$penawaran->id_penawaran) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
        <a href="<?php echo base_url('admin/penawaran/delete/'.$penawaran->id_penawaran) ?>" class="btn btn-danger btn-xs" onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
      </div>
      <br>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/penawaran/preview/'.$penawaran->id_penawaran) ?>" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-search"></i> Preview</a>
         <a href="<?php echo base_url('admin/penawaran/cetak/'.$penawaran->id_penawaran) ?>" class="btn btn-info btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</a>
         <a href="<?php echo base_url('admin/penawaran/word/'.$penawaran->id_penawaran) ?>" class="btn btn-success btn-xs"><i class="fa fa-file-word-o"></i> Word</a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
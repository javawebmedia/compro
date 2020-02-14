
<?php
echo form_open(base_url('admin/agenda/proses'));
?>
<p class="btn-group">
  <a href="<?php echo base_url('admin/agenda/tambah') ?>" class="btn btn-success btn-lg">
  <i class="fa fa-plus"></i> Tambah Agenda</a>

  <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fa fa-trash-o"></i> Hapus
    </button> 

</p>


<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
<tr class="bg-info">
    <th width="5%">
        <div class="mailbox-controls">
            <!-- Check all button -->
            <button type="button" class="btn btn-default btn-xs checkbox-toggle"><i class="fa fa-square-o"></i>
            </button>
        </div>
    </th>
    <th >Nama kegiatan</th>
    <th >Jenis</th>
    <th >Mulai</th>
    <th >Selesai</th>
    <th >Tempat</th>
    <th >Panitia</th>
    <th width="10%">&nbsp;</th>
  </tr>
</thead>
<tbody>
  <?php foreach($agenda as $row) { ?>
  <tr>
 <td>
      <div class="mailbox-star text-center"><div class="text-center">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_agenda[]" value="<?php echo $row['id_agenda'] ?>">
        <span class="checkmark"></span>
      </div>
    </td>
    <td><?php echo $row['nama'] ?></td>
    <td><?php echo $row['jenis_agenda'] ?></td>
    <td><?php echo date('d F Y', strtotime($row['mulai'])) ?></td>
    <td><?php echo date('d F Y', strtotime($row['selesai'])) ?></td>
    <td><?php echo $row['tempat'] ?></td>
    <td><?php echo $row['panitia'] ?></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url() ?>admin/agenda/edit/<?php echo $row['id_agenda'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a> 

        <a href="<?php echo base_url() ?>admin/agenda/delete/<?php echo $row['id_agenda'] ?>" class="btn btn-danger btn-xs" onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a> 
       </div> 
    </td>
  </tr>
  <?php } ?>
</tbody>
</table>
</div>
<?php echo form_close(); ?>

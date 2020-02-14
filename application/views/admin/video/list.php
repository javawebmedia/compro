<?php
echo form_open(base_url('admin/video/proses'));
?>
<p class="btn-group">
  <a href="<?php echo base_url('admin/video/tambah') ?>" class="btn btn-success btn-lg">
  <i class="fa fa-plus"></i> Tambah Video Youtube</a>

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
        <th width="12%">Video</th>
        <th width="19%">Judul Video</th>
        <th width="21%">Position</th>
        <th width="7%">Keterangan</th>
        <th width="17%"></th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($video as $video) { ?>
    <tr class="odd gradeX">
        <td>
          <div class="mailbox-star text-center"><div class="text-center">
            <input type="checkbox" class="icheckbox_flat-blue " name="id_video[]" value="<?php echo $video->id_video ?>">
            <span class="checkmark"></span>
          </div>
        </td>
        <td class="video"> <iframe src="https://www.youtube.com/embed/<?php echo $video->video ?>"></iframe></td>
        <td>
		<?php echo $video->judul ?> - <?php echo $video->urutan ?>
        <sup><a href="<?php echo base_url('video/detail/'.$video->id_video) ?>"><i class="fa fa-link"></i></a></sup>
        <br><small>Lang: <span class="flag-icon <?php if($video->bahasa=="English") { echo "flag-icon-gb"; }else{ echo "flag-icon-id"; } ?>"></span> <?php echo $video->bahasa ?></small>
        </td>
        <td><?php echo $video->posisi ?></td>
        <td><?php echo $video->keterangan ?></td>
        <td>
        
            <div class="btn-group">
        <a href="<?php echo base_url('admin/video/edit/'.$video->id_video) ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
       
       
         <a href="<?php echo base_url('admin/video/delete/'.$video->id_video) ?>" class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
     </div>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>
</div>
<?php echo form_close(); ?>
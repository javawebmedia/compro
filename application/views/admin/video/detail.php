 <!-- Delete video -->
       <!--  Modals-->
<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#Detail<?php echo $video->id_video; ?>"><i class="fa fa-eye"></i></button>

<div class="modal fade" id="Detail<?php echo $video->id_video; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><?php echo $video->judul ?></h4>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
    <td colspan="2" align="center" class="video"><?php echo $video->video; ?></td>
    </tr>
  <tr class="bg-primary">
    <th colspan="2" align="center"><?php echo $video->judul; ?></th>
    </tr>
  <tr>
    <td>Position</td>
    <td><?php echo $video->posisi; ?></td>
  </tr>
   <tr>
    <td>Tanggal update</td>
    <td><?php echo $video->tanggal; ?></td>
  </tr>
   <tr class="bg-primary">
    <th colspan="2" align="center">Keterangan</th>
    </tr>
     <tr>
    <td colspan="2"><?php echo $video->keterangan; ?></td>
    </tr>
</table>
</div>
<div class="clearfix"></div>
      </div>
      
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>
<!-- End Modals-->
<!-- Delete video -->
       <!--  Modals-->
<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $video->id_video; ?>"><i class="fa fa-trash-o"></i></button>

<div class="modal fade" id="Delete<?php echo $video->id_video; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus video ini?</h4>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
    <td>Judul Video Video</td>
    <td><?php echo $video->judul ?></td>
  </tr>
  <tr>
    <td>Website/Link Publikasi</td>
    <td><?php echo $video->video; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <a href="<?php echo base_url('admin/video/delete/'.$video->id_video) ?>" class="btn btn-primary btn-sm">Delete Video</a>
    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button></td>
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
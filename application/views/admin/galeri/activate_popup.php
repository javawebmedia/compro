<?php if($galeri->popup_status == "Publish") { ?>
<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#activate<?php echo $i ?>">
    <i class="fa fa-check"></i> Non Aktifkan
</button>

<?php }else{ ?>
<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#activate<?php echo $i ?>">
    <i class="fa fa-check"></i> Aktifkan
</button>
<?php } ?>
<div class="modal fade" id="activate<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Aktivasi Popup</h4>
</div>
<div class="modal-body">
    
    <p class="alert alert-success">Yakin ingin mengaktifkan ini?</p>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <?php if($galeri->popup_status == "Publish") { ?>
		<a href="<?php echo base_url('admin/popup/non_aktifkan/'.$galeri->id_galeri) ?>" class="btn btn-success">
    <i class="fa fa-check"></i> Ya, Non Aktifkan</a>
    <?php }else{ ?>
    	<a href="<?php echo base_url('admin/popup/aktifkan/'.$galeri->id_galeri) ?>" class="btn btn-success">
    	<i class="fa fa-check"></i> Ya, Aktifkan dan Non Aktifkan yang lain</a>
    <?php } ?>

</div>
</div>
</div>
</div>

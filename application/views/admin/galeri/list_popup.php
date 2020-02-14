<script>
  $("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
});
</script>
<p><a href="<?php echo base_url('admin/popup/tambah') ?>" class="btn btn-primary">
<i class="fa fa-plus"></i> Tambah</a></p>

<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>Gambar</th>
    <th>Judul</th>
    <th>Status</th>
    <th>Website</th>
    <th>Author</th>
    <th>Tanggal</th>
    <th width="20%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($galeri as $galeri) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->gambar) ?>" width="60">
    </td>
    <td><?php echo $galeri->judul_galeri ?></td>
    <td><?php echo $galeri->popup_status ?></td>
    <td><?php echo $galeri->website ?></td>
    <td><?php echo $galeri->nama ?></td>
    <td><?php echo $galeri->tanggal ?></td>
    <td>

      <?php include('activate_popup.php'); ?>

      <a href="<?php echo base_url('admin/popup/edit/'.$galeri->id_galeri) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete_popup.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
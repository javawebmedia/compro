<p>
  <?php include('tambah.php') ?>
</p>



<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>Nama kategori download</th>
    <th>Slug</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_download as $kategori_download) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $kategori_download->nama_kategori_download ?></td>
    <td><?php echo $kategori_download->slug_kategori_download ?></td>
    <td><?php echo $kategori_download->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/kategori_download/edit/'.$kategori_download->id_kategori_download) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
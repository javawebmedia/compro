<p>
  <?php include('tambah.php') ?>
</p>



<table class="table table-bordered table-hover table-striped" id="example1">
<thead class="bordered-darkorange">
<tr>
    <th>#</th>
    <th>Nama kategori</th>
    <th>Slug</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori as $kategori) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $kategori->nama_kategori ?></td>
    <td><?php echo $kategori->slug_kategori ?></td>
    <td><?php echo $kategori->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/kategori/edit/'.$kategori->id_kategori) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <a href="<?php echo base_url('admin/kategori/delete/'.$kategori->id_kategori) ?>" 
      class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>

<p class="warning">Yakin ingin menghapus data agenda ini?</p>
<form name="form1" action="<?php echo base_url() ?>admin/agenda/delete/<?php echo $agenda['id_agenda'] ?>" method="post" class="myform">
<input type="hidden" name="id_agenda" value="<?php echo $agenda['id_agenda'] ?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
    <tr>
      <td width="25%">Nama agenda</td>
      <td width="75%"><?php echo $agenda['nama'] ?></td>
    </tr>
    <tr>
      <td>Level hak akses</td>
      <td><?php echo $agenda['jenis_agenda'] ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn btn-primary btn-lg"  name="submit" id="submit" value="Delete agenda">
      
        <a href="<?php echo base_url() ?>admin/agenda" class="tambah">Cancel</a></td>
    </tr>
  </table>


</form>

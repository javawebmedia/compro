<?php
$site   = $this->konfigurasi_model->listing();
echo form_open(base_url('admin/berita/proses'));
?>
<p class="btn-group">
  <a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-success btn-lg">
  <i class="fa fa-plus"></i> Tambah Berita/Profil</a>

  <button class="btn btn-warning" type="submit" name="draft" onClick="check();" >
      <i class="fa fa-times"></i> Jangan Publikasikan
  </button>

   <button class="btn btn-primary" type="submit" name="publish" onClick="check();" >
      <i class="fa fa-check"></i> Publikasikan
  </button>

  <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fa fa-trash-o"></i> Hapus
    </button> 
<?php 
$url_navigasi = $this->uri->segment(2); 
if($this->uri->segment(3) != "") { 
 ?>
<a href="<?php echo base_url('admin/'.$url_navigasi) ?>"  class="btn btn-primary">
 <i class="fa fa-backward"></i> Kembali</a>
 <?php } ?>
</p>
<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
<thead>
<tr>
    <th width="5%">
        <div class="mailbox-controls">
            <!-- Check all button -->
            <button type="button" class="btn btn-default btn-xs checkbox-toggle"><i class="fa fa-square-o"></i>
            </button>
        </div>
    </th>
    <th width="10%">GAMBAR</th>
    <th width="35%">JUDUL</th>
    <th width="15%">KATEGORI</th>
    <th width="10%">JENIS</th>
    <th width="10%">STATUS</th>
    <th width="10%">AUTHOR</th>
    <th width="15%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($berita as $berita) { ?>

<tr class="odd gradeX">
    <td>
      <div class="mailbox-star text-center"><div class="text-center">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_berita[]" value="<?php echo $berita->id_berita ?>">
        <span class="checkmark"></span>
      </div>
    </td>
    <td>
    <?php if($berita->gambar!="") { ?>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" class="img img-thumbnail img-responsive" width="60">
      <?php }else{ ?>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$site->icon) ?>" class="img img-thumbnail img-responsive" width="60">
      <?php } ?>
    </td>
    <td>
    <a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>">
    <?php echo $berita->judul_berita ?> <sup><i class="fa fa-pencil"></i></sup>
    </a>
      <small>
        <br>Posted: <?php echo date('d M Y H:i: s',strtotime($berita->tanggal_post)) ?>
        <br>Published: <?php echo date('d M Y H:i: s',strtotime($berita->tanggal_publish)) ?>
        <?php if($berita->jenis_berita=="Promo") { ?>
          <br>Promo: <span class="text-danger"><strong><?php echo date('d M Y',strtotime($berita->tanggal_mulai)) ?> s/d <?php echo date('d M Y ',strtotime($berita->tanggal_selesai)) ?></strong></span>
        <?php } ?>
        <br>Urutan: <?php echo $berita->urutan ?>
        <br>Icon: <i class="<?php echo $berita->icon ?>"></i> <?php echo $berita->icon ?>
        <br>Tgl posting: <?php echo date('d-m-Y',strtotime($berita->tanggal_publish)) ?>
      </small>
    </td>
    <td>
    <a href="<?php echo base_url('admin/berita/kategori/'.$berita->id_kategori) ?>">
    <?php echo $berita->nama_kategori ?><sup><i class="fa fa-link"></i></sup>
    </a>
    </td>
    <td>
    <a href="<?php echo base_url('admin/berita/jenis_berita/'.$berita->jenis_berita) ?>">
    <?php echo $berita->jenis_berita ?><sup><i class="fa fa-link"></i></sup>
    </a></td>
    <td><a href="<?php echo base_url('admin/berita/status_berita/'.$berita->status_berita) ?>"><?php echo $berita->status_berita ?><sup><i class="fa fa-link"></i></sup>
    </a></td>
    <td>
    <a href="<?php echo base_url('admin/berita/author/'.$berita->id_user) ?>">
    <?php echo $berita->nama ?><sup><i class="fa fa-link"></i></sup>
    </a></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" 
        class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

        <a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>" 
        class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

        <a href="<?php echo base_url('admin/berita/delete/'.$berita->id_berita) ?>" class="btn btn-danger btn-xs" onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
      </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
<?php echo form_close(); ?>
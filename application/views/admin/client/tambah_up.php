

<?php echo form_open_multipart(base_url('admin/client/up/'.$client->id_client),'id="tambah"') ?>
<!-- Modal -->
<input type="hidden" name="jenis" value="tambah">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah CP Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group has-error">
              <label class="text-danger">Nama CP <span class="text-danger">*</span></label>
              <input type="text" name="nama_up" id="nama_up" class="form-control" placeholder="Nama lengkap" value="<?php echo set_value('nama_up') ?>" required>
            </div>

             <div class="form-group has-error">
              <label class="text-danger">Nama Bagian/Jabatan <span class="text-danger">*</span></label>
              <input type="text" name="bagian" id="bagian" class="form-control" placeholder="Nama Bagian/Jabatan" value="<?php echo set_value('bagian') ?>" required>
            </div>

            <div class="form-group">
              <label>Email up <span class="text-danger">*</span></label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
            </div>

            <div class="form-group">
              <label>Telepon</label>
              <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>">
            </div>

            

            <div class="form-group">
              <label>Keterangan lain</label>
              <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan lain"><?php echo set_value('keterangan') ?></textarea>
            </div>

            <p class="pull-right">
            <div class="form-group btn-group">
              <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Data</button>
              <button type="reset" name="reset" class="btn btn-info btn-lg"><i class="fa fa-cut"></i> Reset</button>
              <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
            </p>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div>
  </div>
</div>

<?php echo form_close(); ?>
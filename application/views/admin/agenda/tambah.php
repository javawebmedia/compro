<script src="http://localhost/bimaui/assets/ckeditor/ckeditor.js"></script>

<!-- validasi -->
</script>
	<script>
	$(function() {
		$( "#mulai" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			dateFormat: "yy-mm-dd",
			changeYear: true,
			numberOfMonths: 2,
			onSelect: function( selectedDate ) {
				$( "#selesai" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#selesai" ).datepicker({
			defaultDate: "+1w",
			dateFormat: "yy-mm-dd",
			changeYear: true,
			changeMonth: true,
			numberOfMonths: 2,
			onSelect: function( selectedDate ) {
				$( "#mulai" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
	</script>
    
<?php echo validation_errors(); ?>
  <?php echo form_open_multipart(base_url('admin/agenda/tambah')) ?>

      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
        <tr valign="baseline">
          <td width="22%" align="right" nowrap>Nama agenda kegiatan</td>
          <td width="78%">
            <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>" placeholder="Nama agenda" size="50">
          </td>
        </tr>
        <tr valign="baseline">
          <td align="right" nowrap>Jenis Agenda/Training</td>
          <td><select class="form-control"  name="jenis_agenda" id="jenis_agenda">
            <option value="Internal">Agenda Internal</option>
            <option value="External">Agenda External</option>
          </select>
            </td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Panitia pelaksana</td>
          <td><input type="text" class="form-control" name="panitia" value="<?php echo set_value('panitia') ?>" placeholder="Nama panitia"  size="40"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Tempat pelaksanaan</td>
          <td><input type="text" class="form-control" name="tempat" value="<?php echo set_value('tempat') ?>" placeholder="Nama tempat"  size="40"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Tanggal mulai</td>
          <td>
          <input type="text" class="form-control" name="mulai" value="<?php echo set_value('mulai') ?>" placeholder="YYYY-MM-DD"  size="32" data-date-format="yyyy-mm-dd" readonly id="mulai">
         <br></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Tanggal selesai </td>
          <td>
          <input type="text" class="form-control" name="selesai" value="<?php echo set_value('selesai') ?>" placeholder="YYYY-MM-DD"  size="32" data-date-format="yyyy-mm-dd" readonly id="selesai">
         </td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Deskripsi ringkas</td>
          <td>
            <input type="text" class="form-control" name="ringkasan" value="<?php echo set_value('ringkasan') ?>" placeholder="ringkasan"  size="50">
          </td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right" valign="top">Deskripsi lengkap</td>
          <td><textarea name="isi" id="isi" cols="50" rows="5" class="ckeditor form-control" placeholder="Deskripsi lengkap"><?php echo set_value('isi') ?></textarea></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right" valign="top">Upload Gambar</td>
          <td><textarea name="isi" id="isi" cols="50" rows="5" class="ckeditor form-control" placeholder="Deskripsi lengkap"><?php echo set_value('isi') ?></textarea></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><input name="Submit" type="submit" class="btn btn-primary btn-lg"  value="Simpan data agenda">
          <input name="Submit2" type="reset" class="btn btn-primary btn-lg"  value="Reset">
         </td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1">
  </form>






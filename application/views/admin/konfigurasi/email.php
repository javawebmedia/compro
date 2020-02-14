
<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><div class="alert alert-success">','</div></div>'); 
?>

<?php echo form_open(base_url('admin/konfigurasi/email_setting')) ?>
<div class="row">
<input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">


<div class="col-md-4">
    <div class="form-group">
    <label>Protocol Email</label>
    <input type="text" name="protocol" placeholder="Protocol Email" value="<?php echo $site->protocol ?>" required class="form-control">
    </div>
    
    <div class="form-group">
    <label>SMTP Host</label>
    <input type="text" name="smtp_host" placeholder="SMTP Host" value="<?php echo $site->smtp_host ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label>SMTP Port</label>
    <input type="number" name="smtp_port" placeholder="SMTP Port" value="<?php echo $site->smtp_port ?>" class="form-control">
    </div>
</div>

<div class="col-md-8">
    
    <div class="form-group">
    <label>SMTP Timeout</label>
    <input type="number" name="smtp_timeout" placeholder="SMTP Timeout" value="<?php echo $site->smtp_timeout ?>" class="form-control" required>
    </div>
    
    
     <div class="form-group">
    <label>SMTP Username (Email)</label>
    <input type="email" name="smtp_user" placeholder="SMTP User" value="<?php echo $site->smtp_user ?>" class="form-control">
    </div>
    
      <div class="form-group">
    <label>SMTP Password</label>
    <input type="text" name="smtp_pass" placeholder="SMTP Password" value="<?php echo $site->smtp_pass ?>" class="form-control">
    </div>
    
    <div class="form-group btn-group">
        <input type="submit" name="submit" value="Save Configuration" class="btn btn-success btn-lg">
        <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg">
    </div>
    </div>
</div>


</div>
</form>


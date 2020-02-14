<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 

// File upload error
if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<?php echo form_open(base_url('admin/video/edit/'.$video->id_video)) ?>
<div class="row">
<div class="col-md-6">
	<div class="form-group input-group-lg">
    	<label>Judul Video</label>
        <input type="text" name="judul" class="form-control" value="<?php echo $video->judul ?>" required placeholder="Judul Video">
    </div>  
</div>

<div class="col-md-3">
	<div class="form-group">
    	<label>Bahasa</label>
        <select name="bahasa" class="form-control">
        	<option value="English" <?php if($video->bahasa=="English") { echo "selected"; } ?>>English</option>
            <option value="Indonesia" <?php if($video->bahasa=="Indonesia") { echo "selected"; } ?>>Bahasa Indonesia</option>
        </select>
    </div>	
</div>


    <div class="col-md-3">
	<div class="form-group input-group-lg">
    	<label>Urutan tampil</label>
        <input type="number" name="urutan" class="form-control" value="<?php echo $video->urutan ?>" required placeholder="Urutan tampil">
    </div>
    </div>

<div class="col-md-6">
     <div class="form-group">
    	<label>Posisi Video</label>
        <select name="posisi" class="form-control">
        	<option value="Homepage" <?php if($video->posisi=="Homepage") { echo "selected"; } ?>>Homepage - Main page</option>
            <option value="Video" <?php if($video->posisi=="Video") { echo "selected"; } ?>>Video - Video page</option>
        </select>
    </div>
    
    <div class="form-group">
   	  <label>Keterangan</label>
        <textarea name="keterangan" placeholder="Keterangan" class="form-control" id="keterangan"><?php echo $video->keterangan ?></textarea>
    </div>
</div>

<div class="col-md-6">
	
    <div class="form-group">
        <label>Kode Video dari Youtube</label>
      <input type="text" name="video" required class="form-control" placeholder="Kode video dari Youtube" value="<?php echo $video->video ?>">
    </div>

	<div class="form-group">
   	  <label> Lihat Detail</label>
      	<a href="<?php echo base_url('assets/images/youtube.jpg') ?>" target="_blank">
        <img src="<?php echo base_url('assets/images/youtube.jpg') ?>" class="img-responsive img-thumbnail">
        </a>
	</div>

    <div class="form-group">
    <input type="submit" name="submit" value="Save Video" class="btn btn-success btn-lg">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg">
    </div>
	
</div>

</div>
</form>
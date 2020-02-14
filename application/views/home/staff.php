<section class="ftco-section ftco-speakers" id="speakers-section">
<div class="container">
<div class="row justify-content-center pb-5">
<div class="col-md-12 heading-section heading-section-white text-center ftco-animate">
<span class="subheading">CONSULTANTS</span>
<h2 class="mb-4">Meet Up Our Consultants</h2>
</div>
</div>
<div class="row">
	<?php foreach($staff as $staff) { ?>
	<div class="col-sm-6 col-md-6 col-lg-3 ftco-animate">
		<div class="staff">
			<div class="img-wrap d-flex align-items-stretch justify-content-end">
				<div class="img align-self-stretch" style="background-image: url(<?php echo base_url('asets/upload/staff/'.$staff->gambar) ?>);"></div>
			</div>
			<div class="text d-flex align-items-center pt-3">
				<div>
					<h3 class="mb-2"><?php echo $staff->nama ?></h3>
					<span class="position mb-4"><?php echo $staff->jabatan ?></span>
					
    </div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
</div>
</section>
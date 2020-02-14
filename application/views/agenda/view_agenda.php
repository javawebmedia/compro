<style>
.agendaku {
	margin: 10px;
	border: solid thin #EEE;
	border-radius: 5px;
}
.agendaku:hover, .agendaku .tanggal:hover {
	background-color: #ffc;
}
.agendaku .tanggal {
	background-color: #FFF;
	padding: 30px 20px;
	font-weight: bold;
	border-bottom: solid thin #EEE;
	border-radius: 5px 5px 0 0;
	font-size: 40px;
	min-height: 60px;
}
.agendaku .tahun {
	background-color: #F60;
	color: #FFF;
	padding: 10px 20px;
	border-radius: 0 0 5px 5px;
	font-weight: bold;
	border: solid thin #EEE;
}
h4.judul {
	font-size: 14px;
	margin: 0;
	text-align: center;
	text-transform: uppercase;
}
</style>
<div id="content" role="main">
<div class="page-header dark larger larger-desc">
<div class="container">
<div class="row">
    <div class="col-md-12">
        <h1><?php echo $title ?></h1>
    </div><!-- End .col-md-6 -->
</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .page-header -->

<div class="mb40"></div><!-- space -->

<div class="container">
<div class="row">

	  <?php foreach($agenda as $agenda) { ?>
	  <div class="col-md-4 rel text-center">
          <div class="agendaku">
            	<a href="<?php echo base_url('agenda/detail/'.$agenda->id_agenda) ?>">
				<div class="tanggal">
				<?php echo date('d',strtotime($agenda->mulai)) ?>
                </div>
                <div class="tahun">
                <?php echo date('M Y',strtotime($agenda->mulai)) ?>
                </div>
                </a>
            </div>
            
			<h4 class="title judul" data-appear-animation="bounceInLeft">
			<a href="<?php echo base_url('agenda/detail/'.$agenda->id_agenda) ?>">
			<?php echo $agenda->nama ?> <sup><i class="fa fa-eye"></i></sup></a></h4>
			<div class="text-small" data-appear-animation="bounceInLeft">
			  <?php echo character_limiter($agenda->ringkasan,200) ?>
			  <div class="clearfix"></div><br>
			</div>
		</div>
		<?php } ?>
</div>

    <div class="clearfix"></div>
        <div class="col-md-12 text-center pagination pagin">
        <div class="clearfix"></div>
        <?php if(isset($pagin)) { echo $pagin; }  ?>
        <div class="clearfix"></div>
        </div>
 
 </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb20"></div><!-- space -->

</div><!-- End #content -->
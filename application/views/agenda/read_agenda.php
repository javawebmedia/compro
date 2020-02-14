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

<div class="col-md-8">             
<style>
td, th {
	text-align: left !important;
}
th {
	background-color: #F5F5F5;
}
.agendaku {
	margin: 0;
	border: solid thin #EEE;
	border-radius: 5px;
	text-align: center;
}
.agendaku:hover, .agendaku .tanggal:hover {
	background-color: #ffc;
}
.agendaku .tanggal {
	background-color: #FFF;
	padding: 10px;
	font-weight: bold;
	border-bottom: solid thin #EEE;
	border-radius: 5px 5px 0 0;
	font-size: 15px;
	min-height: 15px;
}
.agendaku .tahun {
	background-color: #F60;
	color: #FFF;
	padding: 10px;
	border-radius: 0 0 5px 5px;
	font-weight: bold;
	border: solid thin #EEE;
	font-size: 11px;
}
h4.judul {
	font-size: 14px;
	font-weight:bold;
	margin: 0;
	text-align: left;
	text-transform: uppercase;
}
</style>        	
               
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
    	  <tr>
    	    <th>Detail detail</th>
    	    <th></th>
  	    </tr>
    	  <tr>
    	    <td width="28%">Tanggal mulai</td>
    	    <td width="72%">: <?php echo date('d F Y',strtotime($detail['mulai'])) ?></td>
  	    </tr>
    	  <tr>
    	    <td>Tanggal selesai</td>
    	    <td>: <?php echo date('d F Y',strtotime($detail['selesai'])) ?></td>
  	    </tr>
    	  <tr>
    	    <td>Venue/Tempat</td>
    	    <td>: <?php echo $detail['tempat'] ?></td>
  	    </tr>
    	  <tr>
    	    <td>Panitia</td>
    	    <td>: <?php echo $detail['panitia'] ?></td>
  	    </tr>
    	  <tr>
    	    <td>Ringkasan</td>
    	    <td>: <?php echo $detail['ringkasan'] ?></td>
  	    </tr>
    	  <tr>
    	    <th>Keterangan</th>
    	    <th>&nbsp;</th>
  	    </tr>
    	  <tr>
    	    <td colspan="2"><?php echo $detail['isi'] ?></td>
   	      </tr>
  	  </table>

</div><!-- .content -->
 
 
 <div id="sidebar" class="sidebar col-md-4">
		<aside class="widget list">
		  <header>
			<h3 class="title">Agenda lainnya</h3>
		  </header>               
              <ul class="list-link bot-40">
        
				<?php foreach($agenda as $agenda) { ?>
				<li>
                <div class="col-md-4">
                    <div class="agendaku">
                    <a href="<?php echo base_url('agenda/detail/'.$agenda['id_agenda']) ?>">
                    <div class="tanggal">
                    <?php echo date('d',strtotime($agenda['mulai'])) ?>
                    </div>
                    <div class="tahun">
                    <?php echo date('M Y',strtotime($agenda['mulai'])) ?>
                    </div>
                    </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <h4 class="judul"><a href="<?php echo base_url() ?>agenda/detail/<?php echo $agenda['id_agenda']; ?>" style="padding-bottom: 0;">
            <?php echo $agenda['nama'] ?>
            </a>
            </h4>
            <p style="font-size: 12px; margin: 0;">
            <?php echo date('d M Y',strtotime($agenda['mulai'])).' - '.date('d M Y',strtotime($agenda['selesai'])).')'; ?></p>
        		</div>
                <div class="clearfix"></div>
				</li>
				<?php } ?>
			</ul>

 </aside><!-- .list -->
		
		
	  </div><!-- .sidebar -->
    </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb20"></div><!-- space -->

</div><!-- End #content -->

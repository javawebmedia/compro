<section class="bg-servicesstyle2-section">
  <div class="container">
    <div class="row">
      <div class="our-services-option">
        <div class="section-header">
          <h2><?php //echo $title ?> DOWNLOAD</h2>
        </div>
        <!-- .section-header -->
        <div class="row">

          <style type="text/css" media="screen">
          th, td {
            text-align: left !important;
            vertical-align: top  !important;
            padding: 6px 12px !important;
            color: #000 !important;
          }
        </style>

        <div class="col-md-12">
          <?php if($this->uri->segment(3) == "") { ?>
            <p class="alert alert-success">Berikut data file yang dapat Anda unduh</p>

          <?php }else{ ?>
            <p class="alert alert-success">Berikut data file dengan kategori <strong><?php echo $kategori_download->nama_kategori_download ?></strong> yang dapat Anda unduh</p>
          <?php } ?>
          <div class="table-responsive mailbox-messages">
          <table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
             <tr>
               <th width="5%">No</th>
               <th>Judul</th>
               <th>Keterangan</th>
               <th width="5%"></th>
             </tr>
           </thead>
           <tbody>
            <?php $i=1; foreach($download as $download) { ?>
             <tr>
               <td><?php echo $i ?></td>
               <td><?php echo $download->judul_download ?></td>
               <td><?php echo $download->isi ?></td>
               <td>
                 <a href="<?php echo base_url('download/unduh/'.$download->id_download) ?>" class="btn btn-primary btn-xs" target="_blank">
                   <i class="fa fa-download"></i> Unduh</a>
                 </td>
               </tr>
               <?php $i++; } ?>
             </tbody>
           </table>
         </div>
         </div><!-- End .row -->
       </div>
       </div>
     </div>
   </div>
 </section>
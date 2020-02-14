<?php
// Load data user yg sudah login
// $id_user    = $this->session->userdata('id');
// $user_login = $this->user_model->detail($id_user);
$site_info  = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?> | <?php echo $this->website->namaweb(); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- icon -->
  <link rel="shortcut icon" href="<?php echo $this->website->icon(); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/iCheck/flat/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- sweetalert -->
  <script src="<?php echo base_url() ?>assets/sweetalert/js/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/sweetalert/css/sweetalert.css">
  <!-- jquery validation -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-validation/dist/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-validation/demo/css/screen.css">
  <!-- JQUERY UI -->
  <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css') ?>">
  <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js') ?>" type="text/javascript"></script>
  <!-- jquery chained -->
  <script src="<?php echo base_url('assets/jquery-chained/jquery.chained.min.js') ?>" type="text/javascript"></script>
  <style type="text/css" media="screen">
    .btn-group-xs > .btn, .btn-xs {
        padding  : .25rem .4rem;
        font-size  : .875rem;
        line-height  : .5;
        border-radius : .2rem;
    }
  </style>
  <!-- timepicker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-timepicker/jquery.timepicker.min.css">
  <!-- TINYMCE -->
  <script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
<script type="text/javascript">
//LOADING
function check()
  { 
    $("#checking").show();
  }
function Export()
{
  swal ( "Berhasil" ,  "Data telah telah berhasil diexport" ,  "success" )
}
</script>
<div id="checking" style="display:none;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: #FFF; opacity: 0.9;z-index: 9000;">
<div class="text" style="position: absolute;top: 25%;left: 0;height: 100%;width: 100%;font-size: 18px;text-align: center;">
    <center><img src="<?php echo base_url('assets/images/load.gif') ?>" alt="Loading"></center>
   <strong>TUNGGU BEBERAPA SAAT, DATA SEDANG DIPROSES...</strong>
</div>
</div>
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title">Listing File</h4>
  </div>			<!-- /modal-header -->
  <div class="modal-body">


 <p class="alert alert-success">Copy download link yang disediakan</p>
 <table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>Download File</th>
    <th width="40%">Link</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($download as $download) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <a href="<?php echo base_url('admin/download/unduh/'.$download->id_download) ?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-download"></i> Download</a>
    </td>
    <td><?php echo $download->judul_download ?>
      
      <br><small>
      Link Download:<br> 
      <textarea name="aa" style="width: 100%;"><?php echo base_url('download/unduh/'.$download->id_download) ?></textarea>
      </small>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>

  </div>			<!-- /modal-body -->
  <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>			<!-- /modal-footer -->

<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url() ?>assets/jquery-timepicker/jquery.timepicker.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- CK Editor -->
<script src="<?php echo base_url() ?>assets/admin/plugins/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/dist/js/demo.js"></script>
</body>
</html>
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
<title><?php echo $title ?></title>
<!-- icon -->
<link rel="shortcut icon" href="<?php echo base_url('assets/filemanager/userfiles/image/'.$site_info->icon) ?>">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link href="<?php echo base_url('assets/jquery/jquery-ui.css') ?>" rel="stylesheet">
<!-- Fontawesome -->
<link href="<?php echo base_url() ?>assets/font/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/select2/dist/css/select2.min.css" type="text/css" rel="stylesheet" />
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-timepicker/jquery.timepicker.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
 folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- JQUERY -->
<script src="<?php echo base_url('assets/jquery/external/jquery/jquery.js') ?>"></script>
<script src="<?php echo base_url('assets/jquery/jquery-ui.js') ?>"></script>


<!-- Google Font -->
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    .sidebar, .sidebar a {
      font-size: 14px !important;
      text-transform: capitalize;
      font-weight: 500;
      color: #fff !important;
    }
    .sidebar a:hover {
      color: #F5F5F5 !important;
    }
    .box-body {
      min-height: 400px;
    }
  </style>

<!-- Pace style -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/pace/pace.min.css">
<!-- Jquery chained -->
<script src="<?php echo base_url() ?>assets/js/jquery.chained.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
</head>
<body>
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title">Listing File</h4>
  </div>			<!-- /modal-header -->
  <div class="modal-body">


 <p class="alert alert-success">Copy link gambar yang disediakan</p>
<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>Gambar</th>
    <th>Judul</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($galeri as $galeri) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <img src="<?php echo base_url('assets/filemanager/userfiles/image/thumbs/'.$galeri->gambar) ?>" width="60">
    </td>
    <td><?php echo $galeri->judul_galeri ?>
      
      <br><small>
      Link Gambar:<br> 
      <textarea name="aa" style="width: 100%;"><?php echo base_url('assets/filemanager/userfiles/image/'.$galeri->gambar) ?></textarea>
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

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url() ?>assets/jquery-timepicker/jquery.timepicker.min.js"></script><!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/demo.js"></script>
<!-- PACE -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/PACE/pace.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#searchable').DataTable()
  })
</script>
<script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  })
  $('.ajax').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
  })
</script>

<!-- Page script -->
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('.date-picker').datepicker({
      autoclose: true
    })

  })
</script>

<script>
  $(document).ready(function(){
    $('input.time-picker').timepicker({
        timeFormat: 'HH:mm:ss',
        // year, month, day and seconds are not important
        minTime: new Date(0, 0, 0, 8, 0, 0),
        maxTime: new Date(0, 0, 0, 15, 0, 0),
        // time entries start being generated at 6AM but the plugin 
        // shows only those within the [minTime, maxTime] interval
        startHour: 6,
        // the value of the first item in the dropdown, when the input
        // field is empty. This overrides the startHour and startMinute 
        // options
        startTime: new Date(0, 0, 0, 8, 20, 0),
        // items in the dropdown are separated by at interval minutes
        interval: 10
    });
});
</script>
</body>
</html>
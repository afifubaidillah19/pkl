<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>dist/css/skins/_all-skins.min.css">

<div class="register-box">
  <div class="register-logo">
    <a href="<?= base_url(); ?>"><b>Registrasi</b>Mahasiswa</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="<?= base_url('auth/registrasimahasiswa'); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama"  value="<?= set_value('nama'); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('nama','<small class="text-danger">','</small>'); ?>
      </div>

      <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="NIM" id="nim" name="nim" value="<?= set_value('nim'); ?>">
        <span class="glyphicon glyphicon-sort-by-order form-control-feedback"></span>
        <?= form_error('nim','<small class="text-danger">','</small>'); ?>
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email'); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('email','<small class="text-danger">','</small>'); ?>
      </div>

      <!-- Date -->
      <div class="form-group has-feedback">
        <div class="input-group date">
          <input type="text" class="form-control" id="datepicker" name="datepicker" autocomplete="off" placeholder="Date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
        </div>
      </div>

      <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="No.Telp" id="notelp" name="notelp" value="<?= set_value('notelp'); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('notelp','<small class="text-danger">','</small>'); ?>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password','<small class="text-danger">','</small>'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" id="password2" name="password2">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <textarea type="alamat" class="form-control" placeholder="Alamat" id="alamat" name="alamat"><?= set_value('alamat'); ?></textarea>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('alamat','<small class="text-danger">','</small>'); ?>
      </div>
      
          
      <div class="row">
        <div class="col-xs-8">
        <!--   <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?= base_url();?>auth" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>


<!-- jQuery 3 -->
<script src="<?=base_url('assets/');?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/');?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/');?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url('assets/');?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=base_url('assets/');?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=base_url('assets/');?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?=base_url('assets/');?>bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url('assets/');?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url('assets/');?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?=base_url('assets/');?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?=base_url('assets/');?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url('assets/');?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?=base_url('assets/');?>plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/');?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/');?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/');?>dist/js/demo.js"></script>
<script>
  $('#datepicker').datepicker({
      autoclose: true
    })
</script>
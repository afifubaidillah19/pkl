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
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password','<small class="text-danger">','</small>'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" id="password2" name="password2">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
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
<!-- /.register-box -->

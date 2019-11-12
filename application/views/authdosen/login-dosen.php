    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url(); ?>"><b>Login</b> Tugas Akhir</a>
            <small style="font-size: 20px;">Dosen</small>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?= $this->session->flashdata('message'); ?>

            <form method="post" action="<?= base_url('authdosen'); ?>">
                <div class="form-group has-feedback">
                   <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email'); ?>">
                   <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?= form_error('email','<small class="text-danger">','</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?= form_error('password','<small class="text-danger">','</small>'); ?>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <a href="<?= base_url();?>auth" class="btn btn-warning btn-block btn-flat" role="button" aria-pressed="true">Login Mahasiswa</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->
<br>
            <a href="<?= base_url('authdosen/forgotpassword');  ?>">I forgot my password</a><br>
            <!-- <a href="<?= base_url();?>auth/registrasimahasiswa" class="text-center">Register Sebagai Mahasiswa</a> <br> -->
            <a href="<?= base_url();?>authdosen/registrasidosen" class="text-center">Registrasi Dosen</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

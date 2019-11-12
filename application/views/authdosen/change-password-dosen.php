    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url(); ?>"><b>Change</b> Password</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg"><?= $this->session->userdata('reset_email');  ?></p>
 
            <?= $this->session->flashdata('message'); ?>

            <form method="post" action="<?= base_url('auth/changepassworddosen'); ?>">
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Enter New Password" id="password1" name="password1">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?= form_error('password1','<small class="text-danger">','</small>'); ?>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Repeat Password" id="password2" name="password2">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?= form_error('password2','<small class="text-danger">','</small>'); ?>
                </div>
                
                <div class="row">
                    <div class="col-xs-8">
                        
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-8">
                        <button type="submit" class="btn btn-warning btn-block btn-flat" style="width: 200px; margin-right: 200px;">Ganti Password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url(); ?>"><b>Forgot</b> Password</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Reset your password to get new password</p>
 
            <?= $this->session->flashdata('message'); ?>

            <form method="post" action="<?= base_url('auth/forgotpassworddosen'); ?>">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email'); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?= form_error('email','<small class="text-danger">','</small>'); ?>
                </div>
                
                <div class="row">
                    <div class="col-xs-8">
                        
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-8">
                        <button type="submit" class="btn btn-warning btn-block btn-flat" style="width: 200px; margin-right: 200px;">Reset Password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->
<br>
            <a href="<?= base_url();?>authdosen" class="text-center">Back to Login</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

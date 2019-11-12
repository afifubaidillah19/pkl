  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
        <!-- <small>Control panel</small> -->
      </h1>
      <!--  -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-6">
          <?= $this->session->flashdata('message');  ?>
          <form action="<?= base_url('mahasiswa/changepassword'); ?>" method="post">
            
            <div class="form-group">
                <label for="current_password">Current Password :</label>
                <input type="password" class="form-control" id="current_password" name="current_password">
                <?= form_error('current_password','<small class="text-danger">','</small>'); ?>
              </div>

              <div class="form-group">
                <label for="new_password1">New Password :</label>
                <input type="password" class="form-control" id="new_password1" name="new_password1">
                <?= form_error('new_password1','<small class="text-danger">','</small>'); ?>
              </div>

              <div class="form-group">
                <label for="new_password2">Repeat Password :</label>
                <input type="password" class="form-control" id="new_password2" name="new_password2">
                 <?= form_error('new_password2','<small class="text-danger">','</small>'); ?>
              </div>

              <div class="form-group">
                <a href="<?= base_url('mahasiswa/profile'); ?>" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary">Ganti Password</button>
              </div>
  
          </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  
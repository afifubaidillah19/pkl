  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
        <!-- <small>Control panel</small> -->
      </h1>
      <div class="row">
        <div class="col-lg-7">
          <?= $this->session->flashdata('message');  ?>
        </div>
      </div>
      <br>
      <div class="card mb-3" style="max-width: 650px; background-color: white;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="<?=base_url('assets/dist/img/profile/') . $mahasiswa['image'];?>" class="card-img" style="height: 200px; width: 200px;">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h2 class="card-title"><?= $mahasiswa['nama_mahasiswa'];?></h2>
            <h4 class="card-text"><?= $mahasiswa['nim'];?></h4>
            <h4 class="card-text"><?= $mahasiswa['email'];?></h4>
            <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $mahasiswa['date_created']);?></small></p>
          </div>
           <a href="<?= base_url('mahasiswa/edit'); ?>" class="btn btn-warning btn-sm">Edit Profile</a>
            <a href="<?= base_url('mahasiswa/changepassword'); ?>" class="btn btn-default btn-sm">Ganti Password</a>
        </div>
      </div>
    </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">  
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
        </section>
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  
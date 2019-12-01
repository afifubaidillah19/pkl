  <!-- Content Wrapper. Contains page content -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  
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
        <div class="callout callout-info">
          <h4>Pengumuman!</h4>
          <p>Dokumen Tugas Akhir baik Proposal maupun Tugas Akhir yang diupload merupakan dokumen yang telah direvisi dan akan diajukan</p>
        </div>
      <div class="row">  
      </div>
      <!-- /.row -->

      <!-- Main row -->
    <div class="">
      <a href="<?= base_url('upload_berkas');?>" class="btn btn-success"> <i class="fa fa-cloud-upload"></i> Submit Proposal </a>
    </div><br>
    <div class="box">
      <!-- <?php if(count($berkas)) : ?> -->
      <table class="table table-bordered">
		<thead>
		  <tr>
      <th>#</th>
      <th >ID</th>
			<th>Judul</th>
			<th>Dokumen Proposal</th>
      <th>Tipe File</th>
      <th>Status</th>
			<th>Nilai</th>
			<th>Aksi</th>
		  </tr>
		</thead>
		<tbody>
    <?php  $no = 1; foreach ($berkas as $b): ?>
		  <tr>
      <td><?= $no; ?></td>
      <td><?= $b['id'];?></td> 
			<td><?= $b['judul'];?></td>
			<td><?= $b['file'];?></td>
      <td><?= $b['tipe_file']?></td>
      <td><?= $b['status'];?></td>
			<td><?= $b['nilai'];?></td>
      <td>
      <a class="btn btn-success"  href="<?php echo base_url().'upload_berkas/download_file/'.$b['id']; ?>"><i class="fa fa-cloud-download"></i> Download</a>
			<a class="btn btn-warning" href="<?php echo base_url().'mahasiswa/edit_file/'.$b['id']; ?>"> <i class="fa fa-edit"></i> Edit </a>
      <a data-toggle="modal" data-target="#modal-default" class="btn btn-danger"> <i class="fa fa-remove"></i> Hapus </a>
			</td>
    
		 </tr>
    <?php $no++; endforeach; ?>
		</tbody>
	
	  </table>
    <!-- <?php endif; ?> -->
    </div>
    <!-- modal start-->
    <div class="modal fade in" id="modal-default" style="display: none; padding-right: 16px;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Notice</h4>

          <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <?php
            if(isset($_SESSION['hapus_sukses']) || isset($_SESSION['update_sukses'])) :
              $notif = '';

              isset($_SESSION['hapus_sukses']) ? $notif .= $_SESSION['hapus_sukses'] : '';
              isset($_SESSION['update_sukses']) ? $notif .= $_SESSION['update_sukses'] : '';
          ?>
              <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Sukses!</strong> <?php echo $notif; ?>

              </div>
          <?php
            endif;
          ?>

          <div class="panel panel-primary">
            <div class="panel-heading">Data Tugas Akhir</div>
            <div class="panel-body">
              <div class="col-md-12" style="padding-bottom: 15px;">
                <a href="<?php echo base_url('upload/formtambah'); ?>">
                  <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button> 
                </a>
              </div>

              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>File Dokumen</th>
                        <th>Status</th>
                        <th>Nilai</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php
                        $no = 1;
                        foreach($berkas as $db) : ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?= $db['judul']; ?></td>
                            <td><?= $db['deskripsi']; ?></td>
                            <td><?= $db['file']; ?></td>
                            <td><?= $db['status']; ?></td>
                            <td><?= $db['nilai']; ?></td>
                            <td>
                              <a href="<?php echo base_url().'upload/download_file/'.$db['id']; ?>"><button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download-alt"></button></span></a>
                              <a href="<?php echo base_url().'upload/formedit/'.$db['id']; ?>"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
                              <a href="<?php echo base_url().'upload/hapusdata/'.$db['id']; ?>" onclick="return confirm('Anda yakin hapus ?')"><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></a>
                            </td>
                          </tr>
                      <?php
                        $no++;
                        endforeach;
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <!-- Main row -->
    
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  
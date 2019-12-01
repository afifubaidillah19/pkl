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
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="<?php echo base_url().'upload_berkas/hapus/'.$b['id']; ?>"> <i class="fa fa-remove"></i> Hapus </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    
    <!-- modal end -->
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
         <!--small>Control panel</small-->
      </h1>
      <!--  -->
    </section>
    <!-- Main content -->
    <section class="content">
    <form id="formInput" method="POST" action="<?= site_url('PengajuanTugasAkhir/store')?>">
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="ta_nama" class="form-control"  required value="<?= $mahasiswa['nama_mahasiswa']; ?>">
            </div>
            <div class="form-group">
              <label>NIM</label>
              <input type="number" name="ta_nim" class="form-control"  required value="<?= $mahasiswa['nim']; ?>">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control"  required value="<?= $mahasiswa['email']; ?>">
            </div>
            <div class="form-group">
              <label>Program Studi</label>
              <input type="text" name="ta_ps" class="form-control" placeholder="Program Studi" required value="Teknik Informatika">
            </div>
            <div class="form-group">
              <label>Tahun Ajaran</label>
              <input type="text" name="ta_thajaran" class="form-control" placeholder="Tahun Ajaran" required>
            </div>
            <div class="form-group">
              <label>Kompetensi</label>
              <input type="text" name="ta_kompetensi" class="form-control" placeholder="Kompetensi" required>
            </div>
            <div class="form-group">
              <label>Judul Tugas Akhir</label>
              <input type="text" name="ta_judul" class="form-control" placeholder="Judul" required>
            </div>
            <div class="form-group">
              <label>Calon Pembimbing 1</label>
              <input type="text" name="ta_cp1" class="form-control" placeholder="Calon Pembimbing  1" required>
            </div>
            <div class="form-group">
              <label>Calon Pembimbing 2</label>
              <input type="text" name="ta_cp2" class="form-control" placeholder="Calon Pembimbing 2" required>
            </div>
            <div class="form-group">
              <div class="custom-file">
                   <input type="file" class="custom-file-input" id="file" name="file">
                   <label class="custom-file-label" for="file">Choose file</label>
                 </div> 
              <!-- <button>Pilih File</button>
              <input type="text" name="ta_cp2" class="form-control" placeholder="Calon Pembimbing 2" required-->
            </div>

          </div>
        </div>
      </div>
      <div class="box-footer clearfix">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </form>
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
  
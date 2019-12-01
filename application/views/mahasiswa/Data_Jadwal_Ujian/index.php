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
    <div class="box-body">
      <div class="table-responsive">
        <table id="tableData" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama Mahasiswa</th>
              <th>Kompetensi</th>
              <th>Judul Tugas Akhir</th>
              <th>Penguji</th>
              <th>Tanggal Ujian</th>
              <th>Waktu Ujian</th>
              <th>Tempat Ujian</th>
            </tr>
          </thead>

      <?php foreach ($t_jadwalta as $t_jadwalta): ?>
                  <tr>
                    <td width="150">
                      <?php echo $t_jadwalta->nim ?>
                    </td>
                    <td>
                      <?php echo $t_jadwalta->nama ?>
                    </td>
                    <td>
                      <?php 
                        echo $t_jadwalta->kompetensi
                      ?>
                    </td>
                    <td>
                      <?php echo $t_jadwalta->judul_skripsi ?>
                    </td>
                    <td>
                      <?php 
                        echo $t_jadwalta->tim_penguji
                      ?>
                    </td>
                    <td>
                      <?php 
                        echo $t_jadwalta->tanggal_ujian
                      ?>
                    </td>
                    <td>
                      <?php echo $t_jadwalta->waktu_ujian ?>
                    </td>
                    <td>
                      <?php 
                        echo $t_jadwalta->tempat_ujian
                      ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>

        </table>
    </div>
  </div>        


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
  
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
              <th>Nama</th>
              <th>NIM</th>
              <th>Kompetensi</th>
              <th>Judul</th>
              <th>Pembimbing 1</th>
              <th>Pembimbing 2</th>
              <th>Berkas</th>
              <th>Action</th>
            </tr>
          </thead>

      <?php foreach ($t_tugasakhir as $t): ?>
                  <tr>
                    <td width="150">
                      <?= $t['ta_nama'];?>
                    </td>
                    <td>
                      <?= $t['ta_nim'] ?>
                    </td>
                    <td>
                      <?= $t['kompetensi']
                      ?>
                    </td>
                    <td>
                      <?= $t['ta_judul']; ?>
                    </td>
                    <td>
                      <?= 
                        $t['ta_cp1'];
                      ?>
                    </td>
                    <td>
                      <? = $t['ta_cp2'];
                      ?>
                    </td>
                    <td>
                      <a href="">download</a>
                    </td>
                    <td width="250">
                      <a href="<?php echo site_url('TugasAkhir/edit/'.$t['ta_nim'] )?>"
                       class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                      <a 
                       href="<?php echo site_url('TugasAkhir/delete/').$t['ta_nim']?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
  
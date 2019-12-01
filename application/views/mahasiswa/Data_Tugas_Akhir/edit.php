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
        <form action="<?php base_url('TugasAkhir/edit') ?>" method="post" enctype="multipart/form-data">

              <!--input type="hidden" name="ta_nim" value="<?php echo $t_tugasakhir->ta_nim?>" /-->

              <div class="form-group">
                <label for="kompetensi">Kompetensi</label>
                <input type="text" name="kompetensi" class="form-control">
              </div>
              <div class="form-group">
                <label for="ta_judul">Judul</label>
                <input type="text" name="ta_judul" class="form-control">
              </div>
              <div class="form-group">
                <label for="ta_cp1">Calon Pembimbing 1</label>
                <input type="text" name="ta_cp2" class="form-control">
              </div>
              <div class="form-group">
                <label for="ta_cp2">Calon Pembimbing 2</label>
                <input type="text" name="ta_cp2" class="form-control">
              </div>
              <div>
                <button>Upload File</button>
              </div>
              <div class="form-group">
                
              <input class="btn btn-success" type="submit" name="btn" value="Edit" />
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
  
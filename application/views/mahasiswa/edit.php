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
     
          <!-- FORM -->
          <?= form_open_multipart('mahasiswa/edit'); ?>

              <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama_mahasiswa']?>">
                <?= form_error('nama','<small class="text-danger">','</small>'); ?>
              </div>

              <div class="form-group">
                <label for="nama">NIM :</label>
                <input type="number" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim']?>" disabled>
              </div>

               <div class="form-group">
                <label for="nama">Email :</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $mahasiswa['email']?>" readonly>
              </div>

              <div class="form-group">
                <label for="image">Gambar :</label>
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-3">
                      <img src="<?= base_url('assets/dist/img/profile/') . $mahasiswa['image'];?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-10" style="padding-top: 10px;">
                  <a href="<?= base_url('mahasiswa/profile'); ?>" class="btn btn-default">Back</a>
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
              </div>

          </form>
<!-- FORM -->

    </section>
    <!-- /.content -->
  </div>
  
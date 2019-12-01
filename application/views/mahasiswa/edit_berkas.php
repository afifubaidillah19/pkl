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
          
          <?= form_open_multipart('mahasiswa/edit_file') ?>
          <input type="hidden" name="id" id="id" value="<?= $berkas['id'] ?>">
              <div class="form-group">
                <label for="judul">Judul :</label> <?= form_error('judul','<small class="text-danger">','</small>'); ?>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $berkas['judul']?>">
              </div>

<!-- masih ada masalah dengan text area deskripsi -->
              <div class="form-group">
                <label for="deskripsi">Deskripsi :</label><?= form_error('deskripsi','<small class="text-danger">','</small>'); ?>
                <p>Deskripsi dapat berupa abstrak atau latar belakang proposal</p>
                <textarea style="height : 200px"type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $berkas['deskripsi']?>">
                </textarea>
            
              </div>

               <div class="form-group">
                <label for="pembimbing1">Pembimbing 1 :</label><?= form_error('pembimbing1','<small class="text-danger">','</small>'); ?>
                <input type="text" class="form-control" id="pembimbing1" name="pembimbing1" value="<?= $berkas['pembimbing1']?>">
                
              </div>

              <div class="form-group">
                <label for="pembimbing2">Pembimbing 2 :</label><?= form_error('pembimbing2','<small class="text-danger">','</small>'); ?>
                <input type="text" class="form-control" id="pembimbing2" name="pembimbing2" value="<?= $berkas['pembimbing2']?>">
                
              </div>

              <div class="form-group">
                <label for="kompetensi">Kompetensi :</label><?= form_error('kompetensi','<small class="text-danger">','</small>'); ?>
                <input type="text" class="form-control" id="kompetensi" name="kompetensi" value="<?= $berkas['kompetensi']?>">
                
              </div>
              <div class="form-group">
                <label for="tipe_file">Tipe File :</label><br><?= form_error('tipe_file','<small class="text-danger">','</small>'); ?>
                <input type="radio" name="tipe_file" value="Proposal" <?php echo set_radio('tipe_file', 'Proposal'); ?> />Proposal
                <input type="radio" name="tipe_file" value="Skripsi" <?php echo set_radio('tipe_file', 'Skripsi'); ?> /> Skripsi
                
                
              </div>

             <div class="form-group">
                <label for="file">File Dokumen :</label>
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-9">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file">
                        <label class="custom-file-label" for="file">Choose file</label>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-10" style="padding-top: 10px;">
                  <a href="<?= base_url('data_berkas'); ?>" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-success">Edit</button>
                </div>
              </div>

          </form>
<!-- FORM -->

    </section>
    <!-- /.content -->
  </div>
  
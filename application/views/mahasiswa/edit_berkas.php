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
              <section class="container-fluid">
              <div class="row">
                <div class="form-input clearfix">
                  <div class="col-md-12">

                    <div class="panel panel-primary">
                      <div class="panel-heading">Edit Data Berkas</div>
                      <div class="panel-body">
                      
                        <?= form_open_multipart('upload/update/'.$berkas['id']); ?>
                        <div hidden class="form-group">
                          <label for="nama">id :</label>
                          <input type="text" class="form-control" id="email" name="email" value="<?= set_value('id', $berkas['id']);?>" readonly>
                      </div>
                          <div class="form-group">
                            <label for="judul" class="control-label col-sm-2">judul </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="judul" value="<?=  set_value('judul', $berkas['judul']);?>">
                              <?= form_error('judul','<small class="text-danger">','</small>'); ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="deskripsi" class="control-label col-sm-2">deskripsi </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="deskripsi" value="<?= set_value('deksripsi', $berkas['deskripsi']); ?>">
                              <?= form_error('deskripsi','<small class="text-danger">','</small>'); ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="pembimbing1" class="control-label col-sm-2">pembimbing1 </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="pembimbing1" value="<?= set_value('pembimbing1', $berkas['pembimbing1']); ?>">
                              <?= form_error('pembimbing1','<small class="text-danger">','</small>'); ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="pembimbing2" class="control-label col-sm-2">pembimbing2 </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="pembimbing2" value="<?= set_value('pembimbing2', $berkas['pembimbing2']);?>">
                              <?= form_error('pembimbing2','<small class="text-danger">','</small>'); ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="kompetensi" class="control-label col-sm-2">kompetensi </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="kompetensi" value="<?= set_value('kompetensi', $berkas['kompetensi']);?>">
                              <?= form_error('kompetensi','<small class="text-danger">','</small>'); ?>
                            </div>
                          </div>


                          <div class="form-group">
                            <label for="tipe_file" class="control-label col-sm-2">Tipe File :</label><br><?= form_error('tipe_file','<small class="text-danger">','</small>'); ?>
                            <!-- <div class="control-label col-sm-1"> -->
                            <input type="radio" name="tipe_file" value="Proposal" <?php echo set_radio('tipe_file', 'Proposal'); ?> />Proposal
                            <input type="radio" name="tipe_file" value="Skripsi" <?php echo set_radio('tipe_file', 'Skripsi'); ?> /> Skripsi   
                            <!-- </div>                      -->
                          </div>

                          <div class="form-group">
                              <label  class="control-label col-sm-2"for="file">File Dokumen :</label>
                              <div class="col-sm">
                                <div class="row">
                                  <div class="col-sm">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="file" name="file">
                                      <label class="custom-file-label" for="file">Choose file</label>
                                    </div> 
                                  </div>
                                </div>
                              </div>
                            </div>

                          <div class="form-group">
                            <div class="btn-form col-sm-12">
                              <a href="<?= base_url('home/lihatdata'); ?>"><button type="button" class='btn btn-default'>Batal</button></a>
                              <button type="submit" class='btn btn-primary'>Simpan</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

          </form>
<!-- FORM -->

    </section>
    <!-- /.content -->
  </div>
  
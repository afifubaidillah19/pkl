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
     <?= form_open_multipart('Upload_berkas/upload_file'); ?>

         <div class="form-group">
         
           <label for="judul">Judul :</label> <?= form_error('judul','<small class="text-danger">','</small>'); ?>
           <input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul'); ?>" >
          
         </div>

         <div class="form-group">
          <label for="deskripsi">Deskripsi : </label><?= form_error('deskripsi','<small class="text-danger">','</small>'); ?>
          <p>Deskripsi dapat berupa abstrak atau latar belakang proposal</p>
          <textarea style="height:200px"name="deskripsi" class="form-control" id="deskripsi" value="<?= set_value('deskripsi'); ?>" ></textarea>
          
        </div>

          <div class="form-group">
           <label for="pembimbing1">Pembimbing 1 :</label><?= form_error('pembimbing1','<small class="text-danger">','</small>'); ?>
           <input type="text" class="form-control" id="pembimbing1" name="pembimbing1" value="<?= set_value('pembimbing1'); ?>">
           
         </div>

         <div class="form-group">
           <label for="pembimbing2">Pembimbing 2 :</label><?= form_error('pembimbing2','<small class="text-danger">','</small>'); ?>
           <input type="text" class="form-control" id="pembimbing2" name="pembimbing2" value="<?= set_value('pembimbing2'); ?>">
           
         </div>

         <div class="form-group">
           <label for="kompetensi">Kompetensi :</label><?= form_error('kompetensi','<small class="text-danger">','</small>'); ?>
           <input type="text" class="form-control" id="kompetensi" name="kompetensi" value="<?= set_value('kompetensi'); ?>">
           
         </div>

         <div hidden class="form-group">
            <label for="nama">Email :</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $mahasiswa['email']?>" readonly>
        </div>
        <div class="form-group">
          <label for="tipe_file">Tipe File :</label><br> <?= form_error('tipe_file','<small class="text-danger">','</small>'); ?>
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
           <div class="col-sm-10" style="padding-top: 5px; padding-bottom : 5px;">
             <a href="<?= base_url('mahasiswa/data_berkas'); ?>" class="btn btn-danger">Back</a>
             <button type="submit" class="btn btn-success">Submit</button>
           </div>
         </div>

     </form>
<!-- FORM -->

</section>
      <!-- /.row (main row) -->
    <!-- /.content -->
</div>
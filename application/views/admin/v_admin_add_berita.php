        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h2>Tambah Berita <small>MI Cahaya</small></h2>
                  </div>
                </div>

                    <div class="container">
                        
                        <form class="modal-content animate" style="padding: 10px;" action="<?= site_url('dashboard_add_berita') ?>" method="POST" enctype="multipart/form-data">
                        
                            <div class="form-group">
                                <div class="alert-danger">
                                    <?php echo $error; ?>
                                </div>

                                <label>Pilih Gambar : </label>
                                <input type="file" name="file" size="20" required>
                                <p>*) Maksimal ukuran foto 3 MB</p>
                            </div>

                            <div class="form-group">
                                <label>Judul :</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Berita" required>
                                <p>*) Minimal 5 karakter dan maksimal 200 karakter</p>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi :</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi Berita" required></textarea>
                                <p>*) Minimal 10 karakter</p>
                            </div>

                            <button class="btn btn-primary" type="submit" >Simpan</button>
                        </form>
                    </div>

                <div class="clearfix"></div>

              </div>
            </div>
          </div>
          <br />
          
        </div>
        <!-- /page content -->
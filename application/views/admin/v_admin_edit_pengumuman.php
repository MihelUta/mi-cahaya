        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h2>Edit Pengumuman <small>MI Cahaya</small></h2>
                  </div>
                </div>

                    <!-- <div class="container"> -->
                        <form class="modal-content animate" style="padding: 10px;" action="<?= site_url('dashboard_edit_pengumuman'); ?>" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                              <label>Pilih Gambar :</label>
                              <input type="file" name="file" size="20" required>
                          </div>

                          <div class="form-group">
                              <label>Judul :</label>
                              <textarea class="form-control" name="judul" cols="30" rows="1" required><?php echo $daftar_pengumuman->judul; ?></textarea>
                          </div>

                          <div class="form-group">
                              <label>Deskripsi :</label>
                              <textarea class="form-control" name="deskripsi" cols="50" rows="5" required><?php echo $daftar_pengumuman->deskripsi; ?></textarea>
                          </div>

                          <input type="hidden" name="id_pengumuman" value="<?php echo $daftar_pengumuman->id_pengumuman; ?>" /> <input type="submit" class="btn btn-info" name="Ubah" value="Ubah">
                        </form>
                    <!-- </div> -->

                <div class="clearfix"></div>

              </div>
            </div>
          </div>
          <br />
          
        </div>
        <!-- /page content -->
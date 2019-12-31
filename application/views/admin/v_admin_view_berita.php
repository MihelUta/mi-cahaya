        <!-- page content -->
        <div class="right_col" role="main">
         
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h2>Lihat Berita <small>MI Cahaya</small></h2>
                  </div>
                </div>

              <div class="container">

                  <?php foreach ($daftar_berita as $berita) { ?>

                  <fieldset style="background-color: #f1f1f1; box-shadow: 0 8px 20px 0 rgba(0,0,0,0.4); padding: 10px; font-family: sans-serif;">
                      <img src="<?php echo base_url('uploads/thumb/'.$berita->foto); ?>" title="<?php echo $berita->foto; ?>" width="60%" height="50%">

                      <h3><?php echo $berita->judul; ?></h3>

                      <p><?php echo $berita->deskripsi; ?></p>
                      <hr style="color: black;">
                      <a href="<?php echo site_url('admin/edit_berita/'.$berita->id_berita); ?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"> Edit</span></a>
                      <a href="<?php echo site_url('admin/delete_berita/'.$berita->id_berita); ?>" class="btn btn-danger"><span class=" glyphicon glyphicon-trash"> Delete</span></a>
                  </fieldset><br><br>
                  <?php } ?>
              </div>

                <div class="clearfix"></div>

              </div>
            </div>

          </div>
          <br />

          
          </div>
        </div>
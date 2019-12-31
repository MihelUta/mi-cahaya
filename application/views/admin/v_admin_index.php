<!-- page content -->
<div class="right_col" role="main">  

     <!-- top tiles -->
        <h1>Dashboard</h1>
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pengguna</span>
              <div class="count"><?php echo count($daftar_guru)+count($daftar_siswa); ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Guru</span>
              <div class="count green"><?php echo count($daftar_guru); ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Siswa</span>
              <div class="count"><?php echo count($daftar_siswa); ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Berita</span>
              <div class="count"><?php echo count($daftar_berita); ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pengumuman</span>
              <div class="count"><?php echo count($daftar_pengumuman); ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pesan Masuk</span>
              <div class="count">
                
                    <?php echo count($daftar_pesan); ?>
              </div>
            </div>
          </div>
          <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h2>Berita <small>MI Cahaya</small></h2>
                    </div>
                </div>

                <div id="Berita">
                
                    <?php foreach ($daftar_berita as $berita) { ?>

                    <div class="card">
                        <img id="myImage" src="<?= base_url('uploads/thumb/'.$berita->foto) ?>" alt="Avatar">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $berita->judul; ?></h4>
                            <?php $desk = $berita->deskripsi;
                                $desk = character_limiter($desk, 40); ?>
                            <p class="card-text"><?php echo $desk; ?></p>
                    </div>
                    </div>
                
                    <?php } ?>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>  
</div>
<!-- /page content -->
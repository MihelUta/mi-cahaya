<div id="container">
    <div class="carousel slide col-sm-9" data-ride="carousel" id="carousel-ex">
        <ol class="carousel-indicators">
            <li data-target="#carousel-ex" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-ex" data-slide-to="1" ></li>
            <li data-target="#carousel-ex" data-slide-to="2" ></li>
            <li data-target="#carousel-ex" data-slide-to="3" ></li>
        </ol>
        
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?= base_url(); ?>assets/image/img4.JPG" alt="image">
                <div class="carousel-caption">
                    <h3>Camping School</h3>
                </div>
            </div>

            <div class="item">
                <img src="<?= base_url(); ?>assets/image/img5.JPG" alt="image">
                <div class="carousel-caption">
                    <h3>Team Futsal</h3>
                </div>
            </div>

            <div class="item">
                <img src="<?= base_url(); ?>assets/image/img8.jpg" alt="image">
                <div class="carousel-caption">
                    <h3>Kegiatan Belajar Mengajar</h3>
                </div>
            </div>

            <div class="item">
                <img src="<?= base_url(); ?>assets/image/img9.jpg" alt="image">
                <div class="carousel-caption">
                    <h3>Kegiatan Belajar Mengajar</h3>
                </div>
            </div>

            <a href="#carousel-ex" class="left carousel-control" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>

            <a href="#carousel-ex" class="right carousel-control" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>

<?php require 'v_sidebar.php'; ?>
<div class="clearfix"></div>

<div id="container">    
    <div class="row content">    
        <hr><h3>Kegiatan Sekolah</h3><hr>
            <div class="row">
        
                <?php foreach ($list_berita as $berita) { ?>

                <div class="card">
                    <img class="card-img-top" src="<?php echo base_url('uploads/thumb/'.$berita->foto); ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $berita->judul; ?></h4>
                        <?php $desk = $berita->deskripsi;
                            $desk = character_limiter($desk, 40); ?>
                        <p class="card-text"><?php echo $desk; ?></p>
                        <a href="<?php echo site_url('single/select_id_berita/'.$berita->id_berita); ?>" class="btn btn-warning btn-sm read">Read More...</a>
                    </div>
                </div>                    
                
                <?php } ?>
                
            </div>    
    </div>
</div>
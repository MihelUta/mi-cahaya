<!-- page content -->
<div class="right_col" role="main">
         
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                    <h2>Galeri Foto<small>MI Cahaya</small></h2>
                    </div>
                </div>

                <div class="container">
                        
                    <form class="modal-content animate" style="padding: 10px;" action="<?= site_url('dashboard_add_gallery') ?>" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <span>Pilih Gambar :</span>
                            <input type="file" name="file" size="20" required>
                        </div>

                        <div class="form-group">
                            <label>Caption :</label>
                            <textarea name="caption" id="caption" class="form-control" placeholder="Caption Foto"></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit" ><span class="glyphicon-plus"> Tambah</span></button>
                    </form>
                    <hr><br>

                <div class="clearfix"></div>
            </div>

            <div id="container">
                        
                <h2>Image Gallery</h2>
                <p>Click on the images to enlarge them.</p>
                     
                <div class="row">
                        
                    <?php foreach ($daftar_gambar as $gambar) { ?>
                            
                    <div class="col-md-4">
                        <div class="thumbnail custom">
                            <a href="<?= base_url('uploads/'.$gambar->nama); ?>" target="_blank">
                                <img src="<?= base_url('uploads/'.$gambar->nama); ?>" alt="Lights" style="width:100%; height: 60%">
                            </a>
                            <br>
                            <p><?php echo $gambar->caption; ?></p>
                            <br>
                            <a href="<?php echo site_url('admin/edit_gambar/'.$gambar->id_galeri); ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"> Edit</span></a>
                            <a href="<?php echo site_url('admin/delete_gambar/'.$gambar->id_galeri); ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"> Delete</span></a>
                        </div>
                    </div>
                    <?php } ?>              
                </div>
            </div>
        </div>
    </div>      
</div>
<!-- /page content -->
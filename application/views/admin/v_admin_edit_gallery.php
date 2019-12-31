<!-- page content -->
<div class="right_col" role="main">         
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h2>Edit Galeri Foto <small>MI Cahaya</small></h2>
                </div>
            </div>

            <!-- <div class="container"> -->
            <form class="modal-content animate" style="padding: 10px;" action="<?= site_url('dashboard_edit_gambar'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Pilih Gambar :</label>
                    <input type="file" name="file" size="20" required>
                </div>

                <div class="form-group">
                    <label>Caption :</label>
                    <textarea class="form-control" name="judul" cols="30" rows="1" required><?php echo $daftar_galeri->caption; ?></textarea>
                </div>

                <input type="hidden" name="id_galeri" value="<?php echo $daftar_galeri->id_galeri; ?>" /> <input type="submit" class="btn btn-info" name="Ubah" value="Ubah">
            </form>
                    <!-- </div> -->

            <div class="clearfix"></div>

            </div>
        </div>
    </div>     
</div>
<!-- /page content -->
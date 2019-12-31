        <!-- page content -->
        <div class="right_col" role="main">
          
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah Guru Excel<small>MI Cahaya</small></h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					<form action="<?= site_url('admin/upload_guru_excel'); ?>" method="post" enctype="multipart/form-data">
					    <input type="file" name="file"/>
					    <br>
					    <input type="submit" value="Upload file"/>
					</form>
                  </div>
                </div>
              </div>
            </div>
          </div>
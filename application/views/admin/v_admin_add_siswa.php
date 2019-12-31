        <!-- page content -->
        <div class="right_col" role="main">
          
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah Siswa <small>MI Cahaya</small></h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />


                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= site_url('dashboard_add_siswa'); ?>" method="POST">
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">nama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">username<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group"> 
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis_lokal">NIS Lokal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nis_lokal" name="nis_lokal" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" for="nisn">NISN<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nisn"  class="form-control col-md-7 col-xs-12" type="text" name="nisn" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nik" class="form-control col-md-7 col-xs-12" type="text" name="nik" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ttl">Tempat, Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ttl" name="ttl" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="alamat" name="alamat" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" >
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kelas">Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="kelas" name="kelas" class="chosen-select">
                            <!-- <option selected="selected">Bulan</option> -->
                            <option value=""></option>
                              <?php
                                $bulan=array("1A","1B","2A","2B","3A","3B","4A","4B","5A","5B","6A","6B");
                                $id_kelas=array("1","2","3","4","5","6","7","8","9","10","11","12");
                                $jmlh_bln=count($bulan);
                                for($c=0; $c<$jmlh_bln; $c+=1){
                                    echo"<option value=$id_kelas[$c]> $bulan[$c] </option>";
                              }?> 
                          </select>
                          <!-- <input id="wali_kelas" name="wali_kelas" class="form-control col-md-7 col-xs-12" required="required" placeholder="Masukan kelas" type="text" > -->
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Foto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="foto" name="foto" value="no_photo" class="form-control col-md-7 col-xs-12" required="required" type="text" >
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
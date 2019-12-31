
        <!-- page content -->
        <div class="right_col" role="main">
          
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Edit Guru </h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />


                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= site_url('dashboard_edit_guru'); ?>" method="POST">
                    <input type="hidden" name="id_guru" value="<?php echo $daftar_guru->id_guru; ?>" />
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">nama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $daftar_guru->nama; ?>">
                        </div>
                      </div>
                      <div class="form-group"> 
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nip">NIP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nip" name="nip" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $daftar_guru->nip; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" for="nuptk">NUPTK<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nuptk"  class="form-control col-md-7 col-xs-12" type="text" name="nuptk" value="<?php echo $daftar_guru->nuptk; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nik" class="form-control col-md-7 col-xs-12" type="text" name="nik" value="<?php echo $daftar_guru->nik; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">Jabatan<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="jabatan" class="form-control col-md-7 col-xs-12" type="text" name="jabatan" placeholder="<?php echo $daftar_guru->jabatan; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php if ($daftar_guru->jenis_kelamin == "L") {?>
                            <div class="radio">
                              <label>
                                <input type="radio" checked="" value="L" id="optionsRadios1" name="jenis_kelamin"> L
                              </label>
                            </div>
                          <?php }else{ ?>
                            <div class="radio">
                              <label>
                                <input type="radio" value="L" id="optionsRadios1" name="jenis_kelamin"> L
                              </label>
                            </div>
                          <?php } ?>
                          <?php if ($daftar_guru->jenis_kelamin == "P") {?>
                            <div class="radio">
                              <label>
                                <input type="radio" checked="" value="P" id="optionsRadios2" name="jenis_kelamin"> P
                              </label>
                            </div>
                          <?php }else{ ?>
                            <div class="radio">
                              <label>
                                <input type="radio"  value="P" id="optionsRadios2" name="jenis_kelamin"> P
                              </label>
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ttl">Tempat, Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ttl" name="ttl" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $daftar_guru->ttl; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wali_kelas">Wali Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="wali_kelas" name="wali_kelas" class="chosen-select">
                            <!-- <option selected="selected">Bulan</option> -->
                            <option selected="<?php echo "$daftar_guru->id_kelas"; ?>"><?php echo "$daftar_guru->kelas"; ?></option>
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
                          <input id="foto" name="foto" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $daftar_guru->foto; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button type="submit" class="btn btn-success">Perbaharui</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
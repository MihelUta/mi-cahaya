<!-- page content -->
<div class="right_col" role="main">          
  
  <div class="clearfix"></div>

<div class="container">            
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ubah Password <small>MI Cahaya</small></h2><hr>
                  
                    <div class="clearfix"></div>
                </div>
                
                <div class="x_content"><br />


                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= site_url('change_password_siswa'); ?>" method="POST">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password Lama<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="passlama" name="passlama" class="form-control col-md-7 col-xs-12" >
                                <?= form_error('passlama') ?>
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password Baru<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="passbaru" name="passbaru" class="form-control col-md-7 col-xs-12" >
                            <?= form_error('passbaru') ?>
                            </div>
                        </div>
                      
                        <div class="form-group"> 
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ulangi Password Baru <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="conf_pass" name="conf_pass" class="form-control col-md-7 col-xs-12" >
                                <?= form_error('conf_pass') ?>
                            </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                                <button type="submit" class="btn btn-success">Ubah Password</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
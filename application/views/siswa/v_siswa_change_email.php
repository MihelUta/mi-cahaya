<!-- page content -->
<div class="right_col" role="main">          
  
  <div class="clearfix"></div>

<div class="container">            
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tambah Email <small>MI Cahaya</small></h2><hr>
                  
                    <div class="clearfix"></div>
                </div>
                
                <div class="x_content"><br />


                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= site_url('add_email_siswa'); ?>" method="POST">
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="email_baru" name="email_baru" class="form-control col-md-7 col-xs-12" >
                            <?= form_error('email_baru', '<div class="alert-danger"></div>'); ?>
                            </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                                <button type="submit" class="btn btn-success">Tambah Email</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- page content -->
<div class="right_col" role="main">          
  
  <div class="clearfix"></div>

<div class="container">            
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Profile <small>MI Cahaya</small></h2>
                  <hr>
                    <div class="clearfix"></div>
                </div>
                
                <div class="x_content"><br />


                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="username" name="username" class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('username') ?>" ><a href="<?= site_url('username_siswa'); ?>" title="Ubah Username">Ubah Username</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="pwd" name="pwd" class="form-control col-md-7 col-xs-12" ><a href="<?= site_url('password_siswa'); ?>" title="Ubah Password">Ubah Password</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('email'); ?>"><a href="<?= site_url('email_siswa'); ?>" title="Ubah Password">Tambah Email</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
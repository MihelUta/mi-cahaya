<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/siswa.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/footer.css" />

    <link href="<?= base_url(); ?>assets/css/header_siswa.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Chosen -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/chosen/docsupport/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/chosen/docsupport/prism.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/chosen/chosen.css">
    <!-- Font Awesome -->
    <link href="<?= base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-inverse" style="border-radius: none;">
  <div class="container">
    <div class="navbar-header">
<!--       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
 -->
      <a class="navbar-brand" href="#">
        <img src="<?= base_url() ?>assets/image/logo/logo.png" style="width: 70px; height: 40px; margin-top: -10px;">
      </a>
    
    <ul class="nav navbar-nav navbar-right" style="float: right;">
      
    </ul>
      

    </div>

<!--     <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php base_url() ?>login/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div> -->
      

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?= base_url() ?>assets/image/person-flat.png" alt=""><?= $this->session->userdata('username');  ?> 
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="<?= site_url('siswa'); ?>" title="Home Siswa"><span class="glyphicon glyphicon-home"></span> Home Siswa</a></li>
                    <li><a href="<?= site_url('settings_siswa'); ?>" title="Pengaturan"><span class="glyphicon glyphicon-cog"></span> Pengaturan</a></li>
                    <li><a href="<?php echo site_url('logout'); ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  </ul>
                </li>
              </ul>
      
  </div>
</nav>
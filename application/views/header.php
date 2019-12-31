<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  
  <!-- load CSS/Style -->
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/header.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/index.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/single_page.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/profile.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/gallery.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/contact.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/siswa.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/footer.css" />

</head>
<body>

<!-- Logo -->
<div class="brand">
    <img class="logo" src="<?= base_url() ?>assets/image/logo/logo.png">
    <!-- <img class="banner" src="<?= base_url() ?>assets/image/banner.jpg"> -->
</div>

<!-- alamat -->
<div class="judul"><center><h3>Yayasan Pendidikan Islam Annur</h3>
<h1>MADRASAH IBTIDAIYAH CAHAYA</h1>
</center></div>
<!-- <div class="address-bar">Jl. Cigugur Tengah, Kota Cimahi</div> -->



<!-- Navigation Bar -->
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
       <div class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" onclick="myFunction(this)">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div> 
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?= base_url() ?>index.php/home"><span class="glyphicon glyphicon-home"> Home</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-hashpopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"> Profile</span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?= base_url() ?>index.php/profile/sejarah">Sejarah</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?= base_url() ?>index.php/profile/visimisi">Visi Misi</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?= base_url() ?>index.php/profile/staffguru">Staff Guru</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?= base_url() ?>index.php/profile/program_belajar">Program Belajar</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?= base_url() ?>index.php/profile/kurikulum">Kurikulum</a></li>
          </ul>
        </li>
        <li><a href="<?= base_url() ?>index.php/gallery"><span class="glyphicon glyphicon-camera"> Galeri</span></a></li>
        <li><a href="<?= base_url() ?>index.php/contact"><span class="glyphicon glyphicon-phone-alt"> Kontak</span></a></li>
      </ul>


      <!-- FORM SEACRH -->
      <form class="navbar-form navbar-left" role="search" action="<?= site_url('cari'); ?>" method="POST">
          <div class="form-group">
              <input type="text" id="cari" name="cari" class="form-control" placeholder="Cari berita">
          </div>
          <button type="submit" class="btn btn-default">Go!</button>
      </form>
      <!-- END FORM SEARCH -->

      <ul class="nav navbar-nav navbar-right">
        <li onclick="document.getElementById('myModal').style.display='block'"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

      <!-- Form Login -->
      <div id="myModal" class="modal">

        <!-- Modal Content -->
        <form class="modal-content animate" action="<?= site_url('login') ?>" method="POST">
         <!--  <div class="imgcontainer">
            <span onclick="document.getElementById('myModal').style.display='none'" class="close" title="Close">&times;</span>
          </div> -->

          <div class="mycontainer">
            <label><b>Username</b></label>
            <input class="uname form-control" type="text" name="username" placeholder="Enter Username" required autofocus>

            <label><b>Password</b></label>
            <input class="psw form-control" type="password" name="password" placeholder="Enter Password" required>

            <button type="submit" class="btn-login">Login</button>
            <input type="checkbox" checked="checked">Remember me
          </div>

          <div class="mycontainer">
            <button type="button" onclick="document.getElementById('myModal').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw-forgot">Forgot <a href="<?= site_url('forgot_pwd'); ?>">password</a>?</span>
          </div>
        </form>
      </div>

    </div>
  </div>
</nav>
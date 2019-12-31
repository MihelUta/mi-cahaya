<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guru</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/siswa.css" />
    <link href="<?= base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
 	<?php 	if (isset($siswa)) {?>
		 	<?php foreach ($siswa as $ssw) { ?>
			   	<table class="table-ca" width="100%">
			        <tr>
			            <th>NIS Lokal</th>
			            <td>:</td>
			            <td><?php echo $ssw->nis_lokal ?></td>
			            <td rowspan="6" width="20%"></td>
			            <td rowspan="6" width="30%">
			            	<!-- <img src="<?= base_url() ?>assets/image/person-flat.png"> -->
			            </td>
			        </tr>
			        <tr>
			            <th>NISN</th>
			            <td>:</td>
			            <td><?php echo $ssw->nisn ?></td>
			        </tr>
			        <tr>
			            <th>NIK</th>
			            <td>:</td>
			            <td><?php echo $ssw->nik ?></td>
			        </tr>
			        <tr>
			            <th>Nama</th>
			            <td>:</td>
			            <td><?php echo $ssw->nama?></td>
			        </tr>
			        <tr>
			            <th>Tempat, Tanggal Lahir</th>
			            <td>:</td>
			            <td><?php echo $ssw->ttl ?></td>
			        </tr>
			        <tr>
			            <th>Alamat</th>
			            <td>:</td>
			            <td><?php echo $ssw->alamat ?></td>
			        </tr>
			   	</table>
	<?php 	}
	} ?>

 	<br>
	<hr>
	
	<?php 
	    $mList = array(
	    	'bulan' => '00',
			'Januari' => '01',
			'Februari' => '02',
			'Maret' => '03',
			'April' => '04',
			'Mei' => '05',
			'Juni' => '06',
			'Juli' => '07',
			'Agustus' => '08',
			'September' => '09',
			'Oktober' => '10',
			'November' => '11',
			'Desember' => '12',
		);
		$cek_isi = 0;
	    $idbulann = $bulan;
	    $idtahunn = $tahun;
	    $hari_ini = date("$idtahunn-$idbulann-d");
	    $tgl_pertama = date('1', strtotime($hari_ini));
	    $hari = date('l', strtotime($tgl_pertama));
		$tgl_terakhir = date('t', strtotime($hari_ini));
		$bln = date($idbulann, strtotime($hari_ini));
		$thn = date($idtahunn, strtotime($hari_ini));
		$f = date("$idtahunn-$idbulann-01"); 
		$t = date("$idtahunn-$idbulann-01");
	?>
	<div class="table-responsive">
		<form action="<?= site_url('guru/cetak_laporan_kegiatan'); ?>" method="POST" >
			<table class="table table-striped" width="100%">
		        <thead>
		            <tr>
		                <th>No</th>
		                <th>Hari Tanggal</th>
		                <th>Subuh</th>
		                <th>Dzuhur</th>
		                <th>Ashar</th>
		                <th>Magrib</th>
		                <th>Isya</th>
		                <th>Mengaji</th>
		            </tr>
		        </thead>
		        <tbody>
			        <?php for ($i=1; $i <= $tgl_terakhir; $i++) { ?>
		            <tr>
		                <th><?php echo $i; ?></th>
		                <th>
		                	<?php 
			                	$hari = date('D', strtotime($f));
			                	$dayList = array(
								'Sun' => 'Minggu',
								'Mon' => 'Senin',
								'Tue' => 'Selasa',
								'Wed' => 'Rabu',
								'Thu' => 'Kamis',
								'Fri' => 'Jumat',
								'Sat' => 'Sabtu'
								);
		                		echo $dayList[$hari]  
		                	?>
			                /
			                <?php echo $tgl_pertama ,-$bln,-$thn; ?> 
		                </th>
		                <?php foreach ($daftar_kegiatan as $dk) { ?>
			                <?php if ( $t == $dk->tanggal ) {?>
		                	<?php $cek_isi++; ?>
			                	 <?php if ($dk->subuh != null) {?>
				               		<th>v</th>
						        <?php }else{ ?>
						           	<th>-</th>
						        <?php } ?>

						        <?php if ($dk->dzuhur != null) {?>
						        	<th>v</th>
						        <?php }else{ ?>
						            <th>-</th>
						        <?php } ?>

						        <?php if ($dk->ashar != null) {?>
						            <th>v</th>
						        <?php }else{ ?>
						            <th>-</th>
						        <?php } ?>

						        <?php if ($dk->magrib != null) {?>
						            <th>v</th>
						        <?php }else{ ?>
						            <th>-</th>
						         <?php } ?>

						        <?php if ($dk->isya != null) {?>
						            <th>v</th>
						        <?php }else{ ?>
						            <th>-</th>
						        <?php } ?>

						        <?php if ($dk->mengaji != null) {?>
						            <th><?php echo $dk->mengaji; ?></th>
						        <?php }else{ ?>
						            <th>-</th>
						        <?php } ?>
						        

			                <?php }?>
		                <?php }   ?>



		                <?php $x = 1;
		                	foreach ($daftar_kegiatan as $dk) { ?>
		                		<?php if ($dk->tanggal == $f) {?>
		                			<?php $x--;?>
		                		<?php }else{ ?>
		                			<?php $x++;?>
		                	<?php }
		                	} ?>
		                	<?php if ($x > count($daftar_kegiatan)) {?>
		                		<td><input name="<?php echo "subuh".$i ?>" type="checkbox" disabled/></td>
		                		<td><input name="<?php echo "dzuhur".$i ?>" type="checkbox"disabled/></td>
		                		<td><input name="<?php echo "ashar".$i ?>" type="checkbox"disabled/></td>
		                		<td><input name="<?php echo "magrib".$i ?>" type="checkbox"disabled/></td>
		                		<td><input name="<?php echo "isya".$i ?>" type="checkbox"disabled/></td>
		                		<td><input name="mengaji[]" type="text"/></td>
		                	<?php } ?>
		                		

		               <?php foreach ($siswa as $ssw) { ?>
		               <input type="hidden" name="id_siswa[]" value="<?php echo $ssw->nis_lokal; ?>" />
		               <input type="hidden" name="tanggal[]" value="<?php echo $t ?>" />
		               <?php } ?>
		            

		           <?php $tgl_pertama++;$f++;$t++; }  ?>
		        </tbody>
		    </table>
		</form>
		</div>
</div>	

<footer class="container text-center">
</footer>

<script type="text/javascript" src="<?= base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
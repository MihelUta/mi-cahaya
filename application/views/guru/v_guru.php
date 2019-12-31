<div class="container">
	<div class="table-responsive">
		<?php foreach ($guru as $gr) { ?>
	    	<table class="table-ca" >
		        <tr>
		            <th>NIP</th>
		            <td>:</td>
		            <td><?php echo $gr->nip ?></td>
		            <td rowspan="6" width="20%"></td>
		            <td rowspan="6" width="30%"><img src="<?= base_url() ?>assets/image/person-flat.png"></td>
		        </tr>
		        <tr>
		            <th>NUPTK</th>
		            <td>:</td>
		            <td><?php echo $gr->nuptk ?></td>
		        </tr>
		        <tr>
		            <th>NIK</th>
		            <td>:</td>
		            <td><?php echo $gr->nik ?></td>
		        </tr>
		        <tr>
		            <th>Nama</th>
		            <td>:</td>
		            <td><?php echo $gr->nama?></td>
		        </tr>
		        <tr>
		            <th>Wali Kelas</th>
		            <td>:</td>
		            <td><?php echo $gr->kelas?></td>
		        </tr>
		        <tr>
		            <th>Tempat, Tanggal Lahir</th>
		            <td>:</td>
		            <td>-</td>
		        </tr>
		        <tr>
		            <th>Alamat</th>
		            <td>:</td>
		            <td>-</td>
		        </tr>
	    	</table>
	    <?php } ?>
	</div>
	<hr>
	
	<form method="POST" action="<?= site_url('guru/cari_kegiatan_siswa'); ?>" id="frm1" >
		<select data-placeholder="NIS Lokal / Siswa" name="idsiswa" onClick="pilihSiswa()" class="chosen-select" tabindex="2">
			<!-- <option selected="selected">NIS Lokal / Siswa</option> -->
			<option value=""></option>
				<?php foreach ($siswa as $ssw) { ?>
					<option name='idsiswa' value="<?php echo $ssw->id_siswa; ?>"> <?php echo $ssw->nis_lokal;echo " / ";echo $ssw->nama; ?> </option>
				<?php } ?>
		</select>
		
		<select data-placeholder="Bulan" name="idbulan" onClick="pilihBulan()" class="chosen-select">
			<!-- <option selected="selected">Bulan</option> -->
			<option value=""></option>
				<?php
					$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
					$jmlh_bln=count($bulan);
					for($c=0; $c<$jmlh_bln; $c+=1){
					    echo"<option value=$bulan[$c]> $bulan[$c] </option>";
				}?>	
		</select>
		<select data-placeholder="Tahun" name="idtahun" id="textfield" class="chosen-select">
			<!-- <option >Pilih Tahun</option> -->
			<option value=""></option>
			<?php

				$tahun=date('Y', strtotime ('-5 year'));
				$akhir_t = $tahun + 10 ;
				for ($i=$tahun; $i<=$akhir_t; $i++){
					echo"<option value=$i>$i";
					echo "</option>";
				}

			?>

		</select>
		<button class="btn btn-success" name="enter">Cari</button>
	</form>
 	<br>
 	<?php 	if (isset($k_siswa)) {?>
 		<h3>Data Diri Siswa</h3>
		 	<?php foreach ($k_siswa as $ssw) { ?>
			   	<table class="table-ca" >
			        <tr>
			            <th>NIS Lokal</th>
			            <td>:</td>
			            <td><?php echo $ssw->nis_lokal ?></td>
			            <td rowspan="6" width="20%"></td>
			            <td rowspan="6" width="30%"><img src="<?= base_url() ?>assets/image/person-flat.png"></td>
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
 	<?php   
	  if(isset($_POST['enter']))   
		{   
		   if($_POST['idbulan']=="")  
		   {  
		   echo "Anda belum memilih bulan! ";
		   } 
		   if ($_POST['idtahun']== "") {
		     	echo "Anda belum memilih tahun!";
		    } 
		   else 
		   		echo "Form Kegiatan <br>Bulan : ".$_POST['idbulan']."<br>Tahun : ".$_POST['idtahun'];  
		} 
	?> 
	<hr>
	<?php 
		if(isset($_POST['enter']))   
		{   
			if($_POST['idbulan']=="")  
		   	{
		   		echo "";
		   	}elseif ($_POST['idtahun']=="") {
		   		echo "";
		   	}
		    else{
	?>
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
	    $idbulann = $mList[$_POST['idbulan']];
	    $idtahunn = $_POST['idtahun'];
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
			<table class="table table-striped">
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
		                <td><?php echo $i; ?></td>
		                <td>
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
		                </td>
		                <?php foreach ($daftar_kegiatan as $dk) { ?>
			                <?php if ( $t == $dk->tanggal ) {?>
		                	<?php $cek_isi++; ?>
			                	 <?php if ($dk->s_subuh != null) {?>
				               		<td><input name="s_subuh[]" type="checkbox" checked="" class="flat" disabled /></td>
						        <?php }else{ ?>
						           	<td><input name="s_subuh[]" type="checkbox" class="flat" disabled /></td>
						        <?php } ?>

						        <?php if ($dk->s_dzuhur != null) {?>
						        	<td><input name="s_dzuhur[]" type="checkbox" checked="" class="flat" disabled /></td>
						        <?php }else{ ?>
						            <td><input name="s_dzuhur[]" type="checkbox" class="flat" disabled /></td>
						        <?php } ?>

						        <?php if ($dk->s_ashar != null) {?>
						            <td><input name="s_ashar[]" type="checkbox" checked="" class="flat" disabled /></td>
						        <?php }else{ ?>
						            <td><input name="s_ashar[]" type="checkbox" class="flat" disabled /></td>
						        <?php } ?>

						        <?php if ($dk->s_maghrib != null) {?>
						            <td><input name="s_maghrib[]" type="checkbox" checked="" class="flat" disabled /></td>
						        <?php }else{ ?>
						            <td><input name="s_maghrib[]" type="checkbox" class="flat" disabled /></td>
						         <?php } ?>

						        <?php if ($dk->s_isya != null) {?>
						            <td><input name="s_isya[]" type="checkbox" checked="" class="flat" disabled /></td>
						        <?php }else{ ?>
						            <td><input name="s_isya[]" type="checkbox" class="flat" disabled /></td>
						        <?php } ?>

						        <td><input name="bacaanAwal[]" type="text" value="<?php echo $dk->bacaanAwal; ?>" disabled /></td>
						        <td><input name="bacaanAkhir[]" type="text" value="<?php echo $dk->bacaanAkhir; ?>" disabled /></td>
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
		                		<td><input name="<?php echo "s_subuh".$i ?>" class="flat" type="checkbox" disabled/></td>
		                		<td><input name="<?php echo "s_dzuhur".$i ?>" class="flat" type="checkbox"disabled/></td>
		                		<td><input name="<?php echo "s_ashar".$i ?>" class="flat" type="checkbox"disabled/></td>
		                		<td><input name="<?php echo "s_magrib".$i ?>" class="flat" type="checkbox"disabled/></td>
		                		<td><input name="<?php echo "s_isya".$i ?>" class="flat" type="checkbox"disabled/></td>
		                		<td><input name="bacaanAwal[]" type="text"/></td>
		                		<td><input name="bacaanAkhir[]" type="text"/></td>
		                	<?php } ?>
		                		

		               <?php foreach ($k_siswa as $ssw) { ?>
		               <input type="hidden" name="id_siswa" value="<?php echo $ssw->id_siswa; ?>" />
		               <input type="hidden" name="bulan" value="<?php echo $idbulann ?>" />
		               <input type="hidden" name="tahun" value="<?php echo $idtahunn ?>" />
		               <?php } ?>
		            

		           <?php $tgl_pertama++;$f++;$t++; }  ?>
		        </tbody>
		    </table>

		    <?php if ($cek_isi != 0) { ?>
				<button class="btn btn-success custom" name="cetakPDF" value="pdf">Download to PDF</button>
				<button class="btn btn-success custom" name="cetakEXCEL" value="excel">Download to Excel</button>
		    <?php } else { ?>
		    <?php } ?>

		</form>
		</div>
	<?php }} ?>
</div>	
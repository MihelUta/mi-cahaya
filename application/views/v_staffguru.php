<div id="container">
	<div id="guru">
		<h4>Staff dan Guru MI Cahaya</h4><br><br>
		
		<?php foreach ($list_guru as $guru) { ?>
		
		<div class="card">
			<img id="myImage" src="<?= base_url('$guru->foto'); ?>" alt="Avatar">
			<div class="content">
				<h5><b><?php echo $guru->nama; ?></b></h5>
				<p><?php echo $guru->jabatan; ?></p>
			</div>
		</div>

		<?php } ?>
	
	</div>
</div>
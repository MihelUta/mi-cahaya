<div id="konten">
	<?php foreach ($list_search as $search) { ?>
		<h3><?= $search->judul; ?></h3>
		<hr>
		<img  id="berita" src="<?php echo base_url('uploads/'.$search->foto); ?>">
		<p class="deskripsi"><?php echo $search->deskripsi; ?></p>
	<?php } ?>
</div>
<div class="container">
	
	<h2>Image Gallery</h2>
 	<p>Click on the images to enlarge them.</p>
 
 	<div class="row">
      
      <?php foreach ($daftar_gambar as $gambar) { ?>
      
   		<div class="col-md-4">
    		<div class="thumbnail">
        		<a href="<?= base_url('uploads/'.$gambar->nama); ?>" target="_blank">
          			<img id="myimg" src="<?= base_url('uploads/'.$gambar->nama); ?>">
          			<div class="caption">
            			<p><?php echo $gambar->caption; ?></p>
          			</div>
        		</a>
      		</div>
    	</div>
      <?php } ?>
  	</div>
</div>
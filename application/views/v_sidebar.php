<!-- Sidenav right for ads -->
<div class="col-sm-3 sidenav">
    
    <p style="font-size: 20px; font-family: 'Open Sans', sans-serif; font-weight: bold; text-align: center; ">Pengumuman</p>
    <?php foreach ($list_pengumuman as $pengumuman) { ?>
        
        <ul>
            <li><a href="<?php echo site_url('single/select_id/'.$pengumuman->id_pengumuman); ?>"><?php echo $pengumuman->judul; ?></a></li>
        </ul>

    <?php } ?>
    <div class="clearfix"></div>
</div>
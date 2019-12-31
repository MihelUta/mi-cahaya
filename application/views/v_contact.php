<div id="container">
	<div class="box">
		<div class="row">
			<div class="col-lg-12">
				<hr>
				<h2 class="text-center">Kontak
				<strong>MI Cahaya</strong></h2>
				<hr>
			</div>

			<div class="col-md-8">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9595810095925!2d107.55254861448863!3d-6.895438195017446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e5c96ebebb45%3A0x90725d8501ec5a2e!2sMadrasah+Ibtidaiyah+Cahaya!5e0!3m2!1sid!2sid!4v1502285587638" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

			<div class="col-md-4">
				<p>Telepon:
				<strong>022-86001705</strong></p>

				<p>Email:
				<strong><a href="mailto:">mi.cahaya@gmail.com</a></strong></p>

				<p>Alamat:
				<strong>Jl. Cigugur Tengah No. 19 d/h 238<br>
				RT.06 RW.10 Kelurahan CIgugur Tengah<br>
				Kec. Cimahi Tengah Kota Cimahi</strong></p>
			</div>
		</div>
	</div>

	<div class="box">
		<div class="row">
			<div class="col-lg-12">
				<hr>
				<h2 class="text-center">Kontak
				<strong>Form</strong></h2>
				<hr>

				<p class="text-justify">Jika ada yang ingin ditanyakan, silahkan isi form dibawah ini dengan lengkap dan email yang aktif/valid. 
				Kami akan membalas melalui email secepatnya.<br>
				Terimakasih.
				</p>

				<form action="<?php echo site_url('add_pesan'); ?>" method="POST">
					<div class="row">
						<div class="form-group col-lg-4">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control">
                            <?= form_error('nama', '<div class="alert alert-danger">', '</div>'); ?>
						</div>

						<div class="form-group col-lg-4">
							<label>Email</label>
							<input type="email" name="email" class="form-control">
                            <?= form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
						</div>

						<div class="form-group col-lg-4">
							<label>No. Telepon</label>
							<input type="tel" name="no_telp" class="form-control">
                            <?= form_error('no_telp', '<div class="alert alert-danger">', '</div>'); ?>
						</div>

						<div class="form-group col-lg-12">							
							<label>Pesan</label>
							<textarea class="form-control" name="pesan" rows="6"></textarea>
                            <?= form_error('pesan', '<div class="alert alert-danger">', '</div>'); ?>
						</div>

						<div class="form-group col-lg-12">
							<input type="hidden" name="save" value="contact">
							<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-send"> Kirim</span></button>

						</div>
					</div>
				</form>
			</div>		
		</div>
	</div>
</div>
	<?php $this->view('navbar') ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container center-block">
		<h2>Form User</h2>
		<?php foreach ($user as $key) {?>
			<?php echo form_open_multipart('user/adduser'); ?>
		
		<br>
		<br>

					<span>
						<?php echo validation_errors(); ?>
					</span>
			
			<div class="form-group">
			  <label for="usr">NIK:</label>
			  <input type="text" name="NIK" class="form-control">
			</div>
			<div class="form-group">
			  <label for="usr">Name:</label>
			  <input type="text" name="nama" class="form-control">
			</div>
			<div class="form-group">
			  <label for="usr">Username:</label>
			  <input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" name="password" class="form-control" >
			</div>

			<div class="form-group">
			  <label for="usr">Tanggal Lahir:</label>
			  <input type="date" name="tglLahir" class="form-control">
			</div>
			<div class="form-group">
			  <label for="usr">Alamat:</label>
			  <input type="text" name="alamat" class="form-control" >
			</div>
			<div class="form-group">
				<label for="usr">Jenis Kelamin:</label><br>
				<label class="radio-inline">
				<input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki 
				</label>
				<label class="radio-inline">
				<input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan 
				</label>
			</div>

			<div class="form-group">
			  <label for="usr">Kota:</label>
			  <input type="text" name="kota" class="form-control" >
			</div>
			<div class="form-group">
			  <label for="usr">Pendidikan Terakhir:</label>
			  <input type="text" name="pendidikan_terakhir" class="form-control" >
			</div>
			<div class="form-group">
			  <label for="usr">Pekerjaan:</label>
			  <input type="text" name="pekerjaan" class="form-control">
			</div>
			<div class="form-group">
			  <label for="usr">Umur:</label>
			  <input type="text" name="umur" class="form-control" >
			</div>
				<div class="form-group">
			  <label for="usr">Status:</label>
			  <input type="text" name="status" class="form-control" value="Not-Verified" disabled>
			</div>
			<div class="form-group">
					<label for="">Foto</label>
					<input type="file" class="form-control" id="foto" name="foto" >
				</div>
			
			<button type="submit" class="btn btn-primary">Submit</button>
			<?php } ?>
		</div>
	</div>

	
<?php $this->view('footer') ?>

 ?>
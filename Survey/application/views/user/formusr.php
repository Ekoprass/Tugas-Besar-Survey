<?php $this->view('navbar') ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container center-block">
		<h2>Form User</h2>
		<?php foreach ($user as $key) {?>
			<?php echo form_open_multipart('User/editDataUser/'.$key['id_user'].''); ?>
		
		<br>
		<br>

					<span>
						<?php echo validation_errors(); ?>
					</span>
			
			<div class="form-group">
			  <label for="usr">NIK:</label>
			  <input type="text" name="NIK" class="form-control"  value="<?php echo $key['NIK']?>">
			  <input type="text" name="id_user" class="form-control" value="<?php echo $key['id_user']?>" hidden>

			</div>
			<div class="form-group">
			  <label for="usr">Name:</label>
			  <input type="text" name="nama" class="form-control" value="<?php echo $key['nama'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Username:</label>
			  <input type="text" name="username" class="form-control" value="<?php echo $key['username'] ?>">
			</div>
			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" name="password" class="form-control"  value="<?php echo $key['password'] ?>">
			</div>

			<div class="form-group">
			  <label for="usr">Tanggal Lahir:</label>
			  <?php 
			  		$tglLahirinput = $key['tglLahir'];
					$tglLahir = new DateTime($tglLahirinput);
					$date=$tglLahir->format('d/m/Y'); ?>
			  <input type="date" name="tglLahir" class="form-control" value="<?php echo $date ?>" >
			</div>
			<div class="form-group">
			  <label for="usr">Alamat:</label>
			  <input type="text" name="alamat" class="form-control" value="<?php echo $key['alamat'] ?>">
			</div>
			<div class="form-group">
				<label for="usr">Jenis Kelamin:</label><br>
				<label class="radio-inline">
				<input type="radio" name="jenis_kelamin" value="Laki-laki"  <?php echo ($key['jenis_kelamin']=="Laki-laki")?'checked':'';?>>Laki-laki 
				</label>
				<label class="radio-inline">
				<input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($key['jenis_kelamin']=="Perempuan")?'checked':'';?>>Perempuan 
				</label>
			</div>

			<div class="form-group">
			  <label for="usr">Kota:</label>
			  <input type="text" name="kota" class="form-control"  value="<?php echo $key['kota'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Pendidikan Terakhir:</label>
			  <input type="text" name="pendidikan_terakhir" class="form-control"  value="<?php echo $key['pendidikan_terakhir'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Pekerjaan:</label>
			  <input type="text" name="pekerjaan" class="form-control" value="<?php echo $key['pekerjaan'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Umur:</label>
			  <input type="text" name="umur" class="form-control"  value="<?php echo $key['umur'] ?>">
			</div>
				<div class="form-group">
			  <label for="usr">Status:</label>
			  <input type="text" name="status" class="form-control" value="<?php echo $key['status'] ?>" disabled>
			</div>
			<div class="form-group">
					<label for="">Foto</label>
					<input type="file" class="form-control" name="foto" value="<?php echo $key['foto'] ?>">
				</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<?php } ?>
		</div>
	</div>

	
<?php $this->view('footer') ?>
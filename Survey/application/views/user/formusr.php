<?php $this->view('navbar') ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container center-block">
		<h2>Form User</h2>
		<?php form_open('formuser/editDataUser'); ?>
		<br>
		<br>
		<p><?php echo validation_errors(); ?></p>
			<?php foreach ($user as $key) {?>
			
			<div class="form-group">
			  <label for="usr">NIK:</label>
			  <input type="text" name="NIK" class="form-control" id="nik" value="<?php echo $key['NIK']?>">
			  <input type="text" name="id_user" class="form-control" id="nik" value="<?php echo $key['id_user']?>" hidden>

			</div>
			<div class="form-group">
			  <label for="usr">Name:</label>
			  <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $key['nama'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Username:</label>
			  <input type="text" name="username" class="form-control" id="username" value="<?php echo $key['username'] ?>">
			</div>
			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" name="password" class="form-control" id="pwd" value="<?php echo $key['password'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Tanggal Lahir:</label>
			  <input type="date" name="tglLahir" class="form-control" id="tglLahir"	value="<?php echo $key['tglLahir'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Alamat:</label>
			  <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $key['alamat'] ?>">
			</div>
			<div class="form-group">
				<label for="usr">Jenis Kelamin:</label><br>
				<label class="radio-inline">
				<input type="radio" name="jenis_kelamin">Laki-laki
				</label>
				<label class="radio-inline">
				<input type="radio" name="jenis_kelamin">Perempuan
				</label>
			</div>
			<div class="form-group">
			  <label for="usr">Kota:</label>
			  <input type="text" name="kota" class="form-control" id="kota" value="<?php echo $key['kota'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Pendidikan Terakhir:</label>
			  <input type="text" name="pendidikan_terakhir" class="form-control" id="pendididkan" value="<?php echo $key['pendidikan_terakhir'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Pekerjaan:</label>
			  <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?php echo $key['pekerjaan'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Umur:</label>
			  <input type="text" name="umur" class="form-control" id="umur" value="<?php echo $key['umur'] ?>">
			</div>
				<div class="form-group">
			  <label for="usr">Status:</label>
			  <input type="text" name="status" class="form-control" id="status" value="<?php echo $key['status'] ?>" disabled>
			</div>
			<?php } ?>
			<button type="submit" class="btn btn-primary">Submit</button>
			<?php form_close(); ?>
		</div>
	</div>
<?php $this->view('footer') ?>
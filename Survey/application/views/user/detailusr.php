<?php $this->view('navbar') ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container center-block">
		<h2>Detail User</h2>
	
		<br>
			<div class="container">

			<table class="table table-striped table-hover display">
				<thead>
					<tr>
						<th colspan="2"><h3><center>Data User</center></h3></th>
					</tr>
				</thead>
				<tbody>
						<?php foreach ($user as $key) {?>
					<tr>
						<td width="300px"><b>ID User</b></td>
						<td>: <?php echo $key['id_user']?></td>
					</tr>
					<tr>
						<td><b>NIK</b></td>
						<td>: <?php echo $key['NIK']?></td>
					</tr><tr>
						<td><b>Nama User</b></td>
						<td>: <?php echo $key['nama']?></td>
					</tr><tr>
						<td><b>Username</b></td>
						<td>: <?php echo $key['username']?></td>
					</tr><tr>
						<td><b>Tanggal Lahir</b></td>
						<td>: <?php echo $key['tglLahir']?></td>
					</tr><tr>
						<td><b>Jenis Kelamin</b></td>
						<td>: <?php echo $key['jenis_kelamin']?></td>
					</tr><tr>
						<td><b>Alamat</b></td>
						<td>: <?php echo $key['alamat']?></td>
					</tr><tr>
						<td><b>Kota</b></td>
						<td>: <?php echo $key['kota']?></td>
					</tr><tr>
						<td><b>Pendidikan Terakhir</b></td>
						<td>: <?php echo $key['pendidikan_terakhir']?></td>
					</tr><tr>
						<td><b>Pekerjaan</b></td>
						<td>: <?php echo $key['pekerjaan']?></td>
					</tr><tr>
						<td><b>Status</b></td>
						<td>: <?php echo $key['status']?></td>
					</tr><tr>
						<td><b>Status User</b></td>
						<td>: <?php echo $key['status_user']?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>							
		
			<?php echo anchor('datauser', 'Back', "class='btn btn-primary'"); ?>
			
			</div>
		</div>
	</div>

	
<?php $this->view('footer') ?>
<?php $this->view('navbar') ?>

		<h2>Detail Survey</h2>
	
		<br>
			<div class="container">

			<table class="table table-striped table-hover display">
				<thead>
					<tr>
						<th colspan="2"><h3><center>Data Survey</center></h3></th>
					</tr>
				</thead>
				<tbody>
						<?php foreach ($surveyid as $key) {?>
					<tr>
						<td width="300px"><b>ID Survey</b></td>
						<td>: <?php echo $key['id_survey']?></td>
					</tr>
					<tr>
						<td><b>Nama Survey</b></td>
						<td>: <?php echo $key['nama_survey']?></td>
					</tr><tr>
						<td><b>Deskripsi</b></td>
						<td>: <?php echo $key['deskripsi']?></td>
					</tr><tr>
						<td><b>Waktu Survey</b></td>
						<td>: <?php echo $key['waktu_survey']?></td>
					</tr><tr>
						<td><b>Status</b></td>
						<td>: <?php echo $key['status']?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>									
			<?php echo form_open('user/setSurvey'); 
				foreach ($user as $key) { ?>
					<input type="id_user" value="<?php echo $key['id_user'] ?>" hidden>
					<input type="id_user" value="<?php echo $this->uri->segment(3) ?>" hidden>
			<?php } form_close(); ?>

			</div>
	
<?php $this->view('footer') ?>
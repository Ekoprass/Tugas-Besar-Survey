<?php $this->view('navbar') ?>

<body>
	<div class="container">
		<h2>Edit Survey</h2>
		
		<?php 
			foreach ($surveyid as $key) {
			$str=explode('-', $key['waktu_survey']);
		    $tgl=$str[2].'-'.$str[1].'-'.$str[0];
		
		echo form_open('survey/edit/'.$key['id_survey'].''); 

		if ($key['status']=='Aktif-Published') {
	
		?>

			<div class="form-group">
			  <label for="usr">Nama Survey:</label>
			  <input  type="text" class="form-control" name="nama_survey" value="<?php echo $key['nama_survey'] ?>" disabled>
			</div>
			<div class="form-group">
			  <label for="usr">Deskripsi:</label>
			  <input type="text" class="form-control" name="deskripsi" value="<?php echo $key['deskripsi'] ?>" disabled>
			</div>
			<div class="form-group">
			  <label for="usr">Waktu survey:</label>
			  <input type="date" class="form-control" name="waktu_survey" value="<?php echo $tgl ?>" disabled>
			</div>
			
			
		<?php 
			}	else{?>

			<div class="form-group">
			  <label for="usr">Nama Survey:</label>
			  <input  type="text" class="form-control" name="nama_survey" value="<?php echo $key['nama_survey'] ?>" >
			</div>
			<div class="form-group">
			  <label for="usr">Deskripsi:</label>
			  <input type="text" class="form-control" name="deskripsi" value="<?php echo $key['deskripsi'] ?>" >
			</div>
			<div class="form-group">
			  <label for="usr">Waktu survey:</label>
			  <input type="date" class="form-control" name="waktu_survey" value="<?php echo $tgl ?>" >
			</div>
			
			
			<button type="submit" class="btn btn-primary">Submit</button>

			<?php }


			}

			form_close();
		 	echo anchor('survey', 'Back', "class='btn btn-danger'"); ?>
		
	</div>
</body>
</html>
<?php $this->view('footer') ?>

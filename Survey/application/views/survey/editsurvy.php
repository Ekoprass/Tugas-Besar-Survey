<?php $this->view('navbar') ?>

<body>
	<div class="container">
		<h2>Edit Survey</h2>
		
		<?php form_open('survey/editSurvey'); 
			foreach ($surveyid as $key) {
		?>

			<div class="form-group">
			  <label for="usr">Nama Survey:</label>
			  <input  type="text" class="form-control" name="nama_survey" value="<?php echo $key['nama_survey'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Deskripsi:</label>
			  <input type="text" class="form-control" name="deskripsi" value="<?php echo $key['deskripsi'] ?>">
			</div>
			<div class="form-group">
			  <label for="usr">Waktu survey:</label>
			  <input type="date" class="form-control" name="waktu_survey" value="<?php echo $key['waktu_survey'] ?>">
			</div>
			
			
			<button type="submit" class="btn btn-primary">Submit</button>
		<?php }
			form_close();
		 	echo anchor('survey', 'Back', "class='btn btn-danger'"); ?>
		
	</div>
</body>
</html>
<?php $this->view('footer') ?>

<?php $this->view('navbar') ?>

<body>
	<div class="container">
		<h2>Tambah Survey</h2>
		<p><?php echo validation_errors(); ?></p>
		<?php echo form_open('survey/addSurvey'); ?>
			<div class="form-group">
			  <label for="usr">Nama Survey:</label>
			  <input  type="text" class="form-control" name="nama_survey">
			</div>
			<div class="form-group">
			  <label for="usr">Deskripsi:</label>
			  <input type="text" class="form-control"  name="deskripsi">
			</div>
			<div class="form-group">
			  <label for="usr">Waktu survey:</label>
			  <input type="date" class="form-control" name="waktu_survey">
			</div>
			
			
			<button type="submit" class="btn btn-primary">Submit</button>
		<?php form_close(); ?>
	</div>
</body>
</html>
<?php $this->view('footer') ?>

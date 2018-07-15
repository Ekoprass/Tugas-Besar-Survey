<?php $this->view('navbar') ?>

<body>
	<div class="container">
		<h2>Question</h2>

		<?php 
		foreach ($questions as $key) {
		echo form_open('question/edit/'.$this->uri->segment(3).''); ?>
			<div class="form-group">
			  <label for="usr">Question:</label>
			  <input type="text" class="form-control" name="question" value="<?php echo $key['question'] ?>">
			</div>
			<div class="form-group">
			  <label for="sel1">Type:</label>
			  <select class="form-control" name="type">
			  	<option value="<?php echo $key['type'] ?>" selected><?php echo $key['type'] ?></option>
			  	<option value="Pilihan Ganda">Pilihan Ganda</option>
			  	<option value="Esai">Esai</option>
			  	<option value="Multiple Check">Multiple Check</option>
			  </select>
			</div>
			<div class="form-group">
				<label for="usr">Required:</label><br>
				<label class="checkbox-inline">
					<?php if ($key['required']=="Required"){ ?>
						<input name="required" type="checkbox" value="Required" checked>Required
					<?php } if ($key['required']!="Required") {?>
						<input name="required" type="checkbox" value="Required">Required
					<?php } ?>
				</label>
			</div>
			
			<button type="submit" class="btn btn-primary">Submit</button>
		<?php } form_close(); ?>
	</div>
</body>
</html>

<?php $this->view('footer') ?>
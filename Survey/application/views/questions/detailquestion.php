<?php $this->view('navbar') ?>

		<h2>Detail Question</h2>
	
		<br>
			<div class="container">

			<table class="table table-striped table-hover display">
				<thead>
					<tr>
						<th colspan="2"><h3><center>Data Survey</center></h3></th>
					</tr>
				</thead>
				<tbody>
						<?php foreach ($questions as $key) {?>
					<tr>
						<td width="300px"><b>ID Question</b></td>
						<td>: <?php echo $key['id_question']?></td>
					</tr>
					<tr>
						<td><b>Question</b></td>
						<td>: <?php echo $key['question']?></td>
					</tr><tr>
						<td><b>Type</b></td>
						<td>: <?php echo $key['type']?></td>
					</tr>
						<td><b>Required</b></td>
						<td>: <?php echo $key['required']?></td>
					</tr>
					
				</tbody>
			</table>

			<br>
			<br>
			<br>
			<?php if ($key['type']=='Pilihan Ganda'){?>
				
			<?php echo form_open('Question/addAnswer/'.$this->uri->segment(3).''); ?>
					<label for="usr">Tambah Pilihan Jawaban</label>
					<input type="text" name="jawaban" class="form-control">
					<input type="submit" name="Submit">
			<?php form_close(); ?>
			<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-table"></i> Data Table Survey
	      	</div>
	        <div class="card-body">
	          <div class="table-responsive">       
					<table class="datatable-1 table table-bordered" id="dataTable" width="100%" cellspacing="0">
				    <thead>
						<tr class="odd gradeX">
			    			<th>Question</th>
			    			<th>Aksi</th>

						</tr>
			    	</thead>
			    	<tbody>     
			    		<?php foreach ($answerquestion as $key) {?>
					    <tr>
					        <td><?php echo $key['jawaban'] ?></td>
					        <td>
					        	<?php 	
										echo anchor('/survey/delete/'.$key['id_answer'].'', 'Delete', "class='btn btn-danger'")."&nbsp"; 
					        	?>
					        </td>
					    </tr>
					<?php } ?>
			    	</tbody>
					</table>
			  </div>
			</div>
			</div>
			<?php } 
					elseif ($key['type']=='Esay') {
					
					}
					elseif ($key['type']=='Multiple Check') { ?>
						
			<?php echo form_open('Question/addAnswer/'.$this->uri->segment(3).''); ?>
					<label for="usr">Tambah Pilihan Jawaban</label>
					<input type="text" name="jawaban" class="form-control">
					<input type="submit" name="Submit">
			<?php form_close(); ?>
			<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-table"></i> Data Table Survey
	      	</div>
	        <div class="card-body">
	          <div class="table-responsive">       
					<table class="datatable-1 table table-bordered" id="dataTable" width="100%" cellspacing="0">
				    <thead>
						<tr class="odd gradeX">
			    			<th>Question</th>
			    			<th>Aksi</th>

						</tr>
			    	</thead>
			    	<tbody>     
			    		<?php foreach ($answerquestion as $key) {?>
					    <tr>
					        <td><?php echo $key['jawaban'] ?></td>
					        <td>
					        	<?php 	
										echo anchor('/survey/delete/'.$key['id_answer'].'', 'Delete', "class='btn btn-danger'")."&nbsp"; 
					        	?>
					        </td>
					    </tr>
					<?php } ?>
			    	</tbody>
					</table>
			  </div>
			</div>
			</div>

					<?php }}?>
			<?php //echo anchor('question/createQuestion/'.$key['id_survey'].'', 'Tambah Pertanyaan', "class='btn btn-success'"); ?>


	

				
			</div>
		</div>
	</div>
	
<?php $this->view('footer') ?>
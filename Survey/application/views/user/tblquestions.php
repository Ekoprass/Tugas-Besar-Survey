<?php $this->view('navbar.php') ?>

        <center><h2>Data Questions</h2></center>
        <br>
        <div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-table"></i> Data Table Questions
	      	</div>
	        <div class="card-body">
	          <div class="table-responsive">       

		
		<table class="table table-bordered" width="100%" cellspacing="0">
	    <thead>
			<tr class="odd gradeX">
    			<th>Quetions</th>
		        <th width="500px">Aksi</th>
			</tr>
    	</thead>
    	<tbody>     
    		<?php foreach ($questions as $keyq) {?>
		    <tr>
		        <td><?php echo $keyq['question'] ?></td>
		        <td>

		        	<?php 
						$answerquestion=$this->Questions_model->getJawabanQuestion($keyq['id_question']);
						echo form_open('question/answerQuestion');
			        		if($keyq['type']=="Esai") {?>
			        			<input type="text" name="jawaban<?php echo $keyq['id_question'] ?>" class="form-control">
			        	<?php } foreach ($answerquestion as $keya ) {
			        		if ($keyq['type']=='Pilihan Ganda'){ ?>
		        				<fieldset id="<?php echo $keyq['id_question'] ?>">
        							<input type="radio" value="<?php echo $keya['jawaban'] ?>" name="jawaban<?php echo $keyq['id_question'] ?>">&nbsp<?php echo $keya['jawaban'] ?>
    							</fieldset>
    					<?php } if ($keyq['type']=='Multiple Check') {?>
			        			<fieldset id="<?php echo $keyq['id_question'] ?>">
									<input type="checkbox" name="jawaban<?php echo $keyq['id_question'] ?>" value="<?php echo $keya['jawaban'] ?>"> &nbsp<?php echo $keya['jawaban'] ?>
			        			</fieldset> 
			        	<?php }} ?>    		
		       	</td>
		    </tr>

		<?php } ?>
    	</tbody>
		</table>
		<button type="submit" class="btn btn-success">Submit</button>
	</div>
	</div>

</div>

<?php echo anchor('survey', 'Back', "class='btn btn-primary'"); ?>

  <script type="text/javascript" src="<?php echo base_url()?>assets/jquery/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
<?php $this->view('footer.php') ?>

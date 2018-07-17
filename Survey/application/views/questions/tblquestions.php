<?php $this->view('navbar.php') ?>

        <center><h2>Data Questions</h2></center>
        <br>
        <div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-table"></i> Data Table Questions
	      	</div>
	        <div class="card-body">
	          <div class="table-responsive">       

		
		<table class="datatable-1 table table-bordered" id="dataTable" width="100%" cellspacing="0">
	    <thead>
			<tr class="odd gradeX">
    			<th>Quetions</th>
		        <th>Type</th>
		        <th>Aksi</th>
			</tr>
    	</thead>
    	<tbody>     
    		<?php foreach ($questions as $keye) {?>
		    <tr>
		        <td><?php echo $keye['question'] ?></td>
		        <td><?php echo $keye['type'] ?></td>
		        <td>
		        	<?php 	
		        			echo anchor('/question/detail/'.$keye['id_question'].'', 'Detail', "class='btn btn-primary'")."&nbsp";
		        		foreach ($surveyid as $key) {
		        			if ($key['status']=='Aktif-Published') {
		        				echo "";
		        			}if ($key['status']=='Aktif') {
							echo anchor('/question/editquestion/'.$keye['id_question'].'', 'Edit', "class='btn btn-info'")."&nbsp"; 
							echo"<button data-toggle='modal' data-target='#deleteQuestion' class='btn btn-danger'>Delete</button>";
		        			}							
						}
		        	?>
		        	
		        </td>
		    </tr>
		<?php } ?>
    	</tbody>
		</table>
	</div>
	</div>

	<div class="modal fade" id="deleteQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Delete Data Pertanyaan ?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <?php echo anchor('/question/deleteQuestion/'.$key['id_question'].'', 'Delete', "class='btn btn-danger'")."&nbsp"; ?>
          </div>
        </div>
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

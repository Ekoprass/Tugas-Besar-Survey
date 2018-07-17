<?php $this->view('navbar.php') ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="container center-block">

            
        <div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-table"></i> Data Table Survey Nonaktif
	      	</div>
	        <div class="card-body">
	          <div class="table-responsive">       

		
		<table class="datatable-1 table table-bordered" id="dataTable" width="100%" cellspacing="0">
	    <thead>
			<tr class="odd gradeX">
    			<th>ID</th>
    			<th>Nama Survey</th>
		        <th>Deskripsi</th>
		        <th>Waktu Survey</th>
		        <th>Status</th>
		        <th>Aksi</th>
			</tr>
    	</thead>
    	<tbody>     
    		<?php foreach ($survey as $key) {?>
		    <tr>
		    	<?php 
		    		$string=$key['deskripsi'];
		    		$desc=substr($string, 0, 20);
		    		$str=explode('-', $key['waktu_survey']);
		    		$tgl=$str[2].'-'.$str[1].'-'.$str[0];
		    	 ?>
		        <td><?php echo $key['id_survey'] ?></td>
		        <td><?php echo $key['nama_survey'] ?></td>
		        <td><?php echo $desc.' ...' ?></td>
		        <td><?php echo $tgl ?></td>
		        <td><?php echo $key['status'] ?></td>
		        <td>
		        	<?php 	 
		        		 	echo anchor('/survey/detail/'.$key['id_survey'].'', 'Detail', "class='btn btn-primary'")."&nbsp"; 
							echo anchor('/survey/editSurvey/'.$key['id_survey'].'', 'Edit', "class='btn btn-info'")."&nbsp";
		        	?>
		        	<button data-toggle="modal" data-target="#deleteSurvey1" class='btn btn-danger'>Delete</button>
		        </td>
		    </tr>
		<?php } ?>
    	</tbody>
		</table>
	</div>
	</div>
</div>
</div>
</div>


<div class="modal fade" id="deleteSurvey1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Delete Data Survey ?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <?php echo anchor('/survey/delete/'.$key['id_survey'].'', 'Delete', "class='btn btn-danger'")."&nbsp"; ?>
          </div>
        </div>
      </div>
    </div>

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

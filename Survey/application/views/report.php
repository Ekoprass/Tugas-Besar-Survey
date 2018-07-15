<?php $this->view('navbar'); 
	error_reporting(0);
?>
<div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-table"></i> Report Survey
	          <a class="btn btn-default pull-right" href="<?php echo site_url()."/survey/print/".$this->uri->segment(3)."";?>" role="button"><i class="fa fa-print"></i> Print</a>
	            <a class="btn btn-default pull-right" href="<?php echo site_url()."/survey/excel/".$this->uri->segment(3)."";?>" role="button"><i class="fa fa-table"></i> Export</a>
	          
	      	</div>
	        <div class="card-body">
	          <div class="table-responsive">  
<table class="datatable-1 table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
	<tr >
		<?php foreach ($surveyid as $key): ?>
		<td colspan="11" align="center">Laporan <?php echo $key['nama_survey'] ?></td>
		<?php endforeach ?>
	</tr>
	<tr >
		<td rowspan="2" align="center" class="odd gradeX">User/Partisipan</td>
		<td colspan="10" align="center">Soal</td>
	</tr>	
	<tr class="odd gradeX">
		<?php foreach ($pertanyaan as $key) {?>
			<th><?php echo $key['question'] ?></th>
		<?php } ?>
		
	</tr>
</thead>
<tbody>
	<?php foreach ($user as $key): ?>
	<tr>
		<th><?php echo $key['nama'] ?></th>
		<?php 
			$query2=$this->db->query("select group_concat(a.jawaban separator', ') as jawaban from answer_user a inner join user u on u.id_user=a.id_user	inner join question q on q.id_question=a.id_question	where q.id_survey='".$this->uri->segment(3)."' and a.id_user='".$key['id_user']."'	group by q.question");
				$jawaban=$query2->result_array();
			foreach ($jawaban as $key): ?>
		<td>
			<?php echo $key['jawaban'] ?>
		</td>	
		<?php endforeach ?>
		
	</tr>
	<?php endforeach ?>
</tbody>
</table>
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

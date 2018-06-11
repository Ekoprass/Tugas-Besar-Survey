<?php $this->view('navbar') ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="container center-block">
		<div class="module">
            
            <div class="module-head">
                <h2>Tabel User</h2>
            </div>          

		
		<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display">
	    <thead>
			<tr class="odd gradeX">
    			<th>ID</th>
    			<th>NIK</th>
		        <th>Nama</th>
		        <th>Username</th>
		        <th>Status</th>
		        <th>Aksi</th>
			</tr>
    	</thead>
    	<tbody>     
    		<?php foreach ($users as $key) {?>
		    <tr>
		        <td><?php echo $key['id_user'] ?></td>
		        <td><?php echo $key['NIK'] ?></td>
		        <td><?php echo $key['nama'] ?></td>
		        <td><?php echo $key['username'] ?></td>
		        <td><?php echo $key['status_user'] ?></td>
		        <td>
		        	<a href="<?php echo site_url().'/datauser/detail/'.$key['id_user'] ?>" data-target="#myModaldetail" class="btn btn-primary">Detail</a>
		        	<a href="<?php echo site_url().'/datauser/edit/'.$key['id_user'] ?>" class="btn btn-info">Edit</a>
		        	<a href="<?php echo site_url().'/datauser/delete/'.$key['id_user'] ?>" class="btn btn-danger">Delete</a></td>
		    </tr>
		<?php } ?>
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
<?php $this->view('footer') ?>


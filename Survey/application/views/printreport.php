
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Survey Online</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/css/sb-admin.css" rel="stylesheet">
  
  <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/jsgrid/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/jsgrid/jsgrid-theme.min.css" />
</head>
<table class="table table-bordered" width="100%" cellspacing="0">
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

  <script type="text/javascript" src="<?php echo base_url()?>assets/jquery/jquery.min.js"></script>


	<script>
		
        window.load=print_d();
        function print_d(){
            window.print();
        }
	</script>

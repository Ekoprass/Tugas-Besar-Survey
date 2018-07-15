<?php $this->view('navbar.php'); ?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container center-block">
			<div class="jumbotron">
			<div class="container">
				<?php foreach ($user as $key) {?>
					<h1>Hello, <?php echo $key['nama'] ?></h1>
					<p>Username : <?php echo $key['username'] ?></p>
					<p>Status : <?php echo $key['status_user'] ?></p>
					<p>
						<a href="<?php echo site_url() ?>/login/logout" class="btn btn-primary btn-lg">Logout</a>
					</p>
				<?php } ?>
			</div>
			</div>
		</div>
	</div>		
	<div class="row ">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="container center-block">
			<div class="jumbotron">
				<div class="container">
					<center><a class="btn btn-default" href="<?php echo site_url() ?>/datauser">
					<h1><i style="font-size: 200px" class="fa fa-users"></i></h1>
					<h2>Data User</h2></a></center>
				</div>
			</div>
		</div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="container center-block">
			<div class="jumbotron">
				<div class="container">
					<center><a class="btn btn-default" href="<?php echo site_url() ?>/survey">
					<h1><i style="font-size: 200px" class="fa fa-tasks"></i></h1>
					<h2>Data Survey</h2></a></center>
				</div>
			</div>
		</div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="container center-block">
			<div class="jumbotron">
				<div class="container">
					<center><a class="btn btn-default" href="<?php echo site_url() ?>/survey/report">
					<h1><i style="font-size: 200px" class="fa fa-book"></i></h1>
					<h2>Report</h2></a></center>
				</div>
			</div>
		</div>
		</div>
			
	</div>

	
<?php $this->view('footer.php'); ?>
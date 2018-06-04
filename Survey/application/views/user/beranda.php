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
<?php $this->view('footer.php'); ?>
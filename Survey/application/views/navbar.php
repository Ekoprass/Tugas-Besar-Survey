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

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php site_url(''); echo $usr ?>">Sistem Survey </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
       
      <?php foreach ($menus as $key ) {
          if ($key['parent']==0) {?>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="<?php echo $key['menu'] ?>">
            <?php 
                echo anchor($key['link'], '<i class="fa fa-fw '.$key['icon'].'"></i>
              <span class="nav-link-text">'.$key['menu'].'</span>', 'class="nav-link" data-parent="#exampleAccordion"');
             ?>
          </li>
      <?php 
          }if ($key['parent']==1) {?>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="<?php echo $key['menu'] ?>">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#<?php echo $key['menu'] ?>" data-parent="#exampleAccordion">
            <i class="fa fa-fw <?php echo $key['icon'] ?>"></i>
            <span class="nav-link-text"><?php echo $key['menu'] ?></span>
          </a>
            <ul class="sidenav-second-level collapse" id="<?php echo $key['menu'] ?>">
              <?php foreach ($menu2 as $m2) {
                    if ($m2['level']==$key['id']) {?>
                        <li>
                          <?php echo anchor($m2['link'], "<i class='fa fa-fw ".$m2['icon']."'></i> <span class='nav-link-text'>".$m2['menu']."</span>", ""); ?>
                           
                        </li>
              <?php }
               } ?>
              
            </ul>
          </li>
           
      <?php }
      } ?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
       <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
    


 












    
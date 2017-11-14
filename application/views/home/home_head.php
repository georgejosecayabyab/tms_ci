<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CCS - CT Thesis Portal | Home </title>


  <!-- Custom styles for this template -->
  <link href="<?php echo base_url();?>css/business-frontpage.css" rel="stylesheet">



  <link rel="stylesheet" href="<?php echo base_url();?>home1/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo site_url('home/index');?>"><b> CCS CT  </b>- Thesis Portal </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php echo $active_tab['home'];?>">
            <a class="nav-link" href="<?php echo site_url('home/index');?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item <?php echo $active_tab['login'];?>">
            <a id="login" class="nav-link" href="<?php echo site_url('login/index');?>">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  
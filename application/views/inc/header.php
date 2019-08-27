<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>College Management System</title>
  <script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>" />
	<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/lux/bootstrap.min.css" rel="stylesheet" integrity="sha384-hVpXlpdRmJ+uXGwD5W6HZMnR9ENcKVRn855pPbuI/mwPIEKAuKgTKgGksVGmlAvt" crossorigin="anonymous">


</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">College Management System</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor03">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Features</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Pricing</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">About</a>
	      </li>
	    </ul>
			<ul class="nav navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<?php $role_id=$this->session->userdata('role_id');
						?>
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Settings</a>
							<div class="dropdown-menu dropdown-menu-right">
								<?php if($role_id == '1'):?>
									<?php echo anchor('admin/dashboard', 'Dashboard', 'class="link-class dropdown-item"') ?>
									<div class="dropdown-divider"></div>
									<?php echo anchor('admin/coadmins', 'View Co-Admins', 'class="link-class dropdown-item"') ?>
									<div class="dropdown-divider"></div>
										<?php echo anchor('welcome/logout', 'Logout', 'class="link-class dropdown-item"') ?>
								<?php else:?>
									<?php echo anchor('welcome/logout', 'Logout', 'class="link-class dropdown-item"') ?>
								<?php endif;?>
							</div>
					</li>
			</ul>



	  </div>
	</nav>

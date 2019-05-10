<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Wanderlust</title>
	<!-- It can be done using URL helper by base_URL() function -->
	<!-- Using html helper by link_tag function -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<?= link_tag('assets/css/bootstrap.min.css') ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="<?= base_URL('index.php/Login')?>">Wanderlust</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor01">
	  	 <?php if($id):?>
	  	 <ul class="navbar-nav mr-auto">
			    <li class="nav-item active">
			        <a class="nav-link" href="<?= base_URL('index.php/customer/dashboard') ?>">Manage Bookings<span class="sr-only">(current)</span></a>
			    </li>
				<li class="nav-item active">
			        <a class="nav-link" href="<?= base_URL('index.php/logout') ?>">Sign Out<span class="sr-only">(current)</span></a>
			    </li>

	    </ul>	    
		    <?= form_open('customer/search_hotels',['class'=>'form-inline my-2 my-lg-0']) ?>
		    <!-- <form class="form-inline my-2 my-lg-0"> -->
		      <input class="form-control mr-sm-2" name="query" type="text" placeholder="Search hotels">
		      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
		    </form>
		    <?=form_error('query',"<p class= 'navbar-nav alert-danger'>","</p>")?>
		<?php else: ?>
	  	 <ul class="navbar-nav ml-auto">

			    <li class="nav-item active">
			        <a class="nav-link" href="<?= base_URL('index.php/login') ?>">Sign in<span class="sr-only">(current)</span></a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link active" href="<?= base_URL('index.php/signup') ?>">Sign up<span class="sr-only">(current)</span></a>
			    </li>
	      	<?php endif; ?>
	      </ul>
	   
	</nav>
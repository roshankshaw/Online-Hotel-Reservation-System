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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">Admin Panel</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarColor02">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="<?=base_URL('index.php/admin/dashboard')?>">Dashboard<span class="sr-only">(current)</span></a>
		      </li>
		     <!--  <li class="nav-item">
		        <a class="nav-link" href="#">Manage Rooms</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Check Bookings</a>
		      </li> -->
		      <li class="nav-item">
		        <a class="nav-link" href="<?=base_URL('index.php/logout')?>">Sign Out</a>
		      </li>
		    </ul>
		  </div>
	</nav>
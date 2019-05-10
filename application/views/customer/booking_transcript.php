<?php include('public_header.php')?>
<div class="container">
	<div class="card mb-3">
		<h3 class="card-header">Booking Transcript</h3>
		<div class="card-body">
			<h6 class="card-text">Booking Name: <small><?= $booking->booking_name ?></small></h6>
			<h6 class="card-text">Hotel Name: <small><?= $hotel->hotel_name ?></small></h6>
			<h6 class="card-text">Room type: <small><?php if($room->room_type) echo "Double Bed";
															else echo "Single Bed";?></small></h6>
			<h6 class="card-text">Luxury: <small><?php if($room->luxury) echo "Super Deluxe";
															else echo "Deluxe";?></small></h6>
			<h6 class="card-text">No. of days: <small><?= $booking->day_no ?></small></h6>
			<h6 class="card-text">No. of rooms: <small><?= $booking->no_of_rooms ?></small></h6>
			<h6 class="card-text">Check-in date: <small><?= $booking->check_in_date ?></small></h6>
			<h6 class="card-text">Total price: <small>INR. <?= $booking->cost ?></small></h6>
			<h6 class="card-text">Booking on: <small><?= $booking->booking_date ?></small></h6>
		</div>
		<div class="card-body">
			<a href="<?=base_URL('index.php/customer')?>" class="card-link">Continue</a>
		</div>
	</div>
</div>

<?php include('public_footer.php')?>
<?php include('public_header.php')?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2>Hello, <?php echo $user->first_name ?>!</h2>
			<h5 class="text-default"><b>Search Hotels</b> by location in the search box above at the right corner</h5>
		</div>
	</div>
	<br>
	<legend> My Bookings</legend>
	<table class="table table-striped table-hover">
		<thead>
			<th>Booking date</th>
			<th>Hotel name</th>
			<th>Details</th>
		</thead>
		<tbody>
			<?php if (count($bookings)!=0):
				foreach($bookings as $booking): ?>
				<tr>
					<td><?php echo $booking->booking_date ?></td>
					<td><?php echo $booking->hotel_name ?></td>
					<td><a href="<?=base_URL("index.php/customer/view_transcript/{$booking->booking_id}")?>">View Details</a></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">No Rooms found.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
	
</div>
<?php include('public_footer.php')?>
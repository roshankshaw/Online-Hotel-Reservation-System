<?php include('public_header.php') ?>
<div class="container">
	<div class="row">
		<div class="jumbotron ml-auto mr-auto">
		  <h1 class="display-1"><?=$hotel->hotel_name?></h1>
		  <hr class="my-4">
		  <p class="lead ">
		  	<span><b>Location: </b><?=$hotel->location?></span>
		  </p>
		  <p class="lead">
		  	<span><b>Meals Facility: </b><?php if($hotel->meals):echo 'Yes'; else: echo 'No'; endif;?></span>
		  </p>
		  <p class="lead">
		  	<span><b>Swimming Pool facility: </b><?php if($hotel->s_pool):echo 'Yes'; else: echo 'No'; endif;?></span>
		  </p>
		  <div class="lead">
		  	<span><b>Description:</b></span>
		  	<p class="text-justify">
		  		<?=$hotel->description?>
		  	</p>
		  </div>
		  <div class="lead">
			  	<span><b>Rooms available:</b></span>
		  		<table class="table table-hover">
					<thead>
						<th>Room_type</th>
						<th>Price</th>
						<th>Luxury</th>
						<th>Extra Beds</th>
						<th>Actions</th>
					</thead>
					<tbody>
						<?php if (count($rooms)!=0):
							foreach($rooms as $room): ?>
							<tr>
								<td><?php if($room->room_type)
											echo "Double Bed";
									   else
									   		echo "Single Bed";
									 ?>
								 </td>
								<td><?=$room->base_cost ?></td>
								<td><?php if($room->luxury)
											echo "Super Deluxe";
									   else
									   		echo "Deluxe";
									 ?>
								 </td>
								 <td><?php if($room->extra_beds)
											echo "Yes";
									   else
									   		echo "No";
									 ?>
								 </td>
								<td>
									<div class="col-md-2">
										<?= anchor("customer/add_booking/{$id}/{$room->hotel_id}/{$room->room_type}/{$room->luxury}",'Book',['class'=>'btn btn-success'])?>
									</div>
								</td>
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
		</div>
	</div>
</div>
<?php include('public_footer.php') ?>
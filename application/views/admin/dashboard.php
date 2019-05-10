<?php include('admin_header.php')?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2>Hello, <?php echo $user->first_name ?>!</h2>
			<p class="text-default">Update details of your <?php echo $hotel->hotel_name ?> hotel now!</p>
		</div>
	</div>
	<div class="row">		    
		<div class="col-md-12">
			<?= anchor('admin/add_rooms','Add Rooms',['class'=>'btn btn-primary btn-lg float-right'])?>
			<!-- <a class="btn btn-success btn-lg float-right" href=" base_url function" >Add Article</a> -->
		</div>
	</div>

	    <?php if($feedback = $this->session->flashdata('feedback')):
	    		$feedback_class=$this->session->flashdata('feedback_class');
	     ?>
		    <div class="container">
		    	<div class="col-md-12 ">
		    		<div class="alert alert-dismissible <?=$feedback_class?>">
					  <center><strong><?= $feedback ?></strong></center>
					</div>
		    	</div>
		    </div>
		<?php endif;?>
	<br>
	<table class="table">
		<thead>
			<th>Room_type</th>
			<th>Price</th>
			<th>Luxury</th>
			<th>Availability</th>
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
					 <td><center><?=$room->availability?></center></td>
					 <td><?php if($room->extra_beds)
								echo "Yes";
						   else
						   		echo "No";
						 ?>
					 </td>
					<td>
						<div class="row">
							<div class="col-md-2">
								<?= anchor("admin/edit_room/{$room->hotel_id}/{$room->room_type}/{$room->luxury}",'Edit',['class'=>'btn btn-primary'])?>
							</div>
							<div class="col-md-2">
								<?=
									form_open('admin/delete_room'),
									form_hidden('hotel_id',$room->hotel_id),
									form_hidden('room_type',$room->room_type),
									form_hidden('luxury',$room->luxury),
									form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to delete the rooms?');"]),
									form_close();
								?>
							</div>
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
<?php include('admin_footer.php')?>
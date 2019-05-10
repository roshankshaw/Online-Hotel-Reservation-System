<?php include('public_header.php')?>
<div class="container">
		  <?php echo form_open('customer/book_room');?>
		  <?php echo form_hidden('hotel_id',$hotel->hotel_id)?>
		  <?php echo form_hidden('user_id',$user->user_id)?>
		  <?php echo form_hidden('room_type',$room->room_type)?>
		  <?php echo form_hidden('luxury',$room->luxury)?>
		  <?php echo form_hidden('cost',$room->base_cost)?>
		  <?php echo form_hidden('booking_date',date('Y-m-d'))?>
		  <fieldset>
		  	<legend>Booking Details</legend>
		  	<div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label>Booking Name:</label>
			      <?php echo form_input(['type'=>'name','name'=>'booking_name','class'=>'form-control','value'=>set_value('booking_name',$user->first_name." ".$user->last_name),'required'=>'','required'=>''])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('booking_name'); ?></small>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label>Hotel name:</label>
			      <?php echo form_input(['type'=>'name','name'=>'hotel_name','class'=>'form-control','value'=>set_value('hotel_name',$hotel->hotel_name),'required'=>'','disabled'=>'disabled'])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('hotel_name'); ?></small>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label>Hotel location:</label>
			      <?php echo form_input(['type'=>'name','name'=>'location','class'=>'form-control','value'=>set_value('location',$hotel->location),'required'=>'','disabled'=>'disabled'])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('location'); ?></small>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
				<div class="form-group col-md-6">
			      	<label>Room type</label>
			      	<?php 
				      	$options = array(
					        '0'=> 'Single bed',
					        '1'=> 'Double bed',
						);
						echo form_dropdown('room_type', $options,$room->room_type,['class'=>'form-control','value'=>set_value('room_type'),'disabled'=>'disabled']);
			      	 ?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('room_type')?>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
				<div class="form-group col-md-6">
			      	<label>Luxury</label>
			      	<?php 
				      	$options = array(
					        '0'=> 'Deluxe',
					        '1'=> 'Super Deluxe',
						);
						echo form_dropdown('luxury', $options,$room->luxury,['class'=>'form-control','value'=>set_value('luxury'),'disabled'=>'disabled']);
			      	 ?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('luxury')?>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
				<div class="form-group col-md-6">
			      	<label>Extra Beds facility?</label>
			      	<?php 
				      	$options = array(
					        '0'=> 'No',
					        '1'=> 'Yes',
						);
						echo form_dropdown('extra_beds', $options,$room->extra_beds,['class'=>'form-control','value'=>set_value('extra_beds'),'disabled'=>'disabled']);
			      	 ?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('extra_beds')?>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label>Check-in date:</label>
			      <?php echo form_input(['type'=>'date','name'=>'check_in_date','class'=>'form-control', 'placeholder'=>'Enter Date of Birth','required'=>'','value'=>set_value('check_in_date')])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('check_in_date')?>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label>Base price per day:</label>
			      <?php echo form_input(['type'=>'number','name'=>'cost','class'=>'form-control','value'=>set_value('cost',$room->base_cost),'required'=>'','disabled'=>'disabled'])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('base_cost'); ?></small>
			    </div>
			</div>

			<div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label>No. of days of stay:</label>
			      <?php echo form_input(['type'=>'number','name'=>'day_no','class'=>'form-control','value'=>set_value('day_no'),'required'=>''])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('day_no'); ?></small>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label>No. of rooms:</label>
			      <?php echo form_input(['type'=>'number','name'=>'no_of_rooms','class'=>'form-control','value'=>set_value('no_of_rooms'),'required'=>''])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('no_of_rooms'); ?></small>
			    </div>
			</div>
			
			<div class="form-group col-md-6 offset-md-4" style="padding-left: 2.5%;">
				<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default'])?>
				 <a class="btn btn-danger" href="<?=$_SERVER['HTTP_REFERER']?>" role="button">Abort</a>
				<?php echo form_submit(['name'=>'submit','value'=>'Book','class'=>'btn btn-success'])?>
		  	</div>
		  </fieldset>
		</form>
</div>
<?php include('public_footer.php')?>
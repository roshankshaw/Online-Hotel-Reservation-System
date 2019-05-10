<?php include('admin_header.php')?>
<div class="container">
		  <?php echo form_open('admin/store_room');?>
		  <fieldset>
		  	<legend>Add Room</legend>
			<div class="row" style="padding-left: 2.5%;">
				<div class="form-group col-md-6">
			      	<label>Room type</label>
			      	<?php 
				      	$options = array(
					        '0'=> 'Single bed',
					        '1'=> 'Double bed',
						);
						echo form_dropdown('room_type', $options,'0',['class'=>'form-control','value'=>set_value('room_type')]);
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
						echo form_dropdown('luxury', $options,'0',['class'=>'form-control','value'=>set_value('luxury')]);
			      	 ?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('luxury')?>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label>Number of available rooms:</label>
			      <?php echo form_input(['type'=>'number','name'=>'availability','class'=>'form-control','value'=>set_value('availability'),'required'=>''])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('availability'); ?></small>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
			    <div class="form-group col-md-6">
			      <label>Base price of rooms:</label>
			      <?php echo form_input(['type'=>'number','name'=>'base_cost','class'=>'form-control','value'=>set_value('base_cost'),'required'=>''])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('base_cost'); ?></small>
			    </div>
			</div>
			<div class="row" style="padding-left: 2.5%;">
				<div class="form-group col-md-6">
			      	<label>Are extra beds available for the rooms?</label>
			      	<?php 
				      	$options = array(
					        '0'=> 'No',
					        '1'=> 'Yes',
						);
						echo form_dropdown('extra_beds', $options,'0',['class'=>'form-control','value'=>set_value('extra_beds')]);
			      	 ?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('extra_beds')?>
			    </div>
			</div>
			<div class="form-group col-md-6 offset-md-4" style="padding-left: 2.5%;">
				<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default'])?>
				<?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary'])?>
		  	</div>
		  </fieldset>
		</form>
</div>
<?php include('admin_footer.php')?>
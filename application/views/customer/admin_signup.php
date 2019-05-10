<?php include('public_header.php')?>

<div class="container">
		  <?php echo form_open('Signup/store_admin');?>
		  <?php echo form_hidden('user_id',$user_id);?>
		  <fieldset>
		    <legend>Admin Signup</legend>
		    <?php if($feedback=$this->session->flashdata('admin_register_alert')):?>
			    <div class="row">
			    	<div class="col-md-6 alert-danger">
			    		<center><strong><?= $feedback ?></strong></center>
			    	</div>
			    </div>
			<?php endif; ?>
		  	<div class="row">
			    <div class="form-group col-md-6">
			      <label>Hotel Name:</label>
			      <?php echo form_input(['type'=>'name','name'=>'hotel_name','class'=>'form-control', 'placeholder'=>'Enter name of the hotel','value'=>set_value('hotel_name')])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('hotel_name')?>
			    </div>
			</div>

			<div class="row">
			    <div class="form-group col-md-6">
			      <label>Location(Address):</label>
			      <?php echo form_input(['type'=>'name','name'=>'location','class'=>'form-control', 'placeholder'=>'Enter the location of the hotel','value'=>set_value('location')])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('location')?>
			    </div>
			</div>

			<div class="row">
			    <div class="form-group col-md-6">
			      <label>Hotel Description:</label>
			      <?php echo form_textarea(['name'=>'description','class'=>'form-control', 'placeholder'=>'Enter description of the hotel','value'=>set_value('description')])?>
			    </div>

			    <div class="col-md-6">
			    	<br>
			      <small style=" padding-top: 50%; color:red;"><?php echo form_error('description'); ?></small>
			    </div>
			</div>

			<div class="row">
				<div class="form-group col-md-6">
			      	<label>Are meals available for customers?</label>
			      	<?php 
				      	$options = array(
					        '0'=> 'No',
					        '1'=> 'Yes',
						);
						echo form_dropdown('meals', $options,'0',['class'=>'form-control','value'=>set_value('meals')]);
			      	 ?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('meals')?>
			    </div>
			</div>

			<div class="row">
				<div class="form-group col-md-6">
			      	<label>Is a swimming pool facility available for customers?</label>
			      	<?php 
				      	$options = array(
					        '0'=> 'No',
					        '1'=> 'Yes',
						);
						echo form_dropdown('s_pool', $options,'0',['class'=>'form-control','value'=>set_value('meals')]);
			      	 ?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('s_pool')?>
			    </div>
			</div>

			<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default'])?>
			<?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary'])?>
		  </fieldset>
		</form>
	</div>	

<?php include('public_footer.php')?>

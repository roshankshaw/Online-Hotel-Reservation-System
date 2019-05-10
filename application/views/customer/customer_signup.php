<?php include('public_header.php')?>

<div class="container">
		  <?php echo form_open('Signup/store_user');?>
		  <?php echo form_hidden('role',$role);?>
		  <fieldset>
		    <legend>User Signup</legend>
		    <?php if($feedback=$this->session->flashdata('register_alert')):?>
			    <div class="row">
			    	<div class="col-md-6 alert-danger">
			    		<center><strong><?= $feedback ?></strong></center>
			    	</div>
			    </div>
			<?php endif; ?>
		  	<div class="row">
			    <div class="form-group col-md-6">
			      <label>First Name:</label>
			      <?php echo form_input(['type'=>'name','name'=>'first_name','class'=>'form-control', 'placeholder'=>'Enter First Name','value'=>set_value('first_name')])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('first_name')?>
			    </div>
			</div>

			<div class="row">
			    <div class="form-group col-md-6">
			      <label>Last Name:</label>
			      <?php echo form_input(['type'=>'name','name'=>'last_name','class'=>'form-control', 'placeholder'=>'Enter Last Name','value'=>set_value('last_name')])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('last_name')?>
			    </div>
			</div>

			<div class="row">
			    <div class="form-group col-md-6">
			      <label>Date of Birth:</label>
			      <?php echo form_input(['type'=>'date','name'=>'dob','class'=>'form-control', 'placeholder'=>'Enter Date of Birth','value'=>set_value('dob')])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('dob')?>
			    </div>
			</div>

			<div class="row">
			    <div class="form-group col-md-6">
			      <label>Email:</label>
			      <?php echo form_input(['type'=>'email','name'=>'email','class'=>'form-control', 'placeholder'=>'Enter Email','value'=>set_value('email')])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('email')?>
			    </div>
			</div>

			<div class="row">
			    <div class="form-group col-md-6">
			      <label>Password</label>
			      <?php echo form_password(['name'=>'password','class'=>'form-control', 'placeholder'=>'Enter password'])?>
			    </div>

			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('password')?>
			    </div>
			</div>
			<div class="row">
			    <div class="form-group col-md-6">
			      <label>Confirm Password</label>
			      <?php echo form_password(['name'=>'confirmpassword','class'=>'form-control', 'placeholder'=>'Enter password again'])?>
			    </div>

			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('confirmpassword')?>
			    </div>
			</div>

			<div class="row">
			    <div class="form-group col-md-6">
			      <label>Enter your Aadhar Number:</label>
			      <?php echo form_input(['type'=>'aadhar_no','name'=>'aadhar_no','class'=>'form-control', 'placeholder'=>'Enter your Aadhar Number','value'=>set_value('aadhar_no')])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('aadhar_no')?>
			    </div>
			</div>

			<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default'])?>
			<?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary'])?>
		  </fieldset>
		</form>
	</div>	

<?php include('public_footer.php')?>

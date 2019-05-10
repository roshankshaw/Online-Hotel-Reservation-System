<?php include('public_header.php')?>
<div class="container">
		  <?php echo form_open('login/user_login');?>
		  <fieldset>
		    <legend>User Login</legend>
			
			<?php if($feedback=$this->session->flashdata('login_failed')):?>
			    <div class="row">
			    	<div class="col-md-6 alert-danger">
			    		<center><strong><?= $feedback ?></strong></center>
			    	</div>
			    </div>
			<?php endif; ?>

		    <div class="row">
			    <div class="form-group col-md-6">
			      <label>Registered email id:</label>
			      <?php echo form_input(['type'=>'email','name'=>'email','class'=>'form-control', 'placeholder'=>'Enter Email','value'=>set_value('email')])?>
			    </div>
			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('email')?>
			    </div>
			</div>
			<div class="row">
			    <div class="form-group col-md-6">
			      <label for="exampleInputPassword1">Password</label>
			      <?php echo form_password(['name'=>'password','class'=>'form-control', 'placeholder'=>'Enter password'])?>
			    </div>

			    <div class="col-md-6">
			    	<br>
			      <?php echo form_error('password')?>
			    </div>
			</div>
			<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default'])?>
			<?php echo form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary'])?>
		  </fieldset>
		</form>
</div>

<?php include('public_footer.php')?>

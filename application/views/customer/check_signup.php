<?php include('public_header.php')?>
<div class="container">
    <div class="row">
    	<fieldset>
	    	<legend>Signup as</legend>
	        <div class="col-sm-12 text center">
	        	<a href="<?= base_URL('index.php/Signup/add_user/1') ?>" class="btn btn-danger btn-lg" role="button">Hotel Admin</a>
	        	<a href="<?= base_URL('index.php/Signup/add_user/0') ?>" class="btn btn-success btn-lg" role="button">Customer</a>
	        </div>
        </fieldset>		
    </div>
</div>
<?php include('public_footer.php')?>
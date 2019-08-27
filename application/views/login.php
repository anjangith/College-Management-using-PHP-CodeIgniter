<?php include("inc/header.php"); ?>
<div id="container">
	<?php echo form_open("welcome/signin", ['class' => 'form-horizontal']); ?>
	<?php if($error = $this->session->flashdata('message')):?>
		<div class="row">
				<div class="col-md-6">
					<div class="alert alert-dismissible alert-danger">
						<?php echo $error ?>
					</div>
				</div>
		</div>
	<?php endif; ?>
	<div class="jumbotron">
	<h6 class="text-center text-bold display-3">Admin Login</h6>
	<hr>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
	<label class="col-md-3 ml-3 control-label">Email</label>
	<div class="col-md-9">
		<?php echo form_input(['name' => 'email','class'=>'form-control','placeholder'=>'as273863@gmail.com','value'=>set_value('user_name')]); ?>
	</div>
</div>
</div>
</div>
<div class="col-md-6">
	<?php echo form_error('email','<div class="text-danger ml-3">','</div>');
	?>
</div>



<div class="row">
<div class="col-md-6">
<div class="form-group">
	<label class="col-md-3 ml-3 control-label">Password</label>
	<div class="col-md-9">
		<?php echo form_password(['name' => 'password','class'=>'form-control','placeholder'=>'Password']); ?>
	</div>
</div>
</div>
</div>
<div class="col-md-6">
	<?php echo form_error('password','<div class="text-danger ml-3">','</div>');
	?>
</div>



</div>
<button type="submit" class="btn btn-primary ml-3 mt-3">Login</button>
<?php echo anchor("welcome","BACK",['class'=>'ml-3 mt-3 btn btn-secondary']); ?>
<div>
<?php echo form_close(); ?>
</div>
<?php include("inc/footer.php"); ?>

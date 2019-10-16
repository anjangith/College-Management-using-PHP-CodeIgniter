<?php include("inc/header.php"); ?>
<div class="container">
<div class="row">
<div class="col mt-5">

  <div id="container">
  	<?php echo form_open("homepage/usersignup", ['class' => 'form-horizontal']); ?>
  	<?php if($error = $this->session->flashdata('message')):?>
  		<div class="row">
  				<div class="col-md-12">
  					<div class="alert alert-dismissible alert-success">
  						<?php echo $error ?>
  					</div>
  				</div>
  		</div>
  	<?php endif; ?>
    <legend class="ml-2">SignUp</legend>
  <div class="row">
  <div class="col-md-12">
  <div class="form-group">
  	<label class="col-md-3 control-label">Username</label>
  	<div class="col-md-12">
  		<?php echo form_input(['name' => 'user_name','class'=>'form-control','placeholder'=>'Nick124','value'=>set_value('user_name')]); ?>
  	</div>
  </div>
  </div>
  </div>
  <div class="col-md-12">
  	<?php echo form_error('user_name','<div class="text-danger ml-3">','</div>');
  	?>
  </div>

  <div class="row">
  <div class="col-md-12">
  <div class="form-group">
  	<label class="col-md-3 ml-3 control-label">Email</label>
  	<div class="col-md-12">
  		<?php echo form_input(['name' => 'email','class'=>'form-control','placeholder'=>'as273863@gmail.com','value'=>set_value('user_name')]); ?>
  	</div>
  </div>
  </div>
  </div>
  <div class="col-md-12">
  	<?php echo form_error('email','<div class="text-danger ml-3">','</div>');
  	?>
  </div>

  <div class="row">
  <div class="col-md-6">
  <div class="form-group">
  	<label class="col-md-3 ml-3 control-label">Gender</label>
  	<select class="col-md-9 ml-3" name="gender">
  			<option value="">Select</option>
  			<option value="Male">Male</option>
  			<option value="Female">Female</option>

  	</select>
  </div>
  </div>
  </div>
  <div class="col-md-12">
  	<?php echo form_error('gender','<div class="text-danger ml-3">','</div>');
  	?>
  </div>

  <div class="row">
  <div class="col-md-6">
  <div class="form-group">
  	<label class="col-md-3 ml-3 control-label">Role</label>
  	<select class="col-md-9 ml-3" name="role_id">
  			<option value="">Select</option>
  			<?php if(count($roles)):?>
  				<?php foreach($roles as $role):?>
  						<option value=<?php echo $role->role_id?>><?php echo $role->role_name?></option>
  				<?php endforeach; ?>
  				<?php endif;?>
  	</select>
  </div>
  </div>
  </div>
  <div class="col-md-6">
  	<?php echo form_error('role_id','<div class="text-danger ml-3">','</div>');	?>
  </div>

  <div class="row">
  <div class="col-md-12">
  <div class="form-group">
  	<label class="col-md-3 ml-3 control-label">Password</label>
  	<div class="col-md-12">
  		<?php echo form_password(['name' => 'password','class'=>'form-control','placeholder'=>'Password']); ?>
  	</div>
  </div>
  </div>
  </div>
  <div class="col-md-12">
  	<?php echo form_error('password','<div class="text-danger ml-3">','</div>');
  	?>
  </div>


  <div class="row">
  <div class="col-md-12">
  <div class="form-group">
  	<label class="col-md-3 ml-3 control-label">Confirm Password</label>
  	<div class="col-md-12">
  		<?php echo form_password(['name' => 'confpwd','class'=>'form-control','placeholder'=>'Password']); ?>
  	</div>
  </div>
  </div>
  </div>
  <div class="col-md-12">
  	<?php echo form_error('confpwd','<div class="text-danger ml-3">','</div>');
  	?>
  </div>


  <button type="submit" class="btn btn-success ml-3 mt-3">REGISTER</button>
  <?php echo anchor("welcome","BACK",['class'=>'ml-3 mt-3 btn btn-info']); ?>
  <div>
  <?php echo form_close(); ?>
  </div>
  </div>
</div>
<div class="col mt-5">
<h1 class="display-3">Oppurtunities are even bigger with A-Preparation!</h1>
<blockquote class="blockquote">
<p class="mb-0">Whether your are a student seeking help for interview or an worker working in an Organisation</p>
<footer class="blockquote-footer">We are here to help you out</footer>
</blockquote>
</div>
</div>
</div>
<?php include("inc/footer.php"); ?>

<?php include("inc/header.php"); ?>
<div class="container">
  <div class="row">
    <div class="col mt-4">
      <h1 class="display-3">Welcome to A-Preparation</h1>
			<blockquote class="blockquote">
  <p class="mb-0">Prepare for your Up-Coming Interview or Exam with us</p>
  <footer class="blockquote-footer">Trusted by Lots of Companies!</footer>
</blockquote>
    </div>
		<!--- RHS --->
    <div class="col">
			<div id="container" class="mt-5">
				<fieldset>
					<legend class="ml-2">LOGIN</legend>
				<?php echo form_open("homepage/signin", ['class' => 'form-horizontal']); ?>
				<?php if($error = $this->session->flashdata('message')):?>
					<div class="row">
							<div class="col-md-12">
								<div class="alert alert-dismissible alert-danger">
									<?php echo $error ?>
								</div>
							</div>
					</div>
				<?php endif; ?>
			<div class="row">
			<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-3 control-label">Email</label>
				<div class="col-md-12">
					<?php echo form_input(['name' => 'email','class'=>'form-control','placeholder'=>'as273863@gmail.com','value'=>set_value('user_name')]); ?>
				</div>
			</div>
			</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('email','<div class="text-danger">','</div>');
				?>
			</div>

			<div class="row">
			<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-12 control-label">Password</label>
				<div class="col-md-12">
					<?php echo form_password(['name' => 'password','class'=>'form-control','placeholder'=>'Password']); ?>
				</div>
			</div>
			</div>
			</div>
			<div class="col-md-12">
				<?php echo form_error('password','<div class="text-danger">','</div>');
				?>
			</div>

			</div>
			<button type="submit" class="btn btn-success ml-3">Login</button>
			<?php echo anchor("homepage/register","REGISTER",['class'=>' btn btn-info']); ?>
		</fieldset>
			<div>
			<?php echo form_close(); ?>
			</div>

<?php include("inc/footer.php"); ?>

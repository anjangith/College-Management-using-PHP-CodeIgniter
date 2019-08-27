<?php include("inc/header.php"); ?>
<div id="container">
	<?php echo form_open("admin/createCollege", ['class' => 'form-horizontal']); ?>
	<?php if($error = $this->session->flashdata('message')):?>
		<div class="row">
				<div class="col-md-6">
					<div class="alert alert-dismissible alert-success">
						<?php echo $error ?>
					</div>
				</div>
		</div>
	<?php endif; ?>
	<div class="jumbotron">
	<h6 class="text-center text-bold display-3">Add College</h6>
	<hr>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
	<label class="col-md-3 ml-3 control-label">Email</label>
	<div class="col-md-9">
		<?php echo form_input(['name' => 'collegename','class'=>'form-control','placeholder'=>'College Name','value'=>set_value('collegename')]); ?>
	</div>
</div>
</div>
</div>
<div class="col-md-6">
	<?php echo form_error('collegename','<div class="text-danger ml-3">','</div>');
	?>
</div>



<div class="row">
<div class="col-md-6">
<div class="form-group">
	<label class="col-md-3 ml-3 control-label">Password</label>
	<div class="col-md-9">
		<?php echo form_input(['name' => 'branch','class'=>'form-control','placeholder'=>'Branch','value'=>set_value('branch')]); ?>
	</div>
</div>
</div>
</div>
<div class="col-md-6">
	<?php echo form_error('branch','<div class="text-danger ml-3">','</div>');
	?>
</div>



</div>
<button type="submit" class="btn btn-primary ml-3 mt-3">ADD</button>
<?php echo anchor("admin/dashboard","BACK",['class'=>'ml-3 mt-3 btn btn-secondary']); ?>
<div>
<?php echo form_close(); ?>
</div>
<?php include("inc/footer.php"); ?>

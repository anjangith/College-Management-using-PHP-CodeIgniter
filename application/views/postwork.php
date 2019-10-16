<?php include("inc/header.php"); ?>
<div id="container">
  <h4 class="display-3 ml-3">Post a New Work</h4>
	<?php echo form_open("users/postFinal", ['class' => 'form-horizontal']); ?>
	<?php if($error = $this->session->flashdata('message')):?>
		<div class="row">
				<div class="col-md-6">
					<div class="alert alert-dismissible alert-danger">
						<?php echo $error ?>
					</div>
				</div>
		</div>
	<?php endif; ?>

<div class="row">
<div class="col-md-6">
<div class="form-group">
	<label class="col-md-3 ml-3 control-label">Title</label>
	<div class="col-md-9">
		<?php echo form_input(['name' => 'p_title','class'=>'form-control','placeholder'=>'Nick124','value'=>$post]); ?>
	</div>
</div>
</div>
</div>
<div class="col-md-6">
	<?php echo form_error('p_title','<div class="text-danger ml-3">','</div>');
	?>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
	<label class="col-md-3 ml-3 control-label">Category</label>
	<select class="col-md-9 ml-3" name="c_id">
			<option value="">Select</option>
			<?php if(count($categories)):?>
				<?php foreach($categories as $category):?>
						<option value=<?php echo $category->c_id?>><?php echo $category->c_name?></option>
				<?php endforeach; ?>
				<?php endif;?>
	</select>
</div>
</div>
</div>
<div class="col-md-12">
	<?php echo form_error('c_id','<div class="text-danger ml-3">','</div>');
	?>
</div>

<div class="row">
<div class="col-md-9">
<div class="form-group">
	<label class="col-md-3 ml-3 control-label">Description</label>
	<div class="col-md-12">
		<?php echo form_textarea(['name' => 'p_description','class'=>'form-control','rows' => '5','placeholder'=>'Description ...']); ?>
	</div>
</div>
</div>
</div>
<div class="col-md-6">
	<?php echo form_error('p_description','<div class="text-danger ml-3">','</div>');
	?>
</div>


</div>
<button type="submit" class="btn btn-primary ml-3 mt-3">POST</button>
<?php echo anchor("users/find","BACK",['class'=>'ml-3 mt-3 btn btn-secondary']); ?>
<div>
<?php echo form_close(); ?>
</div>
<?php include("inc/footer.php"); ?>

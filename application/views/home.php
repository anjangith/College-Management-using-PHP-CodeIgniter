<?php include("inc/header.php"); ?>
<div id="container">
	<div class="jumbotron">
	<h2 class="text-center text-bold display-3">Admin and Co-admin Panel</h2>
	<hr>
</div>
<div class="row">
	<?php if(count($chkAdmin)): ?>

	<?php else:?>
		<div class="col-lg-6 text-center">
			<?php echo anchor("welcome/adminRegister","ADMIN REGISTER",['class'=>'btn btn-primary']); ?>
		</div>
	<?php endif; ?>

<div class="col-lg-6 text-center">
	<?php echo anchor("welcome/login","ADMIN LOGIN",['class'=>'btn btn-primary']); ?>
</div>
<div class="col-lg-4"></div>
</div>


</div>
<?php include("inc/footer.php"); ?>

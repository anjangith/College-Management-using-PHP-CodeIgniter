<?php include("inc/header.php"); ?>
<div id="container">
<div class="jumbotron">
<h3 class="text-center display-3 text-bold">ADMIN DASHBOARD</h3>
 <?php $username= $this->session->userdata('username');
				$email_id=$this->session->userdata('email');
  ?>
<h5>Welcome <?php echo $username; ?></h5>
<p><?php echo $email_id ?></p>
</div>


<hr>
<div class="row">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">College Name</th>
<th scope="col">Username</th>
<th scope="col">Email</th>
<th scope="col">Role</th>
<th scope="col">Gender</th>
<th scope="col">Branch</th>
</tr>
</thead>
<tbody>
	<?php if(count($users)):?>
		<?php foreach($users as $user): ?>
<tr class="table-active">
<td><?php echo $user->college_id; ?></td>
<td><?php echo $user->collegename; ?></td>
<td><?php echo $user->user_name; ?></td>
<td><?php echo $user->email; ?></td>
<td><?php echo $user->role_name; ?></td>
<td><?php echo $user->gender; ?></td>
<td><?php echo $user->branch; ?></td>

</tr>
<?php endforeach;?>
<?php else:?>
	<tr><td>No Records Found</td></tr>
<?php endif; ?>
</tbody>
</table>
</div>
<?php echo anchor("users/dashboard","BACK",["class"=>"btn ntn-primary"]); ?>
</div>
<?php include("inc/footer.php"); ?>

<?php include("inc/header.php"); ?>
<div id="container">
<div class="jumbotron">
<h3 class="text-center display-3 text-bold">CO-ADMIN DASHBOARD</h3>
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
<th scope="col">Student Name</th>
<th scope="col">College Name</th>
<th scope="col">Email</th>
<th scope="col">Gender</th>
<th scope="col">Course</th>
</tr>
</thead>
<tbody>
	<?php if(count($students)):?>
		<?php foreach($students as $student): ?>
<tr class="table-active">
<td><?php echo $student->id; ?></td>
<td><?php echo $student->studentname; ?></td>
<td><?php echo $student->collegename; ?></td>
<td><?php echo $student->email; ?></td>
<td><?php echo $student->gender; ?></td>
<td><?php echo $student->course; ?></td>
</tr>
<?php endforeach;?>
<?php else:?>
	<tr><td>No Records Found</td></tr>
<?php endif; ?>
</tbody>
</table>
</div>
</div>
<?php include("inc/footer.php"); ?>

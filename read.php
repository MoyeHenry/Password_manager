<?php
 include "php/readi.php"; ?>
<!DOCTYPE html>
<html>
<head>
<html lang="en">

<head>
	<title>Details</title>


<!-- this bootstrap plugins lines	 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	
</head>
<body>
	<div class="container">
		<div class="box">

			<!-- confirmation when the application is created or stored -->
			<h3 class="display-4 text-center">Application Details</h3><br><br>
			<?php if (isset($_GET['sucess'])) { ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $_GET['sucess']; ?>
				</div>
			<?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>	
				<!-- table boder -->
			<table class="table table-bordered table-border">
			  <thead>
			    <tr>
			      <th scope="col">S/N</th>
			      <th scope="col">Website Name</th>
			      <th scope="col">Username</th>
			      <th scope="col">Password</th>
			      <th scope="col">Action</th>

			      </tr>
			  </thead>
			  <tbody>

			  	<!-- automated increment of results when Application manger save more password -->
			  	<?php
			  		$i = 0;
			  		while($rows = mysqli_fetch_assoc($result)){ 
			  			$i++;
			  		?>
			  	<tr>
			  	<th scope="row"><?=$i?></th>
			  	<td><?=$rows['appname']?></td>
			  	<td><?=$rows['user_name']?></td>
			  	<td><?php echo $rows['password']; ?></td>


			  	<!-- this are buttons in navigating username details -->
			  	<td><a href="update.php?id=<?=$rows['id']?>"
			  		class="btn-sm btn-success">Restore</a>
			  		<a href="delete.php?id=<?=$rows['id']?>"
			  		class="btn-sm btn-danger">Delete</a>
			  		<a href="decrypt.php?id=<?=$rows['id']?>"
			  		class="btn-sm btn-primary">Decrpt</a>

			  	</td>
			   </tr>
			   <?php } ?>
			 </tbody>
			</table>
			<?php } ?>
			<div class="link-right">
				<!-- redirect to page 'indez'  -->
				<a href="indez.php" class="link-primary">Create</a>   
		   </div>
		</div>
	</div>
	
</body>
</html>


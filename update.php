<?php

// link to the page file 'updat'
  include "php/updat.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>

	<!-- css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="styl.css">
</head>
<body>
	<div class="container">
		<form action="php/updat.php" 
		      method="post">
		      <h4 class="display-4 text-center">Update</h4><hr><br>

<!-- table validating details of input	 -->
			  <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		<?php } ?>
			

		<!-- Table forms and input which also link to integration to the database -->
	   	 <div class="form-group">
			<label for="appname">Application Name</label>
			<input type="appname" 
		           class="form-control"
		           id="appname"
		           name="appname"
		           value="<?=$row['appname'] ?>" >
		 </div>

		 <div class="form-group">
			<label for="user_name">User Name</label>
			<input type="user_name"
		           class="form-control"
		           id="user_name"
		           name="user_name"
		           value="<?=$row['user_name'] ?>" ><br>

		   <div class="form-group">
			<label for="password">password</label>
			<input type="password"
		           class="form-control"
		           id="password"
		           name="password"
		           value="<?=$row['password'] ?>" >
             
		  </div>
		  <input type="text"
		          name="id"
		          value="<?=$row['id']?>"
		          hidden >

<!-- this is to update activation -->
		 <button type="submit"class="btn btn-primary"name="update">Update</button>

		 <!-- redirect the page to view page -->
		 		 <a href="read.php" class="link-primary">View</a>
	</form>
	</div>
	
</body>
</html>  
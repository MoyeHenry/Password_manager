<!DOCTYPE html>
<html>
<head>
	<title>Save</title>

	<!-- css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="styl.css">
</head>
<body>
	<div class="container">
		<form action="php/create.php" 
		      method="post">
		      <h4 class="display-4 text-center">Application Manager</h4><hr><br>

		    <!-- validating details of input	 -->
			  <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		<?php } ?>
			
		<!-- Table forms and input which also link to integration to the database -->
	   	 <div class="form-group">
			<label for="appname">Website Name</label>
			<input type="appname"
		           class="form-control"
		           id="appname"
		           name="appname"
		           value="<?php if(isset($_GET['appname']))
		                           echo($_GET['appname']); ?>"
		           placeholder="Enter Application Name">

		 </div>
		 <div class="form-group">
			<label for="user_name">User Name</label>
			<input type="user_name"
		           class="form-control"
		           id="user_name"
		           name="user_name"
		           value="<?php if(isset($_GET['user_name']))
		                           echo($_GET['user_name']); ?>"
		           placeholder="Enter User Name">
		 </div>
		 <div class="form-group">
			<label for="password">Password</label>
			<input type="password"
		           class="form-control"
		           id="password"
		           name="password"
		           value="<?php if(isset($_GET['password']))
		                           echo($_GET['password']); ?>"
		           placeholder="Enter password">
		  </div>
		  
		  <!-- button to save user password details -->
		 <button type="submit"
		 		 class="btn btn-primary"
		 		 name="create">Save Password</button>
		 		 <a href="read.php" class="link-primary">View</a>
		 		 <!-- <a href="Logout.php">Logout</a> -->
		 		 
	</form>
	<br>

	<!-- this is to exit from the page -->
	<a href="logout.php" role="button" role="button"class="link-primary">Logout</button>

	</div>
</body>
</html>  

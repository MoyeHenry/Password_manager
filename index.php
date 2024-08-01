<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>

     <!-- validating details of input	 -->
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     <!-- //input -->
     	<label>User Name</label>
     	<input type="email" name="username" placeholder="username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     <!-- button to login  -->
     	<button type="submit">Login</button>

     	<!-- <button type="submit" name="login_btn" class="btn btn-primary">Login</button> -->
     </form>
</body>
</html>
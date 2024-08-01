<?php 
// Start a PHP session
session_start();

// link to my the file with database connection details
include "moyedb.php";

// Check if the 'username' and 'password' fields are submitted via POST method
if (isset($_POST['username']) && isset($_POST['password'])) {

// function of validated data
	function validate($data){
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

// retrieve form data for 'username' and 'password'
	$username = validate($_POST['username']);
    $password = validate($_POST['password']);

// Confirm if 'username' field is empty
    if (empty($username)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{

// checking the user data if the username and password match		
	$sql = "SELECT * FROM moye WHERE username='$username' AND password='$password'";


//Execute query using the database connection
	$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

 // Check if username and password match
		if ($row['username'] === $username && $row['password'] === $password) {

// Set session variables for username and user id
		$_SESSION['username'] = $row['username'];
		$_SESSION['id'] = $row['id'];
	header("Location: indez.php");
			exit();		
    }else{

// Redirect to 'index.php' with an error message for incorrect username or password
	header("Location: index.php?error=Incorrect User name or Password");
	        exit();

		}
	}else{
      header("Location: index.php?error=Incorrect User name or Password");
    exit();
  }
		
}

    }else{

   	//Redirect page if conditions are met
	header("Location: index.php");
	exit();
}

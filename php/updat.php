<?php

// integration if the form 'create' button was submitted via POST method
if (isset($_GET['id'])) {

	// integration if the form 'create' button was submitted via POST method
	include "moyedb.php";

// link to my the file with database connection details
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	// Function to encrypt the password using AES-256-CBC encryption
    function encryptPassword($password, $key) {
        $method = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($ivLength);
        $encrypted = openssl_encrypt($password, $method, $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($encrypted) . ':' . base64_encode($iv);
    }

//Function to dencrypt the password using AES-256-CBC encryptio
    function decryptData($data, $key) {
        $data = base64_decode($data);
        $cipher = "aes-256-cbc";
        $iv_length = openssl_cipher_iv_length($cipher);
        $iv = substr($data, 0, $iv_length);
        $data = substr($data, $iv_length);
        $decrypted = openssl_decrypt($data, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    }


	$id = validate($_GET['id']);

//selecting a record from the 'users' table where the 'id' matches the data id

	$sql = "SELECT * FROM users WHERE id=$id";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
	}else {
		header("Location: ../read.php");
	}
//Function to check input data to prevent SQL injection
}else if(isset($_POST['update'])){
	include "../moyedb.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	//retrieval form data
	$appname = validate($_POST['appname']);
	$user_name = validate($_POST['user_name']);
	$password = validate($_POST['password']);
	$id = validate($_POST['id']);

	//Check for empty input fields and redirect with error messages if found
	if (empty($appname)) {
		header("Location: ../update.php?id=$id&error=Application Name is required");
	}else if (empty($user_name)) {
		header("Location: ../update.php?id=$id&error=user_name is required");
	}else {

		// update the 'users' table with the new data
		$sql = "UPDATE users
				SET appname='$appname', user_name='$user_name'
				WHERE id=$id ";

	// Execute the SQL query using the database connection '$conn'
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: ../read.php?success=successfully updated");
		}else {
			header("Location: ../update.php?error=unknown error occurred&$user_data");
		}

	}
	//Redirect page to'read.php' if conditions are met
}else {
	header("Location: ../read.php");	

}
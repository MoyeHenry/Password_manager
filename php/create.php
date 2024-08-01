<?php

// integration if the form 'create' button was submitted via POST method
if (isset($_POST['create'])) {

// link to my the file with database connection details
    include "../moyedb.php";

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



    // Replace 'your_secret_key' with your actual secret key for encryption
    $secretKey = 'your_secret_key';
 
    // confirmation and retrieve form data
    $appname = validate($_POST['appname']);
    $user_name = validate($_POST['user_name']);
    $password = validate($_POST['password']);

    // Concatenate user data for potential error redirection
    $user_data = 'appname=' .$appname. '&user_name=' .$user_name .'&password='.$password;

    if (empty($appname)) {
        header("Location: ../indez.php?error=Application Name is required&$user_data");

     } else if (empty($user_name)) {
        header("Location: ../indez.php?error=Website Name is required&$user_data");

    } else if (empty($password)) {
        header("Location: ../indez.php?error=Password is required&$user_data");
    } else {

        // Encryption of password
        $encryptedPassword = encryptPassword($password, $secretKey);


        // Insert user data into the database
        $sql = "INSERT INTO users(appname, user_name, password) VALUES('$appname', '$user_name', '$encryptedPassword')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../read.php?success=successfully created");
        } else {

            // Redirection with a message alert if insertion fails
            header("Location: ../indez.php?error=unknown error occurred&$user_data");
        }
    }
}
?>
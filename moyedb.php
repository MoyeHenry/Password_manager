<?php

$servername = "localhost";
$unmae = "root";
$password = "";
$name = "moyedb";

// Create connection
$conn = mysqli_connect($servername, $unmae, $password, $name);

// Check connection
if (!$conn) {
  echo "Connection failed!";
}

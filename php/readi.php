<?php
// link to my the file with database connection details
include "moyedb.php";


// retrieve all records from the 'users' table, ordered by 'id' in descending order
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
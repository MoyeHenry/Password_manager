<?php  

// integration if the form 'id' button was submitted via GET method
if(isset($_GET['id'])){

//link to my the file with database connection details   
   include "moyedb.php";

//function of validated data   
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

//Execute the SQL query using the database connection '$conn'
      $sql = "DELETE FROM users
              WHERE id=$id";
   $result = mysqli_query($conn, $sql);

//Check if the deletion was successful   
   if ($result) {
        header("Location: read.php?success=successfully deleted");
   }else {
    //Redirect to 'read.php' with an error message if the deletion fails
      header("Location: read.php?error=unknown error occurred&$user_data");
   }


   }else {
   header("Location: read.php");
}
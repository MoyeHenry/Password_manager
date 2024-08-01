<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Decrypt</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2 bg-light p-4 mt-5 rounded">
        <form action="" method="POST">
          <div class="form-group">
            <label for="message">Password Decryption</label>
            <textarea name="text" class="form-control" id="msg" rows="3" placeholder="Enter your decrypted password"></textarea>
          </div>
          <button type="submit" name="decrypt" class="btn btn-primary">Decrypt</button>
          <a href="read.php" class="link-primary">View</a>
        </form>
        <?php

        // Checking if the form was submitted for decryption
        if (isset($_POST['password'])) {
          // Retrieve the text from the form
          $encryptedText = $_POST['text'];

          // Perform decryption (Here is a placeholder for actual decryption logic)
          // Replace this with your decryption algorithm for 
          $decryptedText = "This is the decrypted text: " . $encryptedText;

          // Display the decrypted text
          echo '<div class="alert alert-primary mt-3" role="alert">' . $decryptedText . '</div>';
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (jQuery and Popper included) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

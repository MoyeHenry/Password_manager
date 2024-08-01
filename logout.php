<?php 

// Start a PHP session
session_start();

session_unset();

// Destroy the session
session_destroy();

// Redirect to page 'index.php'
header("Location: index.php");
<?php
require('connect.php');

// Start PHP session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page or any other appropriate page after logout
header("Location: login.php");
exit();
?>
<?php
session_start(); // Start the session (if not already started)

if (isset($_POST['logout'])) {
    session_destroy();
    $_SESSION = array();
    header("location: login.php"); 
    exit;
} else {
    header("Location: myaccount.php"); 
    exit;
}
?>

<?php
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();

// redirects to the homepage
header("Location: ../index.php");
exit();
?>
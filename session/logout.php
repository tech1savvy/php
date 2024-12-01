<?php
session_start(); // called to access and work with the session data in logout.php page/script.

// Destroy session data
session_unset();
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit;

<?php
session_start(); // Start the session

// Destroy all session data
session_unset();      // Unset all session variables
session_destroy();    // Destroy the session

// Redirect to login page (change as needed)
header("Location: admin_login.php");  // Or "admin_login.php" for admin logout
exit();



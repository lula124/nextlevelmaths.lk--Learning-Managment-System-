<?php
// Start the session
session_start();

// If the user is logged in, destroy the session to log them out
if (isset($_SESSION['student_id'])) {
    session_destroy();
}

// Redirect the user to a login page or another appropriate page
header("Location:../loging.php");
exit;
?>

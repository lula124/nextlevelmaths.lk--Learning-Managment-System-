<?php
session_start();
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("connection.php");
include("function.php");

// Check login and get user data
$user_data = check_login($con);

$approveID = $_POST['approveID'];
$inputValue = $_POST['inputValue'];

// Sanitize inputs to prevent SQL injection
$approveID = mysqli_real_escape_string($con, $approveID);
$inputValue = mysqli_real_escape_string($con, $inputValue);

// Update the 'approve' column in the database based on 'approveid'
$queryUpdate = "UPDATE students SET approve = '$inputValue' WHERE id = '$approveID'";
$resultUpdate = mysqli_query($con, $queryUpdate);

if ($resultUpdate) {
    echo json_encode(['success' => true, 'message' => 'Data updated successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update data']);
}

mysqli_close($con);
?>

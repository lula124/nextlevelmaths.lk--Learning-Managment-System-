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

// Get event details from POST request
$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];

// Insert event into the database
$stmt = $conn->prepare("INSERT INTO events (title, description, date) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $title, $description, $date);

if ($stmt->execute()) {
    echo "Event added successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

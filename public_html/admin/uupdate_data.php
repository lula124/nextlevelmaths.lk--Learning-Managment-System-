<?php
session_start();
include("connection.php");
include("function.php");

// Check login and get user data
$user_data = check_login($con);

    // Retrieve data from POST request
    $paper_nameID = $_POST['paper_nameID'];
    $usernameInput = $_POST['usernameInput'];

    // Validate and sanitize inputs as needed
    $paper_nameID = mysqli_real_escape_string($con, $paper_nameID);
    $usernameInput = mysqli_real_escape_string($con, $usernameInput);

    // Prepare and execute the SQL query
    $queryUpdate = "UPDATE students SET paper_name = '$usernameInput' WHERE id = '$paper_nameID'";
    $resultUpdate = mysqli_query($con, $queryUpdate);
    
    if ($resultUpdate) {
        echo json_encode(['success' => true, 'message' => 'Data updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update data']);
    }
    
    mysqli_close($con);

?>

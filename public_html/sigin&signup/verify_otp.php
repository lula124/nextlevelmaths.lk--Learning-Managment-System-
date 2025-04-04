<?php
session_start();
include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $entered_otp = $_POST['otp'];
    
    if($entered_otp == $_SESSION['otp'])
    {
        // OTP is correct, proceed with login or registration
        $mobile_number = $_SESSION['mobile_number'];
        
        // Retrieve the student's ID and approve status from the database
        $query = "SELECT id, approve FROM students WHERE phonenumber = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $mobile_number);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            // Fetch the student ID and approve status
            $row = $result->fetch_assoc();
            $student_id = $row['id'];
            $approve_status = $row['approve'];
        
            // Store the student ID in the session
            $_SESSION['student_id'] = $student_id;

            // Redirect based on the approve status
            if($approve_status == 1) {
                // User is not approved
                header("Location:student_dashboard/dashboard.php");
                die;
            } else if($approve_status == 2) {
                // User is approve
                header("Location: ../admin/admindashboard.php");
                die;
            } else {
                // Invalid approve status
                echo '<script type="text/javascript">';
                echo 'alert("Invalid approval status.");';
                echo '</script>';
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Student not found in the database.");';
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Incorrect OTP!");';
        echo '</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <title>loging</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
 	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
     <link href="css/loging.css" rel="stylesheet">
</head>
<body>
    <form action="verify_otp.php" method="POST">
        <h3>Enter OTP</h3>
        <input type="number" name="otp" placeholder="Enter the OTP" required />
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>

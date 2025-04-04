<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $entered_otp = $_POST['otp'];
    
    // Check if the entered OTP matches the one stored in the session
    if ($entered_otp == $_SESSION['otp']) {
        // OTP verified successfully
        $_SESSION['otp_verified'] = true;
        header("Location: signup.php");
        exit();
    } else {
        echo "Invalid OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verify OTP</title>
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
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="sign_verify_otp.php">
        <h3>Enter OTP</h3>

        <label for="otp">OTP</label>
        <input type="text" placeholder="Enter OTP" name="otp" id="otp" required/>

        <button type="submit" id="verify_otp" name="verify_otp">Verify OTP</button>
    </form>
</body>
</html>

<?php
session_start();
include("connection.php");
require_once(__DIR__ . '/notify-php-master/autoload.php'); // Autoload Notify.lk package

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $mobile_number = $_POST['mobilenumber'];

    // Check if the mobile number is already registered
    $pnum_check = "SELECT * FROM students WHERE phonenumber='$mobile_number'"; // Use $mobile_number instead of $phone
    $result = $con->query($pnum_check);

    if ($result->num_rows > 0) {
        echo '<script type="text/javascript">';
        echo 'alert("This Mobile Number is Already In Use");';
        echo 'window.location.href = "signupnumber.php";'; // Redirect back to signup page
        echo '</script>';
        return; // Stop execution if the number is already in use
    }

    if (!empty($mobile_number)) {
        
        $otp = rand(10000, 99999);

        // Store OTP and mobile number in session
        $_SESSION['otp'] = $otp;
        $_SESSION['mobile_number'] = $mobile_number;

        // Send OTP via Notify.lk API
        $api_instance = new NotifyLk\Api\SmsApi();
        $user_id = "26462"; // Replace with your Notify.lk API User ID
        $api_key = "1Pl9Q6h27ZDJJ65fKPJ3"; // Replace with your Notify.lk API Key
        $message = "Your Nextlevelmaths OTP is: $otp"; // Message to send
        $to = "94" . ltrim($mobile_number, '0'); // Notify.lk format: 94XXXXXXXXX
        $sender_id = "NXTLVLMATHS"; // Or your custom sender ID if approved

        try {
            $api_instance->sendSMS($user_id, $api_key, $message, $to, $sender_id);
            // Redirect to OTP verification page
            header("Location: sign_verify_otp.php");
            exit;
        } catch (Exception $e) {
            echo 'Error sending OTP: ', $e->getMessage();
            exit;
        } 
    } else {
        // No mobile number entered, show error message
        echo '<script type="text/javascript">';
        echo 'alert("Please enter a valid mobile number");';
        echo 'window.location.href = "signupnumber.php";'; // Redirect back to signup page
        echo '</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup - Verify Phone Number</title>
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
    <form method="POST" action="signupnumber.php">
        <h3>Verify Your Mobile Number</h3>

        <label for="phone">Mobile Number</label>
        <input type="tel" placeholder="07********" name="mobilenumber" id="mobilenumber" pattern="07[0-9]{8}" title="Enter a 10-digit mobile number starting with 07" required />

        <button type="submit" id="request_otp" name="request_otp">Request OTP</button>
    </form>
</body>
</html>

<?php
session_start();
include("connection.php");
require_once(__DIR__ . '/notify-php-master/autoload.php'); // Autoload Notify.lk package

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $mobile_number = $_POST['mobilenumber'];

    if (!empty($mobile_number)) {
        // Check if the mobile number exists in the students table
        $query = "SELECT * FROM students WHERE phonenumber = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $mobile_number);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch student data
            $student = $result->fetch_assoc();
            
            // Check if the approve column is empty or has a value of 0
            if (empty($student['approve'])) {
                // Show notification and redirect to loging.php
                echo '<script type="text/javascript">';
                echo 'alert("Your account is not approved");';
                echo 'window.location.href = "loging.php";'; // Redirect back to login page
                echo '</script>';
            } else {
                // Generate a 5-digit OTP
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
                    header("Location: verify_otp.php");
                    die;
                } catch (Exception $e) {
                    echo 'Error sending OTP: ', $e->getMessage(), PHP_EOL;
                    die;
                }
            }
        } else {
            // Mobile number not found, show error message
            echo '<script type="text/javascript">';
            echo 'alert("Mobile number not found");';
            echo 'window.location.href = "loging.php";'; // Redirect back to login page
            echo '</script>';
        }
    } else {
        // No mobile number entered, show error message
        echo '<script type="text/javascript">';
        echo 'alert("Please enter a valid mobile number");';
        echo 'window.location.href = "loging.php";'; // Redirect back to login page
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
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="f1" action="loging.php" method="POST">
    <h3>Sign In Here</h3>
    <label for="mobilenumber">Mobile Number</label>
    <input type="number" placeholder="0712345678" name="mobilenumber" id="mobilenumber" pattern="07[0-9]{8}" title="Enter a 10-digit mobile number starting with 07" required/>
    <button name="submit" type="submit">Send OTP</button>
    <div class="social">
       <a href="../index.php" class="faBb"><div class="go">Back</div></a>
       <a href="signupnumber.php" class="fabS"><div class="fb">Sign Up</div></a>
    </div>
</form>

    
</body>
</html>
<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['otp_verified']) && $_SESSION['otp_verified'] === true) {
    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_SESSION['mobile_number']; // Retrieve verified phone number from the session
    $batch_year = $_POST['byear'];
    
    // Handle file uploads
    $selfie_pic = $_FILES['spic']['name'];
    $nic_front_pic = $_FILES['nfpic']['name'];
    $nic_back_pic = $_FILES['nbpic']['name'];

    // Target directories for the uploaded images
    $target_dir = "img/";
    $selfie_target = $target_dir . basename($selfie_pic);
    $nic_front_target = $target_dir . basename($nic_front_pic);
    $nic_back_target = $target_dir . basename($nic_back_pic);

    // Move the uploaded files to the target directory
    if (!move_uploaded_file($_FILES['spic']['tmp_name'], $selfie_target) ||
        !move_uploaded_file($_FILES['nfpic']['tmp_name'], $nic_front_target) ||
        !move_uploaded_file($_FILES['nbpic']['tmp_name'], $nic_back_target)) {
        die("Failed to upload images. Please try again.");
    }

    // Insert data into the database
    $sql = "INSERT INTO students (fname, lname, email, phonenumber, batch_year, selfie_pic, nic_front_pic, nic_back_pic )
            VALUES ('$fname', '$lname', '$email', '$phone', '$batch_year', '$selfie_pic', '$nic_front_pic', '$nic_back_pic')";

    if ($con->query($sql) === TRUE) {
        echo '<script type="text/javascript">';
        echo 'alert("Please Wait 24hours to activate Your Account! \nContact 0761532250 (WhatsApp)");';
        echo 'window.location = "/index.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    echo "Unauthorized access or OTP not verified.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>signup</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
 	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="css/signup.css" rel="stylesheet">
       
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="signup.php" enctype="multipart/form-data">
        <h3>Sign Up Here</h3>

        <label for="firstname">First Name</label>
        <input type="text" placeholder="first name" name="fname" id="fname" required/>

        <label for="lastname">Last Name</label>
        <input type="text" placeholder="last name" name="lname" id="lname" required/>

        <label for="Email">E-Mail</label>
        <input type="email" placeholder="email@mail.com" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
       title="Please enter a valid email address (e.g., user@example.com)"  required/>

        <label for="phone">Batch Year</label>
        <input type="text" placeholder="20** A/L" name="byear" id="byear" required/>
        
         <label for="profilepic">Selfie Image</label>
        <input type="file" name="spic" accept=".png, .jpeg, .jpg, .webp" id="ppic" required/>

        <label for="profilepic">NIC FrontSide Image</label>
        <input type="file" name="nfpic" accept=".png, .jpeg, .jpg, .webp" id="ppic" required/>

        <label for="profilepic">NIC BackSide Image</label>
        <input type="file" name="nbpic" accept=".png, .jpeg, .jpg, .webp" id="ppic" required/>

        <button type="submit" id="submit" name="submit">Sign Up</button>
        
        <div class="social">
        <a href="../index.php" class="faBb">   <div class="go">Back</div></a>
        <a href="loging.php" class="fabS">   <div class="fb">Log In</div></a>
        </div>
    </form>
</body>
</html>

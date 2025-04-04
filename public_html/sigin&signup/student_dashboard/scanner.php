<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}
include("connection.php");

if (isset($_GET['student_id'])) {
    $studentId = $_GET['student_id'];
    
    // Perform a database query to fetch student details based on the scanned ID
    $query = "SELECT * FROM students WHERE id = ?";
    
    // Assuming you're using prepared statements with mysqli
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $studentId);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
        // Display student details
        echo "<h2>Student Details</h2>";
        echo "ID: " . $student['id'] . "<br>";
        echo "Name: " . $student['name'] . "<br>";
        
        // Add more fields as needed
    } else {
        echo "Student not found or no matching ID in the database.";
    }
    exit; // Prevent the HTML content below from being displayed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanner</title>
</head>
<body>
    
    <script src="./qrScript.js"></script>
    
    <div class="card" style="text-align: center;">
        <h1>Scan Here</h1>
        <div id="reader" style="width: 400px;"></div>
        <div id="show" style="display: none;">
            <h4>Scanned Result</h4>
            <p style="color: blue;" id="result"></p>
        </div>
    </div>
    
    <script>
        const html5Qrcode = new Html5Qrcode('reader');
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            if (decodedText) {
                document.getElementById('show').style.display = 'block';
                document.getElementById('result').textContent = decodedText;
                // Redirect to this page with the scanned ID as a parameter
                window.location.href = 'thispage.php?student_id=' + encodeURIComponent(decodedText);
            }
        }
        const config = { fps: 10, qrbox: { width: 300, height: 300 } }
        html5Qrcode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
    </script>
    
</body>
</html>

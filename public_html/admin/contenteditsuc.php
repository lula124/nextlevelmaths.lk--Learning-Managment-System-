<?php
session_start();
include("connection.php");
// Check if the form was submitted
include("function.php");

// Check login and get user data
$user_data = check_login($con);

if (isset($_POST['submit'])) {
   $month=$_POST['title'];
   $id = $_POST['cid'];
   $content1=$_POST['content1'];
   $details1=$_POST['dcontent1'];
   $content2=$_POST['content2'];
   $details2=$_POST['dcontent2'];
   $content3=$_POST['content3'];
   $details3=$_POST['dcontent3'];
   $content4=$_POST['content4'];
   $details4=$_POST['dcontent4'];
   $content5=$_POST['content5'];
   $details5=$_POST['dcontent5'];

}

  if (isset($id) && is_numeric($id)) {
    // Prepare the update statement
    $queryupdate = "UPDATE classes SET 
        month = ?, 
        content1 = ?, 
        dcontent1 = ?, 
        content2 = ?, 
        dcontent2 = ?, 
        content3 = ?, 
        dcontent3 = ?, 
        content4 = ?, 
        dcontent4 = ?, 
        content5 = ?, 
        dcontent5 = ? 
        WHERE id = ?";

    // Prepare the statement
    if ($stmt = $con->prepare($queryupdate)) {
        // Bind parameters (s = string, i = integer)
        $stmt->bind_param(
            'sssssssssssi', 
            $month, 
            $content1, $details1, 
            $content2, $details2, 
            $content3, $details3, 
            $content4, $details4, 
            $content5, $details5, 
            $id
        );

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script type="text/javascript">';
            echo 'alert("Update Success");';
            echo 'window.location = "contentedit.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Update Failed: ' . $stmt->error . '");';
            echo 'window.location = "contentedit.php";';
            echo '</script>';
        }

        // Close the statement
        $stmt->close();
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Error preparing the statement.");';
        echo 'window.location = "contentedit.php";';
        echo '</script>';
    }
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Invalid ID provided.");';
    echo 'window.location = "contentedit.php";';
    echo '</script>';
}

?>
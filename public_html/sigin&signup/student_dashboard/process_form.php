<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get data from form
    $student_id = $_POST['student_id'];
    $P_Year = $_POST['P_Year'];
    $part = $_POST['part'];
    $Q_Num = $_POST['Q_Num'];
    $mark = $_POST['mark'];

    // Basic validation
    if (!empty($student_id) && !empty($P_Year) && !empty($part) && !empty($Q_Num) && !empty($mark)) {

        // Prepare SQL insert query
        $query = "INSERT INTO pastpaper_marks (student_id, paper_year, part_type, question_number, marks) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("issii", $student_id, $P_Year, $part, $Q_Num, $mark);

        // Execute query
        if ($stmt->execute()) {
            // Success, redirect to a confirmation or success page
            header("Location:pastpaperanlysis.php");
            exit();
        } else {
            // Error in execution
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill out all required fields.";
    }
}
?>

<?php
session_start();
include("connection.php");

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $access_status = $_POST['access_status'];

    // Check if the student exists in the students table
    $student_check_query = "SELECT id FROM students WHERE id = ?";
    $student_stmt = $con->prepare($student_check_query);
    $student_stmt->bind_param("i", $student_id);
    $student_stmt->execute();
    $student_result = $student_stmt->get_result();

    if ($student_result->num_rows > 0) {
        // Check if the course exists in the courses table
        $course_check_query = "SELECT id FROM classes WHERE id = ?";
        $course_stmt = $con->prepare($course_check_query);
        $course_stmt->bind_param("i", $course_id);
        $course_stmt->execute();
        $course_result = $course_stmt->get_result();

        if ($course_result->num_rows > 0) {
            // Proceed with the insert or update
            $query = "SELECT * FROM student_course_access WHERE student_id = ? AND course_id = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("ii", $student_id, $course_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Update access if record exists
                $update_query = "UPDATE student_course_access SET access_status = ?, access_granted_at = NOW() WHERE student_id = ? AND course_id = ?";
                $update_stmt = $con->prepare($update_query);
                $update_stmt->bind_param("sii", $access_status, $student_id, $course_id);
                $update_stmt->execute();
            } else {
                // Insert new access record
                $insert_query = "INSERT INTO student_course_access (student_id, course_id, access_status) VALUES (?, ?, ?)";
                $insert_stmt = $con->prepare($insert_query);
                $insert_stmt->bind_param("iis", $student_id, $course_id, $access_status);
                $insert_stmt->execute();
            }
            // Redirect back to the course access page with success status
            header("Location: course_access.php?status=success");
            exit();
        } else {
            echo "Error: The course with ID " . $course_id . " does not exist.";
        }
    } else {
        echo "Error: The student with ID " . $student_id . " does not exist.";
    }
}
?>

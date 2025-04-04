<?php
function check_login($con)
{
    if ($con === null) {
        die("Database connection is not available.");
    }

    if (isset($_SESSION['student_id'])) {
        $id = $_SESSION['student_id'];
        
        // Use prepared statements for security
        $query = "SELECT * FROM students WHERE id = ? LIMIT 1";
        $stmt = $con->prepare($query);
        if ($stmt === false) {
            die("Failed to prepare statement: " . $con->error);
        }
        $stmt->bind_param("i", $id); // 'i' specifies that the parameter is an integer
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            
            // Optionally, store user data in the session
            $_SESSION['user_data'] = $user_data;
            
            return $user_data;
        }
    }

    // Redirect to login if the session ID is not set or the query fails
    header("Location: ../sigin&signup/loging.php");
    die;
}
?>

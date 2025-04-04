<?php
session_start(); // Start session if not already started
include("connection.php"); // Ensure database connection is included

// Check if 'content_id' is present in the URL
if (isset($_GET['content_id'])) {
    $contentID = $_GET['content_id'];

    // Fetch related content from the 'classes' table
    $query = "SELECT * FROM classes WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $contentID); // Bind the contentID as an integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the row data
    if ($row = $result->fetch_assoc()) {
        $content1 = $row['content1'];
        $dcontent1 = $row['dcontent1'];
        $content2 = $row['content2'];
        $dcontent2 = $row['dcontent2'];
        $content3 = $row['content3'];
        $dcontent3 = $row['dcontent3'];
        $content4 = $row['content4'];
        $dcontent4 = $row['dcontent4'];
        $content5 = $row['content5'];
        $dcontent5 = $row['dcontent5'];
    } else {
        // If no data is found for the provided contentID
        $content1 = "No content found for this ID.";
        $dcontent1 = "";
    }

    $stmt->close();
} else {
    // Fallback if no content_id is provided
    $contentID = 'Content ID not provided';
    $content1 = "No content available.";
    $dcontent1 = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Selected Content</h1>
        <p>Content ID: <?php echo htmlspecialchars($contentID); ?></p>

        <!-- Display content1 and dcontent1 from the database -->
        <h2>Content 1</h2>
        <p><?php echo htmlspecialchars($content1); ?></p>
        <p><?php echo htmlspecialchars($dcontent1); ?></p>

        <h2>Dcontent 2</h2>
        <p><?php echo htmlspecialchars($dcontent2); ?></p>
        
         <h2>Dcontent 3</h2>
        <p><?php echo htmlspecialchars($dcontent3); ?></p>
        
         <h2>Dcontent 4</h2>
        <p><?php echo htmlspecialchars($dcontent4); ?></p>
        
         <h2>Dcontent 5</h2>
        <p><?php echo htmlspecialchars($dcontent5); ?></p>
        
    </div>
</body>

</html>

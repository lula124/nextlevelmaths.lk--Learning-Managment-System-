<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("connection.php");

// Check if the form was submitted
include("function.php");

// Check login and get user data
$user_data = check_login($con);

if (isset($_POST['submit'])) {
    // Get the content ID from the form
    $cid = $_POST["contentID"];
    
    // Fetch content details
    $sql = "SELECT * FROM classes WHERE id = $cid";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $title = $row["month"];
                $batch = $row["batch"];
                $link1 = $row["content1"];
                $discript1 = $row["dcontent1"];
                 $link2 = $row["content2"];
                $discript2 = $row["dcontent2"];
                 $link3 = $row["content3"];
                $discript3 = $row["dcontent3"];
                 $link4 = $row["content4"];
                $discript4 = $row["dcontent4"];
                 $link5 = $row["content5"];
                $discript5 = $row["dcontent5"];
              
                // You can access other fields similarly
            }
        } else {
            echo "No results found for Content ID: $cid";
        }
    } else {
        echo "Error in the query: " . mysqli_error($con);
    }
} else {
    echo "Form was not submitted";
}

// Close the database connection after you're done with it
mysqli_close($con);  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Content</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom CSS styles here */
        body {
            background-color: #f4f4f4;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4"><?php echo $batch ?> <?php echo $title ?> Update</h2>
        <form action="contenteditsuc.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
               
                <input type="text" value="<?php echo $title ?>" class="form-control" id="contentTitle" name="title" hidden>
            </div>
             <div class="form-group">
                <input type="text" value="<?php echo $cid ?>" class="form-control" id="contentTitle" name="cid" hidden>
            </div><br>
            
            <div class="form-group">
                <label for="contentYear">Class Day 1</label>
                <input type="text" value="<?php echo $link1?>" class="form-control"  id="content" name="content1" required>
                <label for="contentYear"><small>Details</small></label>
                <input type="text" value="<?php echo $discript1?>" class="form-control" id="content" name="dcontent1">
            </div><br>
            <div class="form-group">
                <label for="contentYear">Class Day 2</label>
                <input type="text" value="<?php echo $link2 ?>" class="form-control" id="content" name="content2" >
                <label for="contentYear"><small>Details</small></label>
                <input type="text" value="<?php echo $discript2?>" class="form-control" id="content" name="dcontent2">
            </div><br>
            <div class="form-group">
                <label for="contentYear">Class Day 3</label>
                <input type="text" value="<?php echo $link3 ?>" class="form-control" id="content" name="content3" >
                <label for="contentYear"><small>Details</small></label>
                <input type="text" value="<?php echo $discript3?>" class="form-control" id="content" name="dcontent3">
            </div><br>
            <div class="form-group">
                <label for="contentYear">Class Day 4</label>
                <input type="text" value="<?php echo $link4 ?>" class="form-control" id="content" name="content4" >
                <label for="contentYear"><small>Details</small></label>
                <input type="text" value="<?php echo $discript4?>" class="form-control" id="content" name="dcontent4">
            </div><br>
            <div class="form-group">
                <label for="contentYear">Class Day 5</label>
                <input type="text" value="<?php echo $link5 ?>" class="form-control" id="content" name="content5" >
                <label for="contentYear"><small>Details</small></label>
                <input type="text" value="<?php echo $discript5?>" class="form-control" id="content" name="dcontent5">
            </div><br>
            
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <a href="admindashboard.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

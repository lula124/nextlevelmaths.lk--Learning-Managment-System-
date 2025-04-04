<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("connection.php");
include("function.php");

// Check login and get user data
$user_data = check_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //someting post
   $month=$_POST['month'];
   $year=$_POST['year'];
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
  
   $Cimg=$_FILES['Cimg']['name'];
   $target="img/".basename($Cimg);
   
   move_uploaded_file($_FILES['Cimg']['tmp_name'],$target);

    //save to databse
    $query = "INSERT INTO classes (month, batch, content1, dcontent1, content2, dcontent2, content3, dcontent3, content4, dcontent4, content5, dcontent5, Cimg) 
VALUES ('$month', '$year', '$content1', '$details1', '$content2', '$details2', '$content3', '$details3', '$content4', '$details4', '$content5', '$details5', '$Cimg')";


    mysqli_query ($con,$query);

    header("Location:addclass.php");
    die;
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Content</title>
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
        <h2 class="mb-4">Upload Content</h2>
        <form action="addclass.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="contentTitle">Month:</label>
                <select name="month">
                                    <option>Select Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>     
                </select>
            </div>
            <div class="form-group">
                <label for="contentClass">Class Year:</label>
               <select name="year">
                                    <option>Select Year</option>
                                    <option>2026 Theory</option>
                                    <option>2025 Theory</option>
                                    <option>2024 Revision</option>    
                                    <option>2024 Theory </option>
                                    <option>Paper Class</option>      
                </select>
            </div>
            <div class="form-group">
                <label for="contentYear">Class Day 01</label>
                <input type="text" class="form-control" id="content" name="content1" required>
                <label for="contentYear"><small>Details</small></label>
                <input type="text" class="form-control" id="content" name="dcontent1" required>
            </div><br>
            <div class="form-group">
                <label for="contentYear">Class Day 02</label>
                <input type="text" class="form-control" id="content" name="content2" >
                <label for="contentYear"><small>Details</small></label>
                <input type="text" class="form-control" id="content" name="dcontent2" >
            </div><br>
            <div class="form-group">
                <label for="contentYear">Class Day 03</label>
                <input type="text" class="form-control" id="content" name="content3" >
                <label for="contentYear"><small>Details</small></label>
                <input type="text" class="form-control" id="content" name="dcontent3" >
            </div><br>
            <div class="form-group">
                <label for="contentYear">Class Day 04</label>
                <input type="text" class="form-control" id="content" name="content4" >
                <label for="contentYear"><small>Details</small></label>
                <input type="text" class="form-control" id="content" name="dcontent4" >
            </div><br>
            <div class="form-group">
                <label for="contentYear">Class Day 05</label>
                <input type="text" class="form-control" id="content" name="content5" >
                <label for="contentYear"><small>Details</small></label>
                <input type="text" class="form-control" id="content" name="dcontent5" >
            </div><br>
            <div class="form-group">
                <label for="coverImage">Image</label>
                <input type="file" class="form-control-file" id="coverImage" name="Cimg" accept="image/*" >
            </div><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="admindashboard.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

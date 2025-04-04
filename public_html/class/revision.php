<?php
session_start();
include("connection.php");

$queryd = "select * from classes";
$resultd = mysqli_query($con, $queryd);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2024 Revision Courses</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="css/sub.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
           
        }

        .card {
            margin-bottom: 30px;
            border: none;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 350px; /* Fixed height for uniform card size */
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100px; /* Adjust as necessary */
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 15px;
            color: #333;
        }

        .container h1 {
            margin-bottom: 40px;
            color: #007bff;
        }
    </style>
    <script>
        function redirectToday_video(contentID) {
            window.location.href = 'day_video.php?content_id=' + contentID;
        }
    </script>
     <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="../img/White + blue.png">
  
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
     <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class=""></i><img src="../img/write.png" style="width: 165px;">

</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="lastyear.php" class="nav-item nav-link">2026 Theory Class</a>
                <a href="secondyear.php" class="nav-item nav-link ">2025 Theory Class</a>
                <a href="firstyear.php" class="nav-item nav-link">2024 Theory Class</a>
                <a href="revision.php" class="nav-item nav-link  active">2024 Revision Class</a>
                <a href="paper.php" class="nav-item nav-link">Paper Class</a>
            </div>
           <a href="stdashborad/studentdashboard.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" style="background-color: #1E3E5F; ">Loging Now<i class="fa fa-user ms-3"></i></a>

        </div>
    </nav>
    <!-- Navbar End --><br>
    <div class="container">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($resultd)) {
                $rowC = $row['month'];
                $rowy = $row['batch'];
                $rowp = $row['Cimg'];
                
                if ($rowy == '2024 Revision') {
                    $contentID = $row['id'];
                    $_SESSION['Content_ID'][] = $contentID; // Add Content_ID to the session array

                    echo "<div class='col-md-4'>
                            <div class='card' onclick='redirectToday_video($contentID)'>
                                <img src='../admin/img/$rowp' class='card-img-top' alt='Card Image'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$rowC</h5>
                                </div>
                            </div>
                        </div>";
                } 
            }
            ?>
        </div>
    </div>
     <?php
    include('../footer.php');
    ?>
      <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    <!-- Add Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

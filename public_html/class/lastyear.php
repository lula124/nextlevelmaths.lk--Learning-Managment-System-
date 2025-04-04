<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("connection.php");
include("function.php");

$queryd = "select * from student_course_access";
$resultd = mysqli_query($con, $queryd);

// Check login and get user data
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>classes</title>
	<script src="../sigin&signup/student_dashboard/js/app.js"></script>
	<link href="../sigin&signup/student_dashboard/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="">
          <span class="align-middle"> Welcome <?php echo $user_data['fname']; ?></span>
        </a>

        <ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="lastyear.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Recording</span>
            </a>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link" href="#">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Live Class</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="../index.php">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle">Home</span>
            </a>
					</li>

					
					<li class="sidebar-header">
						Next Level features
					</li>

					
					<li class="sidebar-item">
						<a class="sidebar-link" href="../sigin&signup/student_dashhboard/logout.php">
              <i class="align-middle" data-feather="power"></i> <span class="align-middle">Log Out</span>
            </a>
					</li>

	
				</ul>

		
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
							    <img src="../sigin&signup/img/<?php echo $user_data['selfie_pic']; ?>"class="avatar img-fluid rounded me-1" alt="profilepic"><?php echo $user_data['fname']; ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="../sigin&signup/student_dashboard/logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
			    <h1 class="h3 mb-3"><strong>Your Lessons are here</strong></h1>
				
				<?php
$id = $_SESSION['student_id'];
$counter = 0; // Initialize a counter

while ($row = mysqli_fetch_assoc($resultd)) {
    $rowC = $row['course_id'];
    $rows = $row['student_id'];
    $rowa = $row['access_status'];

    // Check if the student ID matches and access is granted
    if ($rows == $id && $rowa == 'granted') {
        $sql = "SELECT * FROM classes WHERE id = $rowC";
        $result = mysqli_query($con, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
            // Access data from the row.
            $column1Value = $data['month'];
            $column2Value = $data['batch'];
            $column4Value = $data['Cimg'];
            $column5Value = $data['id'];

            // Only display the card if the batch is '2026 Theory'
            if ($column2Value == '2026 Theory') {
                // Open a row div every second iteration
                if ($counter % 2 == 0) {
                    echo '<div class="row">';
                }

                echo "<div class='col-12 col-md-6' >
                <div class='card'>
                    <div class='card-header'>
                        <h5 class='card-title mb-0'>$column2Value</h5>
                    </div>
                    <div class='card-body'>
                        <p class='card-text'></p>
                        <form action='../../class/video.php' method='post'>
                            <input type='text' name='cid' value='$column5Value' hidden/>
                            <input type='submit' name='submit' class='btn' style='border-radius: 20px; background-color:black; color: white; padding: 10px 15px; font-size: 18px; margin: 5px; flex: 1;' value='$column1Value'>
                        </form>
                    </div>
                </div>
            </div>";

                // Close the row div every second iteration
                if ($counter % 2 != 0) {
                    echo '</div>';
                }

                $counter++;
            }
        }
    } 
}

// Close the row div if the number of cards is odd
if ($counter % 2 != 0) {
    echo '</div>';
}
?>


			</main>	
		</div>
	</div>

</body>

</html>

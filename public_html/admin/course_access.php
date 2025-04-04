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
	<link rel="shortcut icon" href="../sigin&signup/student_dashboard/img/icons/icon-48x48.png" />
	<link rel="canonical" href="https://demo-basic.adminkit.io/" />
	<title>Access To Classes</title>
	<link href="../sigin&signup/student_dashboard/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="">
          <span class="align-middle">Tharaka B Jayathilake</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
						<li class="sidebar-item">
						<a class="sidebar-link" href="admindashboard.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">DashBoard</span>
            </a>
					</li>

					

					<li class="sidebar-item">
						<a class="sidebar-link" href="stdetails.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Students Details</span>
            </a>
					</li>
					<li class="sidebar-item  active">
						<a class="sidebar-link" href="course_access.php">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle">Course Access</span>
            </a>
					</li>

					
					<li class="sidebar-header">
						Tools & Components
					</li>

					

					<li class="sidebar-item">
						<a class="sidebar-link" href="activateprofile.php">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Profile Approve</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="paperclassmark.php">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Add Paper Class Marks </span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="paperanalis.php">
              <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Paper Class Analytics</span>
            </a>
					</li>
					
						<li class="sidebar-item">
						<a class="sidebar-link" href="Average.php">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Paper Avg. Analytics</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="studentmarkdisplayA.php">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Student Analytics</span>
            </a>
					</li>
						<li class="sidebar-item">
						<a class="sidebar-link" href="logout.php">
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
                <img src="" class="avatar img-fluid rounded me-1" alt="" /> <span class="text-dark"></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="stdetails.php"><i class="align-middle me-1" data-feather="user"></i> Students Details </a>
								<a class="dropdown-item" href="scanner.php"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			
			<main class="content">
    <div class="container-fluid p-0">
       
        <div class="card">
                    <div class="card-header">
        <h2 class="text-center">Grant Course Access to Student </h2>
        <form action="insert_course_access.php" method="POST">
                    <div class="mb-3">
                        <label for="student_id" class="form-label">Student WED ID</label>
                        <input type="number" class="form-control" id="student_id" name="student_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Course ID</label>
                        <input type="number" class="form-control" id="course_id" name="course_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="access_status" class="form-label">Access Status</label>
                        <select class="form-control" id="access_status" name="access_status">
                            <option value="granted">Granted</option>
                            <option value="denied">Denied</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
    </div>
    </div>
        
    </div>

	

</main>

			
			
	<script src="../sigin&signup/student_dashboard/js/app.js"></script>



</body>

</html>
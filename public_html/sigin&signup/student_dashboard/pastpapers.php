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
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>studentdashboard</title>
	<script src="js/app.js"></script>
	<link href="css/app.css" rel="stylesheet">
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
					<li class="sidebar-item">
						<a class="sidebar-link" href="dashboard.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link" href="stprofile.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="../../index.php">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle">Home</span>
            </a>
					</li>

					
					<li class="sidebar-header">
						Next Level features
					</li>

					

					<li class="sidebar-item">
						<a class="sidebar-link" href="studentmarkdisplay.php">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Paper Class Marks</span>
            </a>
					</li>
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="pastpaperanlysis.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Past Paper Progress</span>
            </a>
					</li>

				<li class="sidebar-item active">
						<a class="sidebar-link" href="pastpapers.php">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Past Papers</span>
            </a>
					</li>
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="pastpapermarking.php">
              <i class="align-middle" data-feather="percent"></i> <span class="align-middle">Past Papers Marking</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="notes.php">
              <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Theory Notes</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="qr.php">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">QR</span>
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
                <i class="align-middle" data-feather="chevrons-down"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
							    <img src="../img/<?php echo $user_data['selfie_pic']; ?>"class="avatar img-fluid rounded me-1" alt="profilepic"><?php echo $user_data['fname']; ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
							    <a class="dropdown-item" href="stprofile.php"><i class="align-middle me-1" data-feather="user"></i>Profile</a>
                                <div class="dropdown-divider"></div>
							<a class="dropdown-item" href="pastpaperanlysis.php"><i class="align-middle me-1" data-feather="book-open"></i> PastPaper Progress</a>
							<div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="studentmarkdisplay.php"><i class="align-middle me-1" data-feather="check-square"></i> Paper Class Mark</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="theroy.php"><i class="align-middle me-1" data-feather="bookmark"></i>Theory Progress</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
    <h1 class="h3 mb-3"><strong>Past Paper Section</strong></h1>

    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2022 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1GMEmSP6MrQOxYhn-3sJGHdnwtbqsKjIo/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2021 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/14fVHfKc7rHpmNjYGCWv_aE87TspwmUPD/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat this pattern for each pair of cards -->
    </div>
     <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2020 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1byDp4QK6FrgdkT81i13dRUYL4gY9AxMu/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2019 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1OFD3uUpPCFiwp_scKP2b9oTjCB8GohfL/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat this pattern for each pair of cards -->
    </div>
     <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2018 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/19G9mJ6_1tUHDtNi3D7W1Qs43rtilQrt3/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2017 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1V4G1ul3b8M3NTdqX_ov9VeDyFF11Zv9P/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat this pattern for each pair of cards -->
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2016 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1EXMClqROb8imo827k47lv06qPL5Tl30c/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2015 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src=""
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat this pattern for each pair of cards -->
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2014 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1728Jr_wUZ4pSOBUujlSowAUvrro15Rzf/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2013 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/17iIpZVSo-Rw-IPovydUHi8cnt2B71GSd/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat this pattern for each pair of cards -->
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2012 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1yh-ql8ju4fcfOgifgsLbEa421rxltrQD/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2011 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1YCN4LpmSCZ_n5oBhZcUCwI8r_S71ktCH/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat this pattern for each pair of cards -->
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2010 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1JpDLehkI9Ys8aFT-mxVXY_qxxLADXfpR/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2009 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1Y_BM2XKJtC6hq1Lvt2DtudCZu_MLvQGJ/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat this pattern for each pair of cards -->
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2008 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1Wiy8NfvyLPoFHbTMaO51prMkx52GPNP8/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2007 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1NggnWNzaShP1h3yGnUfB4QrLclldJ_wy/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat this pattern for each pair of cards -->
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2006 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1buOnTErsDIeZEoLvNCSDfLGnv178py-8/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2005 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1n7Ca0h31RiK6PMNuPUzYcGVmGoTOfdHy/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat this pattern for each pair of cards -->
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2004 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/17JMToP0A1RbUalCzNJ7XxouM45DzMKtF/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2003 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1mULokUcwu2YqoPOx9wpJJ8SpH9fx9U3X/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat this pattern for each pair of cards -->
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2002 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1j49qExNv11moIgMxiIMU_LKumrGaKtnr/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2001 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1eIjsc2JPFXEzEzQFqwY980PMfM29KTXU/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2000 Combined Maths</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1aLgYb2kk5BQsqvUi9RS1Vh0QC0D75OR5/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat this pattern for each pair of cards -->
    </div>
</main>

	
		</div>
	</div>

</body>

</html>
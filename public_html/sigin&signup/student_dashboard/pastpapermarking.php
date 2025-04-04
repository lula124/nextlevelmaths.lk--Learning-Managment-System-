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

				<li class="sidebar-item">
						<a class="sidebar-link" href="pastpapers.php">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Past Papers</span>
            </a>
					</li>
					
					<li class="sidebar-item active">
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
    <h1 class="h3 mb-3"><strong>Past Paper Marking Section</strong></h1>

    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2022 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1dVuHQCmWslfHNNRuFuxI4-JGcg2BBfFt/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2021 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1dUs4BnP-3gJYjDsGLdwXwP9bjnHzkK9h/preview"
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
                    <h5 class="card-title mb-0">2020 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1dRirhveTOvp7fyR65RoOJ2lZgDB-Piov/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2019 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1dRIyj_mS_2Q4emdrQDirB_J7ePbSRcgu/preview"
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
                    <h5 class="card-title mb-0">2018 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1dNHeXGmY7nEARGpgxPDaKnVQBubUgniX/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2017 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1dMjI2IPxlCf2eE6ibd7WTtVf8lUch6ze/preview"
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
                    <h5 class="card-title mb-0">2016 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1dJGRIogDzC-12Q3tN1zkPl26kGE0i6db/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2015 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1dHAKlnY8lxDAQArsYvdG2hJQLfqH6UAS/preview"
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
                    <h5 class="card-title mb-0">2014 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1dEd-5FB6rLonjYjeJKNASJ2p8toKMkGs/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2013 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1dBuflw5dsaUceTWbsRMNN4Yxtzr6yGp0/preview"
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
                    <h5 class="card-title mb-0">2012 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1d2GeTMneLl1TlVcvFAcYwrBaLNUIIEYK/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2011 Combined Maths Pure Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1d1rRTgcInqXl1R4ZGafEQ2Mjfz1_4ce_/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2011 Combined Maths Applied Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1d0B_VtKLuY21NnwEHiM35SHVOC4IsROU/preview"
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
                    <h5 class="card-title mb-0">2010 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1csNhpgf6Xuoa5ElW5H0XqdLdjU6nFhTu/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2009 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1cmYBLrGnmpDI_W8-ZsMQ33Vll5ojoKPN/preview"
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
                    <h5 class="card-title mb-0">2008 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1clXZPCMOol0662NErCYQKL1eJMhCHgvV/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2007 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1clStJWmWtRtP3QqvJ_m6GWy3noY691yx/preview"
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
                    <h5 class="card-title mb-0">2006 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1ck4tJMfkOp9yI7lW40aaTiL-0iAm4Cry/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2005 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1cWxoRs7FIvA1GQXObkCzvUr8a_N8crWG/preview"
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
                    <h5 class="card-title mb-0">2004 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1cVjosy3EnFuT95F10fyMyUI8jBqgQB8T/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2003 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1cVTBfkZKEHeE47VxyJipHswVDVX-bcTk/preview"
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
                    <h5 class="card-title mb-0">2002 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1cTfjq0nE4LaTVqfImkcXR0K9lA2ljcGb/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2001 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1cTEYCYHtPykG8PRe5-lfFE1j9VslsTr7/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">2000 Combined Maths Marking</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1cSOcGB3rOgOOzqFQ0wYakg-ocnWxd7G1/preview"
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
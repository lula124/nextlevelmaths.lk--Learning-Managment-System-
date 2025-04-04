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
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="pastpapermarking.php">
              <i class="align-middle" data-feather="percent"></i> <span class="align-middle">Past Papers Marking</span>
            </a>
					</li>

					<li class="sidebar-item active">
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
    <h1 class="h3 mb-3"><strong>Free Theory Note Section</strong></h1>

    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">සුමට සන්ධි</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1itef8jjid0WvYKHCg_Yfa6plgSEHNZEQ/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">සීමාව</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1hwC-CQskc0GGc5f9VMuyApPVDjB-dPoR/preview"
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
                    <h5 class="card-title mb-0">සාපේක්ෂ ප්‍රවේගය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1inIV2brHMdoqocfBTC-STWmzNr4S7ohG/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">සාපේක්ෂ ත්වරණය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1iGR0FFscXOZWMFHbWXHrC1nBU_wO9w4h/preview"
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
                    <h5 class="card-title mb-0">සරළ රේඛාව</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1iSZWjudUbrYcSxVEhbyEh3pgK-AcWe9p/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">සරළ රේඛාව 2.0</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1j7ZDqs4mT0mvedy7wTgfQ-Kuz0PyvrbO/preview"
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
                    <h5 class="card-title mb-0">සරල අනුවර්තීය චලිතය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1imAH6GruTmxSvzgTLmiPnXM0UPJ6NsOF/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">සම්භාවිතාවය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1ivXrN2kcpCM8fhkjBYY8w--LOW5qbWem/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

     
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">සංඛ්‍යානය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1ittVHMz-NXJ2veMlJkOI5LrINm5YFlDZ/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">සංකීර්ණ සංඛ්‍යා</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1ieoWJWIMTeLZIA5duclYmDamq9Kji6oP/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">සංකරණ හා සංයෝජන</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1idlNDV7l-L9XeV1JzWCOYC3Mi1QoTX31/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">ශ්‍රේණි</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1iTaoOGUAtMzVM5wzAYzwzwHOeW2rFhly/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">වෘත්තය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1iQAhi895QN1E0caxyg3wEWY-HribIdye/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">වෘත්තය 2.0</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1iXCCNjci4r15gkBlhvLT_ShipJVaYnjU/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">වෘත්ත චලිතය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1huYiTuh1XsvJZUaFJjTvDWeiN-_Uz2YG/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

       
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">වර්ගජ සමීකරණ</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1hd02YOU6xV0cE4mZKV3a2HJcVM7x2Om6/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

     <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">බෝර් අංකනය</h5></h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1ic6Y7x2peh8w9Sz26_1dhqF9R7CHLw9g/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

         
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">බහුපදශ්‍රිත</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1jSxhkBpMlHJtkZTmy6zO1gJJQBzCSUCI/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">බල සමතුලිතතාවය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1haXtsZbaymLRQQ-x-Y4nohJOq0yhGU7s/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">ප්‍රවේග කාල ප්‍රස්ථාර</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1hd5bA27qnOyETGjAOcpLoIg4YKSQ0w4t/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">ප්‍රක්ශිප්ත</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1haphsN2Bw3XGcI1tAOPHxqjhuyJfjxdE/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">දෛශික</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1jSAfiPqRJRITn0a5ohY7kesBu6GK_CZr/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">දෛශික 2.0</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1hgV0aimeqem9lk_jP38kce1Sz31TZhqp/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">ත්‍රිකෝණමිතිය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1izkSktQB6-TCqZo6nwLb3hRDU9-xHnem/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>
    </div> 
      <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">ත්‍රිකෝණමිතිය 2.0</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1iKIpLkEv6Gg250Bi7SLNdd2TSZlY3btP/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">ගුරුත්ව ක්‍රේන්ද්‍රය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1iyc8vYnotohO0RYMaVaSLnfbswbqL7wu/preview"
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
                    <h5 class="card-title mb-0">ඒකතලබල</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1htkHjnTfL2KA2FofQJVoUFk_85fLq9ja/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">අසමානතා</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1j9AZsiVA1z69owLwBxe07bzZOTGNXKiv/preview"
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
                    <h5 class="card-title mb-0">අවකලනය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1iPlTtoyDy8eCje7SIJBU0co2ZpaNHunU/preview"
                                allowfullscreen></iframe></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">අවකලනයේ භාවිත</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1hbOBQxIZZw0Qyp2gcwT7gxs6GVqC0wHe/preview"
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
                    <h5 class="card-title mb-0"> අනුකලනය</h5>
                </div>
                <div class="card-body py-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe class="embed-responsive-item" width="100%" height="300"
                                src="https://drive.google.com/file/d/1j0xDlqznhHdqwapY7oJsOrzqrD4ruFWW/preview"
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
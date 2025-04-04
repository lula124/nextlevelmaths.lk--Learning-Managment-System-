<?php
session_start();
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
	
	

	<title>Class</title>

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
					<li class="sidebar-item">
						<a class="sidebar-link" href="#">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Live Class</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="../sigin&signup/student_dashboard/dashboard.php">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle">Back</span>
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
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Class Days</h1>
        <?php
if (isset($_POST['submit'])) {
    $cid = $_POST['cid'];
    $sql = "SELECT * FROM classes WHERE id = $cid";
    $result = mysqli_query($con, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
        // Access data from the row.
        $content1 = $data['content1'];
        $dcontent1 = $data['dcontent1'];
        $content2 = $data['content2'];
        $dcontent2 = $data['dcontent2'];
        $content3 = $data['content3'];
        $dcontent3 = $data['dcontent3'];
        $content4 = $data['content4'];
        $dcontent4 = $data['dcontent4'];
        $content5 = $data['content5'];
        $dcontent5 = $data['dcontent5'];

        // Array of content and their corresponding descriptions
        $contentVariables = [
            'content1' => $content1,
            'dcontent1' => $dcontent1,
            'content2' => $content2,
            'dcontent2' => $dcontent2,
            'content3' => $content3,
            'dcontent3' => $dcontent3,
            'content4' => $content4,
            'dcontent4' => $dcontent4,
            'content5' => $content5,
            'dcontent5' => $dcontent5
        ];

        // Loop through content and descriptions
        for ($i = 1; $i <= 5; $i++) {
            $content = $contentVariables['content' . $i];
            $dcontent = $contentVariables['dcontent' . $i];

            // Check if content exists before displaying it
            if ($content) {
                echo '
                <div class="col-xl-6 col-xxl-7">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Day ' . $i . '</h5>
                        </div>
                        <div class="card-body py-3">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" width="100%" height="300" src="' . $content . '" allowfullscreen></iframe>
                            </div>';

                // Display description if available
                if ($dcontent) {
                    echo '<p class="mt-3">' . $dcontent . '</p>';
                }

                echo '
                        </div>
                    </div>
                </div>';
            }
        }
    }
}
?>

    </div>
    
</main>

			
		</div>
	</div>

	
</body>
</html>
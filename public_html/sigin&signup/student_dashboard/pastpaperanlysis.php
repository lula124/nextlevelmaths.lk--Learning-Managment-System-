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

$student_id = $_SESSION['student_id']; // Assuming student_id is stored in the session

// Fetch the records from the pastpaper_marks table
$query = "SELECT paper_year, part_type, question_number, marks FROM pastpaper_marks WHERE student_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch completion data for each paper year
$query = "SELECT paper_year, COUNT(question_number) as completed_questions 
          FROM pastpaper_marks 
          WHERE student_id = $student_id 
          GROUP BY paper_year";

$result = $con->query($query);

// Prepare data to be used in JavaScript
$progress_data = [];
while ($row = $result->fetch_assoc()) {
    $total_questions = 30; // Assuming each paper has 34 questions
    $completion_percentage = ($row['completed_questions'] / $total_questions) * 100;
    $progress_data[$row['paper_year']] = $completion_percentage;
}

$con->close();

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
	
	<script>
    // Pass PHP data to JavaScript
    var progressData = <?php echo json_encode($progress_data); ?>;
</script>
  
  <style>
  .line-container {
    width: 80%;
    height: 10px;
    background-color: #ddd;
    border-radius: 5px;
    overflow: hidden;
}

.line {
    height: 100%;
    width: 0;
    background-color: green;
    transition: width 1s ease;
}
    </style>
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
					
					<li class="sidebar-item active">
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
    <div class="container-fluid p-0">
       
        <div class="card">
                    <div class="card-header">
        <h2 class="text-center">Add Your Past Paper Marks</h2>
        <form action="process_form.php" method="POST">
                    <div class="mb-3">
                        <input type="number" value="<?php echo $user_data['id']; ?>" class="form-control" id="student_id" name="student_id" hidden>
                    </div>
                    <div class="mb-3">
                        <label for="access_status" class="form-label">Year Of Paper</label>
                        <select class="form-control" id="P_Year" name="P_Year" required>
							<option value="">Select</option>
                            <option value="2011">2011</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="access_status" class="form-label">Applied or Pure</label>
                        <select class="form-control" id="part" name="part" required>
							<option value="">Select</option>
                            <option value="Applied">Applied</option>
                            <option value="Pure">Pure</option>
                        </select>
                    </div>
					<div class="mb-3">
                        <label for="access_status" class="form-label">Question Number</label>
                        <select class="form-control" id="Q_Num" name="Q_Num" required>
							<option value="">Select</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
                        </select>
                    </div>
					<div class="mb-3">
						<label for="access_status" class="form-label">Marks</label>
                        <input type="number" class="form-control" id="mark" name="mark" min="0" max="100" required>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
    </div>
    </div>
        
    </div>

	<div class="row">
						<div class="col-md-8 col-xl-9">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Your PastPaper Progress</h5>
            </div>
            <div class="card-body h-100">
                <?php for ($year = 2011; $year <= 2023; $year++): ?>
                    <div class="flex-grow-1">
                        <strong><?php echo $year; ?> Paper</strong>
                        <br>
                    </div>
                    <div class="line-container">
                        <div class="line" id="line<?php echo $year; ?>"></div>
                    </div>
                    <hr />
                <?php endfor; ?>
            </div>
        </div>
    </div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Analytics</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
</main>
			
		</div>
	</div>
	<script>
        document.addEventListener("DOMContentLoaded", function() {
            // Iterate over the progress data and set the width of each line
            for (const [year, percentage] of Object.entries(progressData)) {
                const line = document.getElementById(`line${year}`);
                if (line) {
                    line.style.width = `${percentage}%`;
                }
            }
        });
    </script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
</body>

</html>

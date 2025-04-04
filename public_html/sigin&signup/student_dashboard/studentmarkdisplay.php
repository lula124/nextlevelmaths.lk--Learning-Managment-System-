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

    <title>Model Paper Marks</title>
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

					

					<li class="sidebar-item   active">
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
                <div class="container">
                    <h1 class="mb-4">Student Paper Marks</h1>
                    <form method="post">
                        <div class="form-group">
                            <input type="hidden" id="studentID" value="<?php echo $user_data['id']; ?>" name="studentID" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Display Marks</button><br><br>
                    </form>

                  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $studentID = $_POST["studentID"];

    // Query to retrieve paper marks for the given student ID
    $sql = "SELECT paper_number, paper_marks, month AS month FROM marking WHERE studentid = '$studentID'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $months = array(); // Initialize an array to store marks by month
        $monthStats = array(); // Initialize an array to store monthly statistics

        while ($row = mysqli_fetch_assoc($result)) {
            $examMonth = $row["month"];
            $months[$examMonth][] = $row; // Categorize marks by month

            // Calculate total marks and number of papers covered for each month
            if (!isset($monthStats[$examMonth])) {
                $monthStats[$examMonth] = [
                    'totalMarks' => 0,
                    'papersCovered' => 0
                ];
            }

            $monthStats[$examMonth]['totalMarks'] += $row['paper_marks'];
            $monthStats[$examMonth]['papersCovered']++;
        }

        // Output data in tables, one for each month
        foreach ($months as $month => $marks) {
            echo "<h3>Month $month</h3>";
            echo "<table class='table table-bordered'>
                    <tr>
                        <th>Paper Number</th>
                        <th>Paper Marks</th>
                    </tr>";

            foreach ($marks as $mark) {
                echo "<tr>
                        <td>" . $mark["paper_number"] . "</td>
                        <td>" . $mark["paper_marks"] . "</td>
                    </tr>";
            }

            echo "</table>";

            // Calculate and display average value
            $averageMarks = $monthStats[$month]['totalMarks'] / $monthStats[$month]['papersCovered'];
            echo "Average Marks: $averageMarks<br><br>";
        }
        
if ($averageMarks > 70) {
            echo "<p>A එකකට නෙවේ Rank එකකටම වැඩ කරමු. කරන වැඩේ 1.5× වැඩිකරගෙන කරමු. Timing හදාගන්න බාගෙක කාලයකින් Papers ලියන්න පුරුදු වෙන්න. 
පිළිතුරුවල කෙටි සහ නිවැරදි බව ගැන සැලකිලිමත් වෙලා විශයන් තුනේම Papers දෙක ගානේ සතියකට cover කරගන්න.

උඩම Island Rank එකකට වැඩ කරන්න. ❤️</p3><br>";
        } elseif ($averageMarks >= 50 && $averageMarks <= 70) {
            echo "<p1>කරගෙන යන වැඩ ටිකේ neatness එක ගැන අවදානය දෙන්න. ප්‍රශ්න වලට උත්තර ලියනකොට timing ගැන සැලකිලිමත් වෙලා වරදින දේවල් වල අඩුපාඩු ටික හදාගන්න.<br></p1>";
        } else {
            echo "<p2>Time table එකක් අනුව වැඩ කරන්න පටන් ගන්න. සතියකට සෑම විශයකින්ම Past Paper එකගානේ කරලා තමන්ගේ වරදින කොටස් ටික සර් ගෙන් අහගන්න. 
ඒත් එක්කම ලකුණු අඩුවන  පාඩම් ටික ආයේ මුල.ඉඳන් Note බලලා උදාහරණ ගණන් හදලා recover කරගන්න.</p2><br>";
        }
        
        // Add your line chart code here
        echo '<br><div class="row">
                <div >
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title">Your Line Chart</h5>
                            <h6 class="card-subtitle text-muted">Average Marks per Month</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chartjs-line"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';


        // Add your JavaScript code for the chart
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Line chart
                    new Chart(document.getElementById("chartjs-line"), {
                        type: "line",
                        data: {
                            labels: [';

        // Populate labels and data for the chart
        $labels = [];
        $data = [];
        foreach ($months as $month => $marks) {
            $labels[] = "$month";
            $averageMarks = $monthStats[$month]['totalMarks'] / $monthStats[$month]['papersCovered'];
            $data[] = $averageMarks;
        }

        echo '"' . implode('", "', $labels) . '"],';

        echo 'datasets: [{
                            label: "Average Score",
                            fill: true,
                            backgroundColor: "transparent",
                            borderColor: window.theme.primary,
                            data: [' . implode(', ', $data) . ']
                        }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            legend: {
                                display: false
                            },
                            tooltips: {
                                intersect: false
                            },
                            hover: {
                                intersect: true
                            },
                            plugins: {
                                filler: {
                                    propagate: false
                                }
                            },
                            scales: {
                                xAxes: [{
                                    reverse: true,
                                    gridLines: {
                                        color: "rgba(0,0,0,0.05)"
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        stepSize: 10 // Adjust as needed
                                    },
                                    display: true,
                                    borderDash: [5, 5],
                                    gridLines: {
                                        color: "rgba(0,0,0,0)",
                                        fontColor: "#fff"
                                    }
                                }]
                            }
                        }
                    });
                });
            </script>';
    } else {
        echo "No records found for Student ID: $studentID<br>";
        echo"<br>ඔයාලගේ ලකුණු Dispaly වෙන්නේ නැත්නම් හෝ ලකුණු වල වෙනස් කම් තියනවා නම් පහත පිළිවෙලට අදාල විස්තර ටික 0761532250 අංකයට Whtsapp  කරන්න.";
    }
}
?>

</body>

</html>

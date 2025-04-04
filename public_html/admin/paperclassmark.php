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
$studentFullName = $studentID = '';

// Get student details based on provided IndexNumber
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['getStudentDetails'])) {
    $indexNumber = $_POST['userId'];

    $query = "SELECT fname, lname, id FROM students WHERE id = '$indexNumber'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $studentData = mysqli_fetch_assoc($result);
        $studentFullName = $studentData['fname'] . ' ' . $studentData['lname'];
        $studentID = $studentData['id'];
    } else {
        $studentFullName = 'Student Not Found';
        $studentID = 'N/A';
    }
}

// Save paper marks to database
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $sid = $_POST['userId'];
    $uname = $_POST['userName'];
    $exmyear = $_POST['examYear'];
    $pprnum = $_POST['paperNumber'];
    $pprmar = $_POST['paperMark'];
    $month = $_POST['month'];

    // Check if the combination of student ID and paper number already exists
    $checkQuery = "SELECT * FROM marking WHERE studentid = '$sid' AND paper_number = '$pprnum'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Alert the user and redirect back to the page
        echo "<script>alert('This Student Marks Already Add In Pervious')</script>";
        echo "<script>window.location.href='paperclassmark.php'</script>";
        exit; // Stop further execution
    } else {
        // If the combination doesn't exist, proceed with insertion
        $query = "INSERT INTO marking (studentid, username, batch, month, paper_number, paper_marks) 
                  VALUES ('$sid', '$uname', '$exmyear', '$month', '$pprnum', '$pprmar')";
        mysqli_query($con, $query);

        header("Location: paperclassmark.php");
        die;
    }
}

function createDropdownWithOptions($defaultOption, $optionsArray, $name) {
    echo "<select name='$name' required>";
    foreach ($optionsArray as $option) {
        $selected = ($option === $defaultOption) ? 'selected' : '';
        echo "<option $selected>$option</option>";
    }
    echo "</select>";
}
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

	<title>Submit Paper Marks</title>
	
	<script>
        function setCookie(cookieName, cookieValue, expirationDays) {
            const d = new Date();
            d.setTime(d.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
            const expires = "expires=" + d.toUTCString();
            document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
        }

        function getCookie(cookieName) {
            const name = cookieName + "=";
            const decodedCookie = decodeURIComponent(document.cookie);
            const cookieArray = decodedCookie.split(';');
            for (let i = 0; i < cookieArray.length; i++) {
                let cookie = cookieArray[i];
                while (cookie.charAt(0) === ' ') {
                    cookie = cookie.substring(1);
                }
                if (cookie.indexOf(name) === 0) {
                    return cookie.substring(name.length, cookie.length);
                }
            }
            return "";
        }
    </script>

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
					<li class="sidebar-item">
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

					<li class="sidebar-item  active">
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
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
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
			    <div class="card">
    <div class="card-header">
        <h2 class="text-center">Get Student Details</h2>

        <!-- Form to get student details based on IndexNumber -->
        <form method="POST">
            <div class="form-group">
                <label for="userId">Enter Index Number (Web Id):</label>
                <!-- Adding JavaScript to retrieve and set the input value -->
                <input type="text" class="form-control" name="userId" id="userId" placeholder="Enter Student Index Number" required
                    value="<?php echo isset($_POST['userId']) ? htmlspecialchars($_POST['userId']) : ''; ?>">
            </div>
            <div class="text-center">
                <br>
                <button type="submit" name="getStudentDetails" class="btn btn-primary">Get Student Details</button>
            </div>
        </form>
    </div>
</div>
                <div class="card">
                    <div class="card-header">
        <h2 class="text-center">Paper Marks Submit </h2>
        <form method="POST">
            <div class="form-group">
                <label for="userId">User ID:</label>
                <input type="text" class="form-control" name="userId" id="userId" placeholder="Enter User ID" value="<?php echo $studentID; ?>" readonly/>
            </div>
            <div class="form-group">
                <label for="userName">User Name:</label>
               <input type="text" class="form-control" name="userName" id="userName" placeholder="Enter User Name" value="<?php echo $studentFullName; ?>"readonly/>
            </div><br>
           <div class="form-group">
                            <label for="examYear">Exam Year:</label>
                            <select name="examYear" required>
                                <!-- Your PHP code to populate the options -->

                                <?php
                                $defaultExamYear = isset($_POST['examYear']) ? $_POST['examYear'] : '';
                                $examYears = [
                                    'Select Year',
                                    '2026 Batch',
                                    '2025 Batch',
                                    '2024 Batch'
                                ];

                                foreach ($examYears as $year) {
                                    $selected = ($year == $defaultExamYear) ? 'selected' : '';
                                    echo "<option $selected>$year</option>";
                                }
                                ?>
                            </select>
                        </div><br>
<div class="form-group">
                            <label for="selectedMonth">Select Month:</label>
                            <select id="selectedMonth" name="month">
                                <!-- Your PHP code to populate the options -->

                                <?php
                                $defaultMonth = isset($_POST['month']) ? $_POST['month'] : '';
                                $months = [
                                    'Select Month',
                                    'January',
                                    'February',
                                    'March',
                                    'April',
                                    'May',
                                    'June',
                                    'July',
                                    'August',
                                    'September',
                                    'October',
                                    'November',
                                    'December'
                                ];

                                foreach ($months as $month) {
                                    $selected = ($month == $defaultMonth) ? 'selected' : '';
                                    echo "<option value='$month' $selected>$month</option>";
                                }
                                ?>
                            </select>
                        </div>

<div class="form-group">
                            <label for="paperNumber">Paper Number:</label>
                            <input type="number" class="form-control" name="paperNumber" id="paperNumber" placeholder="Enter Paper Number" required>
                        </div>

<div class="form-group">
    <label for="paperMarks">Paper Marks:</label>
    <input type="number" class="form-control" name="paperMark" id="paperMarks" placeholder="Enter Paper Marks" required>
</div>
            <div class="text-center">
               <br> <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
            </main>
<script>
    // Retrieve the value from localStorage and set it as the input value
    window.addEventListener('DOMContentLoaded', () => {
        const userIdInput = document.getElementById('userId');
        const lastInput = localStorage.getItem('lastUserId');

        if (lastInput) {
            userIdInput.value = lastInput;
        }

        userIdInput.addEventListener('input', (event) => {
            // Store the input value in localStorage whenever it changes
            localStorage.setItem('lastUserId', event.target.value);
        });
    });
</script>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const examYearDropdown = document.getElementsByName('examYear')[0];
            const submitButton = document.getElementsByName('submit')[0];

            if (submitButton) {
                submitButton.addEventListener('click', function () {
                    setCookie('selectedExamYear', examYearDropdown.value, 30);
                });
            }

            const selectedExamYear = getCookie('selectedExamYear');

            if (selectedExamYear) {
                examYearDropdown.value = selectedExamYear;
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const monthDropdown = document.getElementById('selectedMonth');
            const submitButton = document.getElementsByName('submit')[0];

            if (submitButton) {
                submitButton.addEventListener('click', function () {
                    setCookie('selectedMonth', monthDropdown.value, 30);
                });
            }

            const selectedMonth = getCookie('selectedMonth');

            if (selectedMonth) {
                monthDropdown.value = selectedMonth;
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const paperNumberInput = document.getElementById('paperNumber');
            const submitButton = document.getElementsByName('submit')[0];

            if (submitButton) {
                submitButton.addEventListener('click', function () {
                    setCookie('selectedPaperNumber', paperNumberInput.value, 30);
                });
            }

            const selectedPaperNumber = getCookie('selectedPaperNumber');

            if (selectedPaperNumber) {
                paperNumberInput.value = selectedPaperNumber;
            }
        });
    </script>
	<script src="../sigin&signup/student_dashboard/js/app.js"></script>


</body>

</html>

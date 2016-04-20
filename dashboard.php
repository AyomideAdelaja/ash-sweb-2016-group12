<?php
	//verify session and store the name of the current user here
	session_start();
	$currentUser = "Not yet set";
	if (isset($_SESSION['username'])){
		include_once("usersInfo.php");
		$info_obj = new usersInfo();
		$r=$info_obj->getUserToLogIn($_SESSION['username']);
		$currentUser = $r["FirstName"] . " " . $r["LastName"];
	} else {
		header('Location: index.php');
	}
?>
<html>
<head>
	<link rel="stylesheet" href="css/style2.css">

	<meta charset="UTF-8">
	<title>Dashboard</title>
</head>
<body id="grad2">
	<div class="">
		<div class="topbar theme-1">
			<span class="left"><img id="home-logo" src="images/login-title.png" alt="Ashesi Clinic Logo"></span>
			<div class="left page-title"><span>Dashboard</span></div>
			<div class="line"></div>
		</div>
		<div>
			<div class="sidebar theme-1">
				<center>
					<ul>
						<div class="line"></div>
						<div class="mini-gap"></div>
						<li><a href="dashboard.php"><button class="sidebutton sidebutton-active"><span>Dashboard</span></button></a></li>
						<div class="mini-gap"></div>

						<div class="line"></div>

						<div class="mini-gap"></div>
						
						<li class="dropdown">
							<a href="consultation/addConsultation.php">
								<button class="sidebutton">Consultation</button>
								<div class="dropdown-content">
									<a href="consultation/addConsultation.php">
										<button class="sidebutton"><span>Add Consultation</span></button>
									</a>
									<a href="consultation/consultationsLog.php">
										<button class="sidebutton"><span>Consultations Log</span></button>
									</a>
								</div>
							</a>
						</li>
						
						<div class="mini-gap"></div>

						<div class="line"></div>
						
						<div class="mini-gap"></div>

						<li class="dropdown">
							<a href="patient/addPatient.php">
								<button class="sidebutton">Patient</button>
								<div class="dropdown-content">
									<a href="patient/addPatient.php">
										<button class="sidebutton"><span>Add Patient</span></button>
									</a>
									<a href="patient/patientsLog.php">
										<button class="sidebutton"><span>Patients Log</span></button>
									</a>
								</div>
							</a>
						</li>
						<div class="mini-gap"></div>

						<div class="line"></div>

						<div class="mini-gap"></div>
						<li><a href="report/report.php"><button class="sidebutton"><span>Report</span></button></a></li>
						<div class="mini-gap"></div>

						<div class="line"></div>
						
						<div class="mini-gap"></div>
						<li><a href="logout.php"><button class="sidebutton"><span>Log Out</span></button></a></li>
						<div class="mini-gap"></div>

					</ul>
				</center>
			</div>
			<div class="contentbar">
				<div class="welcome-name">
					<span>Welcome, <?php echo $currentUser; ?>.</span>
				</div>
				<div class="mini-gap"></div>

				<div class="welcome-date">
					<!-- <span>Tuesday, 21<sup>st</sup> March, 2016</span> -->
					<span><?php echo date("l").", ".date("d")." ".date('F', mktime(0, 0, 0, date("m"), 10)).", ".date("Y");?></span>
				</div>
				<div class="line"></div>
				<div class="mini-gap"></div>

				<div class="stat-title">Statistics</div>
				<div class="mini-gap"></div>

				<div class="carouselbox active">
					<div class="buttons">
						<button onclick="updateCountersJS()" class="prev left">
					    	◀ <span class="offscreen">Previous</span>
					    </button>
					    <button onclick="updateCountersJS()" class="next right">
					    	<span class="offscreen">Next</span> ▶ 
					    </button>
					</div>
				  <ol class="car-content">
				    <li>
				    	<div class="stat-block">
							<div class="stat-num" id="stat-num-d">--</div>
							<div class="stat-des">CONSULTATIONS</div>
							<div class="stat-des">TODAY</div>
						</div>
				    </li>
				    <li>
				    	<div class="stat-block">
							<div class="stat-num" id="stat-num-w">--</div>
							<div class="stat-des">CONSULTATIONS</div>
							<div class="stat-des">THIS WEEK</div>
						</div>
				    </li>
				    <li>
				    	<div class="stat-block">
							<div class="stat-num" id="stat-num-m">--</div>
							<div class="stat-des">CONSULTATIONS</div>
							<div class="stat-des">THIS MONTH</div>
						</div>
				    </li>
				    <li>
				    	<div class="stat-block">
							<div class="stat-num" id="stat-num-y">--</div>
							<div class="stat-des">CONSULTATIONS</div>
							<div class="stat-des">THIS YEAR</div>
						</div>
				    </li>
				    <li>
				    	<div class="stat-block">
							<div class="stat-num" id="stat-num-t">--</div>
							<div class="stat-des">CONSULTATIONS</div>
							<div class="stat-des">IN TOTAL</div>
						</div>
				    </li>
				  </ol>
				</div>
				
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</html>
<?php
	//verify session
	session_start();
	$currentUser = "Not yet set";
	if (!isset($_SESSION['username'])){
		header('Location: ../index.php');
	}
?>
<html>
<head>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style2.css">
	<meta charset="UTF-8">
	<title>Add Consultation</title>
</head>
<body id="grad2">
	<div class="">
		<div class="topbar theme-1">
			<span class="left"><img id="home-logo" src="../images/login-title.png" alt=""></span>
			<div class="left page-title"><span>Add Consultation</span></div>
			<div class="page-user right">
				<span class="left">Current User: "</span> 
				<div class="left" id="cur_user"><?php echo $_SESSION['username'];?></div>
				<span class="left">"</span> 
			</div>
			<div class="line"></div>
		</div>
		<div>
			<div class="sidebar theme-1">
				<center>
					<ul>
						<div class="line"></div>
						<div class="mini-gap"></div>
						<li><a href="../dashboard.php"><button class="sidebutton"><span>Dashboard</span></button></a></li>
						<div class="mini-gap"></div>

						<div class="line"></div>

						<div class="mini-gap"></div>
						
						<li class="dropdown">
							<a href="addConsultation.php">
								<button class="sidebutton sidebutton-active">Consultation</button>
								<div class="dropdown-content">
									<a href="addConsultation.php">
										<button class="sidebutton sidebutton-active"><span>Add Consultation</span></button>
									</a>
									<a href="consultationsLog.php">
										<button class="sidebutton"><span>Consultations Log</span></button>
									</a>
								</div>
							</a>
						</li>
						
						<div class="mini-gap"></div>

						<div class="line"></div>
						
						<div class="mini-gap"></div>

						<li class="dropdown">
							<a href="../patient/addPatient.php">
								<button class="sidebutton">Patient</button>
								<div class="dropdown-content">
									<a href="../patient/addPatient.php">
										<button class="sidebutton"><span>Add Patient</span></button>
									</a>
									<a href="../patient/patientsLog.php">
										<button class="sidebutton"><span>Patients Log</span></button>
									</a>
								</div>
							</a>
						</li>
						<div class="mini-gap"></div>

						<div class="line"></div>

						<div class="mini-gap"></div>
						<li><a href="../report/report.php"><button class="sidebutton"><span>Report</span></button></a></li>
						<div class="mini-gap"></div>

						<div class="line"></div>
						
						<div class="mini-gap"></div>
						<li><a href="../logout.php"><button class="sidebutton"><span>Log Out</span></button></a></li>
						<div class="mini-gap"></div>

					</ul>
				</center>
			</div>
			<div class="contentbar">
				<fieldset class="search-container">
					<legend><h3 class="text-center text-theme-4">Enter the Patient's ID</h3></legend>
					<div class="gap"></div>

					<input type="text" placeholder="Patient ID" class="input">
					<div class="gap"></div>

					<a href="addConsultationSave.php">
						<button class="button">Add Consultation</button>
					</a>
					<div class="gap"></div>
				</fieldset>
			</div>
		</div>
	</div>
</body>
<script src="../js/script.js"></script>
</html>
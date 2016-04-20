<?php
	//verify session
	session_start();
	$currentUser = "Not yet set";
	if (!isset($_SESSION['username'])){
		header('Location: index.php');
	}
?>
<html>
<head>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style2.css">
	<meta charset="UTF-8">
	<title>Consultations Log</title>
</head>
<body id="grad2">
	<div class="">
		<div class="topbar theme-1">
			<span class="left"><img id="home-logo" src="../images/login-title.png" alt=""></span>
			<div class="left page-title"><span>Log Of Consultations</span></div>
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
										<button class="sidebutton"><span>Add Consultation</span></button>
									</a>
									<a href="consultationsLog.php">
										<button class="sidebutton sidebutton-active"><span>Consultations Log</span></button>
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
			<br><br>
				<div class="listlog-container overflow">
				<fieldset class="inner-listlog-container overflow">
					<legend><h3 class="text-center text-theme-4">Consultation Log</h3></legend>
					<div class="">
						<table class="logtable" border="1">
							<tr class="theme-4">
								<td><b>Visit Log</b></td>
								<td><b>Patient Name</b></td>
								<td><b>Date Of Visit</b></td>
								<td colspan="2"><b>Options</b></td>
							</tr>
							<tr class="theme-2 text-theme-4">
								<td>1</td>
								<td>Youssouf da Silva</td>
								<td>01-01-2015</td>
								<td><button class="table-button">View</button></td>
								<td><button class="table-button">Edit</button></td>
							</tr>
							<tr class="theme-1 text-theme-4">
								<td>2</td>
								<td>Enyo Demanya</td>
								<td>12-04-2016</td>
								<td><button class="table-button">View</button></td>
								<td><button class="table-button">Edit</button></td>
							</tr>

							<tr class="theme-2 text-theme-4">
								<td>1</td>
								<td>Youssouf da Silva</td>
								<td>01-01-2015</td>
								<td><button class="table-button">View</button></td>
								<td><button class="table-button">Edit</button></td>
							</tr>
							<tr class="theme-1 text-theme-4">
								<td>2</td>
								<td>Enyo Demanya</td>
								<td>12-04-2016</td>
								<td><button class="table-button">View</button></td>
								<td><button class="table-button">Edit</button></td>
							</tr>

							<tr class="theme-2 text-theme-4">
								<td>1</td>
								<td>Youssouf da Silva</td>
								<td>01-01-2015</td>
								<td><button class="table-button">View</button></td>
								<td><button class="table-button">Edit</button></td>
							</tr>
							<tr class="theme-1 text-theme-4">
								<td>2</td>
								<td>Enyo Demanya</td>
								<td>12-04-2016</td>
								<td><button class="table-button">View</button></td>
								<td><button class="table-button">Edit</button></td>
							</tr>

							<tr class="theme-2 text-theme-4">
								<td>1</td>
								<td>Youssouf da Silva</td>
								<td>01-01-2015</td>
								<td><button class="table-button">View</button></td>
								<td><button class="table-button">Edit</button></td>
							</tr>
							<tr class="theme-1 text-theme-4">
								<td>2</td>
								<td>Enyo Demanya</td>
								<td>12-04-2016</td>
								<td><button class="table-button">View</button></td>
								<td><button class="table-button">Edit</button></td>
							</tr>

							<tr class="theme-2 text-theme-4">
								<td>1</td>
								<td>Youssouf da Silva</td>
								<td>01-01-2015</td>
								<td><button class="table-button">View</button></td>
								<td><button class="table-button">Edit</button></td>
							</tr>
							<tr class="theme-1 text-theme-4">
								<td>2</td>
								<td>Enyo Demanya</td>
								<td>12-04-2016</td>
								<td><button class="table-button">View</button></td>
								<td><button class="table-button">Edit</button></td>
							</tr>
						</table>
					</div>
				</fieldset>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="../js/script.js"></script>
</html>
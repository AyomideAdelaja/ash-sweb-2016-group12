<?php
	//verify session
	session_start();
	$currentUser = "Not yet set";
	if (!isset($_SESSION['username'])){
		header('Location: ../index.php');
	}
	if (!isset($_SESSION['patientid'])){
		header('Location: addConsultation.php');
	}
?>
<html>
<head>
	<link rel="stylesheet" href="../css/style2.css">
	<meta charset="UTF-8">
	<title>Save Consultation</title>
</head>
<body id="grad2">
	<div class="">
		<div class="topbar theme-1">
			<span class="left"><img id="home-logo" src="../images/login-title.png" alt=""></span>
			<div class="left page-title"><span>Save Consultation </span></div>
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

				<fieldset class="addlog-container">
					<legend><h2 class="text-center text-theme-4">Adding Consultation Details</h2></legend>
					<div style="display: none;" action="" id="usrform">
						Student ID:<input type="text" id="studId" value="<?php echo $_SESSION['patientid']; ?>">
						User ID:<input type="text" id="userId" value="<?php echo $_SESSION['userid']; ?>">
					</div>
						Date:<input type="date" id="visitdate" form="usrform">
						Observations noted: <br><textarea class="t-area" id="observation" form="usrform"></textarea><br>
						Patient vitals: <br><textarea class="t-area" id="vitalinfo" form="usrform"></textarea><br>
						Symptoms seen: <br><textarea class="t-area" id="symptoms" form="usrform"></textarea><br>
						Prescriptions given: <br><textarea class="t-area" id="prescripts" form="usrform"></textarea><br><br>
					<button type="button" onclick="addVisit()" form="usrform">Done</button>
				</fieldset>

				<!-- <fieldset class="addlog-container">
        			<legend><h3 class="text-center text-theme-4">Adding Visiting Information</h3></legend>
    					<form class="width-50per left addVisit">
        					Observations: <textarea class="t-area" name="observation" form="usrform"></textarea>
        					<div class="mini-gap"></div>
        					Vitals: <textarea class="t-area" name="vitalinfo" form="usrform"></textarea>
        					<div class="mini-gap"></div>
	        				Symptoms: <textarea class="t-area" name="symptoms" form="usrform"></textarea>
	        				<div class="mini-gap"></div>
	        				Diagnostic:
							<select name="usergroup" class="width-30per">
								<option value = "1"> Admin </option>
								<option value = "2"> Owner </option>
								<option value = "1"> New user </option>
							</select>
							<div class="mini-gap"></div><br>
	        				Prescriptions: <textarea class="t-area" name="prescripts" form="usrform"></textarea>
	        				<div class="mini-gap"></div>
		        			<button class="button" onclick="addVisit()">Save Visit</button>
        				</form>
        		</fieldset> -->
			</div>
		</div>
	</div>
</body>
<script src="../js/script.js"></script>
</html>
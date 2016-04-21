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
							
							<?php
					//			echo 'Getting the fisrt user \n';
								include_once "consultations.php";
								$consultObj = new consultations();
								$row = $consultObj->getAllConsultations();
								$result = $consultObj->fetch();
					//			print_r($result);
								$counter = 0;
								while ($result!=false) {
									if($counter % 2 == 0){
										echo "<tr class='theme-2 text-theme-4' width='100%'>";
										echo "	<td> ".$result['VID']."</td>";
										echo "	<td> ".$result['FirstName'].", ".$result['LastName']." </td>";
										echo "	<td> ".$result['DateOfVisit']."</td>";
										echo "	<td><button onclick='div_show()' class='table-button'>View</button></td>";
										echo "	<td><button onclick='editConsultationJS(".$result['VID'].")' class='table-button'>Edit</button></td>";
										echo "</tr>";
									} else {
										echo "<tr class='theme-1 text-theme-4' width='100%'>";
										echo "	<td> ".$result['VID']."</td>";
										echo "	<td> ".$result['FirstName'].", ".$result['LastName']." </td>";
										echo "	<td> ".$result['DateOfVisit']."</td>";
										echo "	<td><button onclick='div_show()' class='table-button'>View</button></td>";
										echo "	<td><button onclick='editConsultationJS(".$result['VID'].")' class='table-button'>Edit</button></td>";
										echo "</tr>";
									}
									$counter = $counter + 1;
									$result = $consultObj->fetch();
								}
								?>
						</table>
						
					</div>
				</fieldset>
				</div>
			</div>
		</div>
	</div>
                 <!-- P O P U P   S E C T I O N -->

	<div id="popup-div"> <!-- Popup content for viewing -->
		<fieldset class="popup-container">
			<legend><h2 class="text-center text-theme-4">View Consultations Details</h2></legend>
			<div class="mini-gap"></div>

			<span class="popup-input-name">Visit ID</span>
			<input type="text" placeholder="Visit ID" class="popup-input" disabled="true">

			<div class="gap"></div>

			<span class="popup-input-name">Visit Date</span>
			<input type="text" placeholder="Visit ID" class="popup-input" disabled="true">

			<div class="gap"></div>

			<span class="popup-input-name">Patient's Name</span>
			<input type="text" placeholder="Visit ID" class="popup-input" disabled="true">

			<div class="gap"></div>

			<span class="popup-input-name">Nurse's Name</span>
			<input type="text" placeholder="Visit ID" class="popup-input" disabled="true">

			<div class="gap"></div>

			<span class="popup-input-name">Diagnosis</span>
			<input type="text" placeholder="Visit ID" class="popup-input" disabled="true">

			<div class="gap"></div>

			<span class="popup-input-name">Observartions</span>
			<textarea class="t-area" placeholder="Prior Issues" name="prescripts" form="usrform"></textarea>

			<div class="gap"></div>

			<span class="popup-input-name">Vitals Info</span>
			<textarea class="t-area" placeholder="Prior Issues" name="prescripts" form="usrform"></textarea>

			<div class="gap"></div>

			<span class="popup-input-name">Symptoms</span>
			<textarea class="t-area" placeholder="Prior Issues" name="prescripts" form="usrform"></textarea>

			<div class="gap"></div>

			<span class="popup-input-name">Prescriptions</span>
			<textarea class="t-area" placeholder="Prior Issues" name="prescripts" form="usrform"></textarea>

			<div class="gap"></div>

			<button onclick="div_hide()" class="button theme-1 text-theme-4">Close</button>
		</fieldset>

		</div>

</body>
<script src="../js/script.js"></script>
</html>
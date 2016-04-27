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
	<title>Add Patient</title>
	<script>
		function notify(){
			alert("This feature has not been implemanted yet!");
			alert("Please contact the system's administrator!!");
		}
	</script>
</head>
<body id="grad2">
	<div class="">
		<div class="topbar theme-1">
			<span class="left"><img id="home-logo" src="../images/login-title.png" alt=""></span>
			<div class="left page-title"><span>Add Patient</span></div>
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
							<a href="../consultation/addConsultation.php">
								<button class="sidebutton">Consultation</button>
								<div class="dropdown-content">
									<a href="../consultation/addConsultation.php">
										<button class="sidebutton"><span>Add Consultation</span></button>
									</a>
									<a href="../consultation/consultationsLog.php">
										<button class="sidebutton"><span>Consultations Log</span></button>
									</a>
								</div>
							</a>
						</li>
						
						<div class="mini-gap"></div>

						<div class="line"></div>
						
						<div class="mini-gap"></div>

						<li class="dropdown">
							<a href="addPatient.php">
								<button class="sidebutton sidebutton-active">Patient</button>
								<div class="dropdown-content">
									<a href="addPatient.php">
										<button class="sidebutton sidebutton-active"><span>Add Patient</span></button>
									</a>
									<a href="patientsLog.php">
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
					<legend><h3 class="text-center text-theme-4">Add a Patient here</h3></legend>
					<input type="text" placeholder="First Name" class="half-input">

					<input type="text" placeholder="Last Name" class="half-input">
					<div class="gap"></div>

					<input type="text" placeholder="Other Names" class="half-input">

					<input type="date" placeholder="Date of Birth" class="half-input">

					<div class="gap"></div>

					<select type="select" name="status" class="input">
						<option value = "1"> Student </option>
						<option value = "2"> Faculty </option>
					</select>

					<div class="gap"></div>

					<input type="number" placeholder="Height" class="half-input">

					<input type="number" placeholder="Weight" class="half-input">
					<div class="gap"></div>

					<textarea class="t-area" placeholder="Prior Issues" name="prescripts" form="usrform"></textarea>
					<div class="gap"></div>

					<textarea class="t-area" placeholder="Known Allergies" name="prescripts" form="usrform"></textarea>

					<div class="gap"></div>

					<button onclick="notify()" class="button theme-1 text-theme-4">Save Patient Data</button>
				</fieldset>
			</div>
		</div>
	</div>
</body>
<script src="../js/script.js"></script>
</html>
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
	<title>View Consultation Details</title>
</head>
<body id="grad2">
	<div class="">
		<div class="topbar theme-1">
			<span class="left"><img id="home-logo" src="../images/login-title.png" alt=""></span>
			<div class="left page-title"><span>View Consultation Details</span></div>
			<div class="line"></div>
		</div>
		<div>
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
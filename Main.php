<html>
	<head>
		<title>Visiting Log</title>
	</head>
	<body>
		<form action="Main.php" method="GET">
			<fieldset>
				<legend><h3>Adding Visiting Information</h3></legend>
					Date: <br><input type="date" name="visitdate"/><br>
					Student ID: <br><input type="text" name="studId"/><br>
					User ID: <br><input type="text" name="userId"/><br>
					Observations: <br><textarea rows="4" cols="50" name="observation" form="usrform">Enter text here...</textarea><br>
					Vitals: <br><textarea rows="4" cols="50" name="vitalinfo" form="usrform">Enter text here...</textarea><br>
					Symptoms: <br><textarea rows="4" cols="50" name="symptoms" form="usrform">Enter text here...</textarea><br>
					Prescriptions: <br><textarea rows="4" cols="50" name="prescripts" form="usrform">Enter text here...</textarea><br>
				<input type="submit" value="Add">
			</fieldset>
		</form>	
	</body>
</html>

<?php
	$servername="localhost";
	$username="root";
	$password="";
	$databasename="ashclinicgroup12";

	$db = new mysqli($servername, $username, $password, $databasename);
	if($db->connect_errno){
		//no connection, exit
		echo "Cannot Connect";
		exit();
	}
	else{
		echo "Connection established";
	}


	if(!isset($_REQUEST['username'])){
		exit();		//if no data, exit
	}

	$vid="default";
	$pid=$_REQUEST['studId'];
	$uid=$_REQUEST['userId'];
	$dateofvisit=$_REQUEST['visitdate'];
	$observe=$_REQUEST['observation'];
	$vitals=$_REQUEST['vitalinfo'];
	$symptoms=$_REQUEST['symptoms'];
	$prescripts=$_REQUEST['prescripts'];

	$strQuery="insert into visitlog values
				VID='$vid',
				PID='$pid',
				UID='$uid',
				DateOfVisit='$dateofvisit',
				Observations='$observe',
				VitalsInfo='$vitals',
				Symptoms='$symptoms',
				Prescriptions='$prescripts'";

	if($db->query($strQuery)){
		echo "Data Added";
	}else{
		echo "Error while adding data";
	}
	//Master code for the project
?>
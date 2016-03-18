<html>
	<head>
		<title>Visiting Log</title>
	</head>
	<body>
		<form action="<Main.php" method="GET">
			<fieldset>
				<legend>Adding Visiting Information</legend>
					Date: <input type="date" name="visitdate"/><br>
					Student ID: <input type="text" name="studId"/><br>
					User ID: <input type="text" name="userId"/><br>
					Observations: <input type="textarea" name="observe"/><br>
					Vitals: <input type="textarea" name="vitalsinfo"/><br>
					Symptoms: <input type="textarea" name="symptoms"/><br>
					Prescriptions: <input type="textarea" name="prescripts"/><br>
				<input type="submit" onclick='alert('Connection Established!')' value="Add">
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
	//Master code for the project
?>
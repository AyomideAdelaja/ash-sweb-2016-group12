<html>
	<head>
		<title>Visiting Log</title>
	</head>
	<body>
		<fieldset>
			<legend><h3>Adding Visiting Information</h3></legend>
			<form action="Main.php" method="GET" id="usrform">
				Date: <br><input type="date" name="visitdate"><br>
				Student ID: <br><input type="text" name="studId"><br>
				User ID: <br><input type="text" name="userId"><br>
			</form>
				Observations: <br><textarea rows="4" cols="50" name="observation" form="usrform"></textarea><br>
				Vitals: <br><textarea rows="4" cols="50" name="vitalinfo" form="usrform"></textarea><br>
				Symptoms: <br><textarea rows="4" cols="50" name="symptoms" form="usrform"></textarea><br>
				Prescriptions: <br><textarea rows="4" cols="50" name="prescripts" form="usrform"></textarea><br>
			<input type="submit" value="Add Visit" form="usrform">
		</fieldset>		
	</body>


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


	if(!isset($_REQUEST['visitdate'])){
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

	$strQuery="INSERT INTO visitlogs SET
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

	//Displaying the contents of the visit log table
	$displaysql="SELECT VID, DateOfVisit, PID, UID, Observations, VitalsInfo, Symptoms, Prescriptions
	 FROM visitlogs ORDER BY DateOfVisit";

	 //Getting the results
	$result = $db->query($displaysql);

	if ($result->num_rows > 0){
	//Row color alteration
	$cellcol = array("blue", "green");
	$cur=0; //counter for the cellcol array
	//output header
	echo "<h1>Table User</h1>";
	echo "<table style='width:100%' border='1px solid blue'>
		<tr bgcolor='green'>
			<th>Visit ID</th>
			<th>Date of Visit</th>
			<th>Student ID</th>
			<th>User/Nurse ID</th>
			<th>Observations</th>
			<th>Vitals Information</th>
			<th>Symptoms Recorded</th>
			<th>Prescriptions Recommended</th>
		</tr>";
	while($row = $result->fetch_assoc()){
		echo "<tr>
				<td bgcolor='$cellcol[$cur]'>{$row["VID"]}</td>
				<td bgcolor='$cellcol[$cur]'>{$row["DateOfVisit"]}</td>
				<td bgcolor='$cellcol[$cur]'>{$row["PID"]}</td>
				<td bgcolor='$cellcol[$cur]'>{$row["UID"]}</td>
				<td bgcolor='$cellcol[$cur]'>{$row["Observations"]}</td>
				<td bgcolor='$cellcol[$cur]'>{$row["VitalsInfo"]}</td>
				<td bgcolor='$cellcol[$cur]'>{$row["Symptoms"]}</td>
				<td bgcolor='$cellcol[$cur]'>{$row["Prescriptions"]}</td>
			</tr>";
		
		//Alternating row colors
		if($cur==0)
				$cur=1;
			else
				$cur=0;
	}
}
	//Master code for the project
?>
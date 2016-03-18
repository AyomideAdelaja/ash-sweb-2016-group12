<html>
	<head>
		<title>Visiting Log</title>
	</head>
	<body>
		<form action="adduser.php" method="GET">
			Username: <input type="text" name="username"/>
			User Group: <select name="usergroup">
				<option value="1">Admin</option>
				<option value="2">Students</option>
				<option value="3">Faculty</option>
			</select>
			<input type="submit" value="Add">
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
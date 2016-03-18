<html>
	<head>
		<title>Dashboard</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php
		//store the name of the current user here
		$currentUser = "Not yet set";
		if(isset($_REQUEST['u'])){
			include_once("usersInfo.php");
			$info_obj=new usersInfo();
			$r=$info_obj->getUserToLogIn($_REQUEST['u']);
			$currentUser = $r["FirstName"] . " " . $r["LastName"];
		} else {
			header('Location: index.php');
			exit();
		}
		?>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Application Dashboard - Welcome <?php echo $currentUser; ?>
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem"><a href="#">menu 1</a></div>
					<div class="menuitem">menu 2</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
<!-- 						<span class="menuitem" ><a href="groupsadd.php">Add Usergroup</a></span> -->
						<span class="menuitem" ><a href="index.php">Login</a></span>
						<span class="menuitem" ><a href="signup.php">Sign Up</a></span>
						<span class="menuitem" ><a href="userdashboard.php">Dashboard</a></span>
						<span class="menuitem" >page menu 4</span>
						<input type="text" id="txtSearch" />
						<span class="menuitem">search</span>		
						<span class="menuitem">
							Patient Counter:
							<?php
								include_once("visitLogs.php");
								$log_obj=new visitLogs();
								echo $log_obj->countTotalVisitors($r['UID']);
							?>
						</span>		
						<span class="menuitem" ><a href="index.php">Logout</a></span>	
					</div>
<?php
			//initialize
			$strStatusMessage ="Please add a new patient";
			$patientid="";

?>
<!-- ??? -->
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>
					<div id="divContent">
						Content space
						<form action="" method="GET">
			<div>Patient ID: <input type="text" name="username" value="<?php echo $patientid;  ?>"/></div>

			<input type="submit" value="Add Patient">
<!-- 			<a href="signup.php" class="button-design">Sign Up</a> -->
			
<!-- 			<button type="button" onclick="alert('Hello World!')">Click Me!</button> -->
		</form>							
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	

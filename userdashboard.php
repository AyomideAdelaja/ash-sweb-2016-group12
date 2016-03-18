<html>
	<head>
		<title>Dashboard</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			//<!--add validation js script here
		</script>
	</head>
	<body>
		<?php
		//store the name of the current user somewhere here
		$currentUser = "Not yet set";
		if(isset($_REQUEST['u'])){
			include_once("usersInfo.php");
			$info_obj=new usersInfo();
			$r=$info_obj->getUserToLogIn($_REQUEST['u']);
			$currentUser = $r["FirstName"] . " " . $r["LastName"];
		}
		//$currentUser
		?>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Application Dashboard - Welcome <?php echo $currentUser; ?>
				</td>
			</tr>
			<tr>
				<td id="mainnav">
<!-- 					<div class="menuitem"><a href="groupsadd.php">Add New Usergroup Page</a></div> -->
<!-- 					<div class="menuitem"><a href="usersadd.php">Add New User Page</a></div> -->
					<div class="menuitem">menu 3</div>
					<div class="menuitem">menu 4</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
<!-- 						<span class="menuitem" ><a href="groupsadd.php">Add Usergroup</a></span> -->
						<span class="menuitem" ><a href="index.php">Login</a></span>
						<span class="menuitem" ><a href="signup.php">Sign Up</a></span>
						<span class="menuitem" >page menu 3</span>
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

			//1) what is the purpose of this if block
			if(isset($_REQUEST['username'])){
				$patientid=$_REQUEST['patientid'];

				include_once("usersInfo.php");
				$obj=new usersInfo();
				$r=$obj->logUserIn($username,$userpass);
				//1) what is the purpose of this if block
					
				if($r == true){
					echo "login success";
					//redirect to another page
					header('Location: index.html');
					exit;
				} else {
					echo "sorry login again";
				}

			}
?>
<!-- ??? -->
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>
					<div id="divContent">
						Content space
						<form action="" method="GET">
			<div>Patient ID: <input type="text" name="username" value="<?php echo $username;  ?>"/></div>

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

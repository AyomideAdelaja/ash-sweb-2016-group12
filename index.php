<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			//<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Application Header - Login
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
					</div>
<?php
			//initialize
			$strStatusMessage ="Please Login!";
			$username="";
			$userpass="";

			//1) what is the purpose of this if block
			if(isset($_REQUEST['username'])){
				$username=$_REQUEST['username'];
				$userpass=$_REQUEST['password'];
				include_once("usersInfo.php");
				$obj=new usersInfo();

				$r=$obj->getUserToLogIn($username);
				
				if($r['Password'] == $userpass){

					$strStatusMessage ="Correct Login Credentials!";
					header('Location: userdashboard.php?u='.$r['Username']);
				} else {
					$strStatusMessage ="Incorrect Login Credentials! Please check your username or password and try again!!";
					
				}

			}
?>

					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ?>
					</div>
					<div id="divContent">
						Content space
						<form action="" method="GET">
			<div>Username: <input type="text" name="username" value="<?php echo $username;  ?>"/></div>
			<div>Password: <input type="password" name="password" value="<?php echo $userpass;  ?>"/></div>

			<input type="submit" value="Login"> 
		</form>							
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	

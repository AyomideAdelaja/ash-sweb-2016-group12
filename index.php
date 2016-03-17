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
<!-- 					<div class="menuitem"><a href="groupsadd.php">Add New Usergroup Page</a></div> -->
<!-- 					<div class="menuitem"><a href="usersadd.php">Add New User Page</a></div> -->
					<div class="menuitem">menu 3</div>
					<div class="menuitem">menu 4</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
<!-- 						<span class="menuitem" ><a href="groupsadd.php">Add Usergroup</a></span> -->
						<span class="menuitem" ><a href="index.php">Login</a></span>
						<span class="menuitem" >page menu 3</span>
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
				$r=$obj->logUserIn($username,$userpass);
				//1) what is the purpose of this if block
					
				if($r == true){
					echo "login success";
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
			<div>Username: <input type="text" name="username" value="<?php echo $username;  ?>"/></div>
			<div>Password: <input type="password" name="password" value="<?php echo $userpass;  ?>"/></div>

			<input type="submit" class="button-design" value="Login">
			<a href="#" class="button-design">Sign Up</a>
			
<!-- 			<button type="button" onclick="alert('Hello World!')">Click Me!</button> -->
		</form>							
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	

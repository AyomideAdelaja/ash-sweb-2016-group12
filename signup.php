<html>
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			//<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Application Header - Sign Up
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
					</div>
<?php
			//initialize
			$strStatusMessage ="Please Sign Up!";
			$uid="";
			$firstname="";
			$lastname="";
			$username="";
			$userpass="";

			//1) what is the purpose of this if block
			if(isset($_REQUEST['uid'])){
				$uid=$_REQUEST['userid'];
				$firstname=$_REQUEST['firstname'];
				$lastname=$_REQUEST['lastname'];
				$username=$_REQUEST['username'];
				$userpass=$_REQUEST['password'];
				$userpassconf=$_REQUEST['confirm-password'];
				
				if($userpass != $userpassconf){
					$strStatusMessage ="The passwords don't match";
					exit();
				}
				
				include_once("usersInfo.php");
				$obj=new usersInfo();
				$r=$obj->addUser($uid, $firstname, $lastname, $username, $userpass);
				//1) what is the purpose of this if block
					
				if($r == true){
					echo "user added";
					$strStatusMessage ="User added";
				} else {
					echo "sorry user not added";
					$strStatusMessage ="Sorry an error occured while adding the user";
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
			<div>User ID: <input type="text" name="userid" value="<?php echo $uid;  ?>"/></div>
			<div>FirstName: <input type="text" name="firstname" value="<?php echo $firstname;  ?>"/></div>
			<div>LastName: <input type="text" name="lastname" value="<?php echo $lastname;  ?>"/></div>
			<div>Username: <input type="text" name="username" value="<?php echo $username;  ?>"/></div>
			<div>Password: <input type="password" name="password" value="<?php echo $userpass;  ?>"/></div>
			<div>Confirm Password: <input type="password" name="confirm-password" value="<?php echo $userpass;  ?>"/></div>

			<input type="submit" class="button-design" value="Submit">
<!-- 			<a href="#" class="button-design">Sign Up</a> -->
			
<!-- 			<button type="button" onclick="alert('Hello World!')">Click Me!</button> -->
		</form>							
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	

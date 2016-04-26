<?php
	session_start();
?>
<html>
	<head>
		<link rel="stylesheet" href="css/style2.css">
		<meta charset="UTF-8">
		<title>Login</title>
	</head>
<body id="grad2">
	<div class="login-container">
		<?php
			//initialize
			$strStatusMessage ="";
			$username="";
			$userpass="";

			//1) what is the purpose of this if block
			if(isset($_REQUEST['username'])){
				$username=$_REQUEST['username'];
				$userpass=$_REQUEST['password'];
				include_once("usersInfo.php");
				$obj=new usersInfo();

				$r=$obj->getUserToLogIn($username);
				
				if ($r){
					if($r['Password'] == $userpass){
						$strStatusMessage ="<div class='text-green'>Correct Login Credentials!!</div>";
						// session_start();
						$_SESSION['username'] = $r['Username'];	
						// header('Location: dashboard.php');
						echo '<script type="text/javascript">window.location.replace("dashboard.php");</script>';
					} else {
						$strStatusMessage ="<div class='text-red'>Incorrect Login Credentials!!</div>";
						
					}
				} else {
					$strStatusMessage  ="<div class='text-red'>Incorrect Login Credentials!! Check your username!</div>";
				}
			}
		?>
		<span class="left"><img id="login-logo" src="images/AshesiTransparent.png" alt=""></span>
		<p class="logo-name"><b>Ashesi</b> Clinic</p>
		<div class="line"></div>
		<div class="gap"></div>
			<form action="" method="POST">
				<input type="text" name="username" value="<?php echo $username;?>" placeholder="Username" class="input">
				<div class="gap"></div>
				<input type="password" name="password" value="<?php echo $userpass;?>" placeholder="Password" class="input">
				<p class="forgot"><a href="changepword.html" class="text-theme-4">Forgot your password?</a></p>
				<div class="gap"></div>
				
				<input type="submit" value="Login" class="button"> 
			</form>
			<!-- <a href="dashboard.html">
				<button type="submit" class="button">Log In</button>
			</a> -->
			<div id="divStatus" class="status">
				<?php echo $strStatusMessage; ?>
			</div>
			<div class="gap"></div>
			<div class="line"></div>
			<div class="gap"></div>
			<div class="gap"></div>
			<center>
				<h4 class="text-theme-4">© 2016 Ashesi Clinic System, Inc</h4>
			</center>
		<!-- </div> -->
	</div>
</body>
</html>
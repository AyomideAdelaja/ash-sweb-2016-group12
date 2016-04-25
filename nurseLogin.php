<html>
	<head>
		<link rel="stylesheet" href="css/style2.css">
		<meta charset="UTF-8">
		<title>Login</title>
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script type="text/javascript">
			/**
			*callback function for nurseLogin ajax call
			*/
			function nurseLoginComplete(xhr){
				
			}
			function nurseLogin(n_id,n_pword){
				var ajaxPageUrl="nurseLogin.php?id="+n_id+"&password="+n_pword;
				$.ajax(ajaxPageUrl,
					{async:true,complete:nurseLoginComplete	}	
				);
			}
		</script>
	</head>
	<body id="grad2">

		<div class="login-container">
			<!-- <span class="left"><img id="login-logo" src="images/login-title.png" alt=""></span> -->
			<span class="left"><img id="login-logo" src="images/AshesiTransparent.png" alt=""></span>
			<p class="logo-name"><b>Ashesi</b> Clinic</p>
			<div class="line"></div>
			<div class="gap"></div>
			<!-- <div> -->
		
			<form action="" method="GET">
				<div><input class="input" type="text" placeholder="User ID" name="id" /></div>
				<div class="gap"></div>
				<div><input class="input" type="password" placeholder="Password" name="password" />
				<p class="forgot"><a href="changepword.html" class="text-theme-4">Forgot your password?</a></p>
				<div class="gap"></div>
				
				<button class="button" type="submit">Log In</button>
				</input>
		</form>		
<?php
/**
*Server code for nurse login
*/

			//initialize
			$strStatusMessage ="Login Page";
			
			if(isset($_REQUEST['id'])){
				$id=$_REQUEST['id'];
				$password=$_REQUEST['password'];
				include_once("nurses.php");
				//create new object of nurses
				$obj=new nurses();
				$r=$obj->loginNurse($id,$password);
				$result=$obj->fetch();
				//call the object's loginNurse method and check for error
				if($result["username"]!=""){
					echo "Welcome {$result["username"]}";
					//Redirect to 
					header("Location:dashboard.php");
					//exit();
				}
				else{
					echo "Incorrect UserID or password";
				}

			}
?>					
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

<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					<!--Application Header--!>
				</td>
			</tr>
			
<?php
			//initialize
			$strStatusMessage ="Login Page";
			
			if(isset($_REQUEST['id'])){
				$id=$_REQUEST['id'];
				$password=$_REQUEST['password'];
				include_once("nurses.php");
				$obj=new nurses();
				$r=$obj->loginNurse($id,$password);
				if($r==false){
					$strStatusMessage="Incorrect User Id or password";
				}else{
					//header("Location:userslist.php");
					//exit();
					$strStatusMessage="Welcome $r ";
				}

			}
?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ;?>
					</div>
					<div id="divContent">
						Content space
						<form action="" method="GET">
			<div>Nurse ID: <input type="text" name="id" /></div>
			<div>Password: <input type="password" name="password" />
			<div>
				
				</select>
			</div>
			<input type="submit" value="Login">
		</form>							
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	

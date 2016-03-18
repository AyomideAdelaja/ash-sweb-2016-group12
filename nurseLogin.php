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
					<!--Login--!>
				</td>
			</tr>
			
<?php
			//initialize
			$strStatusMessage ="Login Page";
			
			if(isset($_REQUEST['id'])){
				$id=$_REQUEST['id'];
				$password=$_REQUEST['password'];
				include_once("nurses.php");
				//create new object of nurses
				$obj=new nurses();
				//call the object's loginNurse method and check for error
				if($obj->loginNurse($id,$password)!=false){
					$r=$obj->loginNurse($id,$password);
					echo $r;
					$result=$obj->fetch();
					echo "Welcome {$result["username"]}";
					//Redirect to 
					//header("Location:home.php");
					//exit();
				}
				else{
					echo "Incorrect UserID or password";
				}

			}
?>
					<div id="divStatus" class="status">
						<?php echo  $strStatusMessage ;?>
					</div>
					<div id="divContent">
						
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

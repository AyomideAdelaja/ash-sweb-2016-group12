<html>
	<head>
		<title>Add New User</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Application Header
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
					<div class="menuitem">menu 3</div>
					<div class="menuitem">menu 4</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
						<span class="menuitem" >page menu 2</span>
						<span class="menuitem" >page menu 3</span>
						<input type="text" id="txtSearch" />
						<span class="menuitem">search</span>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						Content space
		<?php
			$firstname="";
			$lastname="";
			if(isset($_REQUEST['firstname'])){
				
				$firstname=$_REQUEST['firstname'];
				$lastname=$_REQUEST['lastname'];

			}
		?>
		<form action="addperson.php" method="GET">
			<div>First Name: <input type="text" name="firstname" value="<?php echo $firstname ?>"/>
			<div>Last Name: <input type="text" name="lastname" value="<?php echo $lastname ?>"/>
			<div>Other Names:<input type="text" name="othernames" value="<?php echo $othernames ?>"/>
			<div>Date of Birth:<input type="date" name="dateofbirth" value="<?php echo $dateofbirth ?>"/>
			<div>Height:<input type="text" name="height" value="<?php echo $height ?>"/>
			<div>Weight:<input type="text" name="weight" value="<?php echo $weight ?>"/>
			<div>Prior Issues:<input type="text" name="priorissues" value="<?php echo $priorissues ?>"/>
			<div>Known Issues:<input type="text" name="knownissues" value="<?php echo $knownissues ?>"/>


<?php
	//a call to the class
	include_once("usergroups.php");
	$usergroup= new usergroups();
	$result=$usergroup->getAllUserGroups();
	//echo $strQuery;
	if($result==false){
		//
		echo "result is false";
	}else{
		//fetch
		$row=$usergroup->fetch();
		//print_r($row);
		while($row){
			echo "<option value='{$row['USERGROUP_ID']}'>{$row['GROUPNAME']}</option>";
			$row=$result->fetch();
		}
	}
	
	//display in loop
?>				
				</select>
			</div>
			<input type="submit" value="Add">
		</form>	
	</body>
</html>

<?php
	if(!isset($_REQUEST['username'])){
		exit();		//if no data, exit
	}
	
	include_once("users.php");
	$obj=new users();
	$r=$obj->addUser($username,$firstname,"none",$password,1,3,1);
	if($r==false){
		echo "Error";
	}else{
		echo "User Added";
	}
	
	//add the php code to process the form data and add record here
	//include class file
	//create an object
	//add the user data
	// display feedback					
					
?>
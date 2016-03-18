<html>
	<head>
		<title>Add New Person</title>
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
					
		<?php
			$firstname="";
			$lastname="";
			$othernames="";
			$dateofbirth="";
			$height=0;
			$weight=0;
			$priorissues="";
			$knownallergies="";
			
			if(isset($_REQUEST['firstname'])){
				
				$firstname=$_REQUEST['firstname'];
				$lastname=$_REQUEST['lastname'];
				$othernames=$_REQUEST['othernames'];
				$dateofbirth=$_REQUEST['dateofbirth'];
				$height=$_REQUEST['height'];
				$weight=$_REQUEST['weight'];
				$priorissues=$_REQUEST['priorissues'];
				$knownallergies=$_REQUEST['knownallergies'];
				
				include_once("personinfo.php");
				$obj=new personinfo();
				$result=$obj->addPerson($firstname,$lastname,$othernames,$dateofbirth,$height,$weight,$priorissues,$knownallergies);
	
					if($result==false){
						$strStatusMessage="error while adding user";
					}else{
					$strStatusMessage="$firstname has been added";
				}

			
			}
		?>
		<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						Content space
		
		<form action="addperson.php" method="GET">
			<div>First Name: <input type="text" name="firstname" value="<?php echo $firstname ?>"/>
			<div>Last Name: <input type="text" name="lastname" value="<?php echo $lastname ?>"/>
			<div>Other Names:<input type="text" name="othernames" value="<?php echo $othernames ?>"/>
			<div>Date of Birth:<input type="date" name="dateofbirth" value="<?php echo $dateofbirth ?>"/></div>
			<div>Height:<input type="text" name="height" value="<?php echo $height ?>"/>
			<div>Weight:<input type="text" name="weight" value="<?php echo $weight ?>"/>
			<div>Prior Issues:<input type="text" name="priorissues" value="<?php echo $priorissues ?>"/>
			<div>Known Allergies:<input type="text" name="knownallergies" value="<?php echo $knownallergies ?>"/>
				</div>
			<input type="submit" value="Add">
		</form>	
	</body>
</html>

<?php
	if(!isset($_REQUEST['firstname'])){
		exit();		//if no data, exit
	}
	
	include_once("personinfo.php");
	$obj=new personinfo();
	$r=$obj->addPerson($firstname,$lastname,$othernames,$dateofbirth,$height,$weight,$priorissues,
						$knownallergies);
	
	if($r==false){
		echo "Error";
	}else{
		echo "Person Added";
	}
					
?>
<?php
	//check command
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	/*get command*/
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			addPerson();		//if cmd=1 the call addperson
			break;
		default:
			echo '{"result":0,"message":"Command not found"}';	
			break;
	}
	//the function addPerson() is called
	function addPerson(){
		//check if there isn't a firstname
		if(!isset($_REQUEST['firstname'])){
			echo '{"result":0,"message":"firstname is not provided"}';
			return;
		}
		//otherwise set  all the values entered into variables
		$personid=$_REQUEST['pid'];
		$firstname=$_REQUEST['firstname'];
		$lastname=$_REQUEST['lastname'];
		$othernames=$_REQUEST['othernames'];
		$dateofbirth=$_REQUEST['dateofbirth'];
		$status=$_REQUEST['status'];
		$height=$_REQUEST['height'];
		$weight=$_REQUEST['weight'];
		$priorissues=$_REQUEST['priorissues'];
		$knownallergies=$_REQUEST['knownallergies'];

		//the code below is to test if the firstname has been entered
		// test code echo "the firstname is".$firstname;
		
		include_once("../personinfo.php");
		$obj=new personinfo();

		$r=$obj->addPerson($personid,$firstname,$lastname,$othernames,$dateofbirth,$status,$height,$weight,$priorissues,
							$knownallergies);
		if($r==false){
			echo '{"result":0,"message":"Person not added"}';

		}else{
			echo '{"result":1,"message":"Person added"}';
		
		}
	}
		
	?>

<?php
	//Checking the Ajax Url for the function to execute
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	/*get command*/
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			addConsultation();		//if cmd=1 the call addConsultation()
			break;
		default:
			echo "wrong cmd";	
			break;
	}

	/**
	*Adding consultation information
	*/
	function addConsultation(){
		//Getting the information from the Ajax Url
		$pid=$_REQUEST['studId'];
		$uid=$_REQUEST['userId'];
		$observe=$_REQUEST['observation'];
		$vitals=$_REQUEST['vitalinfo'];
		$symptoms=$_REQUEST['symptoms'];
		$prescripts=$_REQUEST['prescripts'];

		//Checking for empty input
		if($pid==null || $uid==null || $observe==null || $vitals==null ||
			$symptoms==null || $prescripts==null){
			echo "Incomplete or Incorrect Information Given";
			exit();		//if no data, exit
		}

		include_once("../Visit.php");
		$newvist = new Visit();

		//Adding information into the database and checking if the query is successful
		if(!$newvist->addToDatabase($pid, $uid, $observe, $vitals, $symptoms, $prescripts)){
			echo "Addition fail";
			exit();
		}
		else{
			echo "Visit details added successfully!";
		}
	}
?>
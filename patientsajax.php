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
			getPatient();		//if cmd=1 the call delete
			break;
            
		case 2:
			viewPatients();
			break;
		default:
			echo "wrong cmd";	//change to json message
			break;
	}

	


	function getPatient(){
		include_once("patients.php");
		//check if there is a user code
		if(!isset($_REQUEST['uc'])){
			echo '{"result":0,"message":"User code not provided"}';		
			return;
		}
		
		$id=$_REQUEST["uc"];
		//create an object of users
		$obj=new person();
		// call get user method
		$row=$obj->personinfo($id);
		if($row==false){
			echo '{"result":0,"message":"User code not provided"}';	
			return;
		}
		
		echo '{"result":1,"user":';
			echo json_encode($row);
		echo '}';
	}




	function viewPatients(){
		include_once("patients.php");
		//check if there is a user code
		if(!isset($_REQUEST['uc'])){
			echo '{"result":0,"message":"User code not provided"}';		
			return;
		}
		
		//$usercode=$_REQUEST["uc"];
		//create an object of users
		$obj=new person();
		// call get user method
		$row=$obj->viewPatients();
		if($row==false){
			echo '{"result":0,"message":"User code not provided"}';	
			return;
		}
		
		echo '{"result":1,"user":';
			echo json_encode($row);
		echo '}';
	}



   
    
?>
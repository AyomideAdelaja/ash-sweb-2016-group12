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
			updateCountersAJAX(); //if cmd=1 call the updateCounter
			break;
		case 2:
			changeUserStatus();	//if cmd=2 the change status
			break;
		case 3:
			changeUsername();	//if cmd=3 the username changes
			break;
		case 4:
			viewUser();
			break;
		default:
			echo "wrong cmd";	//change to json message
			break;
	}
	
	function updateCountersAJAX(){
		
		include("visitLogs.php");
		$obj = new visitLogs();
		//get all counters
		$day = $obj->getCountPerDay();
		$week = $obj->getCountPerWeek();
		$month = $obj->getCountPerMonth();
		$year = $obj->getCountPerYear();
		$total = $obj->getTotalCount();

		//printing all arrays
		// echo "TODAY".print_r($day)."\n";
		// echo "THIS WEEK".print_r($week)."\n";
		// echo "THIS MONTH".print_r($month)."\n";
		// echo "THIS YEAR".print_r($year)."\n";


		if($day==true && $week==true && $month==true && $year==true && $total==true){
			echo '{"result":1,"message":
					{"today":'.$day['countPerDay'].',
					"week":'.$week['countPerWeek'].',
					"month":'.$month['countPerMonth'].',
					"year":'.$year['countPerYear'].',
					"total":'.$total['totalCount'].'
					}
				}';
		}else{
			echo '{"result":0,"message":"Query Failed"}';
		}

		// echo '{"result":1,"user":';
		// 	echo json_encode($row);
		// echo '}';
	}
	
	function changeUserStatus(){
		include_once("users.php");
		// the user code from the request array
		if(!isset($_REQUEST["uc"])){
			echo '{"result":0,"message":"user code is not correct"}';
			//echo "0";
			return;
		}
		$usercode=$_REQUEST["uc"];
		//create an object of users
		$obj=new users();
		// call change status method of user class
		$row=$obj->getUser($usercode);
		//print_r($row);
		if($row==false){
			echo "0";
			return;
		}
		//if current status is 2 then change it to 1
		if($row["NSTATUS"]==2){
			$result=$obj->changeUserStatus($usercode,1);
		}else{	//esle change status to 2
			$result=$obj->changeUserStatus($usercode,2);
		}
		
		if($result==false){
			echo "0";	
			return false;
		}
		//return json message
		echo '{"result":1,"message":"status changed"}';
			
	}

	function changeUsername(){
		include_once ("users.php");
		
		//make sure the usercode has been sent
		if(!isset($_REQUEST["uc"])){
			echo '{"result":0,"message":"the user code was not sent"}';
			return;
		}
			$usercode = $_REQUEST["uc"];
		
		//make sure the new name has been sent
		if(!isset($_REQUEST["name"])){
			echo '{"result":0,"message":"the new name was not sent"}';
			return;
		}
			$newname = $_REQUEST["name"];
		
		//create an object of users
		$obj = new users();
		
		// call change username method of user class
		$row = $obj->changeUsername($usercode, $newname);
		//print_r($row);
		
		if($row==false){
//			echo '{"result":0,"message":"there was an error from the database"}';
			echo "0";
			return;
		} else {
//			echo '{"result":1,"message":"username changed"}';
			echo "1";
		}
		
	}

	function viewUser(){
		include_once("users.php");
		//check if there is a user code
		if(!isset($_REQUEST['uc'])){
			echo '{"result":0,"message":"User code not provided"}';		
			return;
		}
		
		$usercode=$_REQUEST["uc"];
		//create an object of users
		$obj=new users();
		// call get user method
		$row=$obj->getUser($usercode);
		if($row==false){
			echo '{"result":0,"message":"User code not provided"}';	
			return;
		}
		
		echo '{"result":1,"user":';
			echo json_encode($row);
		echo '}';
	}
?>
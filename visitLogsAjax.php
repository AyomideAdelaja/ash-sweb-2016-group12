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
			getConsultationByIdAJAX();	//if cmd=2 the change status
			break;
		default:
			echo "wrong cmd";	//change to json message
			break;
	}
	/**
	* 
	*/
	function updateCountersAJAX(){
		//check if there is a current username
		if(!isset($_REQUEST['cu'])){
			echo '{"result":0,"message":"there is no current user"}';	
			exit();
		}
		
		$currentUser=$_REQUEST['cu'];

		include("visitLogs.php");
		$obj = new visitLogs();
		//get all counters
		$day = $obj->getCountPerDay($currentUser);
		$week = $obj->getCountPerWeek($currentUser);
		$month = $obj->getCountPerMonth($currentUser);
		$year = $obj->getCountPerYear($currentUser);
		$total = $obj->getTotalCount($currentUser);

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

	function getConsultationByIdAJAX(){
		//check if there is a visit id
		if(!isset($_REQUEST['vid'])){
			echo '{"result":0,"message":"visit id is not correct"}';	
			exit();
		}
		
		$visitID=$_REQUEST['vid'];

		include("visitLogs.php");
		$logObj = new visitLogs();

		$row = $logObj->getConsultationById($visitID);
		if($row){
			$result = $logObj->fetch();
			echo '{"result":1,"message":';
				echo json_encode($result);
			echo '}';
		} else{
			echo '{"result":0,"message":"visit id does not exist in database"}';	
		}
	}
?>
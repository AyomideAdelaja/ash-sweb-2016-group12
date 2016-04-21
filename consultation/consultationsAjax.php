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
	/**
	* 
	*/
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
?>
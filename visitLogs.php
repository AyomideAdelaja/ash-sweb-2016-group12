<?php
/**
*/
include_once("adb.php");
/**
*Users  class
*/
class visitLogs extends adb{
	function visitLogs(){
	}
	
	/**
	*Gets the total number of visitor pre user
	*@param int uid id of the user account
	*@return int returns the number of visitors/patients this user has added
	*/
	function countTotalVisitors($uid){

		$strQuery="SELECT COUNT(*) AS total FROM `VisitLogs` WHERE `VisitLogs`.`UID` LIKE '$uid'";

		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row['total'];		
	}
	
	/*
	This is a test code
	$obj=new visitLogs();
	if(!$obj->query("SELECT COUNT(*) AS total FROM `VisitLogs` WHERE `VisitLogs`.`UID` LIKE '$uid'"))
	{
		echo "error";
		exit();
	}
	print_r($obj->fetch());
	*/
	
}
?>
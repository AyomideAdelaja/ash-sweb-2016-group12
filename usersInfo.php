<?php
include_once("adb.php");

class usersInfo extends adb{
	function usersInfo(){
	}
	
	/**
	*Searches for user by username, fristname, lastname 
	*@param string user user's username
	*@return array of the user if successful, else null
	*/
	function getUserToLogIn($user=false){
		$filter=false;
		if($user!=false){
			$filter=" WHERE `Username` LIKE '$user'";
		} 

		$strQuery="SELECT * FROM `ash-sweb-group12-2016`.`UsersInfo`";
		
		if($filter!=false){
			$strQuery = $strQuery . $filter;
		}
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}
	
	/*
	This is a test code
	$obj=new usersInfo();
	if(!$obj->query("SELECT * FROM `ash-sweb-group12-2016`.`UsersInfo`"))
	{
		echo "error";
		exit();
	}
	print_r($obj->fetch());
	*/
	
}
?>
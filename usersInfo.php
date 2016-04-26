<?php
include_once("adb.php");

class usersInfo extends adb{
	function usersInfo(){
	}
	
	/**
	*@author Youssouf da Silva
	*usersInfo class
	*Searches for user by username, fristname, lastname 
	*@param string user user's username
	*@return array of the user if successful, else null
	*/
	function getUserToLogIn($user=false){
		$filter=false;
		if($user!=false){
			$filter=" WHERE `Username` LIKE '$user'";
		} 

		$strQuery="SELECT * FROM ash_sweb_users";

		if($filter!=false){
			$strQuery = $strQuery . $filter;
		}
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}
	
}
?>
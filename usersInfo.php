<?php
/**
*/
include_once("adb.php");
/**
*Users  class
*/
class usersInfo extends adb{
	function usersInfo(){
	}
	
	/**
	*Adds a new user
	*@param string username login name
	*@param string firstname first name
	*@param string lastname last name
	*@param string password login password
	*@param string usergroup group id
	*@param array of strings permission permission as an int
	*@param int status status of the user account
	*@return boolean returns true if successful or false 
	*/
	function addUser($uid,$firstname,$lastname,$username,$password){

		$strQuery="INSERT INTO `ash-sweb-group12-2016`.`UsersInfo` (`UID`, `FirstName`, `LastName`, `Username`, `Password`) VALUES ('$uid', '$firstname', '$lastname', '$username', MD5('$password'));";
		
		return $this->query($strQuery);				
	}
	
	
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getUsers($filter=false){
//		$strQuery="select USERCODE,USERNAME,FIRSTNAME,LASTNAME,PERMISSION,USERGROUP,STATUS from users left join usergroup on users.USERGROUP=usergroup.usergoup_id";
		$strQuery="SELECT `UID`, `FirstName`, `LastName`, `Username`, `Password` FROM `ash-sweb-group12-2016`.`UsersInfo`";
		
		if($filter!=false){
			$strQuery=$strQuery . " WHERE $filter";
		}
		return $this->query($strQuery);
	}
	
	/**
	*Searches for user by username, fristname, lastname 
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function searchUsers($text=false){
		$filter=false;
		if($text!=false){
			$filter=" Username like '$text' or FirstName like '$text' or LastName like '$text' ";
		}
		
		return $this->getUsers($filter);
	}
	
	/**
	*Searches for user by username, fristname, lastname 
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function logUserIn($user=false,$pass=false){
		$filter=false;
		if($user!=false){
			$filter=" WHERE `Username` LIKE '$user'";
		} 
		
//		$strQuery="SELECT `UID`, `FirstName`, `LastName`, `Username`, `Password` FROM `ash-sweb-group12-2016`.`UsersInfo`";

		$strQuery="SELECT * FROM `ash-sweb-group12-2016`.`UsersInfo`";
		
		if($filter!=false){
			$strQuery = $strQuery . $filter;
		}

		if($this->query($strQuery)){
			$row = $this->fetch();
			
		}
		
		//SELECT * FROM `UsersInfo` WHERE `Username` LIKE 'u'
//		 = $this->getUsers($filter);
		echo "Printing the array of user $user \n";
		print_r($row);
		
		if($row['Password'] == $pass){
			echo "passwords match";
			return true;
		} else {
			echo "passwords don't match";
			return false;
		}
	}
	
	/***
	*edits the status of an existing usergroup
	*@param INT USERCODE user id
	*@param string STATUS user status
	*@return boolean returns true if successful or false 
	
	function editUserStatus($usercode, $status){
		$strQuery="UPDATE `ash-sweb-group12-2016`.`UsersInfo` SET `STATUS` = '$status' WHERE `users`.`USERCODE` = $usercode;";
		return $this->query($strQuery);				
	}
	*/
	
	/**
		*Edits a user information
		*@param int usercode user id
		*@param string username login name
		*@param string firstname first name
		*@param string lastname last name
		*@param string password login password
		*@param string usergroup group id
		*@param array of strings permission permission as an int
		*@param int status status of the user account
		*@return boolean returns true if successful or false 
		*/
		function editUser($usercode,$firstname,$lastname,$username,$password){
			$strQuery="UPDATE `ash-sweb-group12-2016`.`UsersInfo` SET `Username` = '$username', `FirstName` = '$firstname', `LastName` = '$lastname' WHERE `ash-sweb-group12-2016`.`UID` = $usercode";
			
			return $this->query($strQuery);				
		}
						
	/**
	*delete user
	*@param int usercode the user code to be deleted
	*returns true if the user is deleted, else false
	*/
	function deleteUser($usercode){
		/*Compelete the function*/
		$strQuery="delete from UsersInfo where UID=$usercode";
		return $this->query($strQuery);	
	}

}
?>
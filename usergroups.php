<?php //for the status
include_once("adb.php");
class usergroups extends adb{
	function usergroup(){
	
	}
	
	function getAllUserGroups(){
		$strQuery="select usergroup_id, usergroup_name from usergroup";
		return $this->query($strQuery);
	}
	
	function getUserGroups($filter=false){
		$strQuery="select usergroup_id, usergroup_name from usergroup";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
	
	/**
	*Adds a new usergroup
	*@param string usergroup_name group name
	*@return boolean returns true if successful or false 
	*/
	function addUsergroup($usergroup_name){
		$strQuery="insert into usergroup set
						usergroup_name='$usergroup_name'";
		return $this->query($strQuery);				
	}
	
	/**
	*edits an existing usergroup
	*@param string usergroup_id group id
	*@param string usergroup_name group name
	*@return boolean returns true if successful or false 
	*/
	function editUsergroup($usergroup_id, $usergroup_name){
		$strQuery="update usergroup set
						usergroup_name='$usergroup_name' where usergroup_id=$usergroup_id";
		return $this->query($strQuery);				
	}

	/**
	*deletes an existing usergroup
	*@param string usergroup_id group id
	*@return boolean returns true if successful or false 
	*/
	function deleteUsergroup($usergroup_id){
		$strQuery="delete from usergroup where usergroup_id=$usergroup_id";
		return $this->query($strQuery);				
	}

}

?>
<?php
/**
*/
include_once("adb.php");
/**
*Nurse  class
*/
class nurses extends adb{
	function nurses(){
	}
	
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function loginNurse($id,$password){
		$strQuery="select username from NurseInfo where nurseID='$id' and password='$password'  and nurseID!='' and password!=''";
		return $this->query($strQuery);
	}
}
?>
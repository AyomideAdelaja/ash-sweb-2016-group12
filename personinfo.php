<?php
/**
*/
include_once("adb.php");
/**
*PersonInfo class
*/
class personinfo extends adb{
	function personinfo(){
	}
	/**
	*Adds a new person
	*@param int pid person id
	*@param string firstname first name
	*@param string lastname last name
	*@param string othernames other name
	*@param string dateofbirth date of birth
	*@param int height height of the patient
	*@param int height weight of the patient
	*@param string priorissues prior issues of the person
	*@param string knownallergies
	*@return boolean returns true if successful or false
	*/

    /*This function takes in the entered parameters and enters them in the database*/
	function addPerson($personid,$firstname,$lastname,$othernames,$dateofbirth,$height,$weight,$priorissues,
						$knownallergies){
		$strQuery="insert into PersonInfo set
						PID='$personid',
						FirstName='$firstname',
						LastName='$lastname',
						OtherNames='$othernames',
						DateOfBirth='$dateofbirth',
						Height='$height',
						Weight='$weight',
						PriorIssues='$priorissues',
						KnownAllergies='$knownallergies'";
		return $this->query($strQuery);
	}
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getPerson($filter=false){
		$strQuery="select FirstName,LastName,OtherNames,Height,Weight,PriorIssues,KnownAllergies from PersonInfo";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
}
?>

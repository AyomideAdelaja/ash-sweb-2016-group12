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
	

	function addPerson($firstname='none',$lastname='none',$othernames='none',$dateofbirth=0,$height=1,$weight=1,$priorissues='none',
						$knownallergies='none'){
		$strQuery="insert into personinfo set
						FirstName=$firstname,
						LastName=$lastname,
						OtherNames=$othernames,
						DateOfBirth=$dateofbirth,
						Height=$height,
						Weight=$weight,
						PriorIssues=$priorissues,
						KnownAllergies=$knownallergies";
		return $this->query($strQuery);				
	}
	/*
	function addPerson($firstname='none',$lastname='none',$othernames='none',$dateofbirth=0,$height=1,$weight=1,$priorissues='none',
						$knownallergies='none'){
		$strQuery="insert into personinfo(FirstName,LastName,OtherNames,DateOfBirth,Height,Weight,PriorIssues,KnownAllergies)
		          values ($firstname,$lastname,$othernames,$dateofbirth,$height,$weight,$priorissues,$knownallergies)";
		return $this->query($strQuery);				
	}
	*/
	
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getPerson($filter=false){
		$strQuery="select FirstName,LastName,OtherNames,Height,Weight,PriorIssues,KnownAllergies";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
	
	/**
	*Searches for user by firstname, lastname 
	*@param string text search text
	*@return boolean true if successful, else false
	
	function searchUsers($text=false){
		$filter=false;
		if($text!=false){
			$filter=" FirstName like '$text' or LastName like '$text' ";
		}
		
		return $this->getUsers($filter);
	}
}*/
}
?>
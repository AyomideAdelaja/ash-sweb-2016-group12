<?php
/**
*/
include_once("../adb.php");
/**
*Users  class
*/
class consultations extends adb{
	function consultations(){
	}

	/**
	*gets consultations records
	*@return boolean true if successful, else false
	*/
	function getAllConsultations(){
		$strQuery="SELECT VisitLogs.VID, PersonInfo.FirstName, PersonInfo.LastName, VisitLogs.DateOfVisit FROM VisitLogs INNER JOIN PersonInfo ON VisitLogs.PID = PersonInfo.PID";

		return $this->query($strQuery); //don't fetch before returning
	}

}

?>





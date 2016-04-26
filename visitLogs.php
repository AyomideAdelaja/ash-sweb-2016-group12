<?php
include_once("adb.php");

class visitLogs extends adb{
	function visitLogs(){
	}
	
	/**
	*@author Youssouf da Silva
	*visitLogs class
	*Counts the number of entries made in the current day 
	*@param string user user's username
	*@return array of the total number if successful, else null
	*/
	function getCountPerDay($currentUser){

		$strQuery = "SELECT UID, DateOfVisit, count(VID) as countPerDay FROM `ashesics_youssouf_dasilva`.`ash_sweb_visit` WHERE DateOfVisit = CURRENT_DATE AND UID = ".$currentUser;
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}

	/**
	*@author Youssouf da Silva
	*visitLogs class
	*Counts the number of entries made in the current week 
	*@return array of the total number if successful, else null
	*/
	function getCountPerWeek($currentUser){
		$strQuery="SELECT WEEKDAY(CURRENT_DATE) as WEEKNUM;";

		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}

		$dayPos = $row['WEEKNUM'];

		$strQuery="SELECT UID, COUNT(VID) AS countPerWeek FROM `ashesics_youssouf_dasilva`.`ash_sweb_visit` WHERE DateOfVisit BETWEEN CURRENT_DATE()-1 AND CURRENT_DATE AND UID = ".$currentUser;
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}

	/**
	*@author Youssouf da Silva
	*visitLogs class
	*Counts the number of entries made in the current month 
	*@return array of the total number if successful, else null
	*/
	function getCountPerMonth($currentUser){

		$strQuery="SELECT UID, COUNT(VID) AS countPerMonth FROM `ashesics_youssouf_dasilva`.`ash_sweb_visit` WHERE MONTH(DateOfVisit) = MONTH(CURRENT_DATE) AND UID = ".$currentUser;
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}

	/**
	*@author Youssouf da Silva
	*visitLogs class
	*Counts the number of entries made in the current year 
	*@return array of the total number if successful, else null
	*/
	function getCountPerYear($currentUser){

		$strQuery="SELECT UID, COUNT(VID) AS countPerYear FROM `ashesics_youssouf_dasilva`.`ash_sweb_visit` WHERE YEAR(DateOfVisit) = YEAR(CURRENT_DATE) AND UID = ".$currentUser;
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}

	/**
	*@author Youssouf da Silva
	*visitLogs class
	*Counts the number of entries made in total
	*@return array of the total number if successful, else null
	*/
	function getTotalCount($currentUser){

		$strQuery="SELECT UID, COUNT(VID) AS totalCount FROM `ashesics_youssouf_dasilva`.`ash_sweb_visit` WHERE UID = ".$currentUser;
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}

	/**
	*@author Youssouf da Silva
	*visitLogs class
	*Gets consultations records
	*@return boolean true if successful, else false
	*/
	function getAllConsultations(){
		$strQuery="SELECT ash_sweb_visit.VID, ash_sweb_person.FirstName, ash_sweb_person.LastName, ash_sweb_visit.DateOfVisit FROM ash_sweb_visit INNER JOIN ash_sweb_person ON ash_sweb_visit.PID = ash_sweb_person.PID";

		return $this->query($strQuery); //don't fetch before returning
	}

	/**
	*@author Youssouf da Silva
	*visitLogs class
	*Gets consultation record for given id
	*@return boolean true if successful, else false
	*/
	function getConsultationById($vid){
		$strQuery = "SELECT ash_sweb_visit.VID, ash_sweb_person.FirstName AS PatientFirstName, ash_sweb_person.LastName AS PatientLastName, ash_sweb_users.FirstName AS UserFirstName, ash_sweb_users.LastName AS UserLastName, ash_sweb_visit.DateOfVisit, ash_sweb_visit.Observations, ash_sweb_diagnosis.DiagnosisName AS ash_sweb_diagnosis, ash_sweb_visit.VitalsInfo, ash_sweb_visit.Symptoms, ash_sweb_visit.Prescriptions FROM ash_sweb_visit INNER JOIN ash_sweb_person ON ash_sweb_visit.PID = ash_sweb_person.PID INNER JOIN ash_sweb_users ON ash_sweb_visit.UID = ash_sweb_users.UID INNER JOIN ash_sweb_diagnosis ON ash_sweb_visit.DID = ash_sweb_diagnosis.DID WHERE ash_sweb_visit.VID = ".$vid;

		return $this->query($strQuery); //don't fetch before returning
	}
	
}
?>
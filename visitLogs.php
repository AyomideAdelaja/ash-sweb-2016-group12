<?php
include_once("adb.php");

class visitLogs extends adb{
	function visitLogs(){
	}
	
	/**
	*Counts the number of entries made in the current day 
	*@return array of the total number if successful, else null
	*/
	function getCountPerDay(){

		$strQuery = "SELECT UID, DateOfVisit, count(VID) as countPerDay FROM VisitLogs WHERE DateOfVisit = CURRENT_DATE";
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}

	/**
	*Counts the number of entries made in the current week 
	*@return array of the total number if successful, else null
	*/
	function getCountPerWeek(){
		$strQuery="SELECT WEEKDAY(CURRENT_DATE) as WEEKNUM;";

		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}

		$dayPos = $row['WEEKNUM'];

		$strQuery="SELECT UID, COUNT(VID) AS countPerWeek FROM `VisitLogs` WHERE DateOfVisit BETWEEN CURRENT_DATE()-1 AND CURRENT_DATE";
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}

	/**
	*Counts the number of entries made in the current month 
	*@return array of the total number if successful, else null
	*/
	function getCountPerMonth(){

		$strQuery="SELECT UID, COUNT(VID) AS countPerMonth FROM `VisitLogs` WHERE MONTH(DateOfVisit) = MONTH(CURRENT_DATE)";
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}

	/**
	*Counts the number of entries made in the current year 
	*@return array of the total number if successful, else null
	*/
	function getCountPerYear(){

		$strQuery="SELECT UID, COUNT(VID) AS countPerYear FROM `VisitLogs` WHERE YEAR(DateOfVisit) = YEAR(CURRENT_DATE)";
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}

	/**
	*Counts the number of entries made in total
	*@return array of the total number if successful, else null
	*/
	function getTotalCount(){

		$strQuery="SELECT UID, COUNT(VID) AS totalCount FROM `VisitLogs`";
		
		$row = null;
		if($this->query($strQuery)){
			$row = $this->fetch();
		}
		
		return $row;
	}

	/**
	*gets consultations records
	*@return boolean true if successful, else false
	*/
	function getAllConsultations(){
		$strQuery="SELECT VisitLogs.VID, PersonInfo.FirstName, PersonInfo.LastName, VisitLogs.DateOfVisit FROM VisitLogs INNER JOIN PersonInfo ON VisitLogs.PID = PersonInfo.PID";

		return $this->query($strQuery); //don't fetch before returning
	}

	/**
	*gets consultation record for given id
	*@return boolean true if successful, else false
	*/
	function getConsultationById($vid){
		$strQuery="SELECT VisitLogs.VID, PersonInfo.FirstName AS PatientFirstName, PersonInfo.LastName AS PatientLastName, UsersInfo.FirstName AS UserFirstName, UsersInfo.LastName AS UserLastName, VisitLogs.DateOfVisit, VisitLogs.Observations, Diagnosis.DiagnosisName AS Diagnosis, VisitLogs.VitalsInfo, VisitLogs.Symptoms, VisitLogs.Prescriptions FROM VisitLogs INNER JOIN PersonInfo ON VisitLogs.PID = PersonInfo.PID INNER JOIN UsersInfo ON VisitLogs.UID = UsersInfo.UID INNER JOIN Diagnosis ON VisitLogs.DID = Diagnosis.DID WHERE VisitLogs.VID = ".$vid;

		return $this->query($strQuery); //don't fetch before returning
	}

	/*
	DAILY COUNT

	select DateOfVisit, count(VIP)
	from VisitLogs
	WHERE DateOfVisit = CURRENT_DATE
	GROUP BY DateOfVisit

	select DateOfVisit, count(VIP)
from VisitLogs
WHERE DateOfVisit = CURRENT_DATE
GROUP BY DateOfVisit

	==================================


	for a weekly count

	SELECT extract(week from creation_date), 
       extract(year from creation_date),
       count(*)
		FROM tickets
		GROUP BY extract(week from creation_date), 
		         extract(year from creation_date)

		===================================

		SELECT COUNT(*) FROM VisitLogs 
		WHERE TRUNCATE(CURRENT_DATE(substring(DateOfVisit,1,10), 'DD-MM-YY'))
		BETWEEN '01-JAN-16' AND '31-DEC-16'

		===================================

		SELECT DateOfVisit(wk, DATEDIFF(wk,0,GETDATE()), 0) MondayOfCurrentWeek

		===================================


	*/


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
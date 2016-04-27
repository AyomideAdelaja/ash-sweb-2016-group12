<?php
<<<<<<< HEAD

include_once("setting.php");

=======
/**
*Database connection helper
*/
//include_once("setting.php");
include_once("patsetting.php");
>>>>>>> origin/searchMedicalHistory2
/**
* Database connection helper class
*/
class adb{
<<<<<<< HEAD
	
	var $db=null;
	var $result=null;
	
	function adb(){
	}
	
	/**
	*Connect to database 
	*@return boolean true if connected else false
=======
	var $db=null;
	var $result=null;
	function adb(){
	}
	/**
	*Connect to database 
	*@return boolean ture if connected else false
>>>>>>> origin/searchMedicalHistory2
	*/
	function connect(){
		
		//connect
		$this->db=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
<<<<<<< HEAD

=======
>>>>>>> origin/searchMedicalHistory2
		if($this->db->connect_errno){
			//no connection, exit
			return false;
		}
		return true;
	}
	
	/**
	*Query the database 
	*@param string $strQuery sql string to execute
<<<<<<< HEAD
	*@return boolean true if connected else false
=======
>>>>>>> origin/searchMedicalHistory2
	*/
	function query($strQuery){
		if(!$this->connect()){
			return false;
		}
		if($this->db==null){
			return false;
		}
		$this->result=$this->db->query($strQuery);
		if($this->result==false){
			return false;
		}
		return true;
	}
<<<<<<< HEAD
	
	/**
	*Fetch from the current data set and return
	*@return array one record if successfull, else return false
	*/
	function fetch(){
		
=======
	/*
	* Fetch from the current data set and return
	*@return array one record
	*/
	function fetch(){
		//Complete this funtion to fetch from the $this->result
>>>>>>> origin/searchMedicalHistory2
		if($this->result==null){
			return false;
		}
		
		if($this->result==false){
			return false;
		}
		
		return $this->result->fetch_assoc();
	}
}
<<<<<<< HEAD
?>
=======
/*
This is a test code
$obj=new adb();
if(!$obj->query("select * from users"))
{
	echo "error";
	exit();
}
print_r($obj->fetch());
*/
?>
>>>>>>> origin/searchMedicalHistory2

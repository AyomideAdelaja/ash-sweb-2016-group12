<?php
<<<<<<< HEAD

include_once("setting.php");
=======
/**
*Database connection helper
*/
include_once("setting1.php");

>>>>>>> origin/addPersonAjax
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
	*/
	function connect(){
		
		//connect
		$this->db=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
=======
	var $db=null;
	var $result=null;
	function adb(){
	}
	/**
	*Connect to database
	*@return boolean true if connected else false
	*/

	function connect(){

		//connect
		$this->db=new mysqlI(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
>>>>>>> origin/addPersonAjax
		if($this->db->connect_errno){
			//no connection, exit
			return false;
		}
		return true;
	}
<<<<<<< HEAD
	
	/**
	*Query the database 
	*@param string $strQuery sql string to execute
	*@return boolean true if connected else false
=======

	/**
	*Query the database
	*@param string $strQuery sql string to execute
>>>>>>> origin/addPersonAjax
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
		
		if($this->result==null){
			return false;
		}
		
		if($this->result==false){
			return false;
		}
		
=======
	/*
	* Fetch from the current data set and return
	*@return array one record
	*/
	function fetch(){
		//Complete this funtion to fetch from the $this->result
		if($this->result==null){
			return false;
		}

		if($this->result==false){
			return false;
		}

>>>>>>> origin/addPersonAjax
		return $this->result->fetch_assoc();
	}
}
/*
This is a test code
$obj=new adb();
<<<<<<< HEAD
if(!$obj->query("select * from UsersInfo"))
=======
if(!$obj->query("select * from personsinfo"))
>>>>>>> origin/addPersonAjax
{
	echo "error";
	exit();
}
print_r($obj->fetch());
*/
<<<<<<< HEAD
?>
=======
?>
>>>>>>> origin/addPersonAjax

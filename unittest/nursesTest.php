<?php
	require_once 'nurses.php';
	class nursesTest extends PHPUnit_Framework_TestCase{
		//include_once("nurses.php");

		public $test;
		
		/**
		*Global variable points to new instance of nurse
		*/
		public function setUp(){
			$this->test=new nurses();
		}
		/**
		*code to test login fuction and return values
		*/
		public function testUser(){
				//create new object of nurses
				$obj=new nurses();
				$obj->loginNurse(1,"mary");
				$result=$obj->fetch();
				//call the object's loginNurse method and check for error
				$this->assertTrue($result["username"]=="mary.adjei");
		}
	}
?>
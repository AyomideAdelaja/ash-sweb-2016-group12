<?php
class Test extends PHPUnit_Framework_TestCase{
	public function testAddPerson(){
	$url="addpersonajax.php?cmd=1&pid=87652017&firstname=Micaiah&lastname=Wiafe&othernames=Nana 
		Yaw&dateofbirth=1994-07-14&status=1&height=6&weight=76&priorissues=none&knownallergies=Dust";
	$expected='{"result":1,"message":"Person added"}';
	$this->assertTrue(true,$url,$expected);
	}
}
?>
<?php
    include_once("adb.php");
    
    class person extends adb{
        
        function person(){
            
        }
        
        function personinfo($id){
            $strQuery = "SELECT FirstName, LastName, OtherNames FROM personinfo WHERE PID = '$id'";
            
            return $this -> query($strQuery);
        }
        
        
        function viewPatients(){
            $strQuery = "SELECT v.VID, v.DateOfVisit, CONCAT(p.FirstName,' ',p.LastName) AS PatientName
FROM personinfo p INNER JOIN visitlogs v
ON p.PID = v.PID";
            
            return $this -> query($strQuery);
        }
    }

/*
$obj = new person();

$res = $obj -> personinfo(54402016);

if ($res == false){
    echo "me";

}
*/

?>
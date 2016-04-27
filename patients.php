<?php
    include_once("adb.php");
    
    class person extends adb{
        
        function person(){
            
        }
        
        function personinfo($id){
            $strQuery = "SELECT FirstName, LastName, OtherNames FROM ash_sweb_person WHERE PID = '$id'";
            
            return $this -> query($strQuery);
        }
        
        
        function viewPatients(){
            $strQuery = "SELECT v.VID, v.DateOfVisit, CONCAT(p.FirstName,' ',p.LastName) AS PatientName
FROM ash_sweb_person p INNER JOIN ash_sweb_visit v
ON p.PID = v.PID";
            
            return $this -> query($strQuery);
        }
    }

?>
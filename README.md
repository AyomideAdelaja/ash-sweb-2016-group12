<?php
    include_once("adb.php");
    
    class patients extends adb{
        
        function patients(){
            
        }
        
        function findpatient($id){
            $strQuery = "SELECT * FROM patientsInfo WHERE ID = '$id'";
            
            return $this -> query($strQuery);
        }
    }
?>

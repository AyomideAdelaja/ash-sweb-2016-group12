<?php
    include_once("adb.php");
    
    class patients extends adb{
        
        function patients(){
            
        }
        
        function findpatient($id){
            $strQuery = "SELECT * FROM personinfo WHERE PID = '$id'";
            
            return $this -> query($strQuery);
        }
    }


$obj = new patients();

$res = $obj -> findpatient(54402016);

if ($res == false){
    echo "me";
}
?>
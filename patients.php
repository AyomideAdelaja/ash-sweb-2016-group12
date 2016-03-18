<?php
    include_once("adb.php");
    
    class person extends adb{
        
        function person(){
            
        }
        
        function personinfo($id){
            $strQuery = "SELECT * FROM personinfo WHERE PID = '$id'";
            
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
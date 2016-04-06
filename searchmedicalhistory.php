<html>
	<head>
		<title>Search Medical History</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					   MEDICAL HISTORY
                    </td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
								
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
                        
						Content space
					<form action="" method="GET">
                        
                        
						<input type="text" name="txt" class = "clickspot">
						
                        
                        <input type="submit" value="search">
                        
					</form>		
<?php
                        
    
    
    include_once("patients.php");
    
 if (!isset($_REQUEST['txt'])){
     echo "ENTER PATIENT ID";
 }
else{
    $id = $_REQUEST['txt'];
    
    if ($id == NULL){
        echo "ID not entered"; 
    }
    
    else{
	//1) Create object of users class
        $obj = new person();
                        
        
       
            
            $result = $obj -> personinfo($id);
        
                        
       
	
	
	//2) Call the object's getUsers method and check for error
	   
        
        if ($result = false){
            echo "result is false";
        }
                        
        
	
	//3) show the result
    echo "<table border = 1>
<tr bgcolor = 'GREEN'>
    <td><font color = 'WHITE'>PERSON ID</font></td>
    <td><font color = 'WHITE'>FIRST NAME</font></td>
    <td><font color = 'WHITE'>LAST NAME</font></td>
    <td><font color = 'WHITE'>OTHER NAMES </font></td>
    <td><font color = 'WHITE'>DATE OF BIRTH</font></td>
    <td><font color = 'WHITE'>HEIGHT</font></td>
    <td><font color = 'WHITE'>WEIGHT</font></td>
    <td><font color = 'WHITE'>PRIOR ISSUES</font></td>
    <td><font color = 'WHITE'>KNOWN ALLERGIES</font></td>
</tr>";



//FETCHING AND LOOP THROUGH THE DATABASE TO DISPLAY ALL USERS
while ($row = $obj -> fetch()){
   
    echo "<tr>
            <td>{$row['PID']}</td>
            <td>{$row['FirstName']}</td>
            <td>{$row['LastName']}</td>
            <td>{$row['OtherNames']}</td>
            <td>{$row['DateOfBirth']}</td>
            <td>{$row['Height']}</td>
            <td>{$row['Weight']}</td>
            <td>{$row['PriorIssues']}</td>
            <td>{$row['KnownAllergies']}</td>
            
        </tr>";
       
 
    

    
   
}


echo "</table>";
    }
}
                        
                        



	
?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
					
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	

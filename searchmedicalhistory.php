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
						<input type="text" id="txtSearch" />
						<span class="menuitem">search</span>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						Content space
					<form action="" method="GET">
                        
                        
						<input type="text" name="txt">
						
                        
                        <input type="submit" value="search" >
                        
					</form>		
<?php
                        
    
    
    include_once("patients.php");
    
 if (isset($_REQUEST['txt'])){
            $id = $_REQUEST['txt'];
	//1) Create object of users class
        $obj = new person();
                        
        
       
            
            $result = $obj -> personinfo($id);
        
                        
       
	
	
	//2) Call the object's getUsers method and check for error
	   
        
        if ($result = false){
            echo "result is false";
        }
                        
        
	
	//3) show the result
    echo "<table border = 1>
<tr bgcolor = 'RED'>
    <td>PERSON ID</font></td>
    <td>FIRST NAME</td>
    <td>LAST NAME</td>
    <td>OTHER NAMES </td>
    <td>DATE OF BIRTH</td>
    <td>HEIGHT</td>
    <td>WEIGHT</td>
    <td>PRIOR ISSUES</td>
    <td>KNOWN ALLERGIES</td>
</tr>";



//FETCHING AND LOOP THROUGH THE DATABASE TO DISPLAY ALL USERS
while ($row = $obj -> fetch()){
    if ($row['PID'] % 2 == 0){
    echo "<tr bgcolor = 'RED'>
            <td><font color = 'WHITE'>{$row['PID']}</font></td>
            <td><font color = 'WHITE'>{$row['FirstName']}</font></font></td>
            <td><font color = 'WHITE'>{$row['LastName']}</font></td>
            <td><font color = 'WHITE'>{$row['OtherNames']}</font></td>
            <td><font color = 'WHITE'>{$row['DateOfBirth']}</font></td>
            <td><font color = 'WHITE'>{$row['Height']}</font></td>
            <td><font color = 'WHITE'>{$row['Weight']}</font></td>
            <td><font color = 'WHITE'>{$row['PriorIssues']}</font></td>
            <td><font color = 'WHITE'>{$row['KnownAllergies']}</font></td>
            
        </tr>";
       
} 
    

    
   
}


echo "</table>";
        }
                        
                        



	
?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
					
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	

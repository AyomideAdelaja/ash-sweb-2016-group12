<html>
<head>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style2.css">
	<meta charset="UTF-8">
	<title>Consultations Log</title>
    
   
		<script type="text/javascript" src="js/jquery-1.12.1.js">
            
	
           
            
                     		function viewPatientComplete(xhr, status){
                if (!status = "success"){
                    divStatus.innerHTML = "ERROR WHILE VIEWING PAGE";
                    return;
                }
                divStatus.innerHTML = xhr.responseText;
                //a code to view patients
                
                
            }
            
            
            function viewPatient(ID){
                var ajaxPageUrl = "patientsajax.php?cmd=2&uc="+ID;
                
                $.ajax(ajaxPageUrl, {
                    async: true, complete: viewPatientComplete
                })
            
            }
            
              var ID = $("#id").val();
            
            
            function viewAllPatients(){
                var ajaxPageUrl = "usersajax.php?cmd=2";
                
                $.ajax(ajaxPageUrl, {
                    async: true, complete: viewPatientComplete
                })
            
            }
            
            
            
    </script>
            
        
</head>
<body id="grad2">
	<div class="">
		<div class="topbar theme-1">
			<span class="left"><img id="home-logo" src="../images/login-title.png" alt=""></span>
			<div class="left page-title"><span>Log of Consultations</span></div>
			<div class="line"></div>
		</div>
		<div>
			<div class="sidebar theme-1">
				<center>
					<ul>
						<div class="line"></div>
						<div class="mini-gap"></div>
						<li><a href="../dashboard.html"><button class="sidebutton"><span>Dashboard</span></button></a></li>
						<div class="mini-gap"></div>

						<div class="line"></div>

						<div class="mini-gap"></div>
						
						<li class="dropdown">
							<a href="addConsultation.html">
								<button class="sidebutton sidebutton-active">Consultation</button>
								<div class="dropdown-content">
									<a href="addConsultation.html">
										<button class="sidebutton"><span>Add Consultation</span></button>
									</a>
									<a href="addConsultation.html">
										<button class="sidebutton sidebutton-active"><span>Consultations Log</span></button>
									</a>
								</div>
							</a>
						</li>
                        
                        
						
						<div class="mini-gap"></div>

						<div class="line"></div>
						
						<div class="mini-gap"></div>

						<li class="dropdown">
							<a href="addVisitSearch.html">
								<button class="sidebutton">Patient</button>
								<div class="dropdown-content">
									<a href="addVisitSearch.html">
										<button class="sidebutton"><span>Add Patient</span></button>
									</a>
									<a href="addVisitSearch.html">
										<button class="sidebutton"><span>Patients Log</span></button>
									</a>
								</div>
							</a>
						</li>
						<div class="mini-gap"></div>

						<div class="line"></div>

						<div class="mini-gap"></div>
						<li><a href="#"><button class="sidebutton"><span>Report</span></button></a></li>
						<div class="mini-gap"></div>

						<div class="line"></div>
						
						<div class="mini-gap"></div>
						<li><a href="../index.html"><button class="sidebutton"><span>Log Out</span></button></a></li>
						<div class="mini-gap"></div>

					</ul>
				</center>
			</div>
			<div class="contentbar">
			<br><br>
				<div class="listlog-container overflow">
				<fieldset class="inner-listlog-container overflow">
					<legend><h3 class="text-center text-theme-4">Consultation Log</h3></legend>
					<div class="">
                         <form action="consultationsLog.php" method="GET">
                        
                        
						<input type="text" name="txt" id="ID">
						
                        
                        <input type="submit" value="search" class = "search-button" >
                        
					</form>	
						<table class="logtable" border="1">
							
		
    
    
    
   

              


<?php
                        
    
    
    include_once("patients.php");
        
        
    
 if (isset($_REQUEST['txt'])){
     
     
     $id = $_REQUEST['txt'];
     
     $obj = new person();
                        
        
       
            
            $result = $obj -> personinfo($id);
        
                        
       
	
	
	//2) Call the object's getUsers method and check for error
	   
        
        if ($result = false){
            echo "result is false";
        }
                        
        
	
echo "<table class='logtable' border=1>
							<tr class='theme-4'>
								<td><b>First Name</b></td>
								<td><b>Last Name</b></td>
								<td><b>Other Names</b></td>
								<td colspan=2><b>Options</b></td>
							</tr>";



//FETCHING AND LOOP THROUGH THE DATABASE TO DISPLAY ALL USERS
while ($row = $obj -> fetch()){
    
    echo "<tr>
            
            <td><font color = 'WHITE'>{$row['FirstName']}</font></font></td>
            <td><font color = 'WHITE'>{$row['LastName']}</font></td>
            <td><font color = 'WHITE'>{$row['OtherNames']}</font></td>
            
            <td><button class = 'table-button'> View </button></td>
            <td> <button class = 'table-button'>Edit</button></td>
            
            
      </tr>";
       

    

    
   
}
     

echo "</table>";
    
 }
        
        
   else{    
    
	//1) Create object of users class
        $obj = new person();
                        
        
       
            
            $result = $obj -> viewPatients();
        
                        
       
	
	
	//2) Call the object's getUsers method and check for error
	   
        
        if ($result = false){
            echo "result is false";
        }
                        
        
	

echo "<table class='logtable' border=1>
							<tr class='theme-4'>
								<td><b>Visit Log</b></td>
								<td><b>Patient Name</b></td>
								<td><b>Date Of Visit</b></td>
								<td colspan=2><b>Options</b></td>
							</tr>";


//FETCHING AND LOOP THROUGH THE DATABASE TO DISPLAY ALL USERS
while ($row = $obj -> fetch()){
    
    echo "<tr class = 'theme-2 text-theme-4'>
            
            <td><font color = 'WHITE'>{$row['VID']}</font></font></td>
            <td><font color = 'WHITE'>{$row['PatientName']}</font></td>
            <td><font color = 'WHITE'>{$row['DateOfVisit']}</font></td>
         <td><button class = 'table-button'>View</button></td>
         <td><button class = 'table-button'>Edit</button></td>
            
      </tr>";
    


    

    
   
}


echo "</table>";
    

                        
        }



	
?>
                            			</div>
				</fieldset>
				</div>
			</div>
		</div>
	</div>
    
        
        </body>

    </html>
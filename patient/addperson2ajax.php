<html>
	<head>	
		<meta charset="UTF-8">
		<title>Add New Person</title>
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/style2.css">
	
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
								<button class="sidebutton">Consultation</button>
								<div class="dropdown-content">
									<a href="addConsultation.html">
										<button class="sidebutton"><span>Add Consultation</span></button>
									</a>
									<a href="addConsultation.html">
										<button class="sidebutton"><span>Consultations Log</span></button>
									</a>
								</div>
							</a>
						</li>
						
						<div class="mini-gap"></div>

						<div class="line"></div>
						
						<div class="mini-gap"></div>

						<li class="dropdown">
							<a href="addperson2ajax.php">
								<button class="sidebutton  sidebutton-active">Patient</button>
								<div class="dropdown-content">
									<a href="addperson2ajax.php">
										<button class="sidebutton  sidebutton-active"><span>Add Patient</span></button>
									</a>
									<a href="addperson2ajax.php">
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
				<fieldset class="search-container">
					<legend><h3 class="text-center text-theme-4">Add a Patient here</h3></legend>
					
					<input id="id" type="text" placeholder="Person ID" class="half-input">

					<input id="fn" type="text" placeholder="First Name" class="half-input">

					<input id="ln" type="text" placeholder="Last Name" class="half-input">
					
					<div class="gap"></div>

					<input id="on" type="text" placeholder="Other Names" class="half-input">

					<input id="dob" type="date" placeholder="Date of Birth" class="half-input">

					<div class="gap"></div>

					<select  id="sta" type="select" name="status" class="input">
						<option value = "1"> Student </option>
						<option value = "2"> Faculty </option>
					</select>

					<div class="gap"></div>

					<input id="h" type="number" placeholder="Height" class="half-input">

					<input id="w" type="number" placeholder="Weight" class="half-input">
					<div class="gap"></div>

					<textarea id="pi" class="t-area" placeholder="Prior Issues" name="prescripts" form="usrform"></textarea>
					<div class="gap"></div>

					<textarea id="ka" class="t-area" placeholder="Known Allergies" name="prescripts" form="usrform"></textarea>

					<div class="gap"></div>

					<button onclick="addPerson()" class="button theme-1 text-theme-4">Save Patient Data</button>


				</fieldset>
			</div>
		</div>
	</div>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		
		var currentObject=null;
		/**
		* callback function for add person method
		*/
		function addPersonComplete(xhr,status){
			if(status!="success"){
				alert("error sending request");
				return;
			}

			var obj=$.parseJSON(xhr.responseText);
			if(obj.result==0){
				alert(obj.message);
			}else{

				alert("Person added");

			}

			currentObject=null;
		}
		/**
		*makes a AJAX call to server to add person
		*/
		function addPerson(){
			var personid = document.getElementById("id").value;
			var firstname = document.getElementById("fn").value;
			var lastname = document.getElementById("ln").value;
			var othernames = document.getElementById("on").value;
			var dateofbirth = document.getElementById("dob").value;
			var status = document.getElementById("sta").value;		
			var height = document.getElementById("h").value;
			var weight = document.getElementById("w").value;
			var priorissues = document.getElementById("pi").value;
			var knownallergies = document.getElementById("ka").value;
			
			var theUrl="addpersonajax.php?cmd=1&pid="+personid+"&firstname="+firstname+"&lastname="+lastname+
				"&othernames="+othernames+"&dateofbirth="+dateofbirth+"&status="+status+"&height="+height+
				"&weight="+weight+"&priorissues="+priorissues+"&knownallergies="+knownallergies;
			
			
           
			/*test code for values
			alert("PersonID is :"+personid+",First name is :" + firstname +",Lastname is :" + lastname +",Othernames is :" + othernames +
			",Date of birth is :" + dateofbirth + ",Status is :" + status +",Height is :" + height +
			"Weight is :" + weight + ",Prior issues are :" + priorissues + ",Known Allergies are :" + knownallergies);
			*/
			
				
			// test code 
			alert(theUrl);
			$.ajax(theUrl,
				{async:true,complete:addPersonComplete}
				);
		}
	</script>
	</body>

</html>
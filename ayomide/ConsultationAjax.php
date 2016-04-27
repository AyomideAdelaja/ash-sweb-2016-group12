<html>
	<head>
		<title>Consultation</title>
		<link rel="stylesheet" href="css/mycssstyle.css">
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script type="text/javascript">
			//Script to get information from the form and send it to be added to the database
			function addVisit(){
				var addAjaxRequest;

				//Ensuring the input from the form is not empty, If so, the function is exited
				if(document.getElementById('studId').value==null || document.getElementById('userId').value==null || document.getElementById('visitdate').value==null
					|| document.getElementById('observation').value==null || document.getElementById('vitalinfo').value==null || document.getElementById('symptoms').value==null
					|| document.getElementById('prescripts').value==null){
					alert("Put in correct input");
					return;
				}
				//Putting the input from the form into variables
				var pid=document.getElementById('studId').value;
				var uid=document.getElementById('userId').value;
				var dateofvisit=document.getElementById('visitdate').value;
				var observe=document.getElementById('observation').value;
				var vitals=document.getElementById('vitalinfo').value;
				var symptoms=document.getElementById('symptoms').value;
				var prescripts=document.getElementById('prescripts').value;

				addAjaxRequest = new XMLHttpRequest();
				addAjaxRequest.onreadystatechange = function(){
					if(addAjaxRequest.readyState == 4 && addAjaxRequest.status == 200){
						//If the addition is successful, the table should be loaded again displaying the newly added information
						loadTable();
						 //Displays the response message, either success or failure as an alert on the window
						alert(addAjaxRequest.responseText);
					}
				};

				var ajaxUrl = "AddVisitAjax.php?cmd=1";
				ajaxUrl += "&studId=" + pid + "&userId=" + uid + "&visitdate=" + dateofvisit + "&observation=" + observe + "&vitalinfo=" + vitals + "&symptoms=" + symptoms + "&prescripts=" + prescripts;
				
				addAjaxRequest.open("GET", ajaxUrl, true);
				addAjaxRequest.send();

			}

			// Script to load the table
			function loadTable(){
				displayAjaxRequest = new XMLHttpRequest();
				displayAjaxRequest.onreadystatechange = function(){
					if(displayAjaxRequest.readyState == 4 && displayAjaxRequest.status == 200){
						document.getElementById("tableSpace").innerHTML = displayAjaxRequest.responseText;
					}
				};

				var ajaxUrl = "AddVisitAjax.php?cmd=2";
				
				displayAjaxRequest.open("GET", ajaxUrl, true);
				displayAjaxRequest.send();
			}

		</script>
	</head>
	<!-- Ensuring the table loads when the page is loaded -->
	<body onload="loadTable()">
		<font face="calibri">
		<h1>Ashesi Clinic</h1>
		<nav>
			<b>PAGE NAVIGATION
			<p><div class="navdiv">Page Link 1</div>
			<div class="navdiv">Page Link 2</div>
			<div class="navdiv">Page Link 3</div>
			<div class="navdiv"></div></p>
			</b>
		</nav>
		<fieldset>
			<legend><h2>Add details of consultation here</h2></legend>
			<form action="" id="usrform">
				Date: <br><input type="date" id="visitdate"><br>
				Student ID: <br><input type="text" id="studId"><br>
				User ID: <br><input type="text" id="userId"><br>
			</form>
				Observations noted: <br><textarea rows="4" cols="50" id="observation" form="usrform"></textarea><br>
				Patient vitals: <br><textarea rows="4" cols="50" id="vitalinfo" form="usrform"></textarea><br>
				Symptoms seen: <br><textarea rows="4" cols="50" id="symptoms" form="usrform"></textarea><br>
				Prescriptions given: <br><textarea rows="4" cols="50" id="prescripts" form="usrform"></textarea><br><br>
			<button type="button" onclick="addVisit()" form="usrform">Done</button>
		</fieldset>
		<div id="demac">
		<!-- Element to be replaced with table the after Ajax call -->
		<div id="tableSpace"></div>
	</body>


<?php
			
?>
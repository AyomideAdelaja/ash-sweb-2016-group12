<?php
	include("adb.php");
	/**
	*Class to handle consultation page operations
	*/
	class Visit extends adb{
		function Visit(){
		}
		
		/**
		*Adding to the table
		*@return boolean True if successful, False if not
		*/
		function addToDatabase($pid=2,$uid=2,$dateofvisit="0000-00-00",$observe="", $vitals="", $symptoms="", $prescripts=""){
			//$vid is default because it is auto_incremented by the database
			$vid="default";

			//The insertion query
			$strQuery="INSERT INTO visitlogs SET
						VID='$vid',
						PID='$pid',
						UID='$uid',
						DateOfVisit='$dateofvisit',
						Observations='$observe',
						VitalsInfo='$vitals',
						Symptoms='$symptoms',
						Prescriptions='$prescripts'";
			//returning the success of query
			return $this->query($strQuery);
		}

		/**
		*Displaying the table of visits/consultations
		*/
		function DisplayAll(){
			//Displaying the contents of the visit log table
			$displaysql="SELECT VID, DateOfVisit, PID, UID, Observations, VitalsInfo, Symptoms, Prescriptions
			 FROM visitlogs ORDER BY DateOfVisit";

			 //Getting the results
			$result = $this->query($displaysql);

			if($result==false){
				echo "Error in display";
				exit();
			}

			//Row color alteration
			$cellcol = array("#1081C5", "#88C0E1");
			$cur=0; //counter for the cellcol array

			//output header
			echo "<fieldset><legend><h3>Consultations</h3></legend>";
			echo "<table style='width:100%' border='1px solid blue'>
				<tr bgcolor='#0C4D9F'>
					<th>Visit ID</th>
					<th>Date of Visit</th>
					<th>Student ID</th>
					<th>User/Nurse ID</th>
					<th>Observations</th>
					<th>Vitals Information</th>
					<th>Symptoms Recorded</th>
					<th>Prescriptions Recommended</th>
				</tr>";
			//Getting the data from the database row by row
			while($row=$this->fetch()){
				echo "<tr>
						<td bgcolor='$cellcol[$cur]'>{$row["VID"]}</td>
						<td bgcolor='$cellcol[$cur]'>{$row["DateOfVisit"]}</td>
						<td bgcolor='$cellcol[$cur]'>{$row["PID"]}</td>
						<td bgcolor='$cellcol[$cur]'>{$row["UID"]}</td>
						<td bgcolor='$cellcol[$cur]'>{$row["Observations"]}</td>
						<td bgcolor='$cellcol[$cur]'>{$row["VitalsInfo"]}</td>
						<td bgcolor='$cellcol[$cur]'>{$row["Symptoms"]}</td>
						<td bgcolor='$cellcol[$cur]'>{$row["Prescriptions"]}</td>
					</tr>";
				
				//Alternating row colors
				if($cur==0)
					$cur=1;
				else
					$cur=0;
			}
		}
	}
?>
<?php

		 require 'conn.php';	 
		 
		 $patient_name=$_SERVER['HTTP_PATIENTNAME'];
		 $prefered_time=$_SERVER['HTTP_PREFEREDTIME'];		 
		 $doctorname=$_SERVER['HTTP_NAME'];
		 $user_id=$_SERVER['HTTP_UID'];
		 $doctor_id	=$_SERVER['HTTP_DID'];
		 
		 //$user=$_SERVER['HTTP_USER'];
		 $symptoms=$_SERVER['HTTP_SYMPTOMSNAME'];
		 $bodyPart=$_SERVER['HTTP_BODYNAME'];
		 $username =$_SERVER['HTTP_USERNAME'];
		 
		 $uid=(int)$user_id;
		 $did=(int)$doctor_id;
		
		 $mysql_qry="insert into appoinment (patient_name,prefered_time,doctor_id,user_id) values ('$patient_name','$prefered_time',$did,$uid);";
		 mysqli_query($con,$mysql_qry) or die(mysqli_error($con));
		 
		$mysql_qry2="insert into patient_details (bodypart,symptoms,name) values ('$bodyPart','$symptoms','$username')";
		mysqli_query($con,$mysql_qry2) or die(mysqli_error($con));
		 $con->close();
	
	
	
?> 
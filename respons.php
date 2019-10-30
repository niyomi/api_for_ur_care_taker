<?php

		 require 'conn.php';	 
		 
		 $status=$_SERVER['HTTP_STATUS'];
				 
		 $name=$_SERVER['HTTP_NAME'];
		 
		
		 $mysql_qry="UPDATE appoinment set  status='$status' where patient_name='$name'";
		 $mysql_qry1="UPDATE appoinment set  view='user' where patient_name='$name'";
		 mysqli_query($con,$mysql_qry) or die(mysqli_error($con));
		 mysqli_query($con,$mysql_qry1) or die(mysqli_error($con));
		 
		 
		 $con->close();
	
	
?> 
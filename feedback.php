<?php

		require 'conn.php';
	 
	 
		$bp_id=$_SERVER['HTTP_FEEDBACK']; 
		$name=$_SERVER['HTTP_NAME'];
	 
		$mysql_qry="insert into feedback_details (feedback,name) values ('$bp_id','$name');";
		mysqli_query($con,$mysql_qry) or die(mysqli_error($con));
		
		 
?>
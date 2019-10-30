<?php

     require 'conn.php';
	 
	 
	
		
		
		$sp_id1=$_SERVER['HTTP_SYMPTOMID'];
		$bp_id1=$_SERVER['HTTP_BODYPARTID'];
		$mysql_qry="select * from possibilities where bp_id like '$bp_id1' and symptoms_id like '$sp_id1'";
		$result=mysqli_query($con,$mysql_qry);
		$outp = array();
		$outp = $result->fetch_all(MYSQLI_ASSOC);

		echo json_encode($outp);
?>
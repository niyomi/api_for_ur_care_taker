<?php

     require 'conn.php';
	 
	 
	
		
		
		$bp_id1=$_SERVER['HTTP_BODYPARTID'];
		$sp_id1=$_SERVER['HTTP_SYMPTOMID'];
		
		$mysql_qry="select * from question_details where bp_id like '$bp_id1' and symptoms_id like '$sp_id1'";
		$result=mysqli_query($con,$mysql_qry);
		$outp = array();
		$outp = $result->fetch_all(MYSQLI_ASSOC);

		echo json_encode($outp);
		
?>
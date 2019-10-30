<?php

     require 'conn.php';
	 
	 
		$bp_id=$_SERVER['HTTP_BODYPARTID'];
		
		
		$mysql_qry="select * from symptoms where bp_id like '$bp_id'";
		$result=mysqli_query($con,$mysql_qry);
		
		
		$outp = array();
		$outp = $result->fetch_all(MYSQLI_ASSOC);

		echo json_encode($outp);
		
?>
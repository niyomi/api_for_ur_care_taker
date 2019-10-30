<?php

     require 'conn.php';
	 
	 
	
		$doctor_id=$_SERVER['HTTP_DOCTORID'];
		$did=(int)$doctor_id;
		$mysql_qry="select * from appoinment where doctor_id like $did AND view is null";
		$result=mysqli_query($con,$mysql_qry);
		$outp =array();
		$outp =$result->fetch_all(MYSQLI_ASSOC);
		$mysql_qry1="update appoinment set view = 'user' where doctor_id like $did";
		mysqli_query($con,$mysql_qry1);
		echo json_encode($outp);
	
?>


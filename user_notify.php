<?php

     require 'conn.php';
	 

		$user_id=$_SERVER['HTTP_USERID'];
		$uid=(int)$user_id;
		$mysql_qry="SELECT * FROM appoinment join doctor on (doctor.doctor_id=appoinment.doctor_id) WHERE appoinment.user_id=$uid AND appoinment.view = 'user'";
		$result=mysqli_query($con,$mysql_qry);
	
		$outp =array();
		$outp =$result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		$result1=mysqli_query($con,$mysql_qry);
		$obj=mysqli_fetch_object($result1);
		$name=$obj->patient_name;
		echo $name;
		$mysql_qry1="UPDATE appoinment set  view='seen' where patient_name='$name'";
		mysqli_query($con,$mysql_qry1) or die(mysqli_error($con));
?>
		
		
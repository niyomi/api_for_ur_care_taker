<?php

     require 'conn.php';
	 
	 
	
		$bp_id=$_SERVER['HTTP_BODYPARTID'];//aiya thi aacomment hatavje
		
		$mysql_qry="select * from doctor join checkup_days on (checkup_days.c_id=doctor.c_id) where sp_id =(select sp_id from bodyparts where bp_id='$bp_id')";
		$result=mysqli_query($con,$mysql_qry) or die(mysqli_error($con));
		$outp =array();
		$outp =$result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		//echo $result;
?>


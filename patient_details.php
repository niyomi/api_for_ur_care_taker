<?php

     require 'conn.php';
	 
	 
	
		$name=$_SERVER['HTTP_NAME'];
		$mysql_qry="select * from patient_details where name like '$name'";
		$result=mysqli_query($con,$mysql_qry);
		$outp =array();
		$outp =$result->fetch_all(MYSQLI_ASSOC);

		echo json_encode($outp);
	
?>


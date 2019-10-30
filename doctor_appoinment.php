<?php

     require 'conn.php';
	 
	 
	
		$doctor_id=$_SERVER['HTTP_DOCTORID'];
		$did=(int)$doctor_id;
		$mysql_qry="select * from appoinment where doctor_id like $did AND status is null";
		$result=mysqli_query($con,$mysql_qry);
		
		$outp =array();
		$outp =$result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
		//echo "Seprate";
		
		//$qry1="select * from appoinment where doctor_id=$did AND view is null";
		//$result1=mysqli_query($con,$qry1);
		//$outv =array();
		//$outv =$result1->fetch_all(MYSQLI_ASSOC);		
		//echo json_encode($outv);
		
		$result1=mysqli_query($con,$mysql_qry);
		$obj=mysqli_fetch_object($result1);
		$view=$obj->view;
		echo $view;
		
		if($view = "null")
		{		
			$mysql_qry1="update appoinment set view = 'doc' where doctor_id like $did";
			mysqli_query($con,$mysql_qry1);
		}
		
		
	
?>


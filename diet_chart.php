<?php

     require 'conn.php';
	 
	 
	
		
	 
		$mysql_qry="select discription from diet_chart ";
		$result=mysqli_query($con,$mysql_qry);
		$outp = array();
		$outp = $result->fetch_all(MYSQLI_ASSOC);

		echo json_encode($outp);
?>
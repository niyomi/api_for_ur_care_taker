<?php

		 require 'conn.php';	 
		 
		
				 
		 $name=$_SERVER['HTTP_USERNAME'];
		 $status=true;
		 
		
		 $mysql_qry="select * from appoinment where user like '$name' and status like '$status'";
		 $result=mysqli_query($con,$mysql_qry);
		 
	 if(mysqli_num_rows($result) > 0)
	 {
		$obj = (object) [
							'status' => 'true'
							
						];

		
		print(json_encode($obj));
		 
	 }
	 else
	 {
		$obj = (object) [
							'status' => 'false'
						];

		print (json_encode($obj));
		 
	 }
		 
		 
		 
		 $con->close();
	
	
?> 
<?php

     require 'conn.php';
	 
	 
	 
	 $user_name=$_SERVER['HTTP_USERNAME'];
	 $user_password=$_SERVER['HTTP_PASSWORD'];
	// $user_type=$_SERVER['HTTP_USERTYPE'];
	 
	
	 
		$mysql_qry="select * from login where username like '$user_name' and password like '$user_password'";
		$result=mysqli_query($con,$mysql_qry);
	 
		while($x = mysqli_fetch_assoc($result))
		{
			$type= $x['user_type'];
			$name= $x['name'];
			$user_id = $x['user_id'];
			$doctor_id = $x['doctor_id'];
		}
		
		$uid=(string)$user_id;
		$did=(string)$doctor_id;
		 
	 if(mysqli_num_rows($result) > 0)
	 {
		$obj = (object) [
							'status' => 'true',
							'userType' => $type,
							'name' => $name,
							'user_id'=>$uid,
							'doctor_id'=>$did
							
						];

		
		print(json_encode($obj));
		 
	 }
	 else
	 {
		$obj = (object) [
							'status' => 'false',
							'userType' => '',
							'name' => '',
							'user_id'=>'',
							'doctor_id'=>''
						];

		print (json_encode($obj));
		 
	 }
		 
?> 
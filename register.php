<?php

     require 'conn.php';
	 
	 
	
		 $name=$_SERVER['HTTP_NAME'];
		 $email=$_SERVER['HTTP_EMAIL'];
		 $gender=$_SERVER['HTTP_GENDER'];
		 $dob=$_SERVER['HTTP_DOB'];
		 $contactno=$_SERVER['HTTP_CONTACTNUMBER'];
		 $address=$_SERVER['HTTP_ADDRESS'];
		 $username=$_SERVER['HTTP_USERNAME'];
		 $password=$_SERVER['HTTP_PASSWORD'];
		 $user_type=$_SERVER['HTTP_USERTYPE'];
		 $user_id="";
		 $mysql_qry2="insert into user (user_name,email,gender,dob,contact_number,address,username,password,user_type)
					values ('$name','$email','$gender','$dob','$contactno','$address','$username','$password','$user_type');";
			$Select = "SELECT user_id FROM user WHERE username='$username'";
			if(mysqli_query($con,$mysql_qry2))
		 {
			 $obj = (object) [
							'status' => 'true',
							'name'=>$name,
							'email'=>$email,
							'gender'=>$gender,
							'dob'=>$dob,
							'contact_number'=>$contactno,
							'address'=>$address,
							'username'=>$username, 
							'user_type'=>$user_type
						];

			echo json_encode($obj);
		 }
		 else
		 {
			$obj = (object) [
							'status' => 'false',
							'name'=>'',
							'email'=>'',
							'gender'=>'',
							'dob'=>'',
							'contact_number'=>'',
							'address'=>'',
							'username'=>'', 
							'user_type'=>''
						];

			echo json_encode($obj);
		 }
			$res=mysqli_query($con,$Select) or die(mysqli_error($con));
			if($x = mysqli_fetch_assoc($res))
			{
				$user_id= $x['user_id'];
			}
			echo $user_id;
		 $mysql_qry1="insert into login(name,username,password,user_type,user_id,doctor_id) values ('$name','$username','$password','$user_type',$user_id,null)" ;
		 mysqli_query($con,$mysql_qry1) or die(mysqli_error($con));
		 
		
	 
	 $con->close();
	
		
	
?> 
<?php

     require 'conn.php';
	 
	 
		 $name=$_SERVER['HTTP_NAME'];
		 $email=$_SERVER['HTTP_EMAIL'];
		 $gender=$_SERVER['HTTP_GENDER'];
		 $dob=$_SERVER['HTTP_DOB'];
		 $username=$_SERVER['HTTP_USERNAME'];
		 $password=$_SERVER['HTTP_PASSWORD'];
		 $contactno=$_SERVER['HTTP_CONTACTNUMBER'];		 
		 $regis_no=$_SERVER['HTTP_REGISNO'];
		 $speciality=$_SERVER['HTTP_SPECIALITY'];
		 $clinic_add=$_SERVER['HTTP_CLINICADD'];
		 $checkup_days=$_SERVER['HTTP_CHECKUPDAYS'];
		 $timings_from=$_SERVER['HTTP_TIMINGSFROM'];
		 $timings_to=$_SERVER['HTTP_TIMINGSTO'];
		 $user_type=$_SERVER['HTTP_USERTYPE'];
		 $user_id="";
		$mysql_qry3="insert into doctor (doctor_name,email,gender,dob,contact_number,username,password,regis_no,sp_id,clinic_address,c_id,timings_from,timings_to,user_type)
					values ('$name','$email','$gender','$dob','$contactno','$username','$password','$regis_no','$speciality','$clinic_add','$checkup_days','$timings_from','$timings_to','$user_type');";
	$Select = "SELECT doctor_id FROM doctor WHERE username='$username'";
		if(mysqli_query($con,$mysql_qry3))
		 {
			$obj = (object) [
								'status' => 'true',
								'name'=>$name,
								'email'=>$email,
								'gender'=>$gender,
								'dob'=>$dob,
								'contact_number'=>$contactno,
								'username'=>$username,
								'regis_no'=>$regis_no,
								'sp_id'=>$speciality,
								'clinic_address'=>$clinic_add,
								'checkup_days'=>$checkup_days,
								'timings_from'=>$timings_from,
								'timings_to'=>$timings_to,
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
							'username'=>'',
							'regis_no'=>'',
							'sp_id'=>'',
							'clinic_address'=>'',
							'checkup_days'=>'',
							'timings_from'=>'',
							'timings_to'=>'',
							'user_type'=>''
						];

			echo json_encode($obj);
		 }
		 $res=mysqli_query($con,$Select) or die(mysqli_error($con));
			if($x = mysqli_fetch_assoc($res))
			{
				$user_id= $x['doctor_id'];
			}
			echo $user_id;
		 $mysql_qry1="insert into login(name,username,password,user_type,user_id,doctor_id) values ('$name','$username','$password','$user_type',null,$user_id)" ;
		 mysqli_query($con,$mysql_qry1) or die(mysqli_error($con));
		
	 
	 $con->close();
	
	
	
?> 
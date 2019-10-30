<?php 
	ini_set('mysql.connect_timeout',300);
	ini_set('default_socket_timeout',300);
	?>
<html>
		<body>
			<form method="post" enctype="multipart/form-data">
			<br/>
				image :<input type="file" name="image"/>
				<input type="text" name="data"/>
				<br/>
				<br/>
				<input type="submit" name="submit" value="upload"/>
				</form>
				<?php
					if(isset($_POST['submit']))
					{
						if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
						{
							echo "please select a iamge";
						}
						else
						{
							$image=addslashes($_FILES['image']['tmp_name']);
							$name=addslashes($_FILES['image'] ['name']);
							$image=file_get_contents($image);
							$image=base64_encode($image);
							$a=$_POST['data'];
							saveimage($name,$image,$a);
						}
						
						
					}
					function saveimage($name,$image,$a)
					{
						@$con=mysql_connect("localhost","root","");
						$b=mysql_select_db("android",$con);
						if($b)
						{
							echo "databse selected";
						}
						else
						{
							echo "database not selected";
						}
						$qry="insert into diet_chart (image_name,image,discription) values ('$name','$image','$a')";
						$result=mysql_query($qry,$con);
						if($result)
						{
							echo "image uploded";
						}
						else
						{
							echo "image not uploded";
						}
					}
				?>
		</body>
</html>		
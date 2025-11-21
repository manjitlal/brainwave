
<?php

 require 'database/db_connection.php';


if(isset($_POST['regd'])&&isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['mobile'])&&isset($_POST['password'])){
	$rg=htmlspecialchars($_POST['regd']);
	$nm=htmlspecialchars($_POST['name']);
	$em=htmlspecialchars($_POST['email']);
	$mb=htmlspecialchars($_POST['mobile']);
	$pw=htmlspecialchars($_POST['password']); 


	if(!empty($rg)&&!empty($nm)&&!empty($em)&&!empty($mb)&&!empty($pw)){
		if(strlen($rg)==10&&strlen($mb)==10&&strlen($pw)<=20){
			$query = "select regd from user_details where regd='".$rg."'";
			$result = mysqli_query($con,$query); 
			$num_rows=mysqli_num_rows($result);
			if($num_rows>0){
				echo "User already exists";
			}
			else{
				$sql="insert into user_details(regd,name,email,mobile,password) values('".mysqli_real_escape_string($con,$rg)."','".mysqli_real_escape_string($con,$nm)."','".mysqli_real_escape_string($con,$em)."','".mysqli_real_escape_string($con,$mb)."','".mysqli_real_escape_string($con,$pw)."')";
				$sql_result=mysqli_query($con,$sql);
				if($sql_result)
					echo "YES";
				else
					echo "Unable to register.Try again";
			}
		}
		else
			echo "Character limit exceed in the input";
	}
	else
		echo "Please fill all the values";
}

mysqli_close($con);
?>
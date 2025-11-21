<?php
	require 'database/db_connection.php';
	session_start();	
	if(isset($_POST['regd'])&&isset($_POST['password'])&&isset($_POST['passkey'])){
		$query="select p from passkey";
		$result=mysqli_query($con,$query);
		if($row=mysqli_fetch_assoc($result)){
			$passkey=$row['p'];
		}

		$rg=htmlspecialchars($_POST['regd']);
		$pw=htmlspecialchars($_POST['password']);
		$pkey=htmlspecialchars($_POST['passkey']);
		
		if(!empty($rg)&&!empty($pw)&&!empty($pkey)){
			
			if($pkey===$passkey){
				
				if(strlen($rg)==10&&strlen($pw)<=20){
					
					$query="select regd, name from user_details where regd='".mysqli_real_escape_string($con,$rg)."' and password='".mysqli_real_escape_string($con,$pw)."' ";
					$result=mysqli_query($con,$query);
					$num_rows=mysqli_num_rows($result);
					if($num_rows==1){
						$data=mysqli_fetch_assoc($result);
						$_SESSION['id']=$data['regd'];
						$_SESSION['name']=$data['name'];
						echo "YES";
						//header('Location: home.php');
						//exit();						
					}
					else if($num_rows>1){
						echo "You are back traced dude......See you in Tihar jail....";						
					}
					else{
						echo "User doesn't exists.Try again";
					}
				}
				else{
					echo "Something Went Wrong. Try again";					
				}
			}
			else{
				echo "Wrong Passkey....";
			}
		}
		else{
			echo "Please fill all the fields";
		}
	}
	else{
		echo "No value Given";
	}
	mysqli_close($con);
?>
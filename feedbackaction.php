<?php
require 'database/db_connection.php';
session_start();
if(isset($_POST['feedback'])){
	$fd=htmlspecialchars($_POST['feedback']);
	if(!empty($fd)){
		$query="insert into feedback_details(regd,feedback) values('".$_SESSION['id']."','".mysqli_real_escape_string($con,$fd)."')";
		$result=mysqli_query($con,$query);
		if($result){
			$_SESSION['feedback-message']="Feedback Successfully Submitted";
		}
		else
			$_SESSION['feedback-message']="Unable to Submit";
	}
	else
		$_SESSION['feedback-message']="Please fill the feedback form";
}
header('Location: feedback.php');
mysqli_close($con);
?>
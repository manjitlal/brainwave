<?php
session_start();
require 'database/db_connection.php';
unset($_SESSION['refresh_round_1']);
if(isset($_POST['round1_answer'])){
	
	$r1_ans=htmlspecialchars($_POST['round1_answer']);
	$question_no=htmlspecialchars($_POST['q_id']);
	$time=htmlspecialchars($_POST['time']);
	if(empty($r1_ans)){
		$r1_ans="N/A";
	}
	$query1="insert into round_1_answer(regd,q_id,answer,time) values('".mysql_real_escape_string($_SESSION['id'])."','".mysql_real_escape_string($question_no)."','".mysql_real_escape_string($r1_ans)."','".mysql_real_escape_string($time)."')";
	$result1=mysqli_query($con,$query1);
	if($result1){
		$_SESSION['round-1-message']="Your answer has been submitted";
		$query = "INSERT INTO `scoreboard` VALUES ('".$_SESSION['id']."')";
		if(!mysqli_query($con, $query)) {
			echo 'Crap!';
		}
	}
	else
		$_SESSION['round-1-message']="Unable to submit this";
}
else
echo "string";
?>
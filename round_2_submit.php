<?php
session_start();
require 'database/db_connection.php';
unset($_SESSION['refresh_round_2']);
if(isset($_POST['round2_answer'])){
	$r2_ans=htmlspecialchars($_POST['round2_answer']);
	$question_no=htmlspecialchars($_POST['q_id']);
	$time=htmlspecialchars($_POST['time']);
	if(empty($r2_ans)){
		$r2_ans="N/A";
	}

	$query1="insert into round_2_answer(regd,q_id,answer,time) values('".mysql_real_escape_string($_SESSION['id'])."','".mysql_real_escape_string($question_no)."','".mysql_real_escape_string($r2_ans)."','".mysql_real_escape_string($time)."')";
	$result1=mysqli_query($con,$query1);
	if($result1){
		$_SESSION['round-2-message']="Your answer has been submitted";
	}
	else
		$_SESSION['round-2-message']="Unable to submit this";
}

?>
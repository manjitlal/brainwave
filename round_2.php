<?php
	if(!isset($_SERVER['HTTP_REFERER'])){
		header('Location: logout.php');
	}
	if(isset($_SERVER['HTTP_REFERER'])){
		if($_SERVER['HTTP_REFERER']=='http://192.168.43.96/brainwavetest/test.php')
		{}
		else
			header('Location: test.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Round 2</title>
	<link rel="shortcut icon" href="img/boy4.png" type="image/png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/disabled.js"></script>
</head>
<body>
<?php include 'header_rounds.php';?>
<?php
require 'database/db_connection.php';
$q_no=rand(1,10);
$query="select * from round_2_question where r2_id='".$q_no."' ";
$result=mysqli_query($con,$query);
if($row=mysqli_fetch_assoc($result)){
	$question_no=$row['R2_id'];
	$question=$row['Question'];
}

// if(isset($_POST['round2_answer'])){
// 	$r2_ans=htmlspecialchars($_POST['round2_answer']);
// 	if(empty($r2_ans)){
// 		$r2_ans="N/A";
// 	}

// 	$query1="insert into round_2_answer(regd,q_id,answer,time) values('".mysql_real_escape_string($_SESSION['id'])."','".mysql_real_escape_string($question_no)."','".mysql_real_escape_string($r2_ans)."',)";
// 	$result1=mysqli_query($con,$query1);
// 	if($result1){
// 		$_SESSION['round-2-message']="Your answer has been submitted successfully. You will get an email if you are qualified for the next round.";
// 	}
// 	else
// 		$_SESSION['round-2-message']="Unable to submit this";

// 	header('Location: test.php');
// }

if(isset($_SESSION['refresh_round_2'])){
		$_SESSION['refresh_round_2']=$_SESSION['refresh_round_2']+1;
		if($_SESSION['refresh_round_2']>=2){
			$query2="insert into round_2_answer(regd,answer) values('".$_SESSION['id']."','N/A')";
			$result2=mysqli_query($con,$query2);
			if($result2){
				$_SESSION['round-2-message']="You have refreshed your page. Answer Submitted. ";
			}
			header('Location: test.php');
		}
		
}


mysqli_close($con);
?>
<div class="container-fluid custom-container font-custom">
	<div class="row custom-row pad-10">
		<div>
			<img src="img/code.png" width="60" style="float: left; clear: left; margin: 5px 10px;">
			<span class="text-center text40"> 
				Code Jumbling <span style="font-size: 20px;">(Do not refresh this page or press back button.)</span>
			</span>
			<div  class="pull-right text20">
				Time Left<br>
				<span id="timer" style="font-size: 25px; font-family:'Algerian'; ">10:00</span>
			</div>
		</div>
	</div>
	<div class="row custom-row pad-10">
		<div id="question" style="text-align: center; padding: 20px;">
		<span style="font-size: 30px; text-decoration: underline;">Question</span><br><br>
			<div style="max-width: 300px; text-align: center; margin: 0px auto;">
			<?php 
				if(isset($question_no)) echo $question;
			?>
			</div>
		</div>	
		<form id="round-2-form" >
			<input type="hidden" name="q_id" value="<?php echo $question_no?> ;">
			<input type="hidden" name="time" value="">
			<textarea cols="120" rows="15" name="round2_answer" class="form-control" placeholder="Write Answer Here" required></textarea>
			<center><input type="submit" value="Submit" class="btn btn-danger form-control"></center>
		</form>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	var timeoutHandle;
	var current_minutes=0;
	var mins=0;
	var seconds=60;
	var totalTime=1800;
	var time=0;
	var init_time = 30;

	function autoSubmit(){
		$(window).unbind("beforeunload");
		$.ajax({
			url : "round_2_submit.php",
			type : "POST",
			cache : false,
			async : false,
			data : $('form[id="round-2-form"]').serialize(),
			success : function(response){
				window.location.href="test.php";
			}
		});
	}

	$('form[id="round-2-form"]').submit(function(e){
		e.preventDefault();
	
		// time=(totalTime-(mins*seconds))/30;
		secondsPassed = 60 - seconds;
		minutesPassed = init_time - mins;
		timePassed = minutesPassed * 60 + secondsPassed;
		
	    $('form[id="round-2-form"] input[name="time"]').val(timePassed);
		autoSubmit();
	});
	
	function countdown(minutes) {
	     seconds = 60;
	     mins = minutes;
	    function tick() {
	        var counter = document.getElementById("timer");
	        current_minutes = mins-1;
	        seconds--;
	        counter.innerHTML = current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
	        if( seconds > 0 ) {
	            timeoutHandle=setTimeout(tick, 1000);
	        } else {

	            if(mins > 1){

	               // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
	               setTimeout(function () { countdown(mins - 1); }, 1000);

	            }
	            else{
	            	// time=(totalTime-(mins*seconds))/30;
	            	$('form[id="round-2-form"] input[name="time"]').val(1800);
	            	setTimeout(autoSubmit,1000);
	            }
	        }
	    }
	    tick();
	}

	countdown(init_time);

	$(window).bind("beforeunload",function(){
		return 1;
	});
});
</script>
</body>
</html>
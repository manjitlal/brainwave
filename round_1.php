<?php
	if(!isset($_SERVER['HTTP_REFERER'])){
		header('Location: logout.php');
	}
	session_start();
	if(isset($_SERVER['HTTP_REFERER'])){
		if($_SERVER['HTTP_REFERER']=="http://192.168.43.96/brainwavetest/test.php")
		{}
		else{
			$_SESSION['round-1-message']=$_SERVER['HTTP_REFERER'];
			header('Location: test.php');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Round 1</title>
	<link rel="shortcut icon" href="img/boy4.png" type="image/png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" href="../compiled/flipclock.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/disabled.js"></script>
	<script src="../compiled/flipclock.js"></script>	
</head>
<body>
<?php include 'header_rounds.php';?>
<?php
require 'database/db_connection.php';
$q_no=rand(1,20);
$query="select * from round_1_question where r1_id='".$q_no."' ";
$result=mysqli_query($con,$query);
if($row=mysqli_fetch_assoc($result)){
	$question_no=$row['R1_id'];
	$question=$row['Question'];
}

// if(isset($_POST['round1_answer'])){
// 	$r1_ans=htmlspecialchars($_POST['round1_answer']);
// 	$query1="insert into round_1_answer(regd,q_id,answer,time) values('".mysql_real_escape_string($_SESSION['id'])."','".mysql_real_escape_string($question_no)."','".mysql_real_escape_string($r1_ans)."','30')";
// 	$result1=mysqli_query($con,$query1);
// 	if($result1){
// 		$_SESSION['round-1-message']="Your answer has submitted successfully. You will get an email if you are qualified for the next round.";
// 	}
// 	else
// 		$_SESSION['round-1-message']="Unable to submit this";
	
// 	header('Location: test.php');
// }

if(isset($_SESSION['refresh_round_1'])){
	$_SESSION['refresh_round_1']=$_SESSION['refresh_round_1']+1;
	if($_SESSION['refresh_round_1']>=2){
		$query3="insert into round_1_answer(regd,answer) values('".$_SESSION['id']."','N/A')";
		$result3=mysqli_query($con,$query3);
		if($result3){
			$_SESSION['round-1-message']="You have left or refresh the page.Your answer has been submitted.";
		}
		header('Location: test.php');
	}
}

mysqli_close($con);


	
?>
<div class="container-fluid custom-container font-custom">
	<div class="row custom-row pad-10">
		<div>
			<img src="img/chat.png" width="50" style="float: left; clear: left; margin: 5px 10px;">
			<span class="text-center text40"> 
				Chatter Box <span style="font-size: 20px;">(Do not refresh this page or press back button.)</span>
			</span>
			<div  class="pull-right text20">
				Time Left<br>
				<span id="timer" style="font-size: 25px; font-family:'Algerian'; ">10:00</span>
			</div>
		</div>
	</div>
	<div class="row custom-row pad-10 font-custom">
		<div id="question" style="text-align: center; padding: 20px;">
		<span style="font-size: 30px; text-decoration: underline;">Question</span><br><br>
			<div style="max-width: 300px; text-align: center; margin: 0px auto;">
			<?php 
				if(isset($question_no)) echo $question;
			?>
			</div>
		</div>	
		<form id="round-1-form" action="round_1.php" method="post">
			<input type="hidden" name="q_id" value="<?php echo $question_no?> ;">
			<input type="hidden" name="time" value="">
			<textarea cols="120" rows="15" name="round1_answer" class="form-control" placeholder="Write Answer Here" required></textarea>
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
	var totalTime=900;
	var time=0;
	var init_time = 15;


	function autoSubmit(){
		$.ajax({
			url : "round_1_submit.php",
			type : "POST",
			cache : false,
			async : false,
			data : $('form[id="round-1-form"]').serialize(),
			success : function(response){
				window.location.href="test.php";
			}
		});
	}

	$('form[id="round-1-form"]').submit(function(e){
		e.preventDefault();
		
		// time=(totalTime-(mins*seconds))/15;
		secondsPassed = 60 - seconds;
		minutesPassed = init_time - mins;
		timePassed = minutesPassed * 60 + secondsPassed;

		$(window).unbind("beforeunload");
	    $('form[id="round-1-form"] input[name="time"]').val(timePassed);
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
	            	// time=(totalTime-(mins*seconds))/15;
	            	$('form[id="round-1-form"] input[name="time"]').val(900);
	            	setTimeout(autoSubmit,1000);
	            }
	        }
	    }
	    tick();
	}

	countdown(init_time);

	$(window).bind("beforeunload", function(e) {
	 	return 1;
	});

});
</script>
</body>
</html>
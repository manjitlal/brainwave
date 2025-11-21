<!DOCTYPE html>
<html>
<head>
	<title>Events-Plcub</title>
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
<?php include 'header.php';?>
<?php
// if(isset($_SESSION['refresh_round_1'])){
// 	if($_SESSION['refresh_round_1']>0){
// 		$_SESSION['refresh_round_1']=2;
// 	}
// }
// if(isset($_SESSION['refresh_round_2'])){
// 	if($_SESSION['refresh_round_2']>0){
// 		$_SESSION['refresh_round_2']=2;
// 	}
// }
// else{
	$_SESSION['refresh_round_1']=0;
	$_SESSION['refresh_round_2']=0;
//}
require 'database/db_connection.php';
$num_rows1=0;
$num_rows2=0;
try{
	$query1="select regd from round_1_answer where regd='".$_SESSION['id']."' ";
	$query2="select regd from round_2_answer where regd='".$_SESSION['id']."' ";
	$result1=mysqli_query($con,$query1);
	$result2=mysqli_query($con,$query2);
	if($result1){
		$num_rows1=mysqli_num_rows($result1);
	}

	if($result2){
		$num_rows2=mysqli_num_rows($result2);
	}

	if(($num_rows1==0)&&($num_rows2==0)){
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#start-1").removeAttr("disabled");
				$("#start-2").prop("disabled",true);
			});
		</script>
		<?php
	}
	else if(($num_rows1==1)&&($num_rows2==0)){
		?>
		<script type="text/javascript">
		$(document).ready(function(){
				$("#start-2").removeAttr("disabled");
				$("#start-1").prop("disabled",true);
				
			});
		</script>
		<?php
	}
	else if(($num_rows1==1)&&($num_rows2==1)){
		?>
		<script type="text/javascript">
		$(document).ready(function(){
				
				$("#start-2").prop("disabled",true);
				$("#start-1").prop("disabled",true);
			});
		</script>
		<?php
	}
	else if(($num_rows1==0)&&($num_rows2==1)){
		?>
		<script type="text/javascript">
		$(document).ready(function(){
				
				$("#start-2").prop("disabled",true);
				$("#start-1").prop("disabled",true);
			});
		</script>
		<?php
	}
}
catch(Exception $ex){
	header('Location:error.php');
}

mysqli_close($con);
?>

<div class="container">
	<h1 class="text-center font-custom">Our Events <hr class="custom-hr" width="200"></h1>
	<div class="row custom-row font-custom"  style="min-height: 300px; " id="events">
		<div class="col-sm-4 pad-10">
			<div class="event">
				<div class="event-image">
					<span class="event-number">1. </span> <img src="img/chat.png" class="img-responsive">
					<h3 class="text-center">Chatter Box</h3>
				</div>
				<div class="event-name">
					<button class="btn btn-danger img-event-name bgcolor-red color-white" id="start-1" disabled="true" onclick="callDetails(1)" >Start</button>
				</div>
			</div>
		</div>
		<div class="col-sm-4 pad-10">
			<div class="event">
				<div class="event-image">
					<span class="event-number">2. </span> <img src="img/code.png" class="img-responsive">
					<h3 class="text-center">Code Jumbling</h3>
				</div>
				<div class="event-name">
					<button class="btn btn-danger img-event-name bgcolor-seagreen color-white" id="start-2" disabled="true"  onclick="callDetails(2)" >Start</button>
				</div>
			</div>
			
		</div>
		<div class="col-sm-4 pad-10">
			<div class="event">
				<div class="event-image">
					<span class="event-number">3. </span> <img src="img/mcq.png" class="img-responsive">
					<h3 class="text-center">QuizBee</h3>
				</div>
				<div class="event-name">
					<button  class="btn btn-danger img-event-name bgcolor-orange color-white" id="start-3" disabled="true"  onclick="callDetails(3)">Start</button>
				</div>
			</div>

		</div>
		<div id="congrats-message" class="text-17 text-center">
		<?php
			if(isset($_SESSION['round-1-message'])){
				echo $_SESSION['round-1-message'];
				echo "<script>
				 $(document).ready(function(){
				 	$('#start-1').prop('disabled',true);
				 });
				</script>";
				unset($_SESSION['round-1-message']);
			}

			if(isset($_SESSION['round-2-message'])){
				echo $_SESSION['round-2-message'];
				echo "<script>
				 $(document).ready(function(){
				 	$('#start-1').prop('disabled',true);
				 	$('#start-2').prop('disabled',true);
				 });
				</script>";
				unset($_SESSION['round-2-message']);
			}

		?>
		</div>
	</div>

	<div class="row custom-row font-custom boxshadow pad-10" id="showDetails-1" hidden="true">
		<center><img src="img/chat.png" width="200"></center>
		<h3 class="text-center">Chatter Box</h3>

		<p> Enough you got scolded at home because of texting and using your phone so much. We are here to reward you on the world’s most trending language “The Texting Shorthand”.  Feel free to say us U instead of YOU.  <br> We provide you a paragraph and participants need to shorten that to earn “credits”. Being compact will earn more and more “credits” and qualify for next round.<br><b> Duration: 10 Minutes</b> </p>
		<br>

		<button class="btn btn-primary center-margin" onclick="redirect('round_1.php');">Take Test</button>

	</div>
	<div class="row custom-row font-custom boxshadow pad-10" id="showDetails-2" hidden="true">
		<center><img src="img/code.png" width="200"></center>
		<h3 class="text-center">Code Jumbling</h3>

		<p> On completion of first level you are upgraded for this level. For this round,you will be given a program totally jumbled in paragraph mode. Try to rearrange the instructions without any IDE to get certain output. Write his/her output after the rearrangement.<br> <b> Duration: 30 Minutes</b>  </p>
		<br>

		<button class="btn btn-primary center-margin" onclick="redirect('round_2.php');">Take Test</button>

	</div>
	<div class="row custom-row font-custom boxshadow pad-10" id="showDetails-3" hidden="true">
		<center><img src="img/mcq.png" width="200"></center>
		<h3 class="text-center">QuizBee</h3>

		<p> This round is a multiple choice based questionnaire covering different areas of computer science. Output questions from C, C++ and applications based on these languages also Data Structure applications will be focussed on designing questions.<br> <b>  Duration : 30 Minutes </b></p>
		<br>

		<button class="btn btn-primary center-margin" onclick="">Take Test</button>
	</div>
	<br>
</div>


<script type="text/javascript">
	function callDetails(num){
		$('#events').hide();
		$('#congrats-message').hide();
		$('#showDetails-'+num).fadeIn("slow");
	}
	function redirect(page){
		window.location.href=page;
	}
</script>
</body>
</html>
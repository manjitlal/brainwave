<!DOCTYPE html>
<html>
<head>
	<title>TechFest-Plcub</title>
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
<?php
session_start();

	if(isset($_SESSION['error'])){

		echo $_SESSION['error'];
		unset( $_SESSION['error']);
	}
?>
	<nav class="navbar navbar-default navbar-fixed-top navbar-custom" id="navbar-custom">
		<div class="container-fluid">
			<div class="navbar-header pull-left" hidden="true" id="navbar-header">
				<a href="" class="navbar-brand" style="margin-top:-10px;">
					<img src="img/pclub_logo.svg" class="img-responsive custom-img" width="60" >
				</a>
			</div>
			
				<ul class="nav navbar-nav pull-right font-custom">
					<li style="padding: 5px;">
						<button class="btn btn-primary font-custom" data-toggle="modal" data-target="#login_register">Login/Register</button>
					</li>
				</ul>
			

		</div>
	</nav>

	<div class="modal fade font-custom" id="login_register" role="dialog" >
		<div class="modal-dialog">
    	    <div class="modal-content custom-modal">
				<div class="modal-body pad-10 " style="min-height: 470px;">
					<h4 class="text-center">Get Started<button class=" close" data-dismiss="modal">&times;</button></h4>				
						<div id="login" style="margin-top:40px;" hidden="true">
						<h3 class="text-center text15">Log Yourself In  <hr class="custom-hr" width="250"></h3>
							<form id="signin" >
								<input type="number" name="regd" maxlength="10" class="form-control" placeholder="Enter University Registeration Number" autocomplete="off" required>
								<input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="off" required>
								<input type="password" name="passkey" class="form-control" placeholder="Enter Passkey" autocomplete="off" required>
								<br>
								<center><input type="submit" value="Login" class="btn btn-danger text15 font-custom"></center>
							</form>
							<br>
							<h3 class="text-center">New User ? <button class="btn btn-primary" onclick="callRegister()">Register</button> </h3>
							<h3 class="text-center" id="login-message"></h3>
						</div>
						<div id="register" >
						<h3 class="text-center text15">Register Yourself with Pclub <hr class="custom-hr" width="250"></h3>
							<form id="signup">
								<input type="number" name="regd" class="form-control" on placeholder="Enter University Registeration Number" autocomplete="off" required>
								<input type="text" name="name" class="form-control" placeholder="Enter Full Name" autocomplete="off" required>
								<input type="email" name="email" class="form-control" placeholder="Enter Email ID" autocomplete="off" required>
								<input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" autocomplete="off" required>
								<input type="password" name="password" class="form-control" placeholder="New Password" autocomplete="off" required>
								<br>
								<center>
									<input type="submit" value="Register" class="btn btn-danger text15 font-custom">
									<img src="img/loader.gif" width="20" hidden="true" id="loader">
								</center>
							</form>
							<br>
							<h3 class="text-center">Already Have An Account ? <button class="btn btn-primary" onclick="callLogin()">Login</button> </h3>
							<h3 class="text-center text15" id="signup-message"></h3>
						</div>
					</div>

				</div>
			</div>
    	</div>
	</div> 
<div class="container-fluid custom-container">
	<div class="row custom-row" style="margin-top:10px; min-height: 600px;">
		<div class="col-md-6 col-md-offset-3">
			<img src="img/pclub_logo.svg" class="img-responsive ">
			<h2 class="text-center no-margin">Presents</h2>
			<br>
		</div>
		<center><img src="img/brainwave.png" class="img-responsive "></center>
	</div>	

	<div class="container-fluid custom-container">
	<div class="row custom-row font-custom"  style="min-height: 300px; " id="events">
		<div class="col-sm-3">
			<h1 class="text-center">Our Events<hr class="custom-hr" width="250"></h1>
			<p class="text-17">The purpose of organizing this event is just to make you comfortable with your knowledge and chance to use it. If you have knowledge, then show us and we will reward you with the prize<br><br>
			<center><b style="font-style: italic; font-size: 20px;">1st Prize:- Rs 2000/-<br>2nd Prize:- Rs 1000/-</b></center>
			</p>
		</div>
		<div class="col-sm-3 pad-10">
			<div class="event">
				<div class="event-image">
					<span class="event-number">1. </span> <img src="img/chat.png" class="img-responsive" >
				</div>
				<div class="event-name">
					<button class="img-event-name bgcolor-red">CHATTER BOX</button>
				</div>
			</div>
		</div>
		<div class="col-sm-3 pad-10">
			<div class="event">
				<div class="event-image">
					<span class="event-number">2. </span> <img src="img/code.png" class="img-responsive" >
				</div>
				<div class="event-name">
					<button class="img-event-name bgcolor-seagreen">CODE JUMBLING</button>
				</div>
			</div>
			
		</div>
		<div class="col-sm-3 pad-10">
			<div class="event">
				<div class="event-image">
					<span class="event-number">3. </span> <img src="img/mcq.png" class="img-responsive">
				</div>
				<div class="event-name">
					<button class="img-event-name bgcolor-orange">QUIZBEE</button>
				</div>
			</div>
		</div>
	</div>

	<div class="row custom-row pad-10" id="contact" style="background-color: rgba(220, 220, 53, 0.8);margin-bottom: 20px; margin-top: 20px;">
		<div class="col-sm-4 pad-10 eat-code-sleep">
			<img src="img/eat.png" class="img-responsive center-margin50 img-icon" width="100">
			<img src="img/imgeat.png" class="img-responsive center-margin" width="100">
		</div>
		<div class="col-sm-4 pad-10 eat-code-sleep">
			<img src="img/code1.png" class="img-responsive center-margin50 img-icon" width="100">
			<img src="img/imgcode.png" class="img-responsive center-margin" width="100">
		</div>
		<div class="col-sm-4 pad-10 eat-code-sleep">
			<img src="img/sleep.png" class="img-responsive center-margin50 img-icon" width="100">
			<img src="img/imgsleep.png" class="img-responsive center-margin" width="100">
		</div>
	</div>

	<div class="row custom-row pad-10 font-custom" id="contact" style="background-color: rgba(0,0,0,0.9);margin-bottom: 20px; min-height: 300px; margin-top: 20px; ">

		<div class="col-sm-6">
				<img src="img/tat_logo.png">
 				
 				<br><br><br>
				<ul style="list-style: none; color: floralwhite;">
					<li class="text-17 underline-text">
						Faculty Co-ordinators
						<br>
					</li>
					<li class="text13">
						» Asst. Prof. Rahul Ranjan [943792060]
					</li>
					<li class="text13">
						» Asst. Prof. Sudhansu Ranjan Lenka [9937245866] 
					</li>
				</ul>
				<br><br>
				<ul style="list-style: none; color: floralwhite;">
					<li class="text-17 underline-text">
						Student Co-ordinators
						<br>
					</li>
					<li class="text13">
						» Rishabh Kumar [7205530238] 
					</li>
					<li class="text13">
						» Manjit Lal [7749995609] 
					</li>
					<li class="text13">
						» Sarvesh Pathak [9439080490] 
					</li>
					<li class="text13">
						» Satyabrata Moohanty [8895834076] 
					</li>
					<li class="text13">
						» Rishav Kumar [8434635752] 
					</li>
					<li class="text13">
						» Abhisek Kumar Singh [9937493338] 
					</li>
				</ul>

		</div>
		<div class="col-sm-6">
			<img src="img/boy4.png" class="img-responsive center-margin" width="300">
		</div>
		
	</div>
	
	<img src="img/arrow.png" width="50" class="down-img" id="img">
	<div class="footer"><h3 class="font-custom text15  text-center">Copyright @ Programming Club</h3></div>
</div>
<script type="text/javascript">
	function callRegister(){
		$('#signup-message').hide().html("");
		$('login-message').hide().html("");
		$('#login').hide();
		$('#register').fadeIn("slow");
		$('#login,#register').trigger("reset");
	}
	function callLogin(){
		$('#signup-message').hide().html("");
		$('login-message').hide().html("");
		$('#register').hide();
		$('#login').fadeIn("slow");
		$('#login,#register').trigger("reset");
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		pagescroll();
		$(window).scroll(function(){
			pagescroll();
		});

		 function pagescroll(){
		 	var scrolltop=$(window).scrollTop();
			if(scrolltop>200){
				$('#navbar-custom').css({
											"background":"linear-gradient(-20deg,khaki 10%,floralwhite 50%,skyblue 90%)",
											"transition":"650ms",
											"box-shadow":"1px 1px 1px rgba(0,0,0,0.6)"
										});
				$('#navbar-header').fadeIn();
				$('#img').fadeOut();
			}
			else{
				$('#navbar-custom').css({
											"background":"transparent",
											"transition":"650ms",
											"box-shadow":"none"
										});
				$('#navbar-header').fadeOut();
				$('#img').fadeIn();
			}
		 }

		 $('#img').on("click",function(){
		 	$('html body').animate({scrollTop:$('#events').offset().top-60},900);
		 });

		 $('form[id="signin"]').submit(function(e){
		 	e.preventDefault();
		 	$('#login-message').html("");
		 	var r=$('form[id="signin"] input[name="regd"]').val();
			var regr=/^[0-9]{10}$/;

			if(!regr.test(r)){
				$('#login-message').show().html("Invalid Registration Number.");
			}
			else{
				$.ajax({
					url : "loginaction.php",
					type : "POST",
					cache : false,
					async : false,
					data : $('form[id="signin"]').serialize(),
					beforeSend : function(){
						$('form[id="signin"] input[type="submit"]').val("Checking....").prop("disabled",true);
					},
					success : function(response){
						$('form[id="signin"] input[type="submit"]').val("Login").removeAttr("disabled");

						if($.trim(response)=="YES"){
							window.location.href="home.php";
						}
						else{
							$('form[id="signin"] input[name="password"],form[id="signin"] input[name="passkey"]').val("");
							$('form[id="signin"] input[name="password"]').focus();
							$('#login-message').html(response);
						}
					},
					error : function(error){
						alert(error);
					}
				});
			}

		 });



		 $('form[id="signup"]').submit(function(e){
			$('#signup-message').html("");
			e.preventDefault();
			var count=0;
			var r=$('form[id="signup"] input[name="regd"]').val();
			var regr=/^[0-9]{10}$/;

			var nm=$('form[id="signup"] input[name="name"]').val();
			var regnm=/[^a-zA-Z ]/;

			var em=$('form[id="signup"] input[name="email"]').val();
			var regem = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

			var mb=$('form[id="signup"] input[name="mobile"]').val();
			var regmb=/^[0-9]{10}$/;

			if(!regr.test(r)){
				$('#signup-message').html("Please Enter valid registration number").show();
				count=0;
			}
			else if(!regem.test(em)){
				$('#signup-message').html("Please Enter valid email id").show();
				count=0;
			}
			else if(!regmb.test(mb)){
				$('#signup-message').html("Please Enter valid mobile number").show();
				count=0;
			}
			else if(regnm.test(nm)){
				$('#signup-message').html("Please Enter valid Name").show();
				count=0;
			}
			else{
				
				$.ajax({
					url : "signupaction.php",
					type : "POST",
					cache : false,
					async : false,
					data : $('form[id="signup"]').serialize(),
					beforeSend : function(){
						$('#loader').show();
					},
					success : function(response){
						$('#loader').hide();
						if($.trim(response)=="YES"){
							$('#signup-message').html("You are successfully registered").show();
							$('form[id="signup"]').trigger("reset");
						}
						else{
							$('#signup-message').html(response).show();
						}

					},
					error : function(error){
						alert(error);
					}
				});
			}
		});


	});
</script>
</body>
</html>
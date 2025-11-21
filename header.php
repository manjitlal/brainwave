<?php
session_start();
	if(!isset($_SESSION['id'])){
		header('Location: index.php');
	}
?>

<nav class="navbar navbar-default navbar-fixed-top font-custom navbar-custom1">
	<div class="container-fluid">
		<div class="navbar-header pull-left">
		<span class="visible-xs visible-sm" id="nav-toggle"><span></span></span>
			<a href="" class="navbar-brand" style="margin-top:-10px;">
				<img src="img/pclub_logo.svg" class="img-responsive custom-img hidden-xs hidden-sm" width="80">
				<span class="visible-xs visible-sm color-black" style="margin-left: 30px; margin-top: 15px;">PClub</span>
			</a>
		</div>
		
			<ul class="nav navbar-nav pull-right font-custom">
				<li style="padding: 5px;">
					<a class="color-black text14" style="color: #000;">Welcome, <?php if(isset($_SESSION['name'])) echo $_SESSION['name'];?></a>
				</li>
			</ul>
	</div>
</nav>

<div id="cssmenu">
	<ul>
		<li><a href="leatherboard.php">Leaderborad</a></li>
		<li><a href="test.php">Take Assessment</a></li>
		<li><a href="feedback.php">Feedback</a></li>
		<li><a href="logout.php">Signout</a></li>
	</ul>
</div>

<script type="text/javascript">
	document.querySelector( "#nav-toggle" )
	  .addEventListener( "click", function() {
	    this.classList.toggle( "active" );
	    $("#cssmenu").toggleClass("menuShow");
	  });
</script>


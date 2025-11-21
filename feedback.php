<!DOCTYPE html>
<html>
<head>
	<title>Feedback-Pclub</title>
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

<div class="container">
	<h1 class="text-center font-custom">Feedback <hr class="custom-hr" width="200"></h1>
	<form style="margin: 10px auto;" id="feedback-form" action="feedbackaction.php" method="post">
		<textarea name="feedback" cols="100" rows="15" class="form-control center-margin" placeholder="Write Feedback Here" required></textarea>
		<center><input type="submit" value="Submit" class="btn btn-danger form-control"></center>
	</form>
	
	<h3 class="text-center">
		<?php
			if(isset($_SESSION['feedback-message'])){
				echo $_SESSION['feedback-message'];
				unset($_SESSION['feedback-message']);
			}
		?>
	</h3>

</div>

</body>
</html>
<?php
	session_start();
	include 'connect.php';
	if(!isset($_SESSION['mode'])) {
		header('Location: index.php');
	}

	if(isset($_POST['passkey'])) {
		$passkey = htmlspecialchars($_POST['passkey']);
		if(!empty($passkey)) {
			$query_p_key = "SELECT `p` FROM `passkey` WHERE 1";
			$query_p_key_result = mysqli_query($con, $query_p_key);
			while($row = mysqli_fetch_assoc($query_p_key_result)) {
				$p_key = $row['p'];
			}
			$query_pkey = "UPDATE `passkey` SET `p` = '".mysqli_real_escape_string($con, $passkey)."' WHERE `p` = '".mysqli_real_escape_string($con, $p_key)."'";
			if(mysqli_query($con, $query_pkey)) {
				// echo 'Success';
			} else {
				// echo 'Failure';
			}
		} else {
			echo 'Passkey cannot be empty.';
		}
	}
	$query = "SELECT `p` FROM `passkey` WHERE 1";
	$query_result = mysqli_query($con, $query);
	while($row = mysqli_fetch_assoc($query_result)) {
		$pkey = $row['p'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Passkey</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div>
		<div><h1 class="text-primary text-center">Current Passkey: <?php if(isset($pkey)) echo $pkey; ?></h1></div>
		<div style="text-align: center;">
			<form action="passkey.php" method="POST">
				<input type="text" maxlength="10" name="passkey"/>
				<button type="submit" class="btn btn-success">Update</button>
			</form>
		</div>
	</div>
</body>
</html>
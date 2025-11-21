<?php
	session_start();
	include 'connect.php';
	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
		if(!empty($username) && !empty($password)) {
			$username_length = strlen($username);
			$password_length = strlen($password);
			if($username_length <= 20 && $username_length <= 20) {
				if($username == 'admin' && $password == 'udayan2k17Brainwave') {
					$_SESSION['mode'] = "allow";
					header('Location: panel.php');
				}
			} else {
				echo '<script type="text/javascript">
						alert("Max fields length excedded.");
					</script>';
			}
		} else {
			echo '<script type="text/javascript">
					alert("All fields are required.");
				</script>';
		}
	}

	if(isset($_SESSION['mode'])) {
		header('Location: panel.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="utf-8" />
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
		div {
			width: 100%;
			margin-top: 5%;
		}
		input {
			padding: 10px;
			font-size: 16px;
		}
		label {
			font-size: 16px;
		}
	</style>
</head>
<body>
	<h1 class="text-primary text-center">Welcome Admin</h1>
	<div class="text-center">
		<form action="index.php" method="POST">
			<label class="text-primary">Username : </label>
			<input type="text" name="username" maxlength="20" class="text-warning"
				value="<?php if(isset($username)) echo $username; ?>"/>
			<br /><br />
			<label class="text-primary">Password : </label>
			<input type="password" name="password" maxlength="20" class="text-warning" />
			<br /><br />
			<button type="submit" class="btn btn-success">Login</button>
		</form>
	</div>
</body>
</html>

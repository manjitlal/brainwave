<?php
	$mysqli_host = 'localhost';
	$mysqli_user = 'root';
	$mysqli_password = '';
	$mysqli_db = 'brainwave_database';
	$con = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_password, $mysqli_db);

	if(!$con) {
		$_SESSION['error'] = 'Your connection to the server database failed.';
		header('Location: error.php');
	}
?>
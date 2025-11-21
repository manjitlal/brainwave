<?php
	$dbservername="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="brainwave_database";
	$con=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

	if(!$con){
		die("Connection Failed. Error :- " . mysqli_connect_error());
	}
?>
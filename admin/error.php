<?php
	session_start();
	if(isset($_SESSION['error']) && !empty($_SESSION['error'])) {
		echo $_SESSION['error'];
	}
	session_destroy();
?>
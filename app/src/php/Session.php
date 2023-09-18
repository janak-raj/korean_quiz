<?php
	
	session_start();
	$path = "Location: ../../few/app/auth/authentication";

	if (empty($_SESSION['user_id']) && empty($_SESSION['username'])) {
		header($path);
		exit();
	} else {
		$user_id = $_SESSION['user_id'];
		$username = $_SESSION['username'];
	}
?>
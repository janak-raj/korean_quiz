<?php
	
	session_start();
	$path = "Location: ../../koreanquiz/admin/auth/authentication";

	if (empty($_SESSION['admin_id']) && empty($_SESSION['username'])) {
		header($path);
		exit();
	} else {
		$admin_id = $_SESSION['admin_id'];
		$username = $_SESSION['username'];
	}
?>
<?php
	
	session_start();
	session_unset();
	session_destroy();
    $destroySql = "UPDATE `admin_login_details` SET `userStatus` = 'Expired' WHERE `userId` = '$userId'";
    $destroyExe = mysqli_query($fuse, $destroySql);
	$path = "Location: ../../auth/authentication";
	header($path);

?>
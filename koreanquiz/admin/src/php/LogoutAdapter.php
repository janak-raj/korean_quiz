<?php
	include 'AutoLoader.php';
    
	if (!isset($_GET['aid'])) {
        exit();
    } else {
        $admin_id = $_GET['aid'];
        $set_user_status = "Expired";
        $check_user_status = "Online";
        $path = "Location: ../../auth/authentication";
        $logout = new LogoutModel();
        $logout->amendLogin($adminId, $set_user_status, $check_user_status);
	    
        session_start();
        session_unset();
        session_destroy();
        header($path);
    }

?>
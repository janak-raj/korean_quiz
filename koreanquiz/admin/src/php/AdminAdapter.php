<?php
    include 'AutoLoader.php';
    $path = "Location: ../../add-admin";
    $pathToIndex = "Location: ../../";

    if (!isset($_POST['login']) && !isset($_POST['add-admin']) && !isset($_POST['update-admin'])) {
        exit();
    } else if (isset($_POST['login'])) {

        $email_username = $_POST['username_or_email'];
        $password = $_POST['password'];

        date_default_timezone_set("Asia/Kathmandu");
        $last_login = date("d D-M-Y h:i:s A");

        $login = new LoginController($email_username, $password, $last_login);
        $login->introduceAdmin();

        header($pathToIndex."?msg=logged_in");

    } else if (isset($_POST['add-admin'])) {

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        date_default_timezone_set("Asia/Kathmandu");
        $registration_date = date("d D-M-Y h:i:s A");

        $add_admin = new AdminAddController($fullname, $username, $email, $password, $confirm_password, $registration_date);
        $add_admin->expandAdmin();

        header($path."?msg=admin_added");
    } else if (isset($_POST['update-admin'])) {
        
    } else {
        exit();
    }
?>
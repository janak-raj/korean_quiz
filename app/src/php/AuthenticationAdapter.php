<?php
    include 'AutoLoader.php';
    $pathToIndex = "Location: ../../index.php";
    $path = "Location: ../../auth/registration";

    if (!isset($_POST['signin']) && !isset($_POST['signup'])) {
        exit();
    } else if (isset($_POST['signin'])) {
        $username = $_POST['username_or_email'];
        $password = $_POST['password'];
        date_default_timezone_set("Asia/Kathmandu");
        $login_date = date("d D-M-Y h:i:s A");

        $login = new LoginController($username, $password, $login_date);
        $login->introduceUser();

        header($pathToIndex."?msg=logged_in");
    } else if (isset($_POST['signup'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        date_default_timezone_set("Asia/Kathmandu");
        $registration_date = date("d D-M-Y h:i:s A");

        $signup = new SignupController($fullname, $username, $email, $password, $confirm_password, $registration_date);
        $signup->expandUser();

        header($path."?msg=registered");
    } else {
        exit();
    }
?>
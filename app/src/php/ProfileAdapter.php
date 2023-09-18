<?php
    include 'AutoLoader.php';
    $path = "Location: ../../account-settings";

    if (!isset($_POST['update-profile'])) {
        exit();
    } else {
        $user_id = $_POST['update-profile'];

        $image = $_FILES['img'];
        $image_name = $_FILES['img']['name'];
        $image_type = $_FILES['img']['type'];
        $image_size = $_FILES['img']['size'];
        $image_tmp_name = $_FILES['img']['tmp_name'];

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $country = $_POST['country'];
        $language = $_POST['language'];
        date_default_timezone_set("Asia/Kathmandu");
        $update_date = date("d D-M-Y h:i:s A");
        
        echo $image_tmp_name;
        $update_profile = new ProfileUpdateController($image, $user_id, $image_name, $image_type, $image_size, $image_tmp_name, $fullname, $username, $email, $phonenumber, $address, $state, $zipcode, $country, $language, $update_date);
        $update_profile->expandUser();
        
        //header($path."?msg=updated");
    }
?>
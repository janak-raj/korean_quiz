<?php
    include 'AutoLoader.php';
    $path = "Location: ../../view-user";

    if (!isset($_POST['approve']) && !isset($_POST['unapprove'])) {
        exit();
    } else if (isset($_POST['approve'])) {

        $user_id = $_POST['approve'];
        $status = "Approved";

        $approve_user = new UserValidationModel();
        $approve_user->approveUser($user_id, $status);

        header($path."?uid=".$user_id."&msg=approved");

    } else if (isset($_POST['unapprove'])) {

        $user_id = $_POST['unapprove'];
        $status = "Unapproved";

        $unapprove_user = new UserValidationModel();
        $unapprove_user->unapproveUser($user_id, $status);

        header($path."?uid=".$user_id."&msg=unapproved");

    } else {
        exit();
    }
?>
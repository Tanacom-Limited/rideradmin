<?php
date_default_timezone_set('Africa/Ouagadougou');
session_start();


include("../models/DB.php");

DB::initialize();


include_once '../config/GCM.php';


if ((isset($_POST['titre_notification']) && !empty($_POST['titre_notification']))
    && (isset($_POST['msg_notification']) && !empty($_POST['msg_notification']))) {


    $tmsg = '';
    $terrormsg = '';

    $title = str_replace("'", "\'", $_POST['titre_notification']);
    $msg = str_replace("'", "\'", $_POST['msg_notification']);

    $tab[] = array();
    $tab = explode("\\", $msg);
    $msg_ = "";
    for ($i = 0; $i < count($tab); $i++) {
        $msg_ = $msg_ . "" . $tab[$i];
    }

    $gcm = new GCM();

    $message = array("body" => $msg_, "title" => $title, "sound" => "mySound", "tag" => "all_customers");

    $query = "select * from tbl_user_app where fcm_id<>''";
    $result = mysqli_query(DB::$conn, $query);

    $tokens = array();
    if (mysqli_num_rows($result) > 0) {
        while ($user = $result->fetch_assoc()) {
            if (!empty($user['fcm_id'])) {
                $tokens[] = $user['fcm_id'];
            }
        }
    }
    $temp = array();


    if (count($tokens) > 0) {
        $gcm->send_notification($tokens, $message, $temp);
    }

    $date_heure = date('Y-m-d H:i:s');

    $query = "insert INTO tbl_notification(titre,message,statut,creer) VALUES('$title','$msg','yes','$date_heure')";

    $result = mysqli_query(DB::$conn, $query);


    header('Location: ' . $_SERVER['HTTP_REFERER']);


} else {
    header('Location: ../notification.php');

}


?>
<?php
date_default_timezone_set('Africa/Accra');

require_once('../../models/DB_API.php');

DB_API::initialize();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_POST['id_user'];
    $user_cat = $_POST['user_cat'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $date_heure = date('Y-m-d H:i:s');

    if ($user_cat == "conducteur")
        $updatedata = mysqli_query(DB_API::$conn, "update tbl_driver set latitude='$latitude', longitude='$longitude', modifier='$date_heure' where id=$id_user");

    // if ($updatedata > 0) {
    //     $response['msg']['etat'] = 1;
    //     $response['msg']['email'] = $email;
    // } else {
    //     $response['msg']['etat'] = 2;
    // }

    echo json_encode($response);
    mysqli_close(DB_API::$conn);
}
?>
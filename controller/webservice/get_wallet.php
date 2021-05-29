<?php
date_default_timezone_set('Africa/Accra');

require_once('../../models/DB_API.php');

DB_API::initialize();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_POST['id_user'];
    $cat_user = $_POST['cat_user'];

    if ($cat_user == "user_app") {
        $sql = "SELECT amount FROM tbl_user_app WHERE id=$id_user";
    } else {
        $sql = "SELECT amount FROM tbl_driver WHERE id=$id_user";
    }
    $result = mysqli_query(DB_API::$conn, $sql);

    $amount = "0";
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $amount = $row['amount'];
    }

    if (mysqli_num_rows($result) > 0) {
        $response['msg']['amount'] = $amount;
        $response['msg']['etat'] = 1;
    } else {
        $response['msg']['etat'] = 2;
    }

    echo json_encode($response);
    mysqli_close(DB_API::$conn);
}
?>
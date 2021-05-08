<?php

require_once("../helpers/function.php");


function getDriverById1($id_driver)
{
    $output[] = array();
    $output = getDriverById($id_driver);
    echo json_encode($output);
}

if (isset($_POST['id_driver'])) {

//    print_r($_POST['id_driver']);

    getDriverById1($_POST['id_driver']);
} else {
    header('Location: login.php');
}
?>
<?php
require_once("../helpers/function.php");
function getCountryById1($id_country)
{
    $output[] = array();
    $output = getCountryById($id_country);
    echo json_encode($output);
}

if (isset($_POST['id_country'])) {
    getCountryById1($_POST['id_country']);
} else {
    header('Location: login.php');
}
?>
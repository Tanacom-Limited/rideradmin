<?php
require_once("../helpers/function.php");
function getTypeVehiculeRentalById1($id_type)
{
    $output[] = array();
    $output = getTypeVehiculeRentalById($id_type);
    echo json_encode($output);
}

if (isset($_POST['id_type'])) {
    getTypeVehiculeRentalById1($_POST['id_type']);
} else {
    header('Location: 404erreur.php');
}
?>
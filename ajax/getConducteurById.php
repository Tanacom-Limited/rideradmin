<?php
require_once("../helpers/function.php");
function getConducteurById1($id_conducteur)
{
    $output[] = array();
    $output = getDriverById($id_conducteur);
    echo json_encode($output);
}

if (isset($_POST['id_conducteur'])) {
    getConducteurById1($_POST['id_conducteur']);
} else {
    header('Location: 404erreur.php');
}
?>
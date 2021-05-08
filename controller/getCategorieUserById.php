<?php

require_once("../helpers/function.php");


function getCategorieUserById1($id_categorie)
{
    $output[] = array();
    $output = getCategorieUserById($id_categorie);
    echo json_encode($output);
}

if (isset($_POST['id_categorie'])) {
    getCategorieUserById1($_POST['id_categorie']);
} else {
    header('Location: login.php');
}
?>
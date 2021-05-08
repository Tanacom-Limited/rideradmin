<?php
require_once("../helpers/function.php");
function getEarningStats1($month, $year)
{
    $output[] = array();
    $output = getEarningStats($month, $year);
    echo json_encode($output);
}

if (isset($_POST['month'], $_POST['year'])) {
    getEarningStats1($_POST['month'], $_POST['year']);
} else {
    header('Location: login.php');
}
?>
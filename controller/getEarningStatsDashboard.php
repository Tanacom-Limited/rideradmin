<?php

require_once("../helpers/function.php");

function getEarningStatsDashboard1($year)
{
    $output[] = array();
    $output = getEarningStatsDashboard($year);
    echo json_encode($output);
}

if (isset($_POST['year'])) {
    getEarningStatsDashboard1($_POST['year']);
} else {
    header('Location: login.php');
}
?>
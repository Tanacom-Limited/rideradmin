<?php

require_once("../helpers/function.php");

/*Logout Action*/
if (isset($_GET['logout']) && $_GET['logout'] == 'yes') {
    session_destroy();
    unset($_SESSION['user_info']);
    header('Location: ../views/login.php');
}







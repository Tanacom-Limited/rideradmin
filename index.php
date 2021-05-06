<?php
ob_start();

session_start(); // Start or Resume Session


require('config/config.php');

//Error reporting for debugging during development
if (DEVELOPMENT_MODE == true) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    //errors will not be displayed on the pages but log to files
    if (version_compare(PHP_VERSION, '5.3', '>=')) {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
    } else {
        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
    }
    ini_set('log_errors', 'On');
    ini_set('error_log', 'error.log');
    ini_set('display_errors', '0');


}


if (!empty(DEFAULT_TIMEZONE)) {
    date_default_timezone_set(DEFAULT_TIMEZONE);
}

if (!isset($_SESSION['user_info']) && count($_SESSION['user_info']) == 0) {

    header('Location:views/login.php');

} else {
    $tab_infos_user = $_SESSION['user_info'];

    $id_user = $tab_infos_user['id'];

    header('Location:views/home.php');
}

ob_end_flush();

?>
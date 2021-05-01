<?php
if (isset($_COOKIE['lang'])) {
    switch ($_COOKIE['lang']) {
        case 'en' :
            include("../public/lang/en.php");
            break;

        case 'fr' :
            include("../public/lang/fr.php");
            break;

        default :
            include("../public/lang/en.php");
            break;
    }
} else {
    include("../public/lang/en.php");
}


include("../helpers/function.php");


$tab_settings[] = array();
$tab_settings = getSettings();

$app_name = $tab_settings[0]['title'];
$title = $tab_settings[0]['title'];
$footer = $tab_settings[0]['footer'];

$tab_infos_user[] = array();

$id_user = "";


?>
<?php

require_once("../helpers/function.php");

/*Logout Action*/
if (isset($_GET['logout']) && $_GET['logout'] == 'yes') {
    session_destroy();
    unset($_SESSION['user_info']);
    header('Location: ../views/login.php');
}

/*Activate User Action*/
if ((isset($_GET['id_user_activer']))) {
    enableUser($_GET['id_user_activer']);
    $_SESSION['status'] = 1;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

/*Deactivate User Action*/
if ((isset($_GET['id_user_desactiver']))) {
    disableUser($_GET['id_user_desactiver']);
    $_SESSION['status'] = 1;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

/*Delete User Action*/
if ((isset($_GET['id_user']))) {
    delUser($_GET['id_user']);
    $_SESSION['status'] = 1;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


/* Insert user */
if ((isset($_POST['id_user']) && !empty($_POST['id_user']))
    && (isset($_POST['nom_prenom']) && !empty($_POST['nom_prenom']))
    && (isset($_POST['email']) && !empty($_POST['email']))
    && (isset($_POST['mdp']) && !empty($_POST['mdp']))
    && (isset($_POST['telephone']) && !empty($_POST['telephone']))
    && (isset($_POST['statut']) && !empty($_POST['statut']))
    && (isset($_POST['categorie_user']) && !empty($_POST['categorie_user']))) {
    $res = setUser($_POST['id_user'], $_POST['nom_prenom'], $_POST['email'], $_POST['mdp'], $_POST['statut'], $_POST['telephone'], $_POST['categorie_user']);
    if ($res == 1) {
        $_SESSION['status'] = 1;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['status'] = 2;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}


/*Edit User Action*/
if ((isset($_POST['id_user_mod']) && !empty($_POST['id_user_mod']))
    && (isset($_POST['categorie_user_mod']) && !empty($_POST['categorie_user_mod']))
    && (isset($_POST['nom_prenom_mod']) && !empty($_POST['nom_prenom_mod']))
    && (isset($_POST['telephone_mod']) && !empty($_POST['telephone_mod']))
    && (isset($_POST['email_mod']) && !empty($_POST['email_mod']))
    && (isset($_POST['statut_mod']) && !empty($_POST['statut_mod']))) {
    $res = setUserMod($_POST['id_user_mod'], $_POST['categorie_user_mod'], $_POST['nom_prenom_mod']
        , $_POST['telephone_mod'], $_POST['email_mod'], $_POST['statut_mod']);

    if ($res == 1) {
        $_SESSION['status'] = 1;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['status'] = 2;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }









}







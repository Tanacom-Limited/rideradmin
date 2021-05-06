<?php
session_start(); // Start or Resume Session

date_default_timezone_set('Africa/Accra');

require_once('php_image_magician.php');

include("../models/DB.php");

DB::initialize();


/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////USER FUNCTION///////////////////////////////////////////////

function setUser($id, $nom_prenom, $email, $mdp, $statut, $telephone, $categorie_user)
{

    $res = '0';
    $nom_prenom = str_replace("'", "\'", $nom_prenom);
    $email = str_replace("'", "\'", $email);
    $mdp = str_replace("'", "\'", $mdp);
    $statut = str_replace("'", "\'", $statut);
    $date_heure = date('Y-m-d H:i:s');

    $mdp = md5($mdp);

    $sql_verif = "SELECT id FROM tbl_user WHERE email='$email' AND mdp='$mdp'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tbl_user (id, nom_prenom, email, mdp, creer, statut, telephone, id_categorie_user)
            VALUES ($id,'$nom_prenom', '$email', '$mdp', '$date_heure', '$statut', '$telephone', $categorie_user)";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setUserMod($id, $id_user_cat, $nom_prenom, $phone, $email, $statut)
{

    $res = '0';
    $nom_prenom = str_replace("'", "\'", $nom_prenom);
    $phone = str_replace("'", "\'", $phone);
    $email = str_replace("'", "\'", $email);
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tbl_user SET nom_prenom='$nom_prenom', telephone='$phone', email='$email', statut='$statut', id_categorie_user=$id_user_cat WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getUser()
{

    $sql = "SELECT u.id,u.nom_prenom,u.telephone,u.email,u.statut,u.creer,u.modifier,c.libelle as libCatUser
        FROM tbl_user u, tj_categorie_user c
        WHERE u.id_categorie_user=c.id";

    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }

    //mysqli_close(DB::$conn);
}

function delUser($id)
{

    $sql = "DELETE FROM tbl_user WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function enableUser($id)
{

    $sql = "UPDATE tbl_user SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableUser($id)
{
    $sql = "UPDATE tbl_user SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastUser()
{

    $sql = "SELECT * FROM tbl_user ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }

    mysqli_close(DB::$conn);

}


// Get users from Ajax
function getUserById($id_user)
{

    $sql = "SELECT u.id,u.nom_prenom,u.telephone,u.email,u.statut,u.creer,u.modifier,u.id_categorie_user,c.libelle as libCatUser
        FROM tbl_user u, tj_categorie_user c
        WHERE u.id_categorie_user=c.id AND u.id=$id_user";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }


    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
//    mysqli_close(DB::$conn);

}


/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////


/* Start notification */
function getNotification()
{


    $sql = "SELECT * FROM tj_notification";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function delNotification($id)
{

    $sql = "DELETE FROM tj_notification WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

/* End notification */

/* Start Connexion */
function setConnexion($email, $mdp)
{


    $res = '0';
    $email = str_replace("'", "\'", $email);
    $mdp = str_replace("'", "\'", $mdp);
    $date_heure = date('Y-m-d H:i:s');

    $mdp = md5($mdp);

    $sql_verif = "SELECT u.id,u.nom_prenom,u.telephone,u.email,u.statut,u.creer,u.modifier,c.libelle as libCatUser
        FROM tbl_user u, tj_categorie_user c
        WHERE u.id_categorie_user=c.id AND u.email='$email' AND u.mdp='$mdp' AND u.statut='yes'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result_verif)) {
            $output[] = $row;
        }
        $output['res'] = '1';
    } else {
        $output['res'] = '2';
    }
    //mysqli_close(DB::$conn);
    return $output;
}

/* End Connexion */

/* Start Categorie User */
function setCategorieUser($libelle)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $date_heure = date('Y-m-d H:i:s');

    $sql_verif = "SELECT id FROM tj_categorie_user WHERE libelle='$libelle'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_categorie_user (libelle, creer) VALUES ('$libelle', '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setCategorieUserMod($id, $categorie)
{


    $res = '0';
    $nom_prenom = str_replace("'", "\'", $nom_prenom);
    $telephone = str_replace("'", "\'", $telephone);
    $email = str_replace("'", "\'", $email);
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_categorie_user SET libelle='$categorie' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getCategorieUser()
{

    $sql = "SELECT * FROM tj_categorie_user";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }


    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }

    mysqli_close(DB::$conn);

}

function getCategorieUserById($id_categorie)
{


    $sql = "SELECT * FROM tj_categorie_user WHERE id=$id_categorie";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdCategorieUserByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_categorie_user WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delCategorieUser($id)
{


    $sql = "DELETE FROM tj_categorie_user WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function getLastCategorieUser()
{


    $sql = "SELECT * FROM tj_categorie_user ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* Start Type véhicule */
function setTypeVehicule($libelle, $prix, $image)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $prix = str_replace("'", "\'", $prix);
    $date_heure = date('Y-m-d H:i:s');

    $sql_verif = "SELECT id FROM tj_type_vehicule WHERE libelle='$libelle'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_type_vehicule (libelle, creer, prix, image) VALUES ('$libelle', '$date_heure', '$prix', '$image')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setTypeVehiculeMod($id, $libelle, $prix, $image)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $prix = str_replace("'", "\'", $prix);
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_type_vehicule SET image='$image', libelle='$libelle', prix='$prix', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getTypeVehicule()
{


    $sql = "SELECT * FROM tj_type_vehicule";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getTypeVehiculeById($id_type)
{


    $sql = "SELECT * FROM tj_type_vehicule WHERE id=$id_type";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdTypeVehiculeByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_type_vehicule WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delTypeVehicule($id)
{


    $sql = "DELETE FROM tj_type_vehicule WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function getLastTypeVehicule()
{

    $sql = "SELECT * FROM tj_type_vehicule ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* Start Type véhicule rental */
function setTypeVehiculeRental($libelle, $image)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    // $prix = str_replace("'","\'",$prix);
    $date_heure = date('Y-m-d H:i:s');

    $sql_verif = "SELECT id FROM tj_type_vehicule_rental WHERE libelle='$libelle'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_type_vehicule_rental (libelle, creer, image) VALUES ('$libelle', '$date_heure', '$image')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setTypeVehiculeRentalMod($id, $libelle/*,$prix*/, $image)
{

    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    // $prix = str_replace("'","\'",$prix);
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_type_vehicule_rental SET image='$image', libelle='$libelle', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getTypeVehiculeRental()
{


    $sql = "SELECT * FROM tj_type_vehicule_rental";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getTypeVehiculeRentalById($id_type)
{


    $sql = "SELECT * FROM tj_type_vehicule_rental WHERE id=$id_type";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdTypeVehiculeRentalByLibelle($lib_annee)
{

    $sql = "SELECT id FROM tj_type_vehicule_rental WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delTypeVehiculeRental($id)
{

    $sql = "DELETE FROM tj_type_vehicule_rental WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function getLastTypeVehiculeRental()
{


    $sql = "SELECT * FROM tj_type_vehicule_rental ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* Start Currency */
function setCurrency($libelle, $symbole)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $symbole = str_replace("'", "\'", $symbole);
    $date_heure = date('Y-m-d H:i:s');

    $sql_verif = "SELECT id FROM tj_currency WHERE libelle='$libelle'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_currency (libelle, symbole, statut, creer) 
            VALUES ('$libelle', '$symbole', 'no', '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setCurrencyMod($id, $libelle, $symbole)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $symbole = str_replace("'", "\'", $symbole);
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_currency SET libelle='$libelle', symbole='$symbole', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getCurrency()
{


    $sql = "SELECT * FROM tj_currency";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getEnabledCurrency()
{

    $sql = "SELECT * FROM tj_currency WHERE statut='yes'";
    $result = mysqli_query(DB::$conn, $sql);

    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }

    mysqli_close(DB::$conn);
}

function getCurrencyById($id_type)
{


    $sql = "SELECT * FROM tj_currency WHERE id=$id_type";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdCurrencyByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_currency WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delCurrency($id)
{


    $sql = "DELETE FROM tj_currency WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function getLastCurrency()
{


    $sql = "SELECT * FROM tj_currency ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function enableCurrency($id)
{


    $sql = "UPDATE tj_currency SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    $sql = "UPDATE tj_currency SET statut='no' WHERE id!=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

/* Start Country */
function setCountry($libelle, $code)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $code = str_replace("'", "\'", $code);
    $date_heure = date('Y-m-d H:i:s');

    $sql_verif = "SELECT id FROM tj_country WHERE libelle='$libelle'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_country (libelle, code, statut, creer) 
            VALUES ('$libelle', '$code', 'no', '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setCountryMod($id, $libelle, $code)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $code = str_replace("'", "\'", $code);
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_country SET libelle='$libelle', code='$code', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getCountry()
{


    $sql = "SELECT * FROM tj_country ORDER BY id ASC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getEnabledCountry()
{


    $sql = "SELECT * FROM tj_country WHERE statut='yes'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getCountryById($id_country)
{

    $sql = "SELECT * FROM tj_country WHERE id=$id_country";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdCountryByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_country WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delCountry($id)
{

    $sql = "DELETE FROM tj_country WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function getLastCountry()
{


    $sql = "SELECT * FROM tj_country ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function enableCountry($id)
{

    $sql = "UPDATE tj_country SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    $sql = "UPDATE tj_country SET statut='no' WHERE id!=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

/* Start Commission */
function setCommission($libelle, $value, $type)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $value = str_replace("'", "\'", $value);
    $type = str_replace("'", "\'", $type);
    $date_heure = date('Y-m-d H:i:s');

    $sql_verif = "SELECT id FROM tj_commission WHERE libelle='$libelle'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_commission (libelle, value, statut, creer, type) 
            VALUES ('$libelle', '$value', 'yes', '$date_heure', '$type')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setCommissionMod($id, $libelle, $value, $type)
{

    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $value = str_replace("'", "\'", $value);
    $type = str_replace("'", "\'", $type);
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_commission SET libelle='$libelle', value='$value', modifier='$date_heure', type='$type' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getCommission()
{

    $sql = "SELECT * FROM tj_commission";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getCommissionFixed()
{

    $sql = "SELECT * FROM tj_commission WHERE type='Fixed'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getCommissionPerc()
{

    $sql = "SELECT * FROM tj_commission WHERE type='Percentage'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getEnabledCommission()
{

    $sql = "SELECT * FROM tj_commission WHERE statut='yes'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getCommissionById($id)
{

    $sql = "SELECT * FROM tj_commission WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdCommissionByLibelle($lib_annee)
{

    $sql = "SELECT id FROM tj_commission WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delCommission($id)
{

    $sql = "DELETE FROM tj_commission WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function getLastCommission()
{

    $sql = "SELECT * FROM tj_commission ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function enableCommission($id)
{

    $sql = "UPDATE tj_commission SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableCommission($id)
{

    $sql = "UPDATE tj_commission SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}


/* Start Payment Method */
function setPaymentMethod($libelle, $statut, $image)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $statut = str_replace("'", "\'", $statut);
    $image = str_replace("'", "\'", $image);
    $date_heure = date('Y-m-d H:i:s');

    $sql_verif = "SELECT id FROM tj_payment_method WHERE libelle='$libelle'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_payment_method (libelle, statut, creer, image) 
            VALUES ('$libelle', '$statut', '$date_heure', '$image')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setPaymentMethodMod($id, $libelle, $statut, $image)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $statut = str_replace("'", "\'", $statut);
    $image = str_replace("'", "\'", $image);
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_payment_method SET libelle='$libelle', statut='$statut', modifier='$date_heure', image='$image' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getPaymentMethod()
{

    $sql = "SELECT * FROM tj_payment_method";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getEnabledPaymentMethod()
{


    $sql = "SELECT * FROM tj_payment_method WHERE statut='yes'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getPaymentMethodById($id)
{


    $sql = "SELECT * FROM tj_payment_method WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdPaymentMethodByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_payment_method WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delPaymentMethod($id)
{


    $sql = "DELETE FROM tj_payment_method WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function getLastPaymentMethod()
{

    $sql = "SELECT * FROM tj_payment_method ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function enablePaymentMethod($id)
{


    $sql = "UPDATE tj_payment_method SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disablePaymentMethod($id)
{

    $sql = "UPDATE tj_payment_method SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

/* Start Taxi */
function setTaxi($type_vehicule, $numero, $statut, $immatriculation)
{


    $res = '0';
    $numero = str_replace("'", "\'", $numero);
    $immatriculation = str_replace("'", "\'", $immatriculation);
    $date_heure = date('Y-m-d H:i:s');

    $sql_verif = "SELECT id FROM tj_taxi WHERE numero='$numero'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_taxi (numero, immatriculation, statut, id_type_vehicule, creer) VALUES ('$numero', '$immatriculation', '$statut', $type_vehicule, '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setTaxiMod($id, $type_vehicule, $numero, $immatriculation, $statut)
{


    $res = '0';
    $numero = str_replace("'", "\'", $numero);
    $immatriculation = str_replace("'", "\'", $immatriculation);
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_taxi SET id_type_vehicule='$type_vehicule', numero='$numero', immatriculation='$immatriculation', statut='$statut', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getTaxi()
{

    $sql = "SELECT v.id,v.numero,v.immatriculation,v.statut,v.creer,v.modifier,tv.libelle as libTypeVehicule
        FROM tj_taxi v, tj_type_vehicule tv
        WHERE v.id_type_vehicule=tv.id";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getTaxiById($id_taxi)
{

    $sql = "SELECT * FROM tj_taxi WHERE id=$id_taxi";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdTaxiByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_taxi WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delTaxi($id)
{


    $sql = "DELETE FROM tj_taxi WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableTaxi($id)
{


    $sql = "UPDATE tj_taxi SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableTaxi($id)
{


    $sql = "UPDATE tj_taxi SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastTaxi()
{


    $sql = "SELECT * FROM tj_taxi ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* Start Type Taxi */
function setTypeTaxi($libelle, $image)
{


    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $date_heure = date('Y-m-d H:i:s');

    $sql_verif = "SELECT id FROM tj_taxi_type WHERE libelle='$libelle'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_taxi_type (libelle, image, statut, creer) VALUES ('$libelle', '$image', 'yes', '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setTypeTaxiMod($id, $libelle)
{

    $res = '0';
    $libelle = str_replace("'", "\'", $libelle);
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_taxi_type SET libelle='$libelle', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getTypeTaxi()
{

    $sql = "SELECT * FROM tj_taxi_type";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getTypeTaxiById($id_taxi)
{


    $sql = "SELECT * FROM tj_taxi_type WHERE id=$id_taxi";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdTypeTaxiByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_taxi_type WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delTypeTaxi($id)
{

    $sql = "DELETE FROM tj_taxi_type WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableTypeTaxi($id)
{

    $sql = "UPDATE tj_taxi_type SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableTypeTaxi($id)
{


    $sql = "UPDATE tj_taxi_type SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastTypeTaxi()
{


    $sql = "SELECT * FROM tj_taxi_type ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* Start Véhicule */
function setVehicule($type_vehicule, $statut, $prix, $nb_place, $image, $nombre)
{


    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $sql_verif = "SELECT id FROM tj_vehicule WHERE id_type_vehicule=$type_vehicule";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_vehicule (nombre, statut, prix, nb_place, image, id_type_vehicule, creer)
            VALUES ('$nombre', '$statut', $prix, $nb_place, '$image', $type_vehicule, '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setVehiculeMod($id, $type_vehicule, $statut, $prix, $nb_place, $image, $nombre)
{


    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_vehicule SET id_type_vehicule='$type_vehicule', nombre='$nombre', statut='$statut', prix=$prix, nb_place=$nb_place, image='$image', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getVehicule()
{


    $sql = "SELECT v.id,v.nombre,v.image,v.statut,v.prix,v.nb_place,v.creer,v.modifier,tv.libelle as libTypeVehicule
        FROM tj_vehicule v, tj_type_vehicule tv
        WHERE v.id_type_vehicule=tv.id";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getVehiculeById($id_vehicule)
{


    $sql = "SELECT * FROM tj_vehicule WHERE id=$id_vehicule";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getVehiculeByDriverId($id_driver)
{


    $sql = "SELECT * FROM tj_vehicule WHERE id_conducteur=$id_driver";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdVehiculeByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_vehicule WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delVehicule($id)
{


    $sql = "DELETE FROM tj_vehicule WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableVehicule($id)
{


    $sql = "UPDATE tj_vehicule SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableVehicule($id)
{


    $sql = "UPDATE tj_vehicule SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastVehicule()
{


    $sql = "SELECT * FROM tj_vehicule ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* Start Véhicule Rental */
function setVehiculeRental($type_vehicule, $statut, $prix, $nb_place/*,$image*/, $nombre)
{


    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $sql_verif = "SELECT id FROM tj_vehicule_rental WHERE id_type_vehicule_rental=$type_vehicule";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_vehicule_rental (nombre, statut, prix, nb_place, id_type_vehicule_rental, creer)
            VALUES ('$nombre', '$statut', $prix, $nb_place, $type_vehicule, '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setVehiculeRentalMod($id, $type_vehicule, $statut, $prix, $nb_place/*,$image*/, $nombre)
{


    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_vehicule_rental SET id_type_vehicule_rental='$type_vehicule', nombre='$nombre', statut='$statut', prix=$prix, nb_place=$nb_place, modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getVehiculeRental()
{


    $sql = "SELECT v.id,v.nombre,tv.image,v.statut,v.prix,v.nb_place,v.creer,v.modifier,tv.libelle as libTypeVehicule
        FROM tj_vehicule_rental v, tj_type_vehicule_rental tv
        WHERE v.id_type_vehicule_rental=tv.id";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getVehiculeRentalById($id_vehicule)
{


    $sql = "SELECT * FROM tj_vehicule_rental WHERE id=$id_vehicule";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getVehiculeRentalByDriverId($id_driver)
{


    $sql = "SELECT * FROM tj_vehicule_rental WHERE id_conducteur=$id_driver";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdVehiculeRentalByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_vehicule_rental WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delVehiculeRental($id)
{


    $sql = "DELETE FROM tj_vehicule_rental WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableVehiculeRental($id)
{


    $sql = "UPDATE tj_vehicule_rental SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableVehiculeRental($id)
{


    $sql = "UPDATE tj_vehicule_rental SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastVehiculeRental()
{


    $sql = "SELECT * FROM tj_vehicule_rental ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}


/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////DRIVER FUNCTION ////////////////////////////////////////////////////

function setDriver($nom, $prenom, $cnib, $statut, $login, $mdp)
{

    $res = '0';
    $nom = str_replace("'", "\'", $nom);
    $prenom = str_replace("'", "\'", $prenom);
    $cnib = str_replace("'", "\'", $cnib);
    $login = str_replace("'", "\'", $login);
    $mdp = str_replace("'", "\'", $mdp);
    $date_heure = date('Y-m-d H:i:s');

    $mdp = md5($mdp);

    $sql_verif = "SELECT id FROM tbl_driver WHERE phone='$login' AND mdp='$mdp'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tbl_driver (nom, prenom, cnib, phone, mdp, statut, creer, online) VALUES ('$nom', '$prenom', '$cnib', '$login', '$mdp', '$statut', '$date_heure', 'yes')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setDriverMod($id, $nom, $prenom, $cnib, $login, $statut)
{


    $res = '0';
    $nom = str_replace("'", "\'", $nom);
    $prenom = str_replace("'", "\'", $prenom);
    $cnib = str_replace("'", "\'", $cnib);
    $login = str_replace("'", "\'", $login);
    $statut = str_replace("'", "\'", $statut);
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tbl_driver SET nom='$nom', prenom='$prenom', cnib='$cnib', phone='$login', statut='$statut', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getDriver()
{
    $sql = "SELECT * FROM tbl_driver";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getDriverDisabled()
{

    $sql = "SELECT * FROM tbl_driver WHERE statut='no'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }

    //mysqli_close(DB::$conn);
}

function getDriverById($id_conducteur)
{

    $sql = "SELECT * FROM tbl_driver WHERE id=$id_conducteur";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdDriverByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tbl_driver WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delDriver($id)
{
    $sql = "DELETE FROM tbl_driver WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableDriver($id)
{

    $sql = "UPDATE tbl_driver SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    $sql = "SELECT nom, prenom, email FROM tbl_driver WHERE id='$id'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $nom = "";
    $prenom = "";
    $email = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $email = $row['email'];
    }

    $to = $email;
    $subject = "Confirmation of your account | Taxi Cab - On Demand Taxi";
    $message = '
            <body style="margin:100px; background: #f8f8f8; ">
                <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
                    <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px; background: #fff;">
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                            <tbody>
                                <tr>
                                    <td style="vertical-align: top; padding-bottom:30px;" align="center">
                                        <img src="http://projets.hevenbf.com/yellow%20taxi/webservices/images/logo_taxijaune.jpg" alt="logo Taxi Jaune" style="border:none" width="15%">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="padding: 40px; background: #fff;">
                            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <h3>Confirmation of your account </h3>
                                        <p>Hello ' . $prenom . ' ' . $nom . '</p>
                                        <b>we are pleased to inform you the your account has been successfully  approved.You are now a full and registered member of Taxi Cab - On Demand Taxi and you can log in now and start Picking up passengers and earn lots of money</b><br>
                                        <p>Good continuation and see you soon !</p>
                                        <p>Taxi Cab - On Demand Taxi</p>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </body>
        ';
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
    $headers .= 'From: Taxi Cab - On Demand Taxi' . "\r\n";
    mail($to, $subject, $message, $headers);
}

function disableDriver($id)
{

    $sql = "UPDATE tbl_driver SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastConducteur()
{

    $sql = "SELECT * FROM tbl_driver ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////


/* Start All Vehicle */
function getAllVehicle()
{


    $sql = "SELECT v.id,v.brand,v.model,v.color,v.numberplate,v.statut,c.latitude,c.longitude,v.creer,v.modifier,c.nom,c.prenom,c.phone,c.online
        FROM tj_vehicule v, tbl_driver c
        WHERE v.id_conducteur=c.id AND v.statut='yes' AND c.longitude!='' AND c.latitude!=''";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* Start Affectation */
function setAffectation($conducteur, $vehicule, $statut)
{


    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $mdp = md5($mdp);

    $sql_verif = "SELECT id FROM tj_affectation WHERE id_taxi='$vehicule'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_affectation (id_taxi, id_conducteur, statut, creer) VALUES ('$vehicule', '$conducteur', '$statut', '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setAffectationMod($id, $id_conducteur, $id_taxi, $statut)
{
    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_affectation SET id_conducteur=$id_conducteur, id_taxi=$id_taxi, statut='$statut', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getAffectation()
{


    $sql = "SELECT a.id,a.statut,a.creer,a.modifier,v.numero,c.nom,c.prenom,v.id as idTaxi,c.id as idConducteur
        FROM tj_affectation a, tj_taxi v, tbl_driver c
        WHERE a.id_taxi=v.id AND a.id_conducteur=c.id";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getAffectationById($id_affectation)
{

    $sql = "SELECT * FROM tj_affectation WHERE id=$id_affectation";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdAffectationByLibelle($lib_annee)
{

    $sql = "SELECT id FROM tj_affectation WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delAffectation($id)
{

    $sql = "DELETE FROM tj_affectation WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableAffectation($id)
{


    $sql = "UPDATE tj_affectation SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableAffectation($id)
{


    $sql = "UPDATE tj_affectation SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastAffectation()
{


    $sql = "SELECT * FROM tj_affectation ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* Start Settings */
function setSettings($title, $footer, $email)
{


    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $mdp = md5($mdp);

    $sql_verif = "SELECT id FROM tj_settings";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $sql = "UPDATE tj_settings SET title='$title', footer='$footer', email='$email', modifier='$date_heure'";
        $result = mysqli_query(DB::$conn, $sql);
        $res = '1';
    } else {
        $sql = "INSERT INTO tj_settings (title, footer, email, creer) VALUES ('$title', '$footer', '$email', '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

/* Get settings from DB*/
function getSettings()
{
    $sql = "SELECT * FROM tbl_settings LIMIT 1";

    $result = mysqli_query(DB::$conn, $sql);

    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);

    if (mysqli_num_rows($result) > 0) {

        return $output;

    } else {
        return $output = [];
    }
}

/* Start User App */
function setUtilisateurApp($conducteur, $vehicule, $statut)
{


    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $mdp = md5($mdp);

    $sql_verif = "SELECT id FROM tbl_user_app WHERE id_taxi='$vehicule'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tbl_user_app (id_taxi, id_conducteur, statut, creer) VALUES ('$vehicule', '$conducteur', '$statut', '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setUtilisateurAppMod($id, $id_conducteur, $id_taxi, $statut)
{

    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tbl_user_app SET id_conducteur=$id_conducteur, id_taxi=$id_taxi, statut='$statut', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getUserApp()
{


    $sql = "SELECT * FROM tbl_user_app";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getUserAppById($id_affectation)
{


    $sql = "SELECT * FROM tbl_user_app WHERE id=$id_affectation";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdUserAppByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tbl_user_app WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delUserApp($id)
{


    $sql = "DELETE FROM tbl_user_app WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableUserApp($id)
{


    $sql = "UPDATE tbl_user_app SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableUserApp($id)
{


    $sql = "UPDATE tbl_user_app SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastUserApp()
{


    $sql = "SELECT * FROM tbl_user_app ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* End User App */

/* Start Suggestion */
function setSuggestion($conducteur, $vehicule, $statut)
{


    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $mdp = md5($mdp);

    $sql_verif = "SELECT id FROM tj_suggestion WHERE id_taxi='$vehicule'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_suggestion (id_taxi, id_conducteur, statut, creer) VALUES ('$vehicule', '$conducteur', '$statut', '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setSuggestionMod($id, $id_conducteur, $id_taxi, $statut)
{

    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_suggestion SET id_conducteur=$id_conducteur, id_taxi=$id_taxi, statut='$statut', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getSuggestion()
{


    $sql = "SELECT s.id,s.message,s.creer,s.modifier,s.id_user_app
        FROM tj_suggestion s, tbl_user_app u WHERE s.id_user_app=u.id";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getSuggestionById($id_affectation)
{

    $sql = "SELECT * FROM tj_suggestion WHERE id=$id_affectation";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdSuggestionByLibelle($lib_annee)
{

    $sql = "SELECT id FROM tj_suggestion WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delSuggestion($id)
{

    $sql = "DELETE FROM tj_suggestion WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableSuggestion($id)
{

    $sql = "UPDATE tj_suggestion SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableSuggestion($id)
{

    $sql = "UPDATE tj_suggestion SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastSuggestion()
{

    $sql = "SELECT * FROM tj_suggestion ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* Start Commentaire */
function setCommentaire($conducteur, $vehicule, $statut)
{
    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $mdp = md5($mdp);

    $sql_verif = "SELECT id FROM tj_commentaire WHERE id_taxi='$vehicule'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_commentaire (id_taxi, id_conducteur, statut, creer) VALUES ('$vehicule', '$conducteur', '$statut', '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setCommentaireMod($id, $id_conducteur, $id_taxi, $statut)
{

    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_commentaire SET id_conducteur=$id_conducteur, id_taxi=$id_taxi, statut='$statut', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getCommentaire()
{

    $sql = "SELECT c.id,c.description,c.id_conducteur,c.creer,c.modifier,c.id_user_app,c.statut
        FROM tj_commentaire c, tbl_user_app u WHERE c.id_user_app=u.id";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getCommentaireById($id_affectation)
{


    $sql = "SELECT * FROM tj_commentaire WHERE id=$id_affectation";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdCommentaireByLibelle($lib_annee)
{

    $sql = "SELECT id FROM tj_commentaire WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delCommentaire($id)
{

    $sql = "DELETE FROM tj_commentaire WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableCommentaire($id)
{


    $sql = "UPDATE tj_commentaire SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableCommentaire($id)
{

    $sql = "UPDATE tj_commentaire SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastCommentaire()
{


    $sql = "SELECT * FROM tj_commentaire ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}


/* Start Requête */
function setRequete($conducteur, $vehicule, $statut)
{


    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $mdp = md5($mdp);

    $sql_verif = "SELECT id FROM tj_requete WHERE id_taxi='$vehicule'";
    $result_verif = mysqli_query(DB::$conn, $sql_verif);

    if (mysqli_num_rows($result_verif) > 0) {
        $res = '2';
    } else {
        $sql = "INSERT INTO tj_requete (id_taxi, id_conducteur, statut, creer) VALUES ('$vehicule', '$conducteur', '$statut', '$date_heure')";
        $result = mysqli_query(DB::$conn, $sql);
        if ($result == 1) {
            $res = '1';
        } else {
            $res = '0';
        }
    }
    //mysqli_close(DB::$conn);
    return $res;
}

function setRequeteMod($id, $id_conducteur, $id_taxi, $statut)
{


    $res = '0';
    $date_heure = date('Y-m-d H:i:s');

    $sql = "UPDATE tj_requete SET id_conducteur=$id_conducteur, id_taxi=$id_taxi, statut='$statut', modifier='$date_heure' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);

    //mysqli_close(DB::$conn);
    return $res;
}

function getRequete()
{


    $sql = "SELECT r.id,r.distance,r.creer,r.modifier,r.id_user_app,r.statut,r.depart_name,r.destination_name,r.duree,r.montant,r.trajet,u.nom,u.prenom
        ,c.nom as nomDriver,c.prenom as prenomDriver,r.statut_paiement,m.libelle as payment,m.image as payment_image
        FROM tj_requete r, tbl_user_app u, tbl_driver c, tj_payment_method m WHERE r.id_user_app=u.id AND r.id_payment_method=m.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

// //mysqli_close(DB::$conn);


    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteAmount()
{

    $sql_cu = "SELECT montant as cu
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";

    $result_cu = mysqli_query(DB::$conn, $sql_cu);

    $earning = 0;

    $sql_com = "SELECT value FROM tj_commission WHERE type='Percentage' AND statut='yes' ORDER BY id DESC LIMIT 1";

    $result_com = mysqli_query(DB::$conn, $sql_com);

    if (mysqli_num_rows($result_com) > 0) {
        $row_com = mysqli_fetch_assoc($result_com);
        $value = $row_com['value'];
        $value = (float)($value);

        // output data of each row
        $value_fixed = 0;

        $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";

        $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);

        if (mysqli_num_rows($result_com_fixed) > 0) {
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            $value_fixed = $row_com_fixed['value'];
        }

        while ($row_cu = mysqli_fetch_assoc($result_cu)) {
            $cu = $row_cu['cu'];
            $cu = ($cu - $value_fixed) * $value;
            $earning = (Float)$earning + ((Float)$cu + (Float)$value_fixed);
        }
    } else {

        $sql_com = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";

        $result_com = mysqli_query(DB::$conn, $sql_com);

        if (mysqli_num_rows($result_com) > 0) {

            $row_com = mysqli_fetch_assoc($result_com);

            // output data of each row
            $value_fixed = 0;
            $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";

            $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);

            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);

            if (mysqli_num_rows($result_com_fixed) > 0) {

                $value_fixed = $row_com_fixed['value'];
            }

            while ($row_cu = mysqli_fetch_assoc($result_cu)) {
                $cu = $row_cu['cu'];
                $earning = (Float)$earning + (Float)$value_fixed;
            }
        } else {

        }
    }


    $sql = "SELECT sum(r.montant) as montant
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";

    $result = mysqli_query(DB::$conn, $sql);

    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $row['earning'] = $earning;
        $output[] = $row;
    }

// //mysqli_close(DB::$conn);

    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteNew()
{

    $sql = "SELECT r.id,r.distance,r.creer,r.modifier,r.id_user_app,r.statut,r.depart_name,r.destination_name,r.duree,r.montant,r.trajet,u.nom,u.prenom
        ,c.nom as nomDriver,c.prenom as prenomDriver,r.statut_paiement,m.libelle as payment,m.image as payment_image
        FROM tj_requete r, tbl_user_app u, tbl_driver c, tj_payment_method m WHERE r.statut='new' AND r.id_payment_method=m.id AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

// //mysqli_close(DB::$conn);


    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteNewAmount()
{


    $sql_cu = "SELECT montant as cu
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='new' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result_cu = mysqli_query(DB::$conn, $sql_cu);
    $earning = 0;

    $sql_com = "SELECT value FROM tj_commission WHERE type='Percentage' AND statut='yes' ORDER BY id DESC LIMIT 1";
    $result_com = mysqli_query(DB::$conn, $sql_com);
    if (mysqli_num_rows($result_com) > 0) {
        $row_com = mysqli_fetch_assoc($result_com);
        $value = $row_com['value'];
        $value = (float)($value);

        // output data of each row
        $value_fixed = 0;
        $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
        if (mysqli_num_rows($result_com_fixed) > 0) {
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            $value_fixed = $row_com_fixed['value'];
        }

        while ($row_cu = mysqli_fetch_assoc($result_cu)) {
            $cu = $row_cu['cu'];
            $cu = ($cu - $value_fixed) * $value;
            $earning = (Float)$earning + ((Float)$cu + (Float)$value_fixed);
        }
    } else {
        $sql_com = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com = mysqli_query(DB::$conn, $sql_com);
        if (mysqli_num_rows($result_com) > 0) {
            $row_com = mysqli_fetch_assoc($result_com);

            // output data of each row
            $value_fixed = 0;
            $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
            $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            if (mysqli_num_rows($result_com_fixed) > 0) {
                $value_fixed = $row_com_fixed['value'];
            }

            while ($row_cu = mysqli_fetch_assoc($result_cu)) {
                $cu = $row_cu['cu'];
                $earning = (Float)$earning + (Float)$value_fixed;
            }
        } else {

        }
    }


    $sql = "SELECT sum(r.montant) as montant
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='new' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $row['earning'] = $earning;
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);


    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteConfirmedAmount()
{


    $sql_cu = "SELECT montant as cu
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='confirmed' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result_cu = mysqli_query(DB::$conn, $sql_cu);
    $earning = 0;

    $sql_com = "SELECT value FROM tj_commission WHERE type='Percentage' AND statut='yes' ORDER BY id DESC LIMIT 1";
    $result_com = mysqli_query(DB::$conn, $sql_com);
    if (mysqli_num_rows($result_com) > 0) {
        $row_com = mysqli_fetch_assoc($result_com);
        $value = $row_com['value'];
        $value = (float)($value);

        // output data of each row
        $value_fixed = 0;
        $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
        if (mysqli_num_rows($result_com_fixed) > 0) {
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            $value_fixed = $row_com_fixed['value'];
        }

        while ($row_cu = mysqli_fetch_assoc($result_cu)) {
            $cu = $row_cu['cu'];
            $cu = ($cu - $value_fixed) * $value;
            $earning = (Float)$earning + ((Float)$cu + (Float)$value_fixed);
        }
    } else {
        $sql_com = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com = mysqli_query(DB::$conn, $sql_com);
        if (mysqli_num_rows($result_com) > 0) {
            $row_com = mysqli_fetch_assoc($result_com);

            // output data of each row
            $value_fixed = 0;
            $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
            $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            if (mysqli_num_rows($result_com_fixed) > 0) {
                $value_fixed = $row_com_fixed['value'];
            }

            while ($row_cu = mysqli_fetch_assoc($result_cu)) {
                $cu = $row_cu['cu'];
                $earning = (Float)$earning + (Float)$value_fixed;
            }
        } else {

        }
    }


    $sql = "SELECT sum(r.montant) as montant
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='confirmed' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $row['earning'] = $earning;
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteOnRideAmount()
{

    $sql_cu = "SELECT montant as cu
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='on ride' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result_cu = mysqli_query(DB::$conn, $sql_cu);
    $earning = 0;

    $sql_com = "SELECT value FROM tj_commission WHERE type='Percentage' AND statut='yes' ORDER BY id DESC LIMIT 1";
    $result_com = mysqli_query(DB::$conn, $sql_com);
    if (mysqli_num_rows($result_com) > 0) {
        $row_com = mysqli_fetch_assoc($result_com);
        $value = $row_com['value'];
        $value = (float)($value);

        // output data of each row
        $value_fixed = 0;
        $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
        if (mysqli_num_rows($result_com_fixed) > 0) {
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            $value_fixed = $row_com_fixed['value'];
        }

        while ($row_cu = mysqli_fetch_assoc($result_cu)) {
            $cu = $row_cu['cu'];
            $cu = ($cu - $value_fixed) * $value;
            $earning = (Float)$earning + ((Float)$cu + (Float)$value_fixed);
        }
    } else {
        $sql_com = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com = mysqli_query(DB::$conn, $sql_com);
        if (mysqli_num_rows($result_com) > 0) {
            $row_com = mysqli_fetch_assoc($result_com);

            // output data of each row
            $value_fixed = 0;
            $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
            $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            if (mysqli_num_rows($result_com_fixed) > 0) {
                $value_fixed = $row_com_fixed['value'];
            }

            while ($row_cu = mysqli_fetch_assoc($result_cu)) {
                $cu = $row_cu['cu'];
                $earning = (Float)$earning + (Float)$value_fixed;
            }
        } else {

        }
    }


    $sql = "SELECT sum(r.montant) as montant
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='on ride' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $row['earning'] = $earning;
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteCompletedAmount()
{


    $sql_cu = "SELECT montant as cu
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='completed' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result_cu = mysqli_query(DB::$conn, $sql_cu);
    $earning = 0;

    $sql_com = "SELECT value FROM tj_commission WHERE type='Percentage' AND statut='yes' ORDER BY id DESC LIMIT 1";
    $result_com = mysqli_query(DB::$conn, $sql_com);
    if (mysqli_num_rows($result_com) > 0) {
        $row_com = mysqli_fetch_assoc($result_com);
        $value = $row_com['value'];
        $value = (float)($value);

        // output data of each row
        $value_fixed = 0;
        $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
        if (mysqli_num_rows($result_com_fixed) > 0) {
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            $value_fixed = $row_com_fixed['value'];
        }

        while ($row_cu = mysqli_fetch_assoc($result_cu)) {
            $cu = $row_cu['cu'];
            $cu = ($cu - $value_fixed) * $value;
            $earning = (Float)$earning + ((Float)$cu + (Float)$value_fixed);
        }
    } else {
        $sql_com = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com = mysqli_query(DB::$conn, $sql_com);
        if (mysqli_num_rows($result_com) > 0) {
            $row_com = mysqli_fetch_assoc($result_com);

            // output data of each row
            $value_fixed = 0;
            $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
            $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            if (mysqli_num_rows($result_com_fixed) > 0) {
                $value_fixed = $row_com_fixed['value'];
            }

            while ($row_cu = mysqli_fetch_assoc($result_cu)) {
                $cu = $row_cu['cu'];
                $earning = (Float)$earning + (Float)$value_fixed;
            }
        } else {

        }
    }


    $sql = "SELECT sum(r.montant) as montant, montant as cu
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='completed' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $row['earning'] = $earning;
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getCustomerStats($id_customer, $month, $year)
{

    $time = strtotime($year . '-' . $month . '-01');
    $date1 = date('Y-m-01 00:00:00', $time);
    $date2 = date('Y-m-t 23:59:59', $time);

    $sql = "SELECT r.id,r.distance,r.creer,r.modifier,r.id_user_app,r.statut,r.depart_name,r.destination_name,r.duree,r.montant,r.trajet,u.nom,u.prenom
        ,c.nom as nomDriver,c.prenom as prenomDriver,r.statut_paiement,m.libelle as payment,m.image as payment_image,u.phone
        FROM tj_requete r, tbl_user_app u, tbl_driver c, tj_payment_method m WHERE r.statut='completed' AND r.id_payment_method=m.id AND r.id_user_app=u.id AND r.id_conducteur=c.id
        AND u.id=$id_customer AND r.creer>='$date1' AND r.creer<='$date2' ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getDriverStats($id_driver, $month, $year)
{

    $time = strtotime($year . '-' . $month . '-01');
    $date1 = date('Y-m-01 00:00:00', $time);
    $date2 = date('Y-m-t 23:59:59', $time);

    $sql = "SELECT r.id,r.distance,r.creer,r.modifier,r.id_user_app,r.statut,r.depart_name,r.destination_name,r.duree,r.montant,r.trajet,u.nom,u.prenom
        ,c.nom as nomDriver,c.prenom as prenomDriver,r.statut_paiement,m.libelle as payment,m.image as payment_image,u.phone
        FROM tj_requete r, tbl_user_app u, tbl_driver c, tj_payment_method m WHERE r.statut='completed' AND r.id_payment_method=m.id AND r.id_user_app=u.id AND r.id_conducteur=c.id
        AND c.id=$id_driver AND r.creer>='$date1' AND r.creer<='$date2' ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getEarningStats($month, $year)
{


    $time = strtotime($year . '-' . $month . '-01');
    $date1 = date('Y-m-01 00:00:00', $time);
    $date2 = date('Y-m-t 23:59:59', $time);

    $sql = "SELECT r.id,r.distance,r.creer,r.modifier,r.id_user_app,r.statut,r.depart_name,r.destination_name,r.duree,r.montant,r.trajet,u.nom,u.prenom
        ,c.nom as nomDriver,c.prenom as prenomDriver,r.statut_paiement,m.libelle as payment,m.image as payment_image,u.phone
        FROM tj_requete r, tbl_user_app u, tbl_driver c, tj_payment_method m WHERE r.statut='completed' AND r.id_payment_method=m.id AND r.id_user_app=u.id AND r.id_conducteur=c.id
        AND r.creer>='$date1' AND r.creer<='$date2' ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getEarningStatsDashboard($year)
{


    $time = strtotime($year . '-01-01');
    $date1 = date('Y-01-01 00:00:00', $time);
    $date2 = date('Y-12-t 23:59:59', $time);

    $sql = "SELECT r.id,r.distance,r.creer,r.modifier,r.id_user_app,r.statut,r.depart_name,r.destination_name,r.duree,r.montant,r.trajet,u.nom,u.prenom
        ,c.nom as nomDriver,c.prenom as prenomDriver,r.statut_paiement,m.libelle as payment,m.image as payment_image,u.phone
        FROM tj_requete r, tbl_user_app u, tbl_driver c, tj_payment_method m WHERE r.statut='completed' AND r.id_payment_method=m.id AND r.id_user_app=u.id AND r.id_conducteur=c.id
        AND r.creer>='$date1' AND r.creer<='$date2' ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteAllSaleTodayAmount()
{


    $date_start = date('Y-m-d 00:00:00');
    $date_end = date('Y-m-d 23:59:59');

    $sql = "SELECT count(id) as nb_sales FROM tj_requete WHERE statut='completed' AND creer >= '$date_start' AND creer <= '$date_end'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteCanceledAmount()
{
    $sql_cu = "SELECT montant as cu
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='canceled' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result_cu = mysqli_query(DB::$conn, $sql_cu);
    $earning = 0;

    $sql_com = "SELECT value FROM tj_commission WHERE type='Percentage' AND statut='yes' ORDER BY id DESC LIMIT 1";
    $result_com = mysqli_query(DB::$conn, $sql_com);
    if (mysqli_num_rows($result_com) > 0) {
        $row_com = mysqli_fetch_assoc($result_com);
        $value = $row_com['value'];
        $value = (float)($value);

        // output data of each row
        $value_fixed = 0;
        $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
        if (mysqli_num_rows($result_com_fixed) > 0) {
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            $value_fixed = $row_com_fixed['value'];
        }

        while ($row_cu = mysqli_fetch_assoc($result_cu)) {
            $cu = $row_cu['cu'];
            $cu = ($cu - $value_fixed) * $value;
            $earning = (Float)$earning + ((Float)$cu + (Float)$value_fixed);
        }
    } else {
        $sql_com = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com = mysqli_query(DB::$conn, $sql_com);
        if (mysqli_num_rows($result_com) > 0) {
            $row_com = mysqli_fetch_assoc($result_com);

            // output data of each row
            $value_fixed = 0;
            $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
            $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            if (mysqli_num_rows($result_com_fixed) > 0) {
                $value_fixed = $row_com_fixed['value'];
            }

            while ($row_cu = mysqli_fetch_assoc($result_cu)) {
                $cu = $row_cu['cu'];
                $earning = (Float)$earning + (Float)$value_fixed;
            }
        } else {

        }
    }

    // $sql_com = "SELECT value FROM tj_commission ORDER BY id DESC LIMIT 1";
    // $result_com = mysqli_query($con,$sql_com);
    // $row_com = mysqli_fetch_assoc($result_com);
    // $value = $row_com['value'];
    // // output data of each row
    // while($row_cu = mysqli_fetch_assoc($result_cu)) {
    //     $cu = $row_cu['cu'];
    //     $cu = $cu * $value;
    //     $earning = $earning + $cu;
    // }

    $sql = "SELECT sum(r.montant) as montant
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='canceled' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $row['earning'] = $earning;
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteMonthEarnAmount()
{


    $date_heure = date('Y-m-d');
    $date_start = date("Y-m-d", strtotime(date('Y-m-1')));
    $date_end = date("Y-m-t", strtotime($date_heure));

    $sql_cu = "SELECT montant as cu
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='completed' AND r.id_user_app=u.id AND r.id_conducteur=c.id AND r.creer >= '$date_start' AND r.creer <= '$date_end'
        ORDER BY r.id DESC";
    $result_cu = mysqli_query(DB::$conn, $sql_cu);
    $earning = 0;

    $sql_com = "SELECT value FROM tj_commission WHERE type='Percentage' AND statut='yes' ORDER BY id DESC LIMIT 1";
    $result_com = mysqli_query(DB::$conn, $sql_com);
    if (mysqli_num_rows($result_com) > 0) {
        $row_com = mysqli_fetch_assoc($result_com);
        $value = $row_com['value'];
        $value = (float)($value);

        // output data of each row
        $value_fixed = 0;
        $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
        if (mysqli_num_rows($result_com_fixed) > 0) {
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            $value_fixed = $row_com_fixed['value'];
        }

        while ($row_cu = mysqli_fetch_assoc($result_cu)) {
            $cu = $row_cu['cu'];
            $cu = ($cu - $value_fixed) * $value;
            $earning = (Float)$earning + ((Float)$cu + (Float)$value_fixed);
        }
    } else {
        $sql_com = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com = mysqli_query(DB::$conn, $sql_com);
        if (mysqli_num_rows($result_com) > 0) {
            $row_com = mysqli_fetch_assoc($result_com);

            // output data of each row
            $value_fixed = 0;
            $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
            $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            if (mysqli_num_rows($result_com_fixed) > 0) {
                $value_fixed = $row_com_fixed['value'];
            }

            while ($row_cu = mysqli_fetch_assoc($result_cu)) {
                $cu = $row_cu['cu'];
                $earning = (Float)$earning + (Float)$value_fixed;
            }
        } else {

        }
    }

    $sql = "SELECT sum(r.montant) as montant
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='completed' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $row['earning'] = $earning;
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteTodayEarnAmount()
{


    $date_start = date('Y-m-d 00:00:00');
    $date_end = date('Y-m-d 23:59:59');
    // echo $date_start;
    // echo $date_end;

    $sql_cu = "SELECT montant as cu
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='completed' AND r.id_user_app=u.id AND r.id_conducteur=c.id AND r.creer >= '$date_start' AND r.creer <= '$date_end'
        ORDER BY r.id DESC";
    $result_cu = mysqli_query(DB::$conn, $sql_cu);
    $earning = 0;

    $sql_com = "SELECT value FROM tj_commission WHERE type='Percentage' AND statut='yes' ORDER BY id DESC LIMIT 1";
    $result_com = mysqli_query(DB::$conn, $sql_com);
    if (mysqli_num_rows($result_com) > 0) {
        $row_com = mysqli_fetch_assoc($result_com);
        $value = $row_com['value'];
        $value = (float)($value);

        // output data of each row
        $value_fixed = 0;
        $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
        if (mysqli_num_rows($result_com_fixed) > 0) {
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            $value_fixed = $row_com_fixed['value'];
        }

        while ($row_cu = mysqli_fetch_assoc($result_cu)) {
            $cu = $row_cu['cu'];
            $cu = ($cu - $value_fixed) * $value;
            $earning = (Float)$earning + ((Float)$cu + (Float)$value_fixed);
        }
    } else {
        $sql_com = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com = mysqli_query(DB::$conn, $sql_com);
        if (mysqli_num_rows($result_com) > 0) {
            $row_com = mysqli_fetch_assoc($result_com);

            // output data of each row
            $value_fixed = 0;
            $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
            $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            if (mysqli_num_rows($result_com_fixed) > 0) {
                $value_fixed = $row_com_fixed['value'];
            }

            while ($row_cu = mysqli_fetch_assoc($result_cu)) {
                $cu = $row_cu['cu'];
                $earning = (Float)$earning + (Float)$value_fixed;
            }
        } else {

        }
    }

    $sql = "SELECT sum(r.montant) as montant
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='completed' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $row['earning'] = $earning;
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteWeekEarnAmount()
{


    $day = date('w');
    $week_start = date('Y-m-d', strtotime('-' . $day . ' days'));
    $week_end = date('Y-m-d', strtotime('+' . (6 - $day) . ' days'));
    $week_start = date('Y-m-d', strtotime($week_start . ' +1 day'));
    $week_end = date('Y-m-d', strtotime($week_end . ' +1 day'));

    // echo $week_start;
    // echo $week_end;

    $sql_cu = "SELECT montant as cu
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='completed' AND r.id_user_app=u.id AND r.id_conducteur=c.id AND r.creer >= '$week_start' AND r.creer <= '$week_end'
        ORDER BY r.id DESC";
    $result_cu = mysqli_query(DB::$conn, $sql_cu);
    $earning = 0;

    $sql_com = "SELECT value FROM tj_commission WHERE type='Percentage' AND statut='yes' ORDER BY id DESC LIMIT 1";
    $result_com = mysqli_query(DB::$conn, $sql_com);
    if (mysqli_num_rows($result_com) > 0) {
        $row_com = mysqli_fetch_assoc($result_com);
        $value = $row_com['value'];
        $value = (float)($value);

        // output data of each row
        $value_fixed = 0;
        $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
        if (mysqli_num_rows($result_com_fixed) > 0) {
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            $value_fixed = $row_com_fixed['value'];
        }

        while ($row_cu = mysqli_fetch_assoc($result_cu)) {
            $cu = $row_cu['cu'];
            $cu = ($cu - $value_fixed) * $value;
            $earning = (Float)$earning + ((Float)$cu + (Float)$value_fixed);
        }
    } else {
        $sql_com = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com = mysqli_query(DB::$conn, $sql_com);
        if (mysqli_num_rows($result_com) > 0) {
            $row_com = mysqli_fetch_assoc($result_com);

            // output data of each row
            $value_fixed = 0;
            $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
            $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
            $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
            if (mysqli_num_rows($result_com_fixed) > 0) {
                $value_fixed = $row_com_fixed['value'];
            }

            while ($row_cu = mysqli_fetch_assoc($result_cu)) {
                $cu = $row_cu['cu'];
                $earning = (Float)$earning + (Float)$value_fixed;
            }
        } else {

        }
    }

    $sql = "SELECT sum(r.montant) as montant
        FROM tj_requete r, tbl_user_app u, tbl_driver c WHERE r.statut='completed' AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $row['earning'] = $earning;
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteConfirmed()
{


    $sql = "SELECT r.id,r.distance,r.creer,r.modifier,r.id_user_app,r.statut,r.depart_name,r.destination_name,r.duree,r.montant,r.trajet,u.nom,u.prenom
        ,c.nom as nomDriver,c.prenom as prenomDriver,r.statut_paiement,m.libelle as payment,m.image as payment_image
        FROM tj_requete r, tbl_user_app u, tbl_driver c, tj_payment_method m WHERE r.statut='confirmed' AND r.id_payment_method=m.id AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteOnRide()
{


    $sql = "SELECT r.id,r.distance,r.creer,r.modifier,r.id_user_app,r.statut,r.depart_name,r.destination_name,r.duree,r.montant,r.trajet,u.nom,u.prenom
        ,c.nom as nomDriver,c.prenom as prenomDriver,r.statut_paiement,m.libelle as payment,m.image as payment_image
        FROM tj_requete r, tbl_user_app u, tbl_driver c, tj_payment_method m WHERE r.statut='on ride' AND r.id_payment_method=m.id AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteCompleted()
{


    $sql = "SELECT r.id,r.distance,r.creer,r.modifier,r.id_user_app,r.statut,r.depart_name,r.destination_name,r.duree,r.montant,r.trajet,u.nom,u.prenom
        ,c.nom as nomDriver,c.prenom as prenomDriver,r.statut_paiement,m.libelle as payment,m.image as payment_image
        FROM tj_requete r, tbl_user_app u, tbl_driver c, tj_payment_method m WHERE r.statut='completed' AND r.id_payment_method=m.id AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $cu = $row['montant'];
        $earning = 0;

        $sql_com = "SELECT value FROM tj_commission WHERE type='Percentage' AND statut='yes' ORDER BY id DESC LIMIT 1";
        $result_com = mysqli_query(DB::$conn, $sql_com);
        if (mysqli_num_rows($result_com) > 0) {
            $row_com = mysqli_fetch_assoc($result_com);
            $value = $row_com['value'];
            $value = (float)($value);

            // output data of each row
            $value_fixed = 0;
            $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
            $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
            if (mysqli_num_rows($result_com_fixed) > 0) {
                $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
                $value_fixed = $row_com_fixed['value'];
            }

            $cu = ($cu - $value_fixed) * $value;
            $earning = (Float)$earning + ((Float)$cu + (Float)$value_fixed);
        } else {
            $sql_com = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
            $result_com = mysqli_query(DB::$conn, $sql_com);
            if (mysqli_num_rows($result_com) > 0) {
                $row_com = mysqli_fetch_assoc($result_com);

                // output data of each row
                $value_fixed = 0;
                $sql_com_fixed = "SELECT value FROM tj_commission WHERE type='Fixed' AND statut='yes' ORDER BY id DESC LIMIT 1";
                $result_com_fixed = mysqli_query(DB::$conn, $sql_com_fixed);
                $row_com_fixed = mysqli_fetch_assoc($result_com_fixed);
                if (mysqli_num_rows($result_com_fixed) > 0) {
                    $value_fixed = $row_com_fixed['value'];
                }

                $earning = (Float)$earning + (Float)$value_fixed;
            } else {

            }
        }

        // $sql_com = "SELECT value FROM tj_commission ORDER BY id DESC LIMIT 1";
        // $result_com = mysqli_query(DB::$conn,$sql_com);
        // $row_com = mysqli_fetch_assoc($result_com);
        // $value = $row_com['value'];

        // $cu = $cu * $value;
        // $earning = $earning + $cu;
        $row['earning'] = $earning;

        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteCanceled()
{


    $sql = "SELECT r.id,r.distance,r.creer,r.modifier,r.id_user_app,r.statut,r.depart_name,r.destination_name,r.duree,r.montant,r.trajet,u.nom,u.prenom
        ,c.nom as nomDriver,c.prenom as prenomDriver,r.statut_paiement,m.libelle as payment,m.image as payment_image
        FROM tj_requete r, tbl_user_app u, tbl_driver c, tj_payment_method m WHERE r.statut IN ('canceled','rejected') AND r.id_payment_method=m.id AND r.id_user_app=u.id AND r.id_conducteur=c.id
        ORDER BY r.id DESC";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getRequeteById($id_affectation)
{


    $sql = "SELECT * FROM tj_requete WHERE id=$id_affectation";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

function getIdRequeteByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_requete WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delRequete($id)
{


    $sql = "DELETE FROM tj_requete WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableRequete($id)
{


    $sql = "UPDATE tj_requete SET statut='yes' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableRequete($id)
{


    $sql = "UPDATE tj_requete SET statut='no' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastRequete()
{


    $sql = "SELECT * FROM tj_requete ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* End Requête */

/* Start Réservation */
/*function setReservation($conducteur,$vehicule,$statut){
        
      
        $res = '0';
        $date_heure = date('Y-m-d H:i:s');

        $mdp = md5($mdp);

        $sql_verif = "SELECT id FROM tj_reservation_taxi WHERE id_taxi='$vehicule'";
        $result_verif = mysqli_query($con,$sql_verif);

        if(mysqli_num_rows($result_verif) > 0){
            $res = '2';
        }else{
            $sql = "INSERT INTO tj_reservation_taxi (id_taxi, id_conducteur, statut, creer) VALUES ('$vehicule', '$conducteur', '$statut', '$date_heure')";
            $result = mysqli_query($con,$sql);
            if($result == 1){
                $res = '1';
            } else {
                $res = '0';
            }
        }
        mysqli_close($con);
        return $res;
    }*/

/*function setReservationMod($id,$id_conducteur,$id_taxi,$statut){
        
      
        $res = '0';
        $date_heure = date('Y-m-d H:i:s');

        $sql = "UPDATE tj_reservation_taxi SET id_conducteur=$id_conducteur, id_taxi=$id_taxi, statut='$statut', modifier='$date_heure' WHERE id=$id";
        $result = mysqli_query($con,$sql);

        mysqli_close($con);
        return $res;
    }*/

function getReservation()
{


    $sql = "SELECT r.id,r.cout,r.distance,r.date_depart,r.heure_depart,r.contact,r.creer,r.modifier,r.id_user_app,r.statut,u.nom,u.prenom
        FROM tj_reservation_taxi r, tbl_user_app u WHERE r.id_user_app=u.id";

    $result = mysqli_query(DB::$conn, $sql);

    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);

    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/*function getReservationById($id_reservation){
        
      
        $sql = "SELECT * FROM tj_reservation_taxi WHERE id=$id_reservation";
        $result = mysqli_query($con,$sql);
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }

        mysqli_close($con);
        if(mysqli_num_rows($result) > 0){
            return $output;
        }else{
            return $output = [];
        }
    }*/

function getIdReservationByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_reservation_taxi WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delReservation($id)
{


    $sql = "DELETE FROM tj_reservation_taxi WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableReservation($id)
{


    $sql = "UPDATE tj_reservation_taxi SET statut='accepter' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableReservation($id)
{


    $sql = "UPDATE tj_reservation_taxi SET statut='refuser' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function closeReservation($id)
{


    $sql = "UPDATE tj_reservation_taxi SET statut='clôturer' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastReservation()
{


    $sql = "SELECT * FROM tj_reservation_taxi ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* End Réservation */

/* Start Location */
/*function setLocation($conducteur,$vehicule,$statut){
        
      
        $res = '0';
        $date_heure = date('Y-m-d H:i:s');

        $mdp = md5($mdp);

        $sql_verif = "SELECT id FROM tj_location_vehicule WHERE id_taxi='$vehicule'";
        $result_verif = mysqli_query($con,$sql_verif);

        if(mysqli_num_rows($result_verif) > 0){
            $res = '2';
        }else{
            $sql = "INSERT INTO tj_location_vehicule (id_taxi, id_conducteur, statut, creer) VALUES ('$vehicule', '$conducteur', '$statut', '$date_heure')";
            $result = mysqli_query($con,$sql);
            if($result == 1){
                $res = '1';
            } else {
                $res = '0';
            }
        }
        mysqli_close($con);
        return $res;
    }*/

/*function setLocationMod($id,$id_conducteur,$id_taxi,$statut){
        
      
        $res = '0';
        $date_heure = date('Y-m-d H:i:s');

        $sql = "UPDATE tj_location_vehicule SET id_conducteur=$id_conducteur, id_taxi=$id_taxi, statut='$statut', modifier='$date_heure' WHERE id=$id";
        $result = mysqli_query($con,$sql);

        mysqli_close($con);
        return $res;
    }*/

function getLocation()
{


    $sql = "SELECT l.id,l.nb_jour,l.contact,l.date_debut,l.date_fin,l.creer,l.modifier,l.id_user_app,l.statut,
        u.nom,u.prenom,tv.libelle as libTypeVehicule
        FROM tj_location_vehicule l, tbl_user_app u, tj_vehicule_rental v, tj_type_vehicule_rental tv
        WHERE l.id_user_app=u.id AND l.id_vehicule_rental=v.id AND v.id_type_vehicule_rental=tv.id";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/*function getLocationById($id_reservation){
        
      
        $sql = "SELECT * FROM tj_location_vehicule WHERE id=$id_reservation";
        $result = mysqli_query($con,$sql);
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }

        mysqli_close($con);
        if(mysqli_num_rows($result) > 0){
            return $output;
        }else{
            return $output = [];
        }
    }*/

function getIdLocationByLibelle($lib_annee)
{


    $sql = "SELECT id FROM tj_location_vehicule WHERE libelle='$lib_annee'";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    $id = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    }

    //mysqli_close(DB::$conn);
    return $id;
}

function delLocation($id)
{


    $sql = "DELETE FROM tj_location_vehicule WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
    //mysqli_close(DB::$conn);
}

function enableLocation($id)
{


    $sql = "UPDATE tj_location_vehicule SET statut='accepted' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function disableLocation($id)
{


    $sql = "UPDATE tj_location_vehicule SET statut='refuse' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function closeLocation($id)
{


    $sql = "UPDATE tj_location_vehicule SET statut='fenced' WHERE id=$id";
    $result = mysqli_query(DB::$conn, $sql);
}

function getLastLocation()
{


    $sql = "SELECT * FROM tj_location_vehicule ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB::$conn, $sql);
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row;
    }

    //mysqli_close(DB::$conn);
    if (mysqli_num_rows($result) > 0) {
        return $output;
    } else {
        return $output = [];
    }
}

/* End Location */

/* Start change mot de passe */
function setChangeMdp($anc_mdp, $new_mdp)
{


    $res = '0';
    $anc_mdp = str_replace("'", "\'", $anc_mdp);
    $new_mdp = str_replace("'", "\'", $new_mdp);
    $date_heure = date('Y-m-d H:i:s');

    $anc_mdp = md5($anc_mdp);
    $new_mdp = md5($new_mdp);

    $sql = "SELECT id FROM tbl_user WHERE mdp='$anc_mdp'";
    $result = mysqli_query(DB::$conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $sql1 = "UPDATE tbl_user SET mdp='$new_mdp' WHERE mdp='$anc_mdp'";
        if (mysqli_query(DB::$conn, $sql1)) {
            $res = '1';
        } else {
            $res = '0';
        }
    } else {
        $res = '0';
    }

    return $res;
}

/* End change mot de passe */

/* Start Resize image */
function resizeImage($img, $width, $height, $name)
{
    /*	Purpose: Open image
        *	Usage:	 resize('filename.type')
        * 	Params:	 filename.type - the filename to open
        */
    $magicianObj = new imageLib($img);


    /*	Purpose: Resize image
        *	Usage:	 resizeImage([width], [height])
        * 	Params:	 width - the new width to resize to
        *			 height - the new height to resize to
        */
    // $magicianObj -> resizeImage($width, $height);
    $magicianObj->resizeImage($width, $height, 'crop', true);


    /*	Purpose: Save image
        *	Usage:	 saveImage('[filename.type]', [quality])
        * 	Params:	 filename.type - the filename and file type to save as
        * 			 quality - (optional) 0-100 (100 being the highest (default))
        *				Only applies to jpg & png only
        */
    $magicianObj->saveImage($name, 100);
}


?>
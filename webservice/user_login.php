<?php
date_default_timezone_set('Africa/Ouagadougou');

include("../models/DB.php");

DB::initialize();


$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $date_heure = date('Y-m-d H:i:s');
    $id_user = "";
    $mdp = md5($_POST['mdp']);
    $telephone = $_POST['phone'];
    $mdp = str_replace("'", "\'", $mdp);
    $telephone = str_replace("'", "\'", $telephone);
    $checkuser = mysqli_query(DB::$conn, "select * from tbl_user_app where phone='$telephone'");


    if (mysqli_num_rows($checkuser)) {


        $checkaccount = mysqli_query(DB::$conn, "select * from tbl_user_app where phone='$telephone' and statut='yes'");

        if (mysqli_num_rows($checkaccount)) {
            $checkpwd = mysqli_query(DB::$conn, "select * from tbl_user_app where phone='$telephone' and mdp='$mdp'");
            if (mysqli_num_rows($checkpwd)) {
                $response['msg']['etat'] = 1;
                $response['msg']['message'] = "Success";
                $row = $checkuser->fetch_assoc();
                unset($row['mdp']);
                $row['user_cat'] = "user_app";
                $row['online'] = "";
                $id_user = $row['id'];
                $get_currency = mysqli_query(DB::$conn, "select * from tbl_currency where statut='yes' limit 1");
                $row_currency = $get_currency->fetch_assoc();
                $row['currency'] = $row_currency['symbole'];

                $get_country = mysqli_query(DB::$conn, "select * from tbl_country where statut='yes' limit 1");
                $row_country = $get_country->fetch_assoc();
                $row['country'] = $row_country['code'];

                $response['user'] = $row;
            } else {
                $response['msg']['etat'] = 2;
            }
        } else {
            $response['msg']['etat'] = 3;
        }
    } else {


        $checkuser = mysqli_query(DB::$conn, "select * from tbl_driver where phone='$telephone'");
        if (mysqli_num_rows($checkuser)) {
            $checkaccount = mysqli_query(DB::$conn, "select * from tbl_driver where phone='$telephone' and statut='yes'");
            if (mysqli_num_rows($checkaccount)) {
                $checkpwd = mysqli_query(DB::$conn, "select * from tbl_driver where phone='$telephone' and mdp='$mdp'");
                if (mysqli_num_rows($checkpwd)) {
                    $response['msg']['etat'] = 1;
                    $response['msg']['message'] = "Success";
                    $row = $checkuser->fetch_assoc();
                    unset($row['mdp']);
                    $row['user_cat'] = "conducteur";
                    $id_user = $row['id'];

                    $get_currency = mysqli_query(DB::$conn, "select * from tbl_currency where statut='yes' limit 1");
                    $row_currency = $get_currency->fetch_assoc();
                    $row['currency'] = $row_currency['symbole'];

                    $get_country = mysqli_query(DB::$conn, "select * from tbl_country where statut='yes' limit 1");
                    $row_country = $get_country->fetch_assoc();
                    $row['country'] = $row_country['code'];

                    $get_vehicle = mysqli_query(DB::$conn, "select * from tbl_vehicle where statut='yes' AND id_conducteur=$id_user");
                    $row_vehicle = $get_vehicle->fetch_assoc();
                    $row['brand'] = $row_vehicle['brand'];
                    $row['model'] = $row_vehicle['model'];
                    $row['color'] = $row_vehicle['color'];
                    $row['numberplate'] = $row_vehicle['numberplate'];
                    $response['user'] = $row;
                } else {
                    $response['msg']['etat'] = 2;
                }
            } else {
                $response['msg']['etat'] = 3;
            }
        } else {
            $response['msg']['etat'] = 0;
        }
    }

    echo json_encode($response);
    mysqli_close(DB::$conn);
}


?>
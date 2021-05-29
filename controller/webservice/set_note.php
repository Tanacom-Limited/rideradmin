<?php
date_default_timezone_set('Africa/Accra');


require_once('../../models/DB_API.php');

DB_API::initialize();


    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_user_app = $_POST['id_user_app'];
        $id_conducteur = $_POST['id_conducteur'];
        $note_value = $_POST['note_value'];
        $comment = $_POST['comment'];
        $date_heure = date('Y-m-d H:i:s');

        $chknote = mysqli_query(DB_API::$conn, "select * from tbl_note where id_user_app=$id_user_app AND id_conducteur=$id_conducteur");
        if (mysqli_num_rows($chknote) > 0) {
            $updatedata = mysqli_query(DB_API::$conn, "update tbl_note set niveau=$note_value, modifier='$date_heure', comment='$comment' where id_conducteur=$id_conducteur AND id_user_app=$id_user_app");

            // Nb avis conducteur
            $sql_nb_avis = "SELECT count(id) as nb_avis, sum(niveau) as somme FROM tbl_note WHERE id_conducteur=$id_conducteur";
            $result_nb_avis = mysqli_query(DB_API::$conn, $sql_nb_avis);
            $row_nb_avis = mysqli_fetch_assoc($result_nb_avis);

            $somme = $row_nb_avis['somme'];
            $nb_avis = $row_nb_avis['nb_avis'];
            $moyenne = $somme / $nb_avis;

            // Note conducteur
            $sql_note = "SELECT niveau,comment FROM tbl_note WHERE id_conducteur=$id_conducteur AND id_user_app=$id_user_app";
            $result_note = mysqli_query(DB_API::$conn, $sql_note);
            $row_note = mysqli_fetch_assoc($result_note);

            $row['nb_avis'] = $row_nb_avis['nb_avis'];
            if (mysqli_num_rows($result_note) > 0) {
                $row['niveau'] = $row_note['niveau'];
                $row['comment'] = $row_note['comment'];
            } else {
                $row['niveau'] = "";
                $row['comment'] = "";
            }
            $row['moyenne'] = $moyenne;
            $response['msg']['etat'] = 1;
            $response['msg']['note'] = $row;
        } else {
            $insertdata = mysqli_query(DB_API::$conn, "insert into tbl_note(niveau,id_conducteur,id_user_app,statut,creer,comment)
                values($note_value,$id_conducteur,$id_user_app,'yes','$date_heure','$comment')");
            $id = mysqli_insert_id(DB_API::$conn);
            if ($insertdata > 0) {
                $row = [];

                // Nb avis conducteur
                $sql_nb_avis = "SELECT count(id) as nb_avis, sum(niveau) as somme FROM tbl_note WHERE id_conducteur=$id_conducteur";
                $result_nb_avis = mysqli_query(DB_API::$conn, $sql_nb_avis);
                $row_nb_avis = mysqli_fetch_assoc($result_nb_avis);

                $somme = $row_nb_avis['somme'];
                $nb_avis = $row_nb_avis['nb_avis'];
                $moyenne = $somme / $nb_avis;

                // Note conducteur
                $sql_note = "SELECT niveau,comment FROM tbl_note WHERE id_conducteur=$id_conducteur AND id_user_app=$id_user_app";
                $result_note = mysqli_query(DB_API::$conn, $sql_note);
                $row_note = mysqli_fetch_assoc($result_note);

                $row['nb_avis'] = $row_nb_avis['nb_avis'];
                if (mysqli_num_rows($result_note) > 0) {
                    $row['niveau'] = $row_note['niveau'];
                    $row['comment'] = $row_note['comment'];
                } else {
                    $row['niveau'] = "";
                    $row['comment'] = "";
                }
                $row['moyenne'] = $moyenne;
                $response['msg']['note'] = $row;
                $response['msg']['etat'] = 1;
            } else {
                $response['msg']['etat'] = 2;
            }
        }

        echo json_encode($response);
        mysqli_close(DB_API::$conn);
    }
?>
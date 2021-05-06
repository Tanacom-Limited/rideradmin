<?php include("include/checker.php"); ?>
<!DOCTYPE html>
<html lang="en">

<?php include("include/head.php"); ?>

<body class="fix-header card-no-border">

<div id="main-wrapper">

    <!-- Topbar header  -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <?php include('include/header.php') ?>
        </nav>
    </header>

    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <?php include("include/menu.php"); ?>
        </div>

    </aside>

    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb and right sidebar toggle -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor"><?php echo $user; ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item"><?php echo $admin_tools; ?></li>
                    <li class="breadcrumb-item active"><?php echo $user; ?></li>
                </ol>
            </div>

        </div>

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title"><?php echo $users_list; ?></h4>

                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#add-user"><i class="fa fa-plus m-r-10"></i><?php echo $add; ?>
                            </button>

                            <!-- ADD USER-->
                            <div id="add-user" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content bg-gris">

                                        <div class="modal-header">

                                            <h4 class="modal-title" id="myModalLabel"><?php echo $add_a_user; ?></h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>

                                        </div>

                                        <form class="form-horizontal " action="../controller/action.php" method="post">

                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <div class="row">

                                                        <div class="col-md-6 m-b-0">

                                                            <div class="form-group mb-3">

                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $ID; ?></label>

                                                                <?php $tab_user_last[] = array();

                                                                $tab_user_last = getLastUser();

                                                                if (count($tab_user_last) == 0) {
                                                                    echo '<input type="text" class="form-control" placeholder="" value="1" readOnly name="id_user" required> ';
                                                                } else {
                                                                    echo '<input type="text" class="form-control" placeholder="" value="' . ($tab_user_last[0]['id'] + 1) . '" readOnly name="id_user" required>';
                                                                } ?>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6 m-b-0">

                                                            <div class="form-group mb-3">

                                                                <?php
                                                                $tab_categorie_user[] = array();
                                                                $tab_categorie_user = getCategorieUser();
                                                                ?>

                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $user_cat; ?></label>

                                                                <select class="form-control "
                                                                        id="exampleFormControlSelect1"
                                                                        name="categorie_user" required>

                                                                    <?php
                                                                    for ($i = 0; $i < count($tab_categorie_user); $i++) {
                                                                        echo '<option value="' . $tab_categorie_user[$i]['id'] . '"';
                                                                        if ($tab_categorie_user[$i]['id'] != "Administrateur") {
                                                                            echo "selected";
                                                                        }
                                                                        echo '>' . $tab_categorie_user[$i]['libelle'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $last_and_first_name; ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="nom_prenom" required>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $phone; ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="telephone" required>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $email; ?></label>
                                                                <input type="email" class="form-control " placeholder=""
                                                                       name="email" required>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $password; ?></label>
                                                                <input type="password" class="form-control "
                                                                       placeholder="" name="mdp" required>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $confirm_pwd; ?></label>
                                                                <input type="password" class="form-control "
                                                                       placeholder="" name="mdp_conf" required>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $status; ?></label>
                                                                <select class="form-control "
                                                                        id="exampleFormControlSelect1" name="statut"
                                                                        required>
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="submit"
                                                        class="btn btn-dark waves-effect"><?php echo $save; ?></button>

                                                <button type="button" class="btn btn-default waves-effect"
                                                        data-dismiss="modal"><?php echo $cancel; ?>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                            <!-- UPDATE USER-->
                            <div id="user-mod" class="modal fade in" tabindex="-1" role="dialog"

                                 aria-labelledby="myModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content bg-gris">

                                        <div class="modal-header">

                                            <h4 class="modal-title" id="myModalLabel"><?php echo $edit_a_user; ?></h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>

                                        </div>

                                        <form class="form-horizontal " action="../controller/action.php" method="post">

                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <div class="row">

                                                        <input type="hidden" name="id_user_mod" id="id_user_mod"
                                                               value="<?php echo $id_user; ?>">

                                                        <div class="col-md-6 m-b-0">

                                                            <div class="form-group mb-3">
                                                                <?php
                                                                $tab_categorie_user[] = array();
                                                                $tab_categorie_user = getCategorieUser();
                                                                ?>
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $user_cat; ?></label>

                                                                <select class="form-control " id="categorie_user_mod"
                                                                        name="categorie_user_mod" required>
                                                                    <?php
                                                                    for ($i = 0; $i < count($tab_categorie_user); $i++) {
                                                                        echo '<option value="' . $tab_categorie_user[$i]['id'] . '"';
                                                                        if ($tab_categorie_user[$i]['id'] != "Administrateur") {
                                                                            echo "selected";
                                                                        }
                                                                        echo '>' . $tab_categorie_user[$i]['libelle'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6 m-b-0">

                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $last_and_first_name; ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="nom_prenom_mod" id="nom_prenom_mod"
                                                                       required>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6 m-b-0">

                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $phone; ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="telephone_mod" id="telephone_mod" required>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6 m-b-0">

                                                            <div class="form-group mb-3">

                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $email; ?></label>
                                                                <input type="email" class="form-control " placeholder=""
                                                                       name="email_mod" id="email_mod" required>

                                                            </div>

                                                        </div>
                                                        <!---->
                                                        <!--                                                        <div class="col-md-6 m-b-0">-->
                                                        <!--                                                            <div class="form-group mb-3">-->
                                                        <!--                                                                <label class="mr-sm-2" for="designation">Mot de-->
                                                        <!--                                                                    passe</label>-->
                                                        <!--                                                                <input type="password" class="form-control "-->
                                                        <!--                                                                       placeholder="" name="mdp_mod" id="mdp_mod"-->
                                                        <!--                                                                       required>-->
                                                        <!--                                                            </div>-->
                                                        <!--                                                        </div>-->
                                                        <!---->
                                                        <!--                                                        <div class="col-md-6 m-b-0">-->
                                                        <!--                                                            <div class="form-group mb-3">-->
                                                        <!--                                                                <label class="mr-sm-2" for="designation">Confirmer mot-->
                                                        <!--                                                                    de passe</label>-->
                                                        <!--                                                                <input type="password" class="form-control "-->
                                                        <!--                                                                       placeholder="" name="mdp_conf_mod"-->
                                                        <!--                                                                       id="mdp_conf_mod" required>-->
                                                        <!--                                                            </div>-->
                                                        <!--                                                        </div>-->

                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $status; ?></label>
                                                                <select class="form-control " id="statut_mod"
                                                                        name="statut_mod" required>
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="submit"
                                                        class="btn btn-dark waves-effect"><?php echo $save; ?></button>

                                                <button type="button" class="btn btn-default waves-effect"
                                                        data-dismiss="modal"><?php echo $cancel; ?></button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive m-t-10">

                                <?php
                                $tab_user[] = array();
                                $tab_user = getUser();
                                ?>

                                <table id="example23"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>

                                    <tr>
                                        <th>N°</th>
                                        <th><?php echo $category; ?></th>
                                        <th><?php echo $last_and_first_name; ?></th>
                                        <th><?php echo $phone; ?></th>
                                        <th><?php echo $login; ?></th>
                                        <th><?php echo $status; ?></th>
                                        <th><?php echo $created; ?></th>
                                        <th><?php echo $modified; ?></th>
                                        <th><?php echo $actions; ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < count($tab_user); $i++) {
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td>' . $tab_user[$i]['libCatUser'] . '</td>
                                                            <td>' . $tab_user[$i]['nom_prenom'] . '</td>
                                                            <td>' . $tab_user[$i]['telephone'] . '</td>
                                                            <td>' . $tab_user[$i]['email'] . '</td>
                                                            <td><span class="';

                                        if ($tab_user[$i]['statut'] == "yes") {
                                            echo "badge badge-success";
                                        } else {
                                            echo "badge badge-danger";
                                        }
                                        echo '">' . $tab_user[$i]['statut'] . '</span></td>
                                                            <td>' . $tab_user[$i]['creer'] . '</td>
                                                            <td>' . $tab_user[$i]['modifier'] . '</td>
                                                            <td>
                                                                <input type="hidden" value="' . $tab_user[$i]['id'] . '" name="" id="id_user_' . $i . '">
                                                                
                                                                <button type="button" onclick="modUser(id_user_' . $i . '.value);" class="btn btn-warning btn-sm" data-original-title="Modified" data-toggle="modal" data-target="#user-mod"><i class="fa fa-pencil"></i></button>                                                                
                                                                <a href="../controller/action.php?id_user=' . $tab_user[$i]['id'] . '" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a>
                                                                <a href="../controller/action.php?id_user_activer=' . $tab_user[$i]['id'] . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Activate"> <i class="fa fa-check"></i> </a>
                                                                <a href="../controller/action.php?id_user_desactiver=' . $tab_user[$i]['id'] . '" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="Deactivate"> <i class="fa fa-close"></i> </a>
                                                            </td>
                                                        </tr>
                                                    ';
                                    }
                                    ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- footer -->
        <footer class="footer"> <?php include("include/footer.php"); ?> </footer>


    </div>

</div>

<!--Include footer script-->
<?php include("include/footer-script.php"); ?>


<script>

    // Call when updating users
    function modUser(id_user) {
        $.ajax({
            url: "../ajax/getUserById.php",
            type: "POST",
            data: {"id_user": id_user},
            success: function (data) {
                $("#id_user_mod").empty();
                $("#nom_prenom_mod").empty();
                $("#telephone_mod").empty();
                $("#email_mod").empty();

                var data_parse = JSON.parse(data);

                $("#id_user_mod").val(data_parse[0].id);
                $("#nom_prenom_mod").val(data_parse[0].nom_prenom);
                $("#telephone_mod").val(data_parse[0].telephone);
                $("#email_mod").val(data_parse[0].email);
                $("#statut_mod").val(data_parse[0].statut).change();
                $("#categorie_user_mod").val(data_parse[0].id_categorie_user).change();
            }
        });
    }


</script>

</body>


</html>

<?php include("include/checker.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php include("include/head.php"); ?>

<body class="fix-header card-no-border">

<!-- Main wrapper - style you can find in pages.scss -->
<div id="main-wrapper">

    <!-- Topbar header - style you can find in pages.scss -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <?php include('include/header.php') ?>
        </nav>
    </header>

    <!-- Left Sidebar - style you can find in sidebar.scss  -->
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
                <h3 class="text-themecolor"><?php echo $driver ?></h3>
            </div>

            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home ?></a></li>
                    <li class="breadcrumb-item"><?php echo $user_app ?></li>
                    <li class="breadcrumb-item active"><?php echo $driver ?></li>
                </ol>
            </div>
            <div>
                <!-- <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button> -->
            </div>
        </div>

        <!-- Container fluid  -->
        <div class="container-fluid">

            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $list_of_drivers ?></h4>

                            <!-- <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#add-conducteur"><i class="fa fa-plus m-r-10"></i>Add</button> -->
                            <div id="add-conducteur" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-gris">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><?php echo $add_a_driver ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>
                                        <form class="form-horizontal " action="../models/action.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $last_name ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="nom_conducteur" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $first_name ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="prenom_conducteur" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $national_card_number ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="cnib_conducteur" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $phone ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="login_conducteur" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $password ?></label>
                                                                <input type="password" class="form-control "
                                                                       placeholder="" name="mdp_conducteur" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $status ?></label>
                                                                <select class="form-control "
                                                                        id="exampleFormControlSelect1"
                                                                        name="statut_conducteur" required>
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Désolé, selectionnez le type de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit"
                                                        class="btn btn-dark waves-effect"><?php echo $save ?></button>
                                                <button type="button" class="btn btn-default waves-effect"
                                                        data-dismiss="modal"><?php echo $cancel ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div id="conducteur-mod" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-gris">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><?php echo $edit_a_driver ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>
                                        <form class="form-horizontal " action="../models/action.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <input type="hidden" name="id_conducteur_mod"
                                                               id="id_conducteur_mod" value="<?php echo $id_user; ?>">
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $last_name ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="nom_conducteur_mod" id="nom_conducteur_mod"
                                                                       required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $first_name ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="prenom_conducteur_mod"
                                                                       id="prenom_conducteur_mod" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $national_card_number ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="cnib_conducteur_mod"
                                                                       id="cnib_conducteur_mod" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $phone ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="login_conducteur_mod"
                                                                       id="login_conducteur_mod" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2" for="designation">Mot de passe</label>
                                                                <input type="password" class="form-control " placeholder="" name="mdp_conducteur_mod" id="mdp_conducteur_mod" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $status ?></label>
                                                                <select class="form-control " id="statut_conducteur_mod"
                                                                        name="statut_conducteur_mod" required>
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Désolé, selectionnez le type de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit"
                                                        class="btn btn-dark waves-effect"><?php echo $save ?></button>
                                                <button type="button" class="btn btn-default waves-effect"
                                                        data-dismiss="modal"><?php echo $cancel ?></button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>

                            <div class="table-responsive m-t-10">
                                <?php
                                $tab_conducteur[] = array();
                                $tab_conducteur = getConducteur();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th width="5%">N°</th>
                                        <th width="10%"><?php echo $photo ?></th>
                                        <th width="20%"><?php echo $last_name ?></th>
                                        <th width="20%"><?php echo $first_name ?></th>
                                        <th width="10%"><?php echo $phone ?></th>
                                        <th width="10%"><?php echo $national_card_number ?></th>
                                        <th width="5%"><?php echo $status ?></th>
                                        <th width="5%"><?php echo $created ?></th>
                                        <th width="5%"><?php echo $modified ?></th>
                                        <th width="10%"><?php echo $actions ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < count($tab_conducteur); $i++) {
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td>
                                                                <div class="user-profile" style="width:100%;">
                                                                    <div class="profile-img" style="width:100%;">';
                                        if ($tab_conducteur[$i]['photo_path'] == "") {
                                            echo '<img src="../webservice/images/app_user/user_profile.jpg" alt="" width="100%" style="width:70px;height:70px;">';
                                        } else {
                                            echo '<img src="../webservice/images/app_user/' . $tab_conducteur[$i]['photo_path'] . '" alt="" width="100%" style="width:70px;height:70px;">';
                                        }

                                        echo '</div>
                                                                </div>
                                                            </td>
                                                            <td>' . $tab_conducteur[$i]['nom'] . '</td>
                                                            <td>' . $tab_conducteur[$i]['prenom'] . '</td>
                                                            <td>' . $tab_conducteur[$i]['phone'] . '</td>
                                                            <td>' . $tab_conducteur[$i]['cnib'] . '</td>
                                                            <td><span class="';
                                        if ($tab_conducteur[$i]['statut'] == "yes") {
                                            echo "badge badge-success";
                                        } else {
                                            echo "badge badge-danger";
                                        }
                                        echo '">' . $tab_conducteur[$i]['statut'] . '</span></td>
                                                            <td>' . $tab_conducteur[$i]['creer'] . '</td>
                                                            <td>' . $tab_conducteur[$i]['modifier'] . '</td>
                                                            <td>
                                                                <a href="../query/action.php?id_conducteur_activer=' . $tab_conducteur[$i]['id'] . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Activate"> <i class="fa fa-check"></i> </a>
                                                                <a href="driver-detail.php?id_conducteur=' . $tab_conducteur[$i]['id'] . '" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="View détails"> <i class="fa fa-ellipsis-h"></i> </a>
                                                            </td>
                                                        </tr>
                                                    ';
                                    }
                                    ?>
                                    <!-- <input type="hidden" value="'.$tab_conducteur[$i]['id'].'" name="" id="id_conducteur_'.$i.'">
                                    <button type="button" onclick="modConducteur(id_conducteur_'.$i.'.value);" class="btn btn-warning btn-sm" data-original-title="Modify" data-toggle="modal" data-target="#conducteur-mod"><i class="fa fa-pencil"></i></button>
                                    <a href="query/action.php?id_conducteur='.$tab_conducteur[$i]['id'].'" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a>
                                    <a href="query/action.php?id_conducteur_desactiver='.$tab_conducteur[$i]['id'].'" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="Deactivate"> <i class="fa fa-close"></i> </a> -->
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                    </div>
                    <div class="r-panel-body">
                        <ul id="themecolors" class="m-t-20">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                            <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                            <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a>
                            </li>
                        </ul>
                        <ul class="m-t-20 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/1.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Varun Dhavan <small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/2.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Genelia Deshmukh <small
                                                class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/3.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Ritesh Deshmukh <small
                                                class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/4.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Arijit Sinh <small
                                                class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/5.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Govinda Star <small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/6.jpg" alt="user-img"
                                                                  class="img-circle"> <span>John Abraham<small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/7.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Hritik Roshan<small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/8.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Pwandeep rajan <small
                                                class="text-success">online</small></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Right sidebar -->
        </div>

        <!-- footer -->
        <footer class="footer"> <?php include("include/footer.php"); ?> </footer>

    </div>

</div>

<!--Include footer script-->
<?php include("include/footer-script.php"); ?>

<script>
    function modConducteur(id_conducteur) {
        $.ajax({
            url: "query/ajax/getConducteurById.php",
            type: "POST",
            data: {"id_conducteur": id_conducteur},
            success: function (data) {
                $("#id_conducteur_mod").empty();
                $("#nom_conducteur_mod").empty();
                $("#prenom_conducteur_mod").empty();
                $("#cnib_conducteur_mod").empty();
                $("#login_conducteur_mod").empty();

                var data_parse = JSON.parse(data);

                $("#id_conducteur_mod").val(data_parse[0].id);
                $("#nom_conducteur_mod").val(data_parse[0].nom);
                $("#prenom_conducteur_mod").val(data_parse[0].prenom);
                $("#cnib_conducteur_mod").val(data_parse[0].cnib);
                $("#login_conducteur_mod").val(data_parse[0].phone);
                $("#statut_conducteur_mod").val(data_parse[0].statut).change();
            }
        });
    }
</script>


</body>

</html>

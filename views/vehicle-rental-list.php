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
                <h3 class="text-themecolor"><?php echo $vehicle ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item"><?php echo $coordination ?></li>
                    <li class="breadcrumb-item active"><?php echo $vehicle ?></li>
                </ol>
            </div>

        </div>

        <!-- Container fluid  -->
        <div class="container-fluid">

            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $list_of_vehicles ?></h4>
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#add-vehicule"><i class="fa fa-plus m-r-10"></i><?php echo $add ?>
                            </button>
                            <div id="add-vehicule" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-gris">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><?php echo $add_a_vehicle ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>
                                        <form class="form-horizontal " action="../models/action.php" method="post"
                                              enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <?php
                                                                $tab_vehicule[] = array();
                                                                $tab_vehicule = getTypeVehiculeRental();
                                                                ?>
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $vehicle_type ?></label>
                                                                <select class="form-control "
                                                                        id="exampleFormControlSelect1"
                                                                        name="type_vehicule_rental" required>
                                                                    <?php
                                                                    for ($i = 0; $i < count($tab_vehicule); $i++) {
                                                                        echo '<option value="' . $tab_vehicule[$i]['id'] . '"';
                                                                        if ($tab_vehicule[$i]['id'] != "Administrateur") {
                                                                            echo "selected";
                                                                        }
                                                                        echo '>' . $tab_vehicule[$i]['libelle'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Désolé, selectionnez le type de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $rental_price ?></label>
                                                                <input type="number" class="form-control "
                                                                       placeholder="" name="prix_vehicule_rental"
                                                                       id="prix_vehicule_rental" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $number_of_places ?></label>
                                                                <input type="number" class="form-control "
                                                                       placeholder="" name="nb_place_vehicule_rental"
                                                                       id="nb_place_vehicule_rental" required>
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
                                                                        name="statut_vehicule_rental" required>
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Désolé, selectionnez le type de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $number_of_vehicle ?></label>
                                                                <input type="number" class="form-control "
                                                                       placeholder="" name="nombre_vehicule_rental"
                                                                       id="nombre_vehicule_rental" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2" for="designation">Image</label>
                                                                <input type="file" class="form-control " placeholder="" name="image_vehicule_rental" id="image_vehicule_rental" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div> -->
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
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <div id="vehicule-mod" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-gris">
                                        <div class="modal-header">
                                            <h4 class="modal-title"
                                                id="myModalLabel"><?php echo $modify_a_vehicle; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>
                                        <form class="form-horizontal " action="../models/action.php" method="post"
                                              enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <input type="hidden" name="id_vehicule_rental_mod"
                                                               id="id_vehicule_rental_mod"
                                                               value="<?php echo $id_user; ?>">
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <?php
                                                                $tab_vehicule[] = array();
                                                                $tab_vehicule = getTypeVehiculeRental();
                                                                ?>
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $vehicle_type; ?></label>
                                                                <select class="form-control "
                                                                        id="type_vehicule_rental_mod"
                                                                        name="type_vehicule_rental_mod" required>
                                                                    <?php
                                                                    for ($i = 0; $i < count($tab_vehicule); $i++) {
                                                                        echo '<option value="' . $tab_vehicule[$i]['id'] . '"';
                                                                        if ($tab_vehicule[$i]['id'] != "Administrateur") {
                                                                            echo "selected";
                                                                        }
                                                                        echo '>' . $tab_vehicule[$i]['libelle'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Désolé, selectionnez le type de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $rental_price; ?></label>
                                                                <input type="number" class="form-control "
                                                                       placeholder="" name="prix_vehicule_rental_mod"
                                                                       id="prix_vehicule_rental_mod" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $number_of_places; ?></label>
                                                                <input type="number" class="form-control "
                                                                       placeholder=""
                                                                       name="nb_place_vehicule_rental_mod"
                                                                       id="nb_place_vehicule_rental_mod" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $status; ?></label>
                                                                <select class="form-control "
                                                                        id="statut_vehicule_rental_mod"
                                                                        name="statut_vehicule_rental_mod" required>
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Désolé, selectionnez le type de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $number_of_vehicle; ?></label>
                                                                <input type="number" class="form-control "
                                                                       placeholder="" name="nombre_vehicule_rental_mod"
                                                                       id="nombre_vehicule_rental_mod" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2" for="designation">Image</label>
                                                                <input type="file" class="form-control " placeholder="" name="image_vehicule_rental_mod" id="image_vehicule_rental_mod" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div> -->
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
                                $tab_vehicule[] = array();
                                $tab_vehicule = getVehiculeRental();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Image</th>
                                        <th>Type of vehicle</th>
                                        <th>Number of vehicle</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Modified</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < count($tab_vehicule); $i++) {
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td><img src="../assets/images/type_vehicle_rental/' . $tab_vehicule[$i]['image'] . '"width="100%"/></td>
                                                            <td>' . $tab_vehicule[$i]['libTypeVehicule'] . '</td>
                                                            <td>' . $tab_vehicule[$i]['nombre'] . '</td>
                                                            <td><span class="';
                                        if ($tab_vehicule[$i]['statut'] == "yes") {
                                            echo "badge badge-success";
                                        } else {
                                            echo "badge badge-danger";
                                        }
                                        echo '">' . $tab_vehicule[$i]['statut'] . '</span></td>
                                                            <td>' . $tab_vehicule[$i]['creer'] . '</td>
                                                            <td>' . $tab_vehicule[$i]['modifier'] . '</td>
                                                            <td>
                                                                <input type="hidden" value="' . $tab_vehicule[$i]['id'] . '" name="" id="id_vehicule_' . $i . '">
                                                                <button type="button" onclick="modVehicule(id_vehicule_' . $i . '.value);" class="btn btn-warning btn-sm" data-original-title="Modify" data-toggle="modal" data-target="#vehicule-mod"><i class="fa fa-pencil"></i></button>
                                                                <a href="../query/action.php?id_vehicule_rental_activer=' . $tab_vehicule[$i]['id'] . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Activate"> <i class="fa fa-check"></i> </a>
                                                                <a href="../query/action.php?id_vehicule_rental_desactiver=' . $tab_vehicule[$i]['id'] . '" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="Deactivate"> <i class="fa fa-close"></i> </a>
                                                            </td>
                                                        </tr>
                                                    ';
                                    }
                                    ?>
                                    <!-- <a href="query/action.php?id_vehicule_rental='.$tab_vehicule[$i]['id'].'" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a> -->
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
    function modVehicule(id_vehicule) {
        $.ajax({
            url: "query/ajax/getVehiculeRentalById.php",
            type: "POST",
            data: {"id_vehicule": id_vehicule},
            success: function (data) {
                $("#id_vehicule_rental_mod").empty();
                $("#prix_vehicule_rental_mod").empty();
                $("#nb_place_vehicule_rental_mod").empty();
                $("#nombre_vehicule_rental_mod").empty();

                var data_parse = JSON.parse(data);

                $("#id_vehicule_rental_mod").val(data_parse[0].id);
                $("#statut_vehicule_rental_mod").val(data_parse[0].statut).change();
                $("#prix_vehicule_rental_mod").val(data_parse[0].prix);
                $("#nb_place_vehicule_rental_mod").val(data_parse[0].nb_place);
                $("#nombre_vehicule_rental_mod").val(data_parse[0].nombre);
                $("#type_vehicule_rental_mod").val(data_parse[0].id_type_vehicule_rental).change();
            }
        });
    }
</script>

</body>

</html>

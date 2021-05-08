<?php include("include/checker.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php include("include/header-script.php"); ?>

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
                <h3 class="text-themecolor"><?php echo $vehicle_type ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item"><?php echo $codification ?></li>
                    <li class="breadcrumb-item active"><?php echo $vehicle_type ?></li>
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
                            <h4 class="card-title"><?php echo $list_of_vehicle_types ?></h4>

                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#add-type-vehicule"><i class="fa fa-plus m-r-10"></i><?php echo $add ?>
                            </button>

                            <div id="add-type-vehicule" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content bg-gris">

                                        <div class="modal-header">

                                            <h4 class="modal-title"
                                                id="myModalLabel"><?php echo $add_a_vehicle_type ?></h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>


                                        </div>

                                        <form class="form-horizontal " action="../controller/action.php" method="post"
                                              enctype="multipart/form-data">

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <div class="row">


                                                        <div class="col-md-12 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $name ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="libelle_type_vehicule_rental" required>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $image ?></label>
                                                                <input type="file" class="form-control " placeholder=""
                                                                       name="image_vehicule_rental"
                                                                       id="image_vehicule_rental" required>
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


                            <div id="type-vehicule-mod" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">


                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content bg-gris">

                                        <div class="modal-header">
                                            <h4 class="modal-title"
                                                id="myModalLabel"><?php echo $modify_a_vehicle_type ?></h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>

                                        <form class="form-horizontal " action="../controller/action.php" method="post"
                                              enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <input type="hidden" name="id_type_vehicule_rental_mod"
                                                               id="id_type_vehicule_rental_mod"
                                                               value="<?php echo $id_user; ?>">
                                                        <div class="col-md-12 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $name ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="libelle_type_vehicule_rental_mod"
                                                                       id="libelle_type_vehicule_rental_mod" required>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $image ?></label>
                                                                <input type="file" class="form-control " placeholder=""
                                                                       name="image_vehicule_rental_mod"
                                                                       id="image_vehicule_rental_mod" required>
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
                                $tab_type_vehicule[] = array();
                                $tab_type_vehicule = getTypeVehiculeRental();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th><?php echo $name ?></th>
                                        <!-- <th>Price</th> -->
                                        <th><?php echo $image ?></th>
                                        <th><?php echo $created ?></th>
                                        <th><?php echo $modified ?></th>
                                        <th><?php echo $actions ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < count($tab_type_vehicule); $i++) {
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td>' . $tab_type_vehicule[$i]['libelle'] . '</td>
                                                            <td width="10%"><img width="100%" src="../public/assets/images/type_vehicle_rental/' . $tab_type_vehicule[$i]['image'] . '" alt=""></td>
                                                            <td>' . $tab_type_vehicule[$i]['creer'] . '</td>
                                                            <td>' . $tab_type_vehicule[$i]['modifier'] . '</td>
                                                            <td>
                                                                <input type="hidden" value="' . $tab_type_vehicule[$i]['id'] . '" name="" id="id_type_vehicule_' . $i . '">
                                                                
                                                                <button type="button" onclick="modTypeVehicule(id_type_vehicule_' . $i . '.value);" class="btn btn-warning btn-sm" data-original-title="Modifiy" data-toggle="modal" data-target="#type-vehicule-mod"><i class="fa fa-pencil"></i></button>
                                                                
                                                                <a href="../controller/action.php?id_type_vehicule_rental=' . $tab_type_vehicule[$i]['id'] . '" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a>
                                                                
                                                            </td>
                                                        </tr>
                                                    ';
                                    }
                                    ?>
                                    <!-- <td>'.$tab_type_vehicule[$i]['prix'].'</td> -->
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
    function modTypeVehicule(id_type) {
        $.ajax({
            url: "../controller/getTypeVehiculeRentalById.php",
            type: "POST",
            data: {"id_type": id_type},
            success: function (data) {
                $("#id_type_vehicule_rental_mod").empty();
                $("#libelle_type_vehicule_rental_mod").empty();
                // $("#price_vehicule_rental_mod").empty();

                var data_parse = JSON.parse(data);

                $("#id_type_vehicule_rental_mod").val(data_parse[0].id);
                $("#libelle_type_vehicule_rental_mod").val(data_parse[0].libelle);
                // $("#price_vehicule_rental_mod").val(data_parse[0].prix);
            }
        });
    }
</script>


</body>

</html>

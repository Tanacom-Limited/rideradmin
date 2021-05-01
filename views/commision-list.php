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
                <h3 class="text-themecolor"><?php echo $commission; ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item"><?php echo $codification; ?></li>
                    <li class="breadcrumb-item active"><?php echo $commission; ?></li>
                </ol>
            </div>

        </div>

        <!-- Container fluid  -->
        <div class="container-fluid">

            <!-- Start Page Content -->
            <div class="row">

                <div class="col-md-12">
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h3 class="text-info"><i class="fa fa-exclamation-circle"></i> <?php echo $information; ?></h3>
                        <?php echo $info_msg; ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $percentage_commission; ?></h4>

                            <div id="add-commission-perc" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-gris">
                                        <div class="modal-header">
                                            <h4 class="modal-title"
                                                id="myModalLabel"><?php echo $add_a_commission; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>
                                        <form class="form-horizontal " action="../models/action.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $title; ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="libelle_commission_perc"
                                                                       id="libelle_commission_perc" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $value; ?></label>
                                                                <input type="number" step="0.01" value="0.01" min="0.01"
                                                                       max="0.99" class="form-control " placeholder=""
                                                                       name="value_commission_perc"
                                                                       id="value_commission_perc" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $type; ?></label>
                                                                <select name="type_commission_perc"
                                                                        id="type_commission_perc" class="form-control"
                                                                        required>
                                                                    <option value="Percentage" selected>Percentage
                                                                    </option>
                                                                    <!-- <option value="Fixed">Fixed</option> -->
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
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <div id="commission-mod-perc" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-gris">
                                        <div class="modal-header">
                                            <h4 class="modal-title"
                                                id="myModalLabel"><?php echo $modify_a_commision; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>
                                        <form class="form-horizontal " action="../models/action.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <input type="hidden" name="id_commission_mod_perc"
                                                               id="id_commission_mod_perc"
                                                               value="<?php echo $id_user; ?>">
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $title; ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="libelle_commission_mod_perc"
                                                                       id="libelle_commission_mod_perc" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $value; ?>
                                                                    Value</label>
                                                                <input type="number" class="form-control" step="0.01"
                                                                       value="0.01" min="0.01" max="0.99" placeholder=""
                                                                       name="value_commission_mod_perc"
                                                                       id="value_commission_mod_perc" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $type; ?></label>
                                                                <select name="type_commission_mod_perc"
                                                                        id="type_commission_mod_perc"
                                                                        class="form-control" required>
                                                                    <option value="Percentage" selected>Percentage
                                                                    </option>
                                                                    <!-- <option value="Fixed">Fixed</option> -->
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
                                $tab_commission[] = array();
                                $tab_commission = getCommissionPerc();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th><?php echo $name; ?></th>
                                        <th><?php echo $value; ?></th>
                                        <th><?php echo $type; ?></th>
                                        <th><?php echo $status; ?></th>
                                        <th><?php echo $created; ?></th>
                                        <th><?php echo $modified; ?></th>
                                        <th><?php echo $actions; ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < count($tab_commission); $i++) {
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td>' . $tab_commission[$i]['libelle'] . '</td>
                                                            <td>' . $tab_commission[$i]['value'] . '</td>
                                                            <td>' . $tab_commission[$i]['type'] . '</td>
                                                            <td><span class="';
                                        if ($tab_commission[$i]['statut'] == "yes") {
                                            echo "badge badge-success";
                                        } else {
                                            echo "badge badge-danger";
                                        }
                                        echo '">' . $tab_commission[$i]['statut'] . '</span></td>
                                                            <td>' . $tab_commission[$i]['creer'] . '</td>
                                                            <td>' . $tab_commission[$i]['modifier'] . '</td>
                                                            <td>
                                                                <input type="hidden" value="' . $tab_commission[$i]['id'] . '" name="" id="id_commission_perc_' . $i . '">
                                                                <button type="button" onclick="modCommissionPerc(id_commission_perc_' . $i . '.value);" class="btn btn-warning btn-sm" data-original-title="Modifiy" data-toggle="modal" data-target="#commission-mod-perc"><i class="fa fa-pencil"></i></button>
                                                                <a href="query/action.php?id_commission_activer=' . $tab_commission[$i]['id'] . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Activate"> <i class="fa fa-check"></i> </a>
                                                            </td>
                                                        </tr>
                                                    ';
                                    }
                                    ?>
                                    <!-- <a href="query/action.php?id_commission_desactiver='.$tab_commission[$i]['id'].'" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="Deactivate"> <i class="fa fa-close"></i> </a> -->
                                    <!-- <a href="query/action.php?id_commission='.$tab_commission[$i]['id'].'" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $fixed_commission; ?></h4>
                            <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                            <!-- <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#add-commission"><i class="fa fa-plus m-r-10"></i>Add</button> -->
                            <div id="add-commission" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-gris">
                                        <div class="modal-header">
                                            <h4 class="modal-title"
                                                id="myModalLabel"><?php echo $add_a_commission; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>
                                        <form class="form-horizontal " action="../models/action.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $title; ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="libelle_commission" id="libelle_commission"
                                                                       required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $value; ?></label>
                                                                <input type="number" class="form-control "
                                                                       placeholder="" min="1" name="value_commission"
                                                                       id="value_commission" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $type; ?></label>
                                                                <select name="type_commission" id="type_commission"
                                                                        class="form-control" required>
                                                                    <!-- <option value="Percentage" selected>Percentage</option> -->
                                                                    <option value="Fixed">Fixed</option>
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
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <div id="commission-mod" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-gris">
                                        <div class="modal-header">
                                            <h4 class="modal-title"
                                                id="myModalLabel"><?php echo $modify_a_commision; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>
                                        <form class="form-horizontal " action="../models/action.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <input type="hidden" name="id_commission_mod"
                                                               id="id_commission_mod" value="<?php echo $id_user; ?>">
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $title; ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="libelle_commission_mod"
                                                                       id="libelle_commission_mod" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $value; ?></label>
                                                                <input type="number" class="form-control" placeholder=""
                                                                       min="1" name="value_commission_mod"
                                                                       id="value_commission_mod" required>
                                                                <div class="invalid-feedback">
                                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $type; ?></label>
                                                                <select name="type_commission_mod"
                                                                        id="type_commission_mod" class="form-control"
                                                                        required>
                                                                    <!-- <option value="Percentage" selected>Percentage</option> -->
                                                                    <option value="Fixed">Fixed</option>
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
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <div class="table-responsive m-t-10">
                                <?php
                                $tab_commission[] = array();
                                $tab_commission = getCommissionFixed();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th><?php echo $name; ?></th>
                                        <th><?php echo $value; ?></th>
                                        <th><?php echo $type; ?></th>
                                        <th><?php echo $status; ?></th>
                                        <th><?php echo $created; ?></th>
                                        <th><?php echo $modified; ?></th>
                                        <th><?php echo $actions; ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < count($tab_commission); $i++) {
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td>' . $tab_commission[$i]['libelle'] . '</td>
                                                            <td>' . $tab_commission[$i]['value'] . '</td>
                                                            <td>' . $tab_commission[$i]['type'] . '</td>
                                                            <td><span class="';
                                        if ($tab_commission[$i]['statut'] == "yes") {
                                            echo "badge badge-success";
                                        } else {
                                            echo "badge badge-danger";
                                        }
                                        echo '">' . $tab_commission[$i]['statut'] . '</span></td>
                                                            <td>' . $tab_commission[$i]['creer'] . '</td>
                                                            <td>' . $tab_commission[$i]['modifier'] . '</td>
                                                            <td>
                                                                <input type="hidden" value="' . $tab_commission[$i]['id'] . '" name="" id="id_commission_' . $i . '">
                                                                <button type="button" onclick="modCommission(id_commission_' . $i . '.value);" class="btn btn-warning btn-sm" data-original-title="Modifiy" data-toggle="modal" data-target="#commission-mod"><i class="fa fa-pencil"></i></button>
                                                                <a href="query/action.php?id_commission_activer=' . $tab_commission[$i]['id'] . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Activate"> <i class="fa fa-check"></i> </a>
                                                                <a href="query/action.php?id_commission_desactiver=' . $tab_commission[$i]['id'] . '" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="Deactivate"> <i class="fa fa-close"></i> </a>
                                                            </td>
                                                        </tr>
                                                    ';
                                    }
                                    ?>
                                    <!-- <a href="query/action.php?id_commission='.$tab_commission[$i]['id'].'" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a> -->
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
    function modCommission(id_commission) {
        $.ajax({
            url: "query/ajax/getCommissionById.php",
            type: "POST",
            data: {"id_commission": id_commission},
            success: function (data) {
                $("#id_commission_mod").empty();
                $("#libelle_commission_mod").empty();
                $("#value_commission_mod").empty();

                var data_parse = JSON.parse(data);

                $("#id_commission_mod").val(data_parse[0].id);
                $("#libelle_commission_mod").val(data_parse[0].libelle);
                $("#value_commission_mod").val(data_parse[0].value);
                $("#type_commission_mod").val(data_parse[0].type).selected;
            }
        });
    }

    function modCommissionPerc(id_commission) {
        $.ajax({
            url: "query/ajax/getCommissionById.php",
            type: "POST",
            data: {"id_commission": id_commission},
            success: function (data) {
                $("#id_commission_mod_perc").empty();
                $("#libelle_commission_mod_perc").empty();
                $("#value_commission_mod_perc").empty();

                var data_parse = JSON.parse(data);

                $("#id_commission_mod_perc").val(data_parse[0].id);
                $("#libelle_commission_mod_perc").val(data_parse[0].libelle);
                $("#value_commission_mod_perc").val(data_parse[0].value);
                $("#type_commission_mod_perc").val(data_parse[0].type).selected;
            }
        });
    }
</script>

</body>

</html>

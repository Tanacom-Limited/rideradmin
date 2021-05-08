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
                <h3 class="text-themecolor"><?php echo $payment_method ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home ?></a></li>
                    <li class="breadcrumb-item"><?php echo $codification ?></li>
                    <li class="breadcrumb-item active"><?php echo $payment_method ?></li>
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

                            <h4 class="card-title"><?php echo $list_of_payment_method ?></h4>
                            <div id="add-payment-method" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-gris">
                                        <div class="modal-header">

                                            <h4 class="modal-title"
                                                id="myModalLabel"><?php echo $add_a_payment_method ?></h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>

                                        </div>


                                        <form class="form-horizontal " action="../controller/action.php" method="post"
                                              enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $name ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="libelle_method" id="libelle_method"
                                                                       required>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $status ?></label>
                                                                <select name="status_method" id="status_method"
                                                                        class="form-control" required>
                                                                    <option value="yes" selected>Enabled</option>
                                                                    <option value="no">Disabled</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $image ?></label>
                                                                <input type="file" class="form-control " placeholder=""
                                                                       name="image_method" id="image_method" required>

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


                            <div id="payment-method-mod" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-gris">
                                        <div class="modal-header">
                                            <h4 class="modal-title"
                                                id="myModalLabel"><?php echo $modify_a_payment_method ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>

                                        <form class="form-horizontal " action="../controller/action.php" method="post"
                                              enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <input type="hidden" name="id_method_mod" id="id_method_mod"
                                                               value="<?php echo $id_user; ?>">
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $name ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="libelle_method_mod" id="libelle_method_mod"
                                                                       required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $status ?></label>
                                                                <select id="status_method_mod" name="status_method_mod"
                                                                        class="form-control" required>
                                                                    <option value="yes" selected>Enabled</option>
                                                                    <option value="no">Disabled</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $image ?></label>
                                                                <input type="file" class="form-control " placeholder=""
                                                                       name="image_method_mod" id="image_method_mod"
                                                                       required>

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
                                $tab_payment_method[] = array();
                                $tab_payment_method = getPaymentMethod();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th><?php echo $name ?></th>
                                        <th><?php echo $image ?></th>
                                        <th><?php echo $status ?> (<?php echo $enabled ?>)</th>
                                        <th><?php echo $created ?> </th>
                                        <th><?php echo $modified ?> </th>
                                        <th><?php echo $actions ?> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < count($tab_payment_method); $i++) {
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td>' . $tab_payment_method[$i]['libelle'] . '</td>
                                                            <td width="10%"><img src="../public/assets/images/payment_method/' . $tab_payment_method[$i]['image'] . '" alt="" width="100%"></td>
                                                            <td><span class="';
                                        if ($tab_payment_method[$i]['statut'] == "yes") {
                                            echo "badge badge-success";
                                        } else {
                                            echo "badge badge-danger";
                                        }
                                        echo '">' . $tab_payment_method[$i]['statut'] . '</span></td>
                                                            <td>' . $tab_payment_method[$i]['creer'] . '</td>
                                                            <td>' . $tab_payment_method[$i]['modifier'] . '</td>
                                                            <td>                 <input type="hidden" value="' . $tab_payment_method[$i]['id'] . '" name=""
                                           id="id_method_' . $i . '">
                                    <button type="button" onclick="modPaymentMethod(id_method_' . $i . '.value);"
                                            class="btn btn-warning btn-sm" data-original-title="Modifiy"
                                            data-toggle="modal" data-target="#payment-method-mod"><i
                                                class="fa fa-pencil"></i></button>

                                    <a href="../controller/action.php?id_method=' . $tab_payment_method[$i]['id'] . '"
                                       class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete">
                                        <i class="fa fa-trash"></i> </a>
                                    <a href="../controller/action.php?id_method_activer=' . $tab_payment_method[$i]['id'] . '"
                                       class="btn btn-success btn-sm" data-toggle="tooltip"
                                       data-original-title="Activate"> <i class="fa fa-check"></i> </a>
                                    <a href="../controller/action.php?id_method_desactiver=' . $tab_payment_method[$i]['id'] . '"
                                       class="btn btn-inverse btn-sm" data-toggle="tooltip"
                                       data-original-title="Deactivate"> <i class="fa fa-close"></i> </a>
                                                            
                                                            
                                                            
                                                            
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

        <!-- End footer -->
    </div>

</div>

<!--Include footer script-->
<?php include("include/footer-script.php"); ?>

<script>
    function modPaymentMethod(id_method) {
        $.ajax({
            url: "../controller/getPaymentMethodById.php",
            type: "POST",
            data: {"id_method": id_method},
            success: function (data) {
                $("#id_method_mod").empty();
                $("#libelle_method_mod").empty();

                var data_parse = JSON.parse(data);

                $("#id_method_mod").val(data_parse[0].id);
                $("#libelle_method_mod").val(data_parse[0].libelle);
                $("#status_method_mod").val(data_parse[0].statut).selected;
            }
        });
    }
</script>

</body>

</html>

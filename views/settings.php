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
                <h3 class="text-themecolor"><?php echo $settings ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item active"><?php echo $admin_tools ?></li>
                    <li class="breadcrumb-item"><?php echo $settings ?></li>
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
                            <h4 class="card-title"><?php echo $settings ?></h4>

                            <form class="form-horizontal " action="../models/action.php" method="post"
                                  enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <?php
                                        $tab_settings[] = array();
                                        $tab_settings = getSettings();
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4 m-b-0">
                                                <div class="form-group mb-3">
                                                    <label class="mr-sm-2"
                                                           for="designation"><?php echo $admin_panel_title ?></label>
                                                    <input type="text" class="form-control " placeholder=""
                                                           name="setting_title" id="setting_title"
                                                           value='<?php if (count($tab_settings) != 0) echo $tab_settings[0]['title'] ?>'
                                                           required>
                                                    <div class="invalid-feedback">
                                                        Désolé, entrez l'intitulé de la catégorie de devis
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 m-b-0">
                                                <div class="form-group mb-3">
                                                    <label class="mr-sm-2"
                                                           for="designation"><?php echo $admin_panel_footer ?></label>
                                                    <input type="text" class="form-control " placeholder=""
                                                           name="setting_footer" id="setting_footer"
                                                           value='<?php if (count($tab_settings) != 0) echo $tab_settings[0]['footer'] ?>'
                                                           required>
                                                    <div class="invalid-feedback">
                                                        Désolé, entrez l'intitulé de la catégorie de devis
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 m-b-0">
                                                <div class="form-group mb-3">
                                                    <label class="mr-sm-2"
                                                           for="designation"><?php echo $reception_email_address ?></label>
                                                    <input type="text" class="form-control " placeholder=""
                                                           name="setting_email" id="setting_email" readonly
                                                           value='<?php if (count($tab_settings) != 0) echo $tab_settings[0]['email'] ?>'
                                                           required>
                                                    <div class="invalid-feedback">
                                                        Désolé, entrez l'intitulé de la catégorie de devis
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-dark waves-effect"><?php echo $save ?></button>
                                    <button type="button" class="btn btn-default waves-effect"
                                            data-dismiss="modal"><?php echo $cancel ?></button>
                                </div>
                            </form>
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
            url: "query/ajax/getTypeVehiculeById.php",
            type: "POST",
            data: {"id_type": id_type},
            success: function (data) {
                $("#id_type_vehicule_mod").empty();
                $("#libelle_type_vehicule_mod").empty();
                $("#price_vehicule_mod").empty();

                var data_parse = JSON.parse(data);

                $("#id_type_vehicule_mod").val(data_parse[0].id);
                $("#libelle_type_vehicule_mod").val(data_parse[0].libelle);
                $("#price_vehicule_mod").val(data_parse[0].prix);
            }
        });
    }
</script>

</body>

</html>

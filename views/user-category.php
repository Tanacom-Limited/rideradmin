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
                <h3 class="text-themecolor"><?php echo $user_cat; ?></h3>
            </div>

            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item"><?php echo $admin_tools; ?></li>
                    <li class="breadcrumb-item active"><?php echo $user_cat; ?></li>
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
                            <h4 class="card-title"><?php echo $categories_list; ?></h4>

                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#add-categorie-user"><i
                                        class="fa fa-plus m-r-10"></i><?php echo $add; ?></button>

                            <div id="add-categorie-user" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content bg-gris">

                                        <div class="modal-header">

                                            <h4 class="modal-title" id="myModalLabel"><?php echo $add_user_cat; ?></h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>

                                        </div>


                                        <form class="form-horizontal " action="../controller/action.php" method="post">

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12 m-b-0">
                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $name; ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="libelle_categorie_user" required>
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

                            <div id="categorie-user-mod" class="modal fade in" tabindex="-1" role="dialog"

                                 aria-labelledby="myModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-gris">
                                        <div class="modal-header">
                                            <h4 class="modal-title"
                                                id="myModalLabel"><?php echo $modify_user_cat; ?></h4>


                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>


                                        </div>


                                        <form class="form-horizontal " action="../controller/action.php" method="post">
                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <div class="row">


                                                        <input type="hidden" name="id_categorie_user_mod"
                                                               id="id_categorie_user_mod"
                                                               value="<?php echo $id_user; ?>">

                                                        <div class="col-md-12 m-b-0">

                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $name; ?></label>
                                                                <input type="text" class="form-control " placeholder=""
                                                                       name="libelle_categorie_user_mod"
                                                                       id="libelle_categorie_user_mod" required>
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
                                $tab_categorie_user[] = array();
                                $tab_categorie_user = getCategorieUser();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th><?php echo $name; ?></th>
                                        <th><?php echo $created; ?></th>
                                        <th><?php echo $modified; ?></th>
                                        <th><?php echo $actions; ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < count($tab_categorie_user); $i++) {
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td>' . $tab_categorie_user[$i]['libelle'] . '</td>
                                                            <td>' . $tab_categorie_user[$i]['creer'] . '</td>
                                                            <td>' . $tab_categorie_user[$i]['modifier'] . '</td>
                                                            <td>
                                                                
                                                                <input type="hidden" value="' . $tab_categorie_user[$i]['id'] . '" name="" id="id_categorie_user_' . $i . '">
                                                                
                                                                <button type="button" onclick="modCategorieUser(id_categorie_user_' . $i . '.value);" class="btn btn-warning btn-sm" data-original-title="Modify" data-toggle="modal" data-target="#categorie-user-mod"><i class="fa fa-pencil"></i></button>
                                                                
                                       
                                                                <a href="../controller/action.php?id_categorie_user=' . $tab_categorie_user[$i]['id'] . '" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a>
                                                                
                                                                
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

    function modCategorieUser(id_categorie) {
        $.ajax({
            url: "../controller/getCategorieUserById.php",
            type: "POST",
            data: {"id_categorie": id_categorie},
            success: function (data) {
                $("#id_categorie_user_mod").empty();
                $("#libelle_categorie_user_mod").empty();

                var data_parse = JSON.parse(data);

                $("#id_categorie_user_mod").val(data_parse[0].id);
                $("#libelle_categorie_user_mod").val(data_parse[0].libelle);
            }
        });
    }

</script>

</body>

</html>

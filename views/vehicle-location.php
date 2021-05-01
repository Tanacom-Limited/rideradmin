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
                <h3 class="text-themecolor"><?php echo $renting ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home ?></a></li>
                    <li class="breadcrumb-item"><?php echo $coordination ?></li>
                    <li class="breadcrumb-item active"><?php echo $renting ?></li>
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
                            <h4 class="card-title"><?php echo $list_of_rentals ?></h4>
                            <div class="table-responsive m-t-10">
                                <?php
                                $tab_location[] = array();
                                $tab_location = getLocation();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th><?php echo $vehicle ?></th>
                                        <th><?php echo $customer ?></th>
                                        <th><?php echo $number_of_days ?></th>
                                        <th><?php echo $start_date ?></th>
                                        <th><?php echo $end_date ?></th>
                                        <th><?php echo $contact ?></th>
                                        <th><?php echo $status ?></th>
                                        <th><?php echo $created ?></th>
                                        <th><?php echo $modified ?></th>
                                        <th><?php echo $actions ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < count($tab_location); $i++) {
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td>' . $tab_location[$i]['libTypeVehicule'] . '</td>
                                                            <td>' . $tab_location[$i]['nom'] . ' ' . $tab_location[$i]['prenom'] . '</td>
                                                            <td>' . $tab_location[$i]['nb_jour'] . '</td>
                                                            <td>' . $tab_location[$i]['date_debut'] . '</td>
                                                            <td>' . $tab_location[$i]['date_fin'] . '</td>
                                                            <td>' . $tab_location[$i]['contact'] . '</td>
                                                            <td><span class="';
                                        if ($tab_location[$i]['statut'] == "accepted") {
                                            echo "badge badge-success";
                                        } else if ($tab_location[$i]['statut'] == "in progress") {
                                            echo "badge badge-warning";
                                        } else if ($tab_location[$i]['statut'] == "refuse") {
                                            echo "badge badge-danger";
                                        } else {
                                            echo "badge badge-inverse";
                                        }
                                        echo '"';
                                        if ($tab_location[$i]['statut'] == "fenced") {
                                            echo 'style="color:#fff;"';
                                        }
                                        echo '>' . $tab_location[$i]['statut'] . '</span></td>
                                                            <td>' . $tab_location[$i]['creer'] . '</td>
                                                            <td>' . $tab_location[$i]['modifier'] . '</td>
                                                            <td>
                                                                <a href="../query/action.php?id_location=' . $tab_location[$i]['id'] . '" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a>
                                                                <a href="../query/action.php?id_location_activer=' . $tab_location[$i]['id'] . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Accept"> <i class="fa fa-check"></i> </a>
                                                                <a href="../query/action.php?id_location_desactiver=' . $tab_location[$i]['id'] . '" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="Refuse"> <i class="fa fa-close"></i> </a>
                                                                <a href="../query/action.php?id_location_cloturer=' . $tab_location[$i]['id'] . '" class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="Fence"> <i class="mdi mdi-alert"></i> </a>
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
    function modAnnee(id_annee) {
        $.ajax({
            url: "query/ajax/getAnneeById.php",
            type: "POST",
            data: {"id_annee": id_annee},
            success: function (data) {
                $("#id_annee_mod").empty();
                $("#libelle_annee_mod").empty();

                var data_parse = JSON.parse(data);

                $("#id_annee_mod").val(data_parse[0].id);
                $("#libelle_annee_mod").val(data_parse[0].libelle);
            }
        });
    }
</script>

</body>

</html>

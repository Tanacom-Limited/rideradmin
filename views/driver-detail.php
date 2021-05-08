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
                <h3 class="text-themecolor"><?php echo $driver_detail; ?></h3>
            </div>

            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item"><?php echo $driver; ?></li>
                    <li class="breadcrumb-item active"><?php echo $driver_detail; ?></li>
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

                            <?php

                            $tab_driver_info[0][] = array();
                            $tab_driver_info = getDriverById($_GET['id_driver_del']);

                            $tab_driver_vehicle_info[] = array();
                            $tab_driver_vehicle_info = getVehiculeByDriverId($_GET['id_driver_del']);

                            $tab_service_quest[] = array();
                            ?>

                            <h4 class="card-title"><?php echo $driver_details_of; ?><?php if (count($tab_driver_info) != 0) echo $tab_driver_info[0]['nom'] . ' ' . $tab_driver_info[0]['prenom']; ?></h4>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="user-profile" style="width:100%;">
                                        <div class="profile-img" style="width:20%;">
                                            <img class="profile-pic"
                                                 src="../webservice/images/app_user/<?php echo $tab_driver_info[0]['photo_path']; ?>"
                                                 alt=" DRIVER PIC" style="width:300px;height:300px;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5><?php echo $information; ?></h5>

                            <!-- INFORMATION-->
                            <div class="">

                                <div class="col-md-12">
                                    <label for="" class="label-detail-title"><?php echo $phone; ?>
                                        :</label> <?php echo $tab_driver_info[0]['phone']; ?>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="label-detail-title"><?php echo $email; ?>
                                        :</label> <?php echo $tab_driver_info[0]['email']; ?>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="label-detail-title"><?php echo $status; ?> :</label> <span
                                            class="<?php if ($tab_driver_info[0]['statut'] == "yes") {
                                                echo "badge badge-success";
                                            } else {
                                                echo "badge badge-danger";
                                            } ?>"><?php if ($tab_driver_info[0]['statut'] == "yes") {
                                            echo "Enabled";
                                        } else {
                                            echo "Disabled";
                                        } ?></span>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="label-detail-title"><?php echo $online; ?>
                                        :</label> <?php echo $tab_driver_info[0]['online']; ?>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="label-detail-title"><?php echo $created; ?>
                                        :</label> <?php echo $tab_driver_info[0]['creer']; ?>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="label-detail-title"><?php echo $edited; ?>
                                        :</label> <?php echo $tab_driver_info[0]['modifier']; ?>
                                </div>

                                <div class="col-md-12">
                                    <table>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="" class="label-detail-title"><?php echo $licence; ?>
                                                    :</label>
                                            </td>
                                            <td>
                                                <img class="m-l-40 p-10"
                                                     src="../webservice/images/app_user/<?php echo $tab_driver_info[0]['photo_licence_path']; ?>"
                                                     alt="" width="50%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="" class="label-detail-title"><?php echo $nic; ?> :</label>
                                            </td>
                                            <td>
                                                <img class="m-l-40 p-10"
                                                     src="../webservice/images/app_user/<?php echo $tab_driver_info[0]['photo_nic_path']; ?>"
                                                     alt="" width="50%">
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                            <!-- VEHICLE INFORMATION-->
                            <h5 class="m-t-20"><?php echo $vehicle_info; ?></h5>

                            <div class="">

                                <div class="col-md-12">

                                    <label for="" class="label-detail-title"><?php echo $brand; ?>
                                        : </label> <?php echo !empty($tab_driver_vehicle_info[0]['brand']) ? ($tab_driver_vehicle_info[0]['brand']) : ('EMPTY BRAND'); ?>

                                </div>

                                <div class="col-md-12">
                                    <label for="" class="label-detail-title"><?php echo $model; ?>
                                        :</label> <?php echo !empty($tab_driver_vehicle_info[0]['model']) ? ($tab_driver_vehicle_info[0]['model']) : ('EMPTY MODEL'); ?>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="label-detail-title"><?php echo $color; ?>
                                        :</label> <?php echo !empty($tab_driver_vehicle_info[0]['color']) ? ($tab_driver_vehicle_info[0]['color']) : ('EMPTY COLOR'); ?>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="label-detail-title"><?php echo $numberplate; ?>
                                        :</label> <?php echo !empty($tab_driver_vehicle_info[0]['numberplate']) ? ($tab_driver_vehicle_info[0]['numberplate']) : ('EMPTY NUMBER PLATE'); ?>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="label-detail-title"><?php echo $number_of_passenger; ?>
                                        :</label> <?php echo !empty($tab_driver_vehicle_info[0]['passenger']) ? ($tab_driver_vehicle_info[0]['passenger']) : ('EMPTY PASSENGER'); ?>
                                </div>

                                <!--                                <div class="col-md-12">-->
                                <!--                                    <a href="../controller/action.php?id_driver_activer=-->
                            </
                            /php //echo $_GET['id_driver_del']; ?><!--"-->
                            <!--                                       class="btn btn-success btn-sm" data-toggle="tooltip"-->
                            <!--                                       data-original-title="Activate"> --></
                        /php //echo $enable_account; ?><!-- <i-->
                        <!--                                                class="fa fa-check"></i> </a>-->
                        <!--                                </div>-->

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

</body>

</html>

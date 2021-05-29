<?php include("include/checker.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php include("include/header-script.php"); ?>

<body class="fix-header fix-sidebar card-no-border">

<!-- Main wrapper -->
<div id="main-wrapper">

    <!-- Topbar header  -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <?php include('include/header.php') ?>
        </nav>
    </header>

    <!-- Left Sidebar-->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <?php include("include/menu.php"); ?>
        </div>
    </aside>

    <!-- Page wrapper  -->
    <div class="page-wrapper">

        <!-- Bread crumb  -->
        <?php

        $tab_requete[] = array();
        $tab_requete = getRequeteAmount();

        $tab_requete_canceled[] = array();
        $tab_requete_canceled = getRequeteCanceledAmount();

        $tab_requete_confirmed[] = array();
        $tab_requete_confirmed = getRequeteConfirmedAmount();

        $tab_requete_onride[] = array();
        $tab_requete_onride = getRequeteOnRideAmount();

        $tab_requete_completed[] = array();
        $tab_requete_completed = getRequeteCompletedAmount();

        $tab_requete_sales_today[] = array();
        $tab_requete_sales_today = getRequeteAllSaleTodayAmount();

        $tab_requete_earn_month[] = array();
        $tab_requete_earn_month = getRequeteMonthEarnAmount();

        $tab_requete_earn_today[] = array();
        $tab_requete_earn_today = getRequeteTodayEarnAmount();

        $tab_requete_earn_week[] = array();
        $tab_requete_earn_week = getRequeteWeekEarnAmount();

        $tab_requete_new[] = array();
        $tab_requete_new = getRequeteNewAmount();

        $tab_currency[] = array();
        $tab_currency = getEnabledCurrency();

        $tab_driver[] = array();
        $tab_driver = getDriver();

        $tab_customer[] = array();
        $tab_customer = getUserApp();

        ?>

        <div class="row page-titles">

            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor"><?php echo $earning ?>
                    : <?php if ($tab_requete_completed[0]['earning'] != '') {
                        echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_completed[0]['earning'];
                    } else {
                        echo $tab_currency[0]['symbole'] . ' 0';
                    } ?></h3>
            </div>


            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo $home ?></a></li>
                    <li class="breadcrumb-item active"><?php echo $dashboard ?></li>
                </ol>
            </div>


            <div>
                <button class="right-side-toggle waves-effect waves-light  btn btn-circle btn-sm pull-right m-l-10 color-login">
                    <i class="ti-settings text-white "></i></button>
            </div>


        </div>

        <!-- Container fluid  -->
        <div class="container-fluid">

            <!--FIRST RECORD ROW-->
            <div class="row">

                <!-- DRIVER RECORD -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">

                        <a href="driver-list.php">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-user"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php echo count($tab_driver) ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $driver ?></h5></div>
                            </div>
                        </a>

                    </div>

                </div>

                <!-- CUSTOMER RECORD -->
                <div class="col-lg-3 col-md-6">

                    <div class="card">

                        <a href="customer-list.php">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-user"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php echo count($tab_customer) ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $customer ?></h5></div>
                            </div>
                        </a>

                    </div>

                </div>

                <!-- ALL RIDE CUSTOMER EARN -->
                <div class="col-lg-3 col-md-6">

                    <div class="card">

                        <a href="">

                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3>
                                </div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php echo $tab_currency[0]['symbole'] . ' ' . $tab_requete[0]['montant'] ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $customer ?> All ride</h5>
                                </div>
                            </div>

                        </a>

                    </div>

                </div>

                <!-- NEW RIDE EARN -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_new[0]['montant'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_new[0]['montant'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $new_ride ?></h5></div>
                            </div>
                        </a>

                    </div>
                </div>

            </div>

            <!--SECOND RECORD ROW-->
            <div class="row">

                <!-- CONFIRM RIDE RECORD -->
                <div class="col-lg-3 col-md-6">

                    <div class="card">
                        <a href="">

                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_confirmed[0]['montant'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_confirmed[0]['montant'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $confirmed_ride ?></h5></div>
                            </div>

                        </a>
                    </div>
                </div>

                <!-- ON RIDE RECORD -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_onride[0]['montant'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_onride[0]['montant'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $on_ride ?></h5></div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- COMPLETED RIDE RECORD -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_completed[0]['montant'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_completed[0]['montant'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $completed_ride ?></h5></div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- CANCELED RIDE RECORD -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_canceled[0]['montant'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_canceled[0]['montant'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $canceled_ride ?></h5></div>
                            </div>
                        </a>

                    </div>
                </div>

            </div>

            <h4>Earnings</h4>

            <!--THIRD RECORD ROW-->
            <div class="row">

                <!-- CONFIRMED RIDE RECORD -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_confirmed[0]['earning'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_confirmed[0]['earning'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $confirmed_ride ?></h5></div>
                            </div>

                        </a>

                    </div>
                </div>

                <!-- ON RIDE RECORD -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_onride[0]['earning'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_onride[0]['earning'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $on_ride ?></h5></div>
                            </div>
                        </a>

                    </div>


                </div>

                <!-- COMPLETED RIDE RECORD -->
                <div class="col-lg-3 col-md-6">

                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_completed[0]['earning'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_completed[0]['earning'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $completed_ride ?></h5></div>
                            </div>
                        </a>

                    </div>

                </div>

                <!-- CANCELED RIDE RECORD -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_canceled[0]['earning'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_canceled[0]['earning'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $canceled_ride ?></h5></div>
                            </div>
                        </a>

                    </div>

                </div>


            </div>

            <!--FOURTH RECORD ROW-->
            <div class="row">

                <!-- DRIVER SALE RECCORD -->
                <div class="col-lg-3 col-md-6">

                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_sales_today[0]['nb_sales'] != '') {
                                            echo $tab_requete_sales_today[0]['nb_sales'] . ' sales';
                                        } else {
                                            echo '0 sales';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $driver_sale_today ?></h5></div>
                            </div>
                        </a>

                    </div>

                </div>

                <!-- COMMISION FOR THE DAY RECORD -->
                <div class="col-lg-3 col-md-6">

                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_earn_today[0]['earning'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_earn_today[0]['earning'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $commission_for_the_day ?></h5></div>
                            </div>
                        </a>

                    </div>


                </div>

                <!-- COMMISION FOR THE WEEK -->
                <div class="col-lg-3 col-md-6">

                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_earn_week[0]['earning'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_earn_week[0]['earning'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $commission_for_the_week ?></h5></div>
                            </div>
                        </a>

                    </div>

                </div>

                <!-- COMMISION FOR THE MONTH -->
                <div class="col-lg-3 col-md-6">

                    <div class="card">

                        <a href="">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php if ($tab_requete_earn_month[0]['earning'] != '') {
                                            echo $tab_currency[0]['symbole'] . ' ' . $tab_requete_earn_month[0]['earning'];
                                        } else {
                                            echo $tab_currency[0]['symbole'] . ' 0';
                                        } ?></h3>
                                    <h5 class="text-muted m-b-0"><?php echo $commission_for_the_month ?></h5></div>
                            </div>
                        </a>

                    </div>

                </div>

            </div>

            <!--FIFTH RECORD ROW-->
            <div class="row">

                <!-- DRIVER ACTIVATION REQUEST RECORD -->
                <div class="col-lg-12 col-lg-12">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title"><i
                                        class="mdi mdi-account m-r-5 color-success"></i><?php echo $driver_activation_request ?>
                            </h4>


                            <div class="table-responsive m-t-10" style="height:180px;">

                                <?php
                                $tab_conducteur[] = array();
                                $tab_conducteur = getDriverDisabled();
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
                                            echo '<img src="../controller/webservice/images/app_user/user_profile.jpg" alt="" width="100%" style="width:70px;height:70px;">';
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
                                                                <a href="../controller/action.php?id_driver_activate=' . $tab_conducteur[$i]['id'] . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Activate"> <i class="fa fa-check"></i> </a>                                                          
                                                                          <input type="hidden" value="' . $tab_conducteur[$i]['id'] . '" name="" id="id_conducteur_' . $i . '">
                                 
                                    <a href="../controller/action.php?id_driver_del=' . $tab_conducteur[$i]['id'] . '" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a>
                                    <a href="../controller/action.php?id_driver_deactivate=' . $tab_conducteur[$i]['id'] . '" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="Deactivate"> <i class="fa fa-close"></i> </a>
                                                                
                                                            </td>
                                                        </tr>
                                                    ';
                                    }
                                    ?>
                                    <!--                                    <a href="driver-detail.php?id_conducteur=' . $tab_conducteur[$i]['id'] . '" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="View détails"> <i class="fa fa-ellipsis-h"></i> </a>-->
                                    <!--                                    <button type="button" onclick="modConducteur(id_conducteur_' . $i . '.value);" class="btn btn-warning btn-sm" data-original-title="Modify" data-toggle="modal" data-target="#conducteur-mod"><i class="fa fa-pencil"></i></button>-->

                                    </tbody>
                                </table>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

            <!--SIXTH RECORD ROW-->
            <div class="row">

                <!-- EARNING STATS RECORD -->
                <div class="col-lg-12">

                    <div class="card">

                        <div class="card-body">
                            <?php
                            $tab_currency[] = array();
                            $tab_currency = getEnabledCurrency();
                            // print_r(getEarningStatsDashboard(2020));
                            ?>

                            <h4 class="card-title"><?php echo $earning_stats ?>
                                (<?php echo $tab_currency[0]['symbole']; ?>)</h4>

                            <div id="chart">
                                <canvas id="chart2" height="50"></canvas>
                            </div>

                        </div>

                    </div>

                </div>

                <!--ADMINISTRATION RECORD -->
                <div class="col-lg-3 col-lg-4">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title"><i
                                        class="mdi mdi-settings m-r-5 color-info"></i><?php echo $admin_tools ?></h4>
                            <h6 class="card-subtitle"><?php echo $user_and_user_category_management_tool ?></h6>

                            <div class="button-group">

                                <a href="user-category.php"
                                   class="btn waves-effect waves-light btn-lg btn-info"><?php echo $user_cat ?></a>

                                <a href="user.php" class="btn waves-effect waves-light btn-lg btn-info">User admin.</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAXI BOOKING RECORD -->
                <div class="col-lg-3 col-lg-5">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title"><i
                                        class="mdi mdi-briefcase m-r-5 color-success"></i><?php echo $taxi_booking ?>
                            </h4>

                            <h6 class="card-subtitle"><?php echo $coordinate_all_actors_involved_in_the_taxi_services ?></h6>

                            <div class="button-group">

                                <a href="request-new-list.php"
                                   class="btn waves-effect waves-light btn-lg btn-success"><?php echo $new ?></a>

                                <a href="request-confirm-list.php"
                                   class="btn waves-effect waves-light btn-lg btn-success"><?php echo $confirmed ?></a>

                                <a href="request-onride-list.php"
                                   class="btn waves-effect waves-light btn-lg btn-success"><?php echo $on_ride ?></a>

                                <a href="request-completed-list.php"
                                   class="btn waves-effect waves-light btn-lg btn-success"><?php echo $completed ?></a>

                            </div>

                        </div>

                    </div>

                </div>

                <!--USERS OF APP RECORD -->
                <div class="col-lg-3 col-lg-3">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title"><i
                                        class="mdi mdi-account m-r-5 color-warning"></i><?php echo $user_app ?></h4>

                            <h6 class="card-subtitle"><?php echo $track_the_activities_of_users ?></h6>

                            <div class="button-group">

                                <a href="customer-list.php"
                                   class="btn waves-effect waves-light btn-lg btn-warning"><?php echo $user_list ?> </a>

                                <a href="driver-list.php"
                                   class="btn waves-effect waves-light btn-lg btn-warning"><?php echo $driver_list ?> </a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--SEVENTH RECORD ROW-->
            <div class="row m-t-0">
                <div class="col-md-12">

                    <h3><?php echo $live_tracking ?></h3>

                    <div id="map"></div>

                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=GOOGLE_API_KEY&callback=initMap">
                    </script>

                </div>
            </div>

            <!-- SETTING ROW -->
            <div class="right-sidebar">

                <div class="slimscrollright">

                    <div class="rpanel-title"> Chat Panel <span><i class="ti-close right-side-toggle"></i></span>

                    </div>

                    <div class="r-panel-body">

                        <ul class="m-t-20 chatonline">
                            <li><b>Agents</b></li>


                            <li>
                                <a href="javascript:void(0)"><img src="https://i.pravatar.cc/151"
                                                                  alt="user-img"
                                                                  class="img-circle"> <span> Tandoh <small
                                                class="text-success">online</small></span></a>
                            </li>

                            <li>
                                <a href="javascript:void(0)"><img src="https://i.pravatar.cc/155"
                                                                  alt="user-img"
                                                                  class="img-circle"> <span>Ama<small
                                                class="text-danger">Busy</small></span></a>
                            </li>


                            <li>
                                <a href="javascript:void(0)"><img src="https://i.pravatar.cc/150"
                                                                  alt="user-img"
                                                                  class="img-circle"> <span>Isaac <small
                                                class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="https://i.pravatar.cc/160"
                                                                  alt="user-img"
                                                                  class="img-circle"> <span>Akowuah<small
                                                class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../public/assets/images/users/flag.png"
                                                                  alt="user-img"
                                                                  class="img-circle"> <span>Tanacom<small
                                                class="text-muted">Offline</small></span></a>
                            </li>

                            <li>
                                <a href="javascript:void(0)"><img src="https://i.pravatar.cc/157"
                                                                  alt="user-img"
                                                                  class="img-circle"> <span> Yakubu<small
                                                class="text-success">online</small></span></a>
                            </li>

                            <li>
                                <a href="javascript:void(0)"><img src="https://i.pravatar.cc/154"
                                                                  alt="user-img"
                                                                  class="img-circle"> <span>Afiba<small
                                                class="text-warning">Away</small></span></a>
                            </li>


                        </ul>

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

    initMap();

    let gmarkers = [];
    let map;

    function initMap() {
        $.ajax({
            url: "../controller/getAllVehicle.php",
            type: "POST",
            data: {"id": "ok"},
            success: function (data) {
                let data_parse = JSON.parse(data);
                if (data_parse.length != 0) {
                    for (let i = 0; i < data_parse.length; i++) {
                        let lat = data_parse[i].latitude;
                        let lng = data_parse[i].longitude;
                        let prenom = data_parse[i].prenom;
                        let phone = data_parse[i].phone;
                        let nom = data_parse[i].nom;
                        let online = data_parse[i].online;
                        let nom_prenom = prenom + " " + nom;

                        var uluru = {lat: parseFloat(lat), lng: parseFloat(lng)};

                        if (i == 0) {
                            map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 15,
                                center: uluru
                            });
                        }

                        if (online == "yes")
                            var image = '../public/assets/images/marker.png';
                        else
                            var image = '../public/assets/images/marker_red.png';


                        var marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                            icon: image,
                            title: nom_prenom
                        });
                        showInfo(map, marker, phone);
                        // Push your newly created marker into the array:
                        gmarkers.push(marker);
                    }
                } else {
                    var uluru = {lat: parseFloat("11.111111"), lng: "-1.133344"};
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: uluru
                    });
                }
                addYourLocationButton(map, marker);
            }
        });
    }

    function showInfo(map, marker, phone) {
        var infoWindow = new google.maps.InfoWindow();
        google.maps.event.addListener(marker, 'click', function () {
            var markerContent = "<h4>Name : " + marker.getTitle() + "</h4> <h6>Phone : " + phone + "</h6>";
            infoWindow.setContent(markerContent);
            infoWindow.open(map, this);
        });
        new google.maps.event.trigger(marker, 'click');
    }

    function addYourLocationButton(map, marker) {

        let controlDiv = document.createElement('div');

        let firstChild = document.createElement('button');
        firstChild.style.backgroundColor = '#fff';
        firstChild.style.border = 'none';
        firstChild.style.outline = 'none';
        firstChild.style.width = '40px';
        firstChild.style.height = '40px';
        firstChild.style.borderRadius = '2px';
        firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
        firstChild.style.cursor = 'pointer';
        firstChild.style.marginRight = '10px';
        firstChild.style.padding = '0px';
        firstChild.title = 'Your Location';
        controlDiv.appendChild(firstChild);

        let secondChild = document.createElement('div');
        secondChild.style.margin = '10px';
        secondChild.style.width = '18px';
        secondChild.style.height = '18px';
        secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
        secondChild.style.backgroundSize = '180px 18px';
        secondChild.style.backgroundPosition = '0px 0px';
        secondChild.style.backgroundRepeat = 'no-repeat';
        secondChild.id = 'you_location_img';
        firstChild.appendChild(secondChild);

        google.maps.event.addListener(map, 'dragend', function () {
            $('#you_location_img').css('background-position', '0px 0px');
        });

        firstChild.addEventListener('click', function () {
            var imgX = '0';
            var animationInterval = setInterval(function () {
                if (imgX == '-18') imgX = '0';
                else imgX = '-18';
                $('#you_location_img').css('background-position', imgX + 'px 0px');
            }, 500);
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    marker.setPosition(latlng);
                    map.setCenter(latlng);
                    clearInterval(animationInterval);
                    $('#you_location_img').css('background-position', '-144px 0px');
                });
            }
            else {
                clearInterval(animationInterval);
                $('#you_location_img').css('background-position', '0px 0px');
            }
        });

        controlDiv.index = 1;
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
    }

    function removeMarkers() {
        for (i = 0; i < gmarkers.length; i++) {
            gmarkers[i].setMap(null);
        }
    }

    function getVehicleAll2() {
        $.ajax({
            url: "../controller/getAllVehicle.php",
            type: "POST",
            data: {"id": "ok"},
            success: function (data) {
                var data_parse = JSON.parse(data);
                removeMarkers();
                for (var i = 0; i < data_parse.length; i++) {
                    var lat = data_parse[i].latitude;
                    var lng = data_parse[i].longitude;
                    var prenom = data_parse[i].prenom;
                    var phone = data_parse[i].phone;
                    var nom = data_parse[i].nom;
                    var online = data_parse[i].online;
                    var nom_prenom = prenom + " " + nom;
                    var uluru = {lat: parseFloat(lat), lng: parseFloat(lng)};


                    if (online == "yes")
                        var image = '../public/assets/images/marker.png';
                    else
                        var image = '../public/assets/images/marker_red.png';


                    var marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                        icon: image,
                        title: nom_prenom
                    });
                    showInfo(map, marker, phone);
                    // Push your newly created marker into the array:
                    gmarkers.push(marker);
                }
            }
        });
    }

    function foo() {
        var day = new Date().getDay();
        var hours = new Date().getHours();

        // alert('day: ' + day + '  Hours : ' + hours );
        getVehicleAll2();

        if (day === 0 && hours > 12 && hours < 13) {
        }

    }

    setInterval(foo, 3000);

    apply(new Date().getFullYear());

    function apply(year) {
        $("#loader").css("display", "block");
        $.ajax({
            url: "../controller/getEarningStatsDashboard.php",
            type: "POST",
            data: {"year": year},
            success: function (data) {
                $("#chart2").remove();
                $("#chart").append('<canvas id="chart2" height="50"></canvas>');

                var data_parse = JSON.parse(data);

                var ctx2 = document.getElementById("chart2").getContext("2d");
                var v01 = 0;
                var v02 = 0;
                var v03 = 0;
                var v04 = 0;
                var v05 = 0;
                var v06 = 0;
                var v07 = 0;
                var v08 = 0;
                var v09 = 0;
                var v10 = 0;
                var v11 = 0;
                var v12 = 0;
                for (let i = 0; i < data_parse.length; i++) {
                    date = data_parse[i].creer;
                    tab_tab = date.split('-');
                    var expr = tab_tab[1];
                    var nb = expr;
                    switch (nb) {
                        case '01':
                            v01 = parseInt(v01) + parseInt(data_parse[i].montant);
                            break;
                        case '02':
                            v02 = parseInt(v02) + parseInt(data_parse[i].montant);
                            break;
                        case '03':
                            v03 = parseInt(v03) + parseInt(data_parse[i].montant);
                            break;
                        case '04':
                            v04 = parseInt(v04) + parseInt(data_parse[i].montant);
                            break;
                        case '05':
                            v05 = parseInt(v05) + parseInt(data_parse[i].montant);
                            break;
                        case '06':
                            v06 = parseInt(v06) + parseInt(data_parse[i].montant);
                            break;
                        case '07':
                            v07 = parseInt(v07) + parseInt(data_parse[i].montant);
                            break;
                        case '08':
                            v08 = parseInt(v08) + parseInt(data_parse[i].montant);
                            break;
                        case '09':
                            v09 = parseInt(v09) + parseInt(data_parse[i].montant);
                            break;
                        case '10':
                            v10 = parseInt(v10) + parseInt(data_parse[i].montant);
                            break;
                        case '11':
                            v11 = parseInt(v11) + parseInt(data_parse[i].montant);
                            break;
                        default:
                            v12 = parseInt(v12) + parseInt(data_parse[i].montant);
                            break;
                    }
                }

                var data_tab = [];
                for (let i = 0; i < 12; i++) {
                    switch (i) {
                        case 0:
                            data_tab[i] = v01;
                            break;
                        case 1:
                            data_tab[i] = v02;
                            break;
                        case 2:
                            data_tab[i] = v03;
                            break;
                        case 3:
                            data_tab[i] = v04;
                            break;
                        case 4:
                            data_tab[i] = v05;
                            break;
                        case 5:
                            data_tab[i] = v06;
                            break;
                        case 6:
                            data_tab[i] = v07;
                            break;
                        case 7:
                            data_tab[i] = v08;
                            break;
                        case 8:
                            data_tab[i] = v09;
                            break;
                        case 9:
                            data_tab[i] = v10;
                            break;
                        case 10:
                            data_tab[i] = v11;
                            break;
                        case 11:
                            data_tab[i] = v12;
                            break;
                        case 12:
                            data_tab[i] = v13;
                            break;
                        default:
                            data_tab[i] = '0';
                            break;
                    }
                }
                var data2 = {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    datasets: [
                        {
                            label: "Earning stats",
                            fillColor: "#ffb22b",
                            strokeColor: "#ffb22b",
                            highlightFill: "#eba327",
                            highlightStroke: "#eba327",
                            data: data_tab
                        }
                    ]
                };

                var chart2 = new Chart(ctx2).Bar(data2, {
                    scaleBeginAtZero: true,
                    scaleShowGridLines: true,
                    scaleGridLineColor: "rgba(0,0,0,.005)",
                    scaleGridLineWidth: 0,
                    scaleShowHorizontalLines: true,
                    scaleShowVerticalLines: true,
                    barShowStroke: true,
                    barStrokeWidth: 0,
                    tooltipCornerRadius: 2,
                    barDatasetSpacing: 3,
                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                    responsive: true
                });
            }
        });
    }


</script>

</body>

</html>

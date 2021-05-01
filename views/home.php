<?php include("include/checker.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php include("include/head.php"); ?>

<body class="fix-header fix-sidebar card-no-border">

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
        $tab_driver = getConducteur();

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
            
        </div>



        <!-- Container fluid  -->
        <div class="container-fluid">

            <div class="row">

                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-info">
                                <h3 class="text-white box m-b-0"><i class="ti-user"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php echo count($tab_driver) ?></h3>
                                <h5 class="text-muted m-b-0"><?php echo $driver ?></h5></div>
                        </div>
                    </div>

                </div>

                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-info">
                                <h3 class="text-white box m-b-0"><i class="ti-user"></i></h3></div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php echo count($tab_customer) ?></h3>
                                <h5 class="text-muted m-b-0"><?php echo $customer ?></h5></div>
                        </div>
                    </div>
                </div>

                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-info">
                                <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3>
                            </div>
                            <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php echo $tab_currency[0]['symbole'] . ' ' . $tab_requete[0]['montant'] ?></h3>
                                <h5 class="text-muted m-b-0"><?php echo $customer ?>All ride</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>

            </div>

            <div class="row">

                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>

                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>

                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>


                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>

            </div>

            <h4>Earnings</h4>
            <div class="row">
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>
                <!-- Column -->
            </div>

            <div class="row">
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
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
                    </div>
                </div>
                <!-- Column -->
            </div>

            <div class="row">
                <!-- Column -->
                <div class="col-lg-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><i
                                        class="mdi mdi-account m-r-5 color-success"></i><?php echo $driver_activation_request ?>
                            </h4>
                            <div class="table-responsive m-t-10" style="height:160px;">
                                <?php
                                $tab_conducteur[] = array();
                                $tab_conducteur = getConducteurDisabled();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%" height="100%;">
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
                                            echo '<img src="on_demand_taxi_webservice/images/app_user/user_profile.jpg" alt="" width="100%" style="width:70px;height:70px;">';
                                        } else {
                                            echo '<img src="on_demand_taxi_webservice/images/app_user/' . $tab_conducteur[$i]['photo_path'] . '" alt="" width="100%" style="width:70px;height:70px;">';
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
                                                                <a href="query/action.php?id_conducteur_activer=' . $tab_conducteur[$i]['id'] . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Activate"> <i class="fa fa-check"></i> </a>
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

            <div class="row">
                <!-- column -->
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
                                <canvas id="chart2" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column -->
                <!-- Column -->
                <div class="col-lg-3 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><i
                                        class="mdi mdi-briefcase m-r-5 color-success"></i><?php echo $taxi_booking ?>
                            </h4>
                            <h6 class="card-subtitle"><?php echo $coordinate_all_actors_involved_in_the_taxi_services ?></h6>
                            <div class="button-group">
                                <!-- <a href="requete.php" class="btn waves-effect waves-light btn-lg btn-success">All </a> -->
                                <a href="requete-new.php"
                                   class="btn waves-effect waves-light btn-lg btn-success"><?php echo $new ?></a>
                                <a href="requete-confirmed.php"
                                   class="btn waves-effect waves-light btn-lg btn-success"><?php echo $confirmed ?></a>
                                <a href="requete-onride.php"
                                   class="btn waves-effect waves-light btn-lg btn-success"><?php echo $on_ride ?></a>
                                <a href="requete-completed.php"
                                   class="btn waves-effect waves-light btn-lg btn-success"><?php echo $completed ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><i
                                        class="mdi mdi-settings m-r-5 color-info"></i><?php echo $admin_tools ?></h4>
                            <h6 class="card-subtitle"><?php echo $user_and_user_category_management_tool ?></h6>
                            <div class="button-group">
                                <a href="categorie-user.php"
                                   class="btn waves-effect waves-light btn-lg btn-info"><?php echo $user_cat ?></a>
                                <!-- <a href="user.php" class="btn waves-effect waves-light btn-lg btn-info">User admin.</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><i
                                        class="mdi mdi-account m-r-5 color-warning"></i><?php echo $user_app ?></h4>
                            <h6 class="card-subtitle"><?php echo $track_the_activities_of_users ?></h6>
                            <div class="button-group">
                                <a href="list-user.php"
                                   class="btn waves-effect waves-light btn-lg btn-warning"><?php echo $user_list ?> </a>
                                <a href="conducteur.php"
                                   class="btn waves-effect waves-light btn-lg btn-warning"><?php echo $driver_list ?> </a>
                                <!-- <a href="suggestion.php" class="btn waves-effect waves-light btn-lg btn-warning">Suggestion</a>
                                <a href="commentaire-avis.php" class="btn waves-effect waves-light btn-lg btn-warning">Commentaire & avis</a> -->
                                <!-- <button type="button" class="btn waves-effect waves-light btn-lg btn-info">Type d'alerte</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><i class="mdi mdi-chart-areaspline m-r-5 color-primary"></i>Reporting &amp; Stats</h4>
                            <h6 class="card-subtitle">Reporting activities using reporting tools.</h6>
                            <div class="button-group">
                                <a href="" class="btn waves-effect waves-light btn-lg btn-primary">Statistics</a>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>

            <div class="row m-t-0">
                <div class="col-md-12">

                    <h3><?php echo $live_tracking ?></h3>
                    <div id="map"></div>
                    <script>
                        // function initMap() {
                        //     // var uluru = {lat: 28.501859, lng: 77.410320};
                        //     var map = new google.maps.Map(document.getElementById('map'), {
                        //     zoom: 4,
                        //     center: uluru
                        //     });
                        //     // var marker = new google.maps.Marker({
                        //     // position: uluru,
                        //     // map: map
                        //     // });
                        // }
                    </script>
                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=YOUR_MAP_API_KEY_HERE&callback=initMap">
                    </script>

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
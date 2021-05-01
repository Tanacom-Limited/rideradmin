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
        <!-- End Sidebar scroll-->
    </aside>

    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb and right sidebar toggle -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor"><?php echo $request; ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item"><?php echo $taxi_booking; ?></li>
                    <li class="breadcrumb-item active"><?php echo $request; ?></li>
                </ol>
            </div>
            <div>
                <!-- <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button> -->
            </div>
        </div>

        <!-- Container fluid  -->
        <div class="container-fluid">

            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $request; ?></h4>

                            <div class="table-responsive m-t-10">
                                <?php
                                $tab_requete[] = array();
                                $tab_requete = getRequeteNew();
                                $tab_currency[] = array();
                                $tab_currency = getEnabledCurrency();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><?php echo $payment; ?></th>
                                        <th width="5%"><?php echo $method; ?></th>
                                        <th><?php echo $customer; ?></th>
                                        <th><?php echo $driver; ?></th>
                                        <th><?php echo $depart; ?></th>
                                        <th><?php echo $destination; ?></th>
                                        <th><?php echo $distance; ?></th>
                                        <th><?php echo $duration; ?></th>
                                        <th><?php echo $cost; ?> (<?php echo $tab_currency[0]['symbole'] ?>)</th>
                                        <!-- <th>Path</th> -->
                                        <th><?php echo $status; ?></th>
                                        <!-- <th>Race status</th> -->
                                        <th><?php echo $created; ?></th>
                                        <th><?php echo $modified; ?></th>
                                        <th><?php echo $actions; ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < count($tab_requete); $i++) {
                                        $distance = $tab_requete[$i]['distance'];
                                        // $cout = ((400)/1000 * $distance);
                                        $statut_pay = "";
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td><span class="';
                                        if ($tab_requete[$i]['statut_paiement'] == 'yes') {
                                            echo 'badge badge-success';
                                            $statut_pay = 'Paid';
                                        } else {
                                            echo 'badge badge-warning';
                                            $statut_pay = 'Not paid';
                                        }
                                        echo '">' . $statut_pay . '</span></td>
                                                            <td width="5%"><img src="assets/images/payment_method/' . $tab_requete[$i]['payment_image'] . '" alt="" width="100%"></td>
                                                            <td>' . $tab_requete[$i]['nom'] . ' ' . $tab_requete[$i]['prenom'] . '</td>
                                                            <td>' . $tab_requete[$i]['nomDriver'] . ' ' . $tab_requete[$i]['prenomDriver'] . '</td>
                                                            <td>' . $tab_requete[$i]['depart_name'] . '</td>
                                                            <td>' . $tab_requete[$i]['destination_name'] . '</td>
                                                            <td>' . $tab_requete[$i]['distance'] . ' m</td>
                                                            <td>' . $tab_requete[$i]['duree'] . '</td>
                                                            <td>' . $tab_requete[$i]['montant'] . '</td>
                                                            <td><span class="badge badge-warning">' . $tab_requete[$i]['statut'] . '</span></td>
                                                            <td>' . $tab_requete[$i]['creer'] . '</td>
                                                            <td>' . $tab_requete[$i]['modifier'] . '</td>
                                                            <td>
                                                                <input type="hidden" value="' . $tab_requete[$i]['id'] . '" name="" id="id_affectation_' . $i . '">
                                                                <a href="query/action.php?id_affectation=' . $tab_requete[$i]['id'] . '" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a>
                                                            </td>
                                                        </tr>
                                                    ';
                                        // <a href="query/action.php?id_affectation_activer='.$tab_requete[$i]['id'].'" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Activate"> <i class="fa fa-check"></i> </a>
                                        // <a href="query/action.php?id_affectation_desactiver='.$tab_requete[$i]['id'].'" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="Deactivate"> <i class="fa fa-close"></i> </a>
                                        // <button type="button" onclick="modAnnee(id_affectation_'.$i.'.value);" class="btn btn-warning btn-sm" data-original-title="Modifier" data-toggle="modal" data-target="#annee-mod"><i class="fa fa-pencil"></i></button>
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                    </div>
                    <div class="r-panel-body">
                        <ul id="themecolors" class="m-t-20">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                            <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                            <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a>
                            </li>
                            <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a>
                            </li>
                        </ul>
                        <ul class="m-t-20 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/1.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Varun Dhavan <small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/2.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Genelia Deshmukh <small
                                                class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/3.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Ritesh Deshmukh <small
                                                class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/4.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Arijit Sinh <small
                                                class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/5.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Govinda Star <small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/6.jpg" alt="user-img"
                                                                  class="img-circle"> <span>John Abraham<small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/7.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Hritik Roshan<small
                                                class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="assets/images/users/8.jpg" alt="user-img"
                                                                  class="img-circle"> <span>Pwandeep rajan <small
                                                class="text-success">online</small></span></a>
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

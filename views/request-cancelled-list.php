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
                <h3 class="text-themecolor"><?php echo $request; ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item"><?php echo $taxi_booking; ?></li>
                    <li class="breadcrumb-item active"><?php echo $request; ?></li>
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
                            <h4 class="card-title"><?php echo $request; ?></h4>
                            <div class="table-responsive m-t-10">
                                <?php
                                $tab_requete[] = array();
                                $tab_requete = getRequeteCanceled();
                                $tab_currency[] = array();
                                $tab_currency = getEnabledCurrency();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
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
                                                            <td width="5%"><img src="../public/assets/images/payment_method/' . $tab_requete[$i]['payment_image'] . '" alt="" width="100%"></td>
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

</body>

</html>

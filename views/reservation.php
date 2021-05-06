<?php include("include/checker.php"); ?>s
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header card-no-border">

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
                <h3 class="text-themecolor"><?php echo $booking; ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item"><?php echo $coordination; ?></li>
                    <li class="breadcrumb-item active"><?php echo $booking; ?></li>
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
                            <h4 class="card-title"><?php echo $list_of_reservations; ?></h4>
                            <div class="table-responsive m-t-10">
                                <?php
                                $tab_reservation[] = array();
                                $tab_reservation = getReservation();
                                ?>
                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <!-- <th>Véhicule</th> -->
                                        <th><?php echo $customer; ?></th>
                                        <th><?php echo $distance; ?></th>
                                        <th><?php echo $cost; ?></th>
                                        <th><?php echo $departure_date; ?></th>
                                        <th><?php echo $departure_time; ?></th>
                                        <th><?php echo $contact; ?></th>
                                        <th><?php echo $status; ?></th>
                                        <th><?php echo $created; ?></th>
                                        <th><?php echo $modified; ?></th>
                                        <th><?php echo $actions; ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < count($tab_reservation); $i++) {
                                        $distance = $tab_reservation[$i]['distance'];
                                        $cout = ((400) / 1000 * $distance);
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td>' . $tab_reservation[$i]['nom'] . ' ' . $tab_reservation[$i]['prenom'] . '</td>
                                                            <td>' . $tab_reservation[$i]['distance'] . ' M</td>
                                                            <td>' . $cout . ' CFA</td>
                                                            <td>' . $tab_reservation[$i]['date_depart'] . '</td>
                                                            <td>' . $tab_reservation[$i]['heure_depart'] . '</td>
                                                            <td>' . $tab_reservation[$i]['contact'] . '</td>
                                                            <td><span class="';
                                        if ($tab_reservation[$i]['statut'] == "en cours") {
                                            echo "badge badge-warning";
                                        } else if ($tab_reservation[$i]['statut'] == "accepter") {
                                            echo "badge badge-success";
                                        } else if ($tab_reservation[$i]['statut'] == "clôturer") {
                                            echo "badge badge-dark";
                                        } else {
                                            echo "badge badge-danger";
                                        }
                                        echo '">' . $tab_reservation[$i]['statut'] . '</span></td>
                                                            
                                                            <td>' . $tab_reservation[$i]['creer'] . '</td>
                                                            <td>' . $tab_reservation[$i]['modifier'] . '</td>
                                                            <td>
                                                                <input type="hidden" value="' . $tab_reservation[$i]['id'] . '" name="" id="id_reservation_' . $i . '">
                                                                <a href="../query/action.php?id_reservation=' . $tab_reservation[$i]['id'] . '" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a>
                                                                <a href="../query/action.php?id_reservation_activer=' . $tab_reservation[$i]['id'] . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Accept"> <i class="fa fa-check"></i> </a>
                                                                <a href="../query/action.php?id_reservation_desactiver=' . $tab_reservation[$i]['id'] . '" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="Refuse"> <i class="fa fa-close"></i> </a>
                                                                <a href="../query/action.php?id_reservation_cloturer=' . $tab_reservation[$i]['id'] . '" class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="Fence"> <i class="mdi mdi-alert"></i> </a>
                                                            </td>
                                                        </tr>
                                                    ';
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

            <!-- End Right sidebar -->
        </div>

        <!-- footer -->
        <footer class="footer"> <?php include("include/footer.php"); ?> </footer>

    </div>

</div>

<!-- All Jquery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../assets/plugins/bootstrap/js/popper.min.js"></script>

<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="../js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="../js/waves.js"></script>
<!--Menu sidebar -->
<script src="../js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!--Custom JavaScript -->
<script src="../js/custom.min.js"></script>
<!-- This is data table -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
        $(document).ready(function () {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example24').DataTable();
</script>

<!-- Style switcher -->

<script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
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
<script src="../assets/plugins/toast-master/js/jquery.toast.js"></script>
<script src="../js/toastr.js"></script>
<!-- Custom Theme JavaScript -->

<?php if (isset($_SESSION['status']) && $_SESSION['status'] == 1) { ?>
    <script>
        showSuccess();
    </script>
<?php }else if (isset($_SESSION['status']) && $_SESSION['status'] == 2){ ?>
    <script>
        showFailed();
    </script>
<?php }else if (isset($_SESSION['status']) && $_SESSION['status'] == 3){ ?>
    <script>
        showWarningIncorrect();
    </script>
<?php }
unset($_SESSION['status']); ?>
</body>

</html>
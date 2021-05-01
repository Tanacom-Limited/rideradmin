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
                <h3 class="text-themecolor"><?php echo $customer_stats; ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item"><?php echo $statistics; ?></li>
                    <li class="breadcrumb-item active"><?php echo $customer_stats; ?></li>
                </ol>
            </div>

        </div>

        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <!-- column -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <?php
                                        $tab_user_app[] = array();
                                        $tab_user_app = getUserApp();
                                        ?>
                                        <label class="mr-sm-2" for="designation"><?php echo $customer; ?></label>
                                        <select class="form-control " id="customer" name="customer" required>
                                            <?php
                                            for ($i = 0; $i < count($tab_user_app); $i++) {
                                                echo '<option value="' . $tab_user_app[$i]['id'] . '">' . $tab_user_app[$i]['nom'] . ' ' . $tab_user_app[$i]['prenom'] . ' (' . $tab_user_app[$i]['phone'] . ')</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="mr-sm-2" for="designation"><?php echo $month; ?></label>
                                        <select class="form-control " id="month" name="month" required>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="mr-sm-2" for="designation"><?php echo $year; ?></label>
                                        <select class="form-control " id="year" name="year" required>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1 m-t-30">
                                    <button type="submit" class="btn btn-dark waves-effect" style="height:37px;"
                                            onclick="apply(customer.value,month.value,year.value)"><?php echo $apply; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $tab_currency[] = array();
                            $tab_currency = getEnabledCurrency();
                            ?>
                            <h4 class="card-title"><?php echo $customer_stats; ?>
                                (<?php echo $tab_currency[0]['symbole']; ?>)</h4>
                            <div class="row">
                                <div class="col-md-5"></div>

                                <div class="col-md-2">
                                    <div class="loadero" id="loader" style="display:none;"></div>
                                </div>


                                <div class="col-md-5"></div>
                            </div>
                            <div id="chart">
                                <canvas id="chart2" height="150"></canvas>
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

    apply($("#customer").val(), $("#month").val(), $("#year").val());

    function apply(id_customer, month, year) {
        $("#loader").css("display", "block");
        $.ajax({
            url: "query/ajax/getCustomerStats.php",
            type: "POST",
            data: {"id_customer": id_customer, "month": month, "year": year},
            success: function (data) {
                $("#chart2").remove();
                $("#chart").append('<canvas id="chart2" height="110"></canvas>');
                $("#loader").css("display", "none");

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
                var v13 = 0;
                var v14 = 0;
                var v15 = 0;
                var v16 = 0;
                var v17 = 0;
                var v18 = 0;
                var v19 = 0;
                var v20 = 0;
                var v21 = 0;
                var v22 = 0;
                var v23 = 0;
                var v24 = 0;
                var v25 = 0;
                var v26 = 0;
                var v27 = 0;
                var v28 = 0;
                var v29 = 0;
                var v30 = 0;
                var v31 = 0;
                for (let i = 0; i < data_parse.length; i++) {
                    date = data_parse[i].creer;
                    tab_tab = date.split('-');
                    var expr = tab_tab[2];
                    tab_tab2 = expr.split(' ');
                    var nb = tab_tab2[0];
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
                        case '12':
                            v12 = parseInt(v12) + parseInt(data_parse[i].montant);
                            break;
                        case '13':
                            v13 = parseInt(v13) + parseInt(data_parse[i].montant);
                            break;
                        case '14':
                            v14 = parseInt(v14) + parseInt(data_parse[i].montant);
                            break;
                        case '15':
                            v15 = parseInt(v15) + parseInt(data_parse[i].montant);
                            break;
                        case '16':
                            v16 = parseInt(v16) + parseInt(data_parse[i].montant);
                            break;
                        case '17':
                            v17 = parseInt(v17) + parseInt(data_parse[i].montant);
                            break;
                        case '18':
                            v18 = parseInt(v18) + parseInt(data_parse[i].montant);
                            break;
                        case '19':
                            v19 = parseInt(v19) + parseInt(data_parse[i].montant);
                            break;
                        case '20':
                            v20 = parseInt(v20) + parseInt(data_parse[i].montant);
                            break;
                        case '21':
                            v21 = parseInt(v21) + parseInt(data_parse[i].montant);
                            break;
                        case '22':
                            v22 = parseInt(v22) + parseInt(data_parse[i].montant);
                            break;
                        case '23':
                            v23 = parseInt(v23) + parseInt(data_parse[i].montant);
                            break;
                        case '24':
                            v24 = parseInt(v24) + parseInt(data_parse[i].montant);
                            break;
                        case '25':
                            v25 = parseInt(v25) + parseInt(data_parse[i].montant);
                            break;
                        case '26':
                            v26 = parseInt(v26) + parseInt(data_parse[i].montant);
                            break;
                        case '27':
                            v27 = parseInt(v27) + parseInt(data_parse[i].montant);
                            break;
                        case '28':
                            v28 = parseInt(v28) + parseInt(data_parse[i].montant);
                            break;
                        case '29':
                            v29 = parseInt(v29) + parseInt(data_parse[i].montant);
                            break;
                        case '30':
                            v30 = parseInt(v30) + parseInt(data_parse[i].montant);
                            break;
                        default:
                            v31 = parseInt(v31) + parseInt(data_parse[i].montant);
                            break;
                    }
                }

                var data_tab = [];
                for (let i = 0; i < 31; i++) {
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
                        case 13:
                            data_tab[i] = v14;
                            break;
                        case 14:
                            data_tab[i] = v15;
                            break;
                        case 15:
                            data_tab[i] = v16;
                            break;
                        case 16:
                            data_tab[i] = v17;
                            break;
                        case 17:
                            data_tab[i] = v18;
                            break;
                        case 18:
                            data_tab[i] = v19;
                            break;
                        case 19:
                            data_tab[i] = v20;
                            break;
                        case 20:
                            data_tab[i] = v21;
                            break;
                        case 21:
                            data_tab[i] = v22;
                            break;
                        case 22:
                            data_tab[i] = v23;
                            break;
                        case 23:
                            data_tab[i] = v24;
                            break;
                        case 24:
                            data_tab[i] = v25;
                            break;
                        case 25:
                            data_tab[i] = v26;
                            break;
                        case 36:
                            data_tab[i] = v27;
                            break;
                        case 27:
                            data_tab[i] = v28;
                            break;
                        case 28:
                            data_tab[i] = v29;
                            break;
                        case 29:
                            data_tab[i] = v30;
                            break;
                        case 30:
                            data_tab[i] = v31;
                            break;
                        default:
                            data_tab[i] = '0';
                            break;
                    }
                }
                var data2 = {
                    labels: ["Day 01", "Day 02", "Day 03", "Day 04", "Day 05", "Day 06", "Day 07", "Day 08", "Day 09", "Day 10", "Day 11", "Day 12", "Day 13", "Day 14", "Day 15", "Day 16", "Day 17", "Day 18", "Day 19", "Day 20", "Day 21", "Day 22", "Day 23", "Day 24", "Day 25", "Day 26", "Day 27", "Day 28", "Day 29", "Day 30", "Day 31"],
                    datasets: [
                        {
                            label: "Customer stats",
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

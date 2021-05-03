<!-- All Jquery -->
<script src="../public/assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap tether Core JavaScript -->
<script src="../public/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="../public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="../public/js/jquery.slimscroll.js"></script>

<!--Wave Effects -->
<script src="../public/js/waves.js"></script>

<!--Menu sidebar -->
<script src="../public/js/sidebarmenu.js"></script>

<!--stickey kit -->
<script src="../public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>

<!--Custom JavaScript -->
<script src="../public/js/custom.min.js"></script>

<!--sparkline JavaScript -->
<script src="../public/assets/plugins/sparkline/jquery.sparkline.min.js"></script>

<!--morris JavaScript -->
<script src="../public/assets/plugins/raphael/raphael-min.js"></script>
<script src="../public/assets/plugins/morrisjs/morris.min.js"></script>

<!-- Chart JS -->
<script src="../public/js/dashboard1.js"></script>


<script src="../public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

<!-- Chart JS -->
<script src="../public/assets/plugins/Chart.js/chartjs.init.js"></script>
<script src="../public/assets/plugins/Chart.js/Chart.min.js"></script>


<!-- This is data table -->
<script src="../public/assets/plugins/datatables/jquery.dataTables.min.js"></script>

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
    $('#example23').DataTable();
</script>

<script>
    initMap();
    let gmarkers = [];
    let map;

    function initMap() {
        $.ajax({
            url: "../query/ajax/getAllVehicle.php",
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
                            var image = 'http://projets.hevenbf.com/on_demand_taxi/assets/images/marker.png';
                        else
                            var image = 'http://projets.hevenbf.com/on_demand_taxi/assets/images/marker_red.png';


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
            url: "../query/ajax/getAllVehicle.php",
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
                        var image = 'http://projets.hevenbf.com/on_demand_taxi/assets/images/marker.png';
                    else
                        var image = 'http://projets.hevenbf.com/on_demand_taxi/assets/images/marker_red.png';
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

    setInterval(foo, 7000);

    apply(new Date().getFullYear());

    function apply(year) {
        $("#loader").css("display", "block");
        $.ajax({
            url: "../query/ajax/getEarningStatsDashboard.php",
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

<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->


<!-- Style switcher -->
<script src="../public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>


<!--Toaster-->
<script src="../public/assets/plugins/toast-master/js/jquery.toast.js"></script>
<script src="../public/js/toastr.js"></script>


<!-- Custom Theme JavaScript -->

<?php if (isset($_SESSION['status']) && $_SESSION['status'] == 1) { ?>
    <script>
        showInfo();
    </script>
<?php } else if (isset($_SESSION['status']) && $_SESSION['status'] == 2) { ?>
    <script>
        showFailed();
    </script>
<?php } else if (isset($_SESSION['status']) && $_SESSION['status'] == 3) { ?>
    <script>
        showWarningIncorrect();
    </script>
<?php }
unset($_SESSION['status']); ?>





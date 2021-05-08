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





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


    <div class="page-wrapper">
        <!-- Bread crumb and right sidebar toggle -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor"><?php echo $notification; ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home; ?></a></li>
                    <li class="breadcrumb-item"><?php echo $member; ?></li>
                    <li class="breadcrumb-item active"><?php echo $notification; ?></li>
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

                            <h4 class="card-title"><?php echo $list_of_sent_notifications; ?></h4>

                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#add-notification"><i class="fa fa-plus m-r-10"></i>Add
                            </button>

                            <div id="add-notification" class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content bg-gris">

                                        <div class="modal-header">

                                            <h4 class="modal-title"
                                                id="myModalLabel"><?php echo $add_a_notification; ?></h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                ×
                                            </button>

                                        </div>

                                        <form class="form-horizontal " action="../helpers/send_notification.php"
                                              method="post">

                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <div class="row">

                                                        <input type="hidden" name="id_user"
                                                               value="<?php echo $id_user; ?>">

                                                        <div class="col-md-12 m-b-0">

                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $title; ?></label>


                                                                <input type="text" class="form-control " placeholder=""
                                                                       value="" name="titre_notification" required>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-12 m-b-0">

                                                            <div class="form-group mb-3">
                                                                <label class="mr-sm-2"
                                                                       for="designation"><?php echo $message; ?></label>
                                                                <textarea name="msg_notification" class="form-control"
                                                                          id="" cols="30" rows="10" required></textarea>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="submit"
                                                        class="btn btn-dark waves-effect"><?php echo $save; ?></button>

                                                <button type="button" class="btn btn-default waves-effect"
                                                        data-dismiss="modal"><?php echo $cancel; ?></button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                            <div class="table-responsive m-t-10">
                                <?php
                                $tab_notification[] = array();
                                $tab_notification = getNotification();
                                ?>

                                <table id="example23"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th><?php echo $title; ?></th>
                                        <th><?php echo $message; ?></th>
                                        <th><?php echo $created; ?></th>
                                        <th><?php echo $modified; ?></th>
                                        <th><?php echo $actions; ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    for ($i = 0; $i < count($tab_notification); $i++) {
                                        echo '
                                                        <tr>
                                                            <td>' . ($i + 1) . '</td>
                                                            <td>' . $tab_notification[$i]['titre'] . '</td>
                                                            <td>' . $tab_notification[$i]['message'] . '</td>
                                                            <td>' . $tab_notification[$i]['creer'] . '</td>
                                                            <td>' . $tab_notification[$i]['modifier'] . '</td>
                                                            <td>
                                                                <a href="../controller/action.php?id_notification=' . $tab_notification[$i]['id'] . '" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a>
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

</body>

</html>

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
                <h3 class="text-themecolor"><?php echo $customer ?></h3>
            </div>

            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home ?></a></li>
                    <li class="breadcrumb-item"><a href="home.php"><?php echo $home ?></a></li>
                    <li class="breadcrumb-item"><?php echo $user_app ?></li>
                    <li class="breadcrumb-item active"><?php echo $customer ?></li>
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
                            <h4 class="card-title"><?php echo $customers_list ?></h4>
                            <div class="table-responsive m-t-10">
                                <?php
                                $tab_user_app[] = array();
                                $tab_user_app = getUserApp();
                                ?>

                                <table id="example24"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo $photo ?></th>
                                        <th><?php echo $last_first_name ?></th>
                                        <th><?php echo $email ?></th>
                                        <th><?php echo $phone ?></th>
                                        <th><?php echo $status ?></th>
                                        <th><?php echo $created ?></th>
                                        <th><?php echo $modified ?></th>
                                        <th><?php echo $actions ?></th>
                                    </tr>
                                    </thead>


                                    <tbody>


                                    <?php

                                    for ($i = 0; $i < count($tab_user_app); $i++) {
                                        echo '
                                      <tr>
                                      
                                              <td>' . ($i + 1) . '</td>
                                              
                                              <td>
                                              
                                               <div class="user-profile" style="width:100%;">
                                                                    <div class="profile-img" style="width:100%;">';

                                        if ($tab_user_app[$i]['photo_path'] == "") {
                                            echo '<img src="../controller/webservice/images/app_user/user_profile.jpg" alt="" width="100%" style="width:70px;height:70px;">';
                                        } else {
                                            echo '<img src="../webservice/images/app_user/' . $tab_user_app[$i]['photo_path'] . '" alt="" width="100%" style="width:70px;height:70px;">';
                                        }

                                        echo '</div>
                                              </div>
                                              </td>
                                                            
                                                            
                                                            
                                                            <td>' . $tab_user_app[$i]['nom'] . ' ' . $tab_user_app[$i]['prenom'] . '</td>
                                                            <td>' . $tab_user_app[$i]['email'] . '</td>
                                                            <td>' . $tab_user_app[$i]['phone'] . '</td>
                                                            <td><span class="';
                                        if ($tab_user_app[$i]['statut'] == "yes") {
                                            echo "badge badge-success";
                                        } else {
                                            echo "badge badge-danger";
                                        }
                                        echo '">' . $tab_user_app[$i]['statut'] . '</span></td>
                                                            <td>' . $tab_user_app[$i]['creer'] . '</td>
                                                            <td>' . $tab_user_app[$i]['modifier'] . '</td>
                                                            <td>
                                                                <input type="hidden" value="' . $tab_user_app[$i]['id'] . '" name="" id="id_affectation_' . $i . '">
                                                                <a href="../controller/action.php?id_user_app_activer=' . $tab_user_app[$i]['id'] . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Enable"> <i class="fa fa-check"></i> </a>

                                                                 <a href="../controller/action.php?id_user_app=' . $tab_user_app[$i]['id'] . '" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a>
                                                                
                                     
                                                                  <a href="../controller/action.php?id_user_app_desactiver=' . $tab_user_app[$i]['id'] . '" class="btn btn-inverse btn-sm" data-toggle="tooltip" data-original-title="Disable"> <i class="fa fa-close"></i> </a>
                                                                
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

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
                <h3 class="text-themecolor"><?php echo $change_pwd; ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item breadcrumb-item-warning"><a href="home.php"><?php echo $home; ?></a>
                    </li>
                    <li class="breadcrumb-item"><?php echo $admin_tools; ?></li>
                    <li class="breadcrumb-item active"><?php echo $change_pwd; ?></li>
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
                            <h4 class="card-title"><?php echo $change_your_pwd; ?></h4>
                            <form class="form-horizontal " action="../models/action.php" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 m-b-0">
                                            <div class="form-group mb-3">
                                                <label class="mr-sm-2" for="designation"><?php echo $old_pwd; ?></label>
                                                <input type="password" class="form-control " placeholder=""
                                                       name="anc_mdp" id="anc_mdp" required>
                                                <div class="invalid-feedback">
                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 m-b-0">
                                            <div class="form-group mb-3">
                                                <label class="mr-sm-2" for="designation"><?php echo $new_pwd; ?></label>
                                                <input type="password" class="form-control " placeholder=""
                                                       name="new_mdp" id="new_mdp" onkeyup="checkMdp()" required>
                                                <div class="invalid-feedback">
                                                    Désolé, entrez l'intitulé de la catégorie de devis
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 m-b-0">
                                            <div class="form-group mb-3">
                                                <label class="mr-sm-2"
                                                       for="designation"><?php echo $confirm_pwd; ?></label>
                                                <input type="password" class="form-control " placeholder=""
                                                       name="conf_mdp" id="conf_mdp" onkeyup="checkMdp()" required>
                                                <div class="invalid-feedback" id="message" style="color:red;">
                                                    Les mots de passe ne sont pas identiques.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark waves-effect"><?php echo $save; ?></button>
                                <button type="button" class="btn btn-default waves-effect"
                                        data-dismiss="modal"><?php echo $cancel; ?></button>
                            </form>
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

<script>
    function checkMdp() {
        var new_mdp = document.getElementById("new_mdp");
        var conf_mdp = document.getElementById("conf_mdp");
        var message = document.getElementById("message");
        if (new_mdp.value == conf_mdp.value) {
            $('#message').removeClass('invalid');
            $('#message').addClass('invalid-feedback');
        } else {
            $('#message').removeClass('invalid-feedback');
            $('#message').addClass('invalid');
        }

    }
</script>

</body>

</html>

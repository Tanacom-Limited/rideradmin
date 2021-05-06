<?php include("include/checker.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php include("include/head.php"); ?>

<body>

<!-- Main wrapper - style you can find in pages.scss -->
<section id="wrapper">

    <div class="login-register">

        <div class="login-box card" style="margin-top:10%; margin-bottom:0%;">

            <div class="card-body">

                <form class="form-horizontal form-material" id="loginform" action="../models/action.php" method="post">
                    <h3 class="box-title m-b-20"><?php echo $login ?></h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"
                                   name="email_sc"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password"
                                   name="mdp_sc"></div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-dark btn-lg btn-block text-uppercase waves-effect waves-light color-login"
                                    type="submit"><?php echo $login ?></button>
                        </div>
                    </div>
                </form>

                <form class="form-horizontal" id="recoverform" action="">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"></div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Reset
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</section>

<!--Include footer script-->
<?php include("include/footer-script.php"); ?>


</body>

</html>
<!-- Logo -->
<div class="navbar-header">

    <a class="navbar-brand" href="home.php">

        <!-- Logo icon -->
        <b>
            <!-- Dark Logo icon -->
            <img src="../public/assets/images/logo.png" alt="homepage" class="dark-logo" width="100%"/>

            <!-- Light Logo icon -->
            <img src="../public/assets/images/favicon.png" alt="homepage" class="light-logo"/>

        </b>

    </a>

</div>


<div class="navbar-collapse">

    <!-- toggle and nav items -->
    <ul class="navbar-nav mr-auto mt-md-0">

        <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>

        <li class="nav-item m-l-10"><a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                       href="javascript:void(0)"><i class="ti-menu"></i></a></li>


    </ul>

    <!-- User profile and search -->
    <ul class="navbar-nav my-lg-0">

        <?php
        $tab_user_info[] = array();
        $tab_user_info = $_SESSION['user_info'];
        ?>

        <!-- Language -->
        <li class="nav-item dropdown">

            <?php if (isset($_COOKIE['lang'])) { ?>

                <?php if ($_COOKIE['lang'] == "en") { ?>
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="flag-icon flag-icon-gb"></i></a>
                <?php } elseif ($_COOKIE['lang'] == "fr") { ?>
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="flag-icon flag-icon-fr"></i></a>
                <?php } else { ?>
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="flag-icon flag-icon-bd"></i></a>
                <?php } ?>

                <div class="dropdown-menu dropdown-menu-right scale-up">

                    <a class="dropdown-item" href="#" onclick="setLang('en');" <?php if ($_COOKIE['lang'] == "en") {
                        echo 'style="display:none;"';
                    } ?>><i class="flag-icon flag-icon-gb"></i> English</a>

                    <a class="dropdown-item" href="#" onclick="setLang('fr');" <?php if ($_COOKIE['lang'] == "fr") {
                        echo 'style="display:none;"';
                    } ?>><i class="flag-icon flag-icon-fr"></i> Français</a>

                </div>

                <?php ?>
            <?php } else { ?>
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-gb"></i></a>


            <div class="dropdown-menu dropdown-menu-right scale-up">
                <a class="dropdown-item" href="#" onclick="setLang('fr');"><i class="flag-icon flag-icon-fr"></i>
                    Français</a>


                <?php } ?>
        </li>

        <!-- Profil -->
        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><img src="../public/assets/images/users/flag.png" alt="user"
                                                               class="profile-pic"/></a>

            <div class="dropdown-menu dropdown-menu-right scale-up">
                <ul class="dropdown-user">

                    <li>
                        <div class="dw-user-box">
                            <div class="u-img"><img src="../public/assets/images/users/flag.png" alt="user"></div>
                            <div class="u-text">

                                <h4><?php echo $tab_user_info['nom_prenom']; ?></h4>

                            </div>
                        </div>
                    </li>
                    <li><a href="change-password.php"><i class="ti-user"></i> Change Password</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="../models/action.php?logout=yes"><i
                                    class="fa fa-power-off"></i> <?php echo $log_out; ?>
                        </a></li>
                </ul>
            </div>
        </li>
    </ul>


</div>
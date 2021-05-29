<!-- User profile -->
<div class="user-profile">

    <!-- User profile image -->
    <div class="profile-img">
        <img src="../public/assets/images/users/flag.png" alt="user"/>
        <!-- this is blinking heartbit-->
<!--        <div class="notify setpos"><span class="heartbit"></span> <span class="point"></span></div>-->
    </div>

    <?php
    $tab_user_info[] = array();
    $tab_user_info = $_SESSION['user_info'];
    ?>

    <!-- User profile text-->
    <div class="profile-text">
        <h5><?php echo $tab_user_info['nom_prenom']; ?></h5>

        <a href="../controller/action.php?logout=yes" class="" data-toggle="tooltip" title="Log out"><i
                    class="mdi mdi-power"></i></a>

        <div class="dropdown-menu animated flipInY">
            <!-- text-->
            <a href="#" class="dropdown-item"><i class="ti-user"></i> <?php echo $my_profile ?></a>
            <!-- text-->
            <a href="#" class="dropdown-item"><i class="ti-wallet"></i> <?php echo $password ?></a>
            <div class="dropdown-divider"></div>
            <!-- text-->

            <a href="../controller/Controller.php?logout=yes" class="" data-toggle="tooltip" title="Log out"><i
                        class="mdi mdi-power"></i></a>
        </div>

    </div>

</div>

<!-- Sidebar navigation-->
<nav class="sidebar-nav">

    <ul id="sidebarnav">

        <li class="nav-devider"></li>

        <li>

            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                <i class="mdi mdi-home"></i>
                <span class="hide-menu"><?php echo $home ?></span>
            </a>

            <ul aria-expanded="false" class="collapse">
                <li><a href="home.php"><?php echo $dashboard ?></a></li>
            </ul>

        </li>

        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                <i class="mdi mdi-account-multiple"></i>
                <span class="hide-menu"><?php echo $user_app ?></span>
            </a>

            <ul aria-expanded="false" class="collapse">

                <li><a href="user.php"><?php echo $admin ?></a></li>

                <li><a href="customer-list.php"><?php echo $customer ?></a></li>

                <li><a href="driver-list.php"><?php echo $driver ?></a></li>

                <!--                <li><a href="commentaire-avis.php">Commentaire & Avis</a></li>-->

            </ul>

        </li>

        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                <i class="mdi mdi-chart-bar"></i>
                <span class="hide-menu"><?php echo $statistics ?></span>
            </a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="statistics-customer.php"><?php echo $customer ?></a></li>
                <li><a href="statistics-driver.php"><?php echo $driver ?></a></li>
                <li><a href="statistics-earning.php"><?php echo $earning ?></a></li>
            </ul>
        </li>

        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                        class="mdi mdi-settings-box"></i><span class="hide-menu"><?php echo $codification ?></span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="vehicle-list.php"><?php echo $vehicle_type ?></a></li>
                <li><a href="user-category.php"><?php echo $user_cat ?></a></li>
            </ul>
        </li>

        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-pen"></i><span
                        class="hide-menu"><?php echo $taxi_booking ?></span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="request-all-list.php"><?php echo $all ?></a></li>
                <li><a href="request-new-list.php"><?php echo $new ?></a></li>
                <li><a href="request-confirm-list.php"><?php echo $confirmed ?></a></li>
                <li><a href="request-onride-list.php"><?php echo $on_ride ?></a></li>
                <li><a href="request-completed-list.php"><?php echo $completed ?></a></li>
                <li><a href="request-cancelled-list.php"><?php echo $canceled_reject ?></a></li>
            </ul>
        </li>

        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-pen"></i><span
                        class="hide-menu"><?php echo $vehicle_rental ?></span></a>
            <ul aria-expanded="false" class="collapse">

                <li><a href="vehicle-rental-type.php"><?php echo $vehicle_type ?></a></li>
                <li><a href="vehicle-rental-list.php"><?php echo $vehicle ?></a></li>
                <li><a href="vehicle-location.php"><?php echo $vehicle_rent ?></a></li>
            </ul>
        </li>


        <li class="nav-small-cap"><?php echo $admin_tools ?></li>


        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                <i class="mdi mdi-settings"></i>
                <span class="hide-menu">All Settings</span>
            </a>
            <ul aria-expanded="false" class="collapse">

                <li><a href="country-list.php"><?php echo $country ?></a></li>

                <li><a href="currency-list.php"><?php echo $currency ?></a></li>

                <li><a href="commision-list.php"><?php echo $commission ?></a></li>

                <li><a href="payment-method.php"><?php echo $payment_method ?></a></li>

                <li><a href="settings.php"><?php echo $settings ?></a></li>

                <li><a href=""></a></li>

                <li><a href=""></a></li>

                <li><a href=""></a></li>


            </ul>
        </li>

    </ul>

</nav>

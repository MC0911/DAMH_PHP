<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top Starts -->

        <div class="navbar-header"><!-- navbar-header Starts -->

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-ex1-collapse Starts -->


                <span class="sr-only">Toggle Navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>


            </button>

            <a class="navbar-brand" href="index.php">Admin Panel</a>


        </div>

        <ul class="nav navbar-right top-nav">

            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <i class="fa fa-user"></i>

                    <?php echo $admin_name; ?> <b class="caret"></b>

                </a>

                <ul class="dropdown-menu">

                    <li>

                        <a href="logout.php">

                            <i class="fa fa-fw fa-power-off"> </i> Log Out

                        </a>

                    </li>

                </ul>

            </li>

        </ul>


        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="nav navbar-nav side-nav">

                <li>

                    <a href="#" data-toggle="collapse" data-target="#products">

                        <i class="fa fa-fw fa-table"></i> Products

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="products" class="collapse">

                        <li>
                            <a href="index.php?add_product"> Insert Products </a>
                        </li>

                        <li>
                            <a href="index.php?view_product"> View Products </a>
                        </li>


                    </ul>

                </li>


                <li>

                    <a href="#" data-toggle="collapse" data-target="#categories">

                        <i class="fa fa-fw fa-pencil"></i> Categories

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="categories" class="collapse">

                        <li>
                            <a href="index.php?add_category"> Insert Category </a>
                        </li>

                        <li>
                            <a href="index.php?view_category"> View Categories </a>
                        </li>

                    </ul>

                </li>

                <li>

                    <a href="index.php?view_orders">

                        <i class="fa fa-fw fa-list"></i> View Orders

                    </a>

                </li>

                <li>

                    <a href="#" data-toggle="collapse" data-target="#users">

                        <i class="fa fa-fw fa-gear"></i> Users

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="users" class="collapse">

                        <li>
                            <a href="index.php?insert_user"> Insert User </a>
                        </li>

                        <li>
                            <a href="index.php?view_users"> View Users </a>
                        </li>

                    </ul>

                </li>

                <li>

                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                    </a>

                </li>

            </ul>

        </div>

    </nav>

<?php } ?>
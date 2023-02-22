<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php
        if (isset($_SESSION['res_name'])) {
            echo $_SESSION['res_name'];
            echo "-Published Foods";
        } else
            echo "Restaurant";

        ?>
    </title>
    <style>
        .bx-street-view {
            color: greenyellow;
        }

        .bx-street-view:hover {
            color: #F65F3E
        }
    </style>
    <!-- icons cdn -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="css/new-food.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/modal.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- JS scripts-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCijWSH4--ZN34vfPan6N88A-LUwC9FTbI"></script>
    <script src="public/scripts/orders.js" defer></script>
    <script src="public/scripts/deliveryMap.js"></script>



</head>

<body>
    <?php
    // session_start();
    if (!isset($_SESSION['restaurant_id'])) {
        header("Location: /fast-foodies/login");
        exit();

    }
    ?>

    <!-- Modal PopUp-->

    <dialog id="mySizeChartModal" class="ebcf_modal">
        <div class="ebcf_modal-content">
            <span class="ebcf_close">&times;</span>
            <h2 class="modal_header">Track Customer Location</h2>
            <div class="new_food_wrapper_edit">
                <form class="table_form" class="form" name="food-form" id="food-form">
                    <div id="map" style="width: 100%; height: 400px;"></div>

                </form>
                <div style="text-align:center" id="msg"></div>
            </div>
        </div>

    </dialog>


    <div class="s-layout">
        <!-- Sidebar -->
        <div class="s-layout__sidebar">
            <a class="s-sidebar__trigger" href="#0">
                <i style="color:white" class="bx bx-menu"></i>
            </a>

            <nav class="s-sidebar__nav">
                <ul>

                    <li>
                        <a class="s-sidebar__nav-link name" href="index.html">
                            <i class="bx bx-dashboard"></i><em>Dashboard</em>
                        </a>
                    </li>

                    <li>
                        <a class="s-sidebar__nav-link" href="/fast-foodies/restaurant">
                            <i class="bx bx-home"></i><em>Home</em>
                        </a>
                    </li>

                    <li>
                        <a class="s-sidebar__nav-link" href="/fast-foodies/new_menu">
                            <i class="bx bx-plus"></i><em>New Food</em>
                        </a>
                    </li>
                    <li>
                        <a class="s-sidebar__nav-link" href="#">
                            <i class="bx bx-dish"></i><em>Published Foods</em>
                        </a>
                    </li>

                    <li>
                        <a class="s-sidebar__nav-link" href="/fast-foodies/analytics">
                            <i class="bx bx-bar-chart"></i><em>Analytics</em>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


        <!-- Main Content -->
        <main class="s-layout__content">
            <nav class="nav bd-container">
                <a href="/fast-foodies" class="header_name">
                    <h1>Foodie</h1>
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">

                        <li class="nav__item"><a href="" class="nav__link ">
                                <?php echo $_SESSION['res_name'] ?>
                            </a></li>


                    </ul>
                </div>
            </nav>

            <!-- Foods Published  -->
            <div class="text_wrapper">
                <h2 style="text-align: center;">Your Orders Placed</h2>
                <span id="msg"></span>
            </div>

            <div class="table_wrapper">
                <!-- TABLE STARTS -->

                <div class="table_wrapper">
                    <!-- TABLE STARTS -->

                    <table>
                        <thead id="table-header">
                            <tr>
                                <th>Image</th>
                                <th>Food</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody id="table-body">
                            <!-- Table data will be dynamically added here -->
                            <h3 id="noitem" style="display:none">Your dont have any orders yet</h3>
                        </tbody>
                    </table>
                </div>


                <!-- TABLE ENDS -->
            </div>



        </main>
    </div>
    <!-- <script type="text/javascript" src="public/scripts/modal.js"></script> -->
</body>

</html>
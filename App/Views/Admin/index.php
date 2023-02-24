<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>
        <?php 
        if (isset($_SESSION['res_name']))
            echo $_SESSION['res_name'];
        else
            echo "Restaurant";
            // header()

        ?>
    </title>
    <link rel="stylesheet" href="public\css\styles.css" />
    <link rel="stylesheet" href="public\css\new-food.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="public/scripts/resprofile.js"></script>

</head>

<body>
<?php
    // if (!isset($_SESSION['restaurant_id'])) {

    //     header("location: /fast-foodies/login");
    //     exit();

     ?>

    <div class="s-layout">
        <!-- Sidebar -->
        <div class="s-layout__sidebar">
            <a class="s-sidebar__trigger" href="#0">
                <i style="color:white" class="bx bx-menu"></i>
            </a>

            <nav class="s-sidebar__nav">
                <ul>

                    <li>
                        <a class="s-sidebar__nav-link name" href="#">
                            
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
                        <a class="s-sidebar__nav-link" href="/fast-foodies/published">
                            <i class="bx bx-dish"></i><em>Published Foods</em>
                        </a>
                    </li>

                    <li>
                        <a class="s-sidebar__nav-link" href="/fast-foodies/orders">
                            <i class="bx bx-dish"></i><em>Orders Placed</em>
                        </a>
                    </li>

                    <li>
                        <a class="s-sidebar__nav-link" href="/fast-foodies/analytics">
                            <i class="bx bx-bar-chart"></i><em>Analytics</em>
                        </a>
                    </li>

                    <li>
                        <a class="s-sidebar__nav-link" href="/fast-foodies/logout">
                            <i class="bx bx-log-out-circle"></i><em>Logout</em>
                        </a>
                    </li>

                    <li>
                
                </ul>
            </nav>
        </div>


        <!-- Main Content -->
        <main class="s-layout__content">
            <nav class="nav bd-container">
                <a href="#" class="header_name">
                    <h1>Foodie</h1>
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><h3 class="nav__item" id="res_name"></h3></li>
                    </ul>
                </div>
            </nav>

            <!-- Foods Published  -->
            <div class="text_wrapper">
                <h2>Display Restaurant profile here</h2>
            </div>

            <!-- Add new food -->
            <div class="new_food_wrapper">
                <form class="form" name="food-form">

                </form>
            </div>

        </main>

    </div>

</body>

</html>
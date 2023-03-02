<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>
        <?php
        session_start();
        if (isset($_SESSION['res_name']))
            echo $_SESSION['res_name'];
        else
            echo "Restaurant";
        // header()
        
        ?>
    </title>
    <link rel="shortcut icon" href="public/assets/fafod.ico" type="image/x-icon">

    <link rel="stylesheet" href="public\css\profile.css">
    <link rel="stylesheet" href="public\css\styles.css" />
    <link rel="stylesheet" href="public\css\new-food.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="public/scripts/resprofile.js"></script>

</head>

<body>
<?php
    if (!isset($_SESSION['restaurant_id'])) {

        header("location: /fast-foodies/login");
        exit();

    } ?>

    <div class="s-layout">
        <!-- Sidebar -->
        <?php require("sidebar-items.php")?>


        <!-- Main Content -->
        <main class="s-layout__content">
            <nav class="nav bd-container">
                <a href="#" class="header_name">
                    <h1>Foodie</h1>
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <h3 class="nav__item " id="res_name"></h3>
                        </li>
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
                <div class="container">
                    <div class="profile">
                        <div class="info">
                            <h2>Restaurant Name:<span id="res_name2"></span></h2>
                            <p id="address">Address: Example Address</p>
                            <p id="phone">Phone Number: 123-456-7890</p>
                            <p>Email: example@restaurant.com</p>
                            <p>Unique Code: 12345</p>
                        </div>
                        <div class="image">
                            <img id="avartar2" alt="Restaurant Image">
                        </div>
                        </div>
                </div>
                </form>
            </div>

        </main>

    </div>

</body>

</html>


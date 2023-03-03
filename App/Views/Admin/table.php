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

    <!-- icons cdn -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="public/assets/fafod.ico" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="css/new-food.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/modal.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- JS scripts-->
    <script src="public/scripts/resprofile.js"></script>
    <script src="public/scripts/published-menus.js" defer></script>

    <style>
        .bx-trash {
            color: red;
        }

        .bx-edit {
            color: greenyellow
        }
    </style>



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
            <h2 class="modal_header">Edit food details</h2>
            <div class="new_food_wrapper_edit">
                <form class="table_form" class="form" name="food-form" id="food-form">
                <div style="text-align:center" id="msg"></div>
                <input id="menuid" name="menu_id"   type="hidden">

                    <div class="input_wrapper">
                        <label for="food_name">Food Name</label>
                        <input id="food_name" name="food_name" class="food_name" autofocus type="text">
                    </div>


                    <div class="input_wrapper">
                        <label for="food_name">Food Description</label>
                        <input id="food_desc" name="food_description" class="food_desc" type="text">
                    </div>

                    <div class="input_wrapper">
                        <label for="food_name">Price</label>
                        <input id="food_price" name="food_price" class="food_price" type="number">
                    </div>

                    <div class="input_wrapper">
                        <label for="food_name">Quantity</label>
                        <input id="food_quantity" name="food_quantity" class="food_qty" type="number">
                    </div>

                    <div class="input_wrapper">
                        <input id="sub-btn" class="submit_btn" type="submit" value="Update Details">
                    </div>

                </form>
            </div>
        </div>

    </dialog>


    <div class="s-layout">
        <!-- Sidebar -->
        <?php require("sidebar-items.php")?>


        <!-- Main Content -->
        <main class="s-layout__content">
            <nav class="nav bd-container">
                <a href="/fast-foodies" class="header_name">
                    <h1 style="margin-left:20px;">Foodie</h1>
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">

                        <li class="nav__item"><h1 id="res_name"></h1></li>


                    </ul>
                </div>
            </nav>

            <!-- Foods Published  -->
            <div class="text_wrapper">
                <h2 style="text-align: center;">Foods Published</h2>
                <span id="msg"></span>
            </div>

            <div class="table_wrapper">
                <!-- TABLE STARTS -->

                <div class="table_wrapper">
                    <!-- TABLE STARTS -->

                    <table>
                        <thead id="table-header">
                            <tr>
                                <th>Food</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody id="table-body">
                            <!-- Table data will be dynamically added here -->
                        </tbody>
                    </table>
                </div>


                <!-- TABLE ENDS -->
            </div>



        </main>
    </div>
    <script type="text/javascript" src="public/scripts/modal.js"></script>
</body>

</html>
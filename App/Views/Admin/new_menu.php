<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="public/assets/fafod.ico" type="image/x-icon">

    <!-- css links -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>
        <?php
        session_start();
        if (isset($_SESSION['res_name'])) {
            echo $_SESSION['res_name'];
            echo "-new menu";
        } else
            echo "Restaurant";

        ?>
    </title>
    <link rel="stylesheet" href="public\css\styles.css" />
    <link rel="stylesheet" href="public\css\new-food.css" />

    <!-- scripts links -->
    <!-- <script charset="utf-8" src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script> -->
    <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
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
                <a href="/fast-foodies" class="header_name">
                    <h1>Foodie</h1>
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><h3 id="res_name" class="nav__link "></h3></li>
                    </ul>
                </div>
            </nav>

            <!-- Foods Published  -->
            <div class="text_wrapper">
                <h2>Add New Food</h2>
            </div>

            <!-- Add new food -->
            <div class="new_food_wrapper">
                <span id="msg"></span>
                <form id="food-form" class="form" name="food-form">

                    <div class="input_wrapper">
                        <label for="food_name">Food Name</label>
                        <input class="food_name" name="food_name" type="text">
                    </div>

                    <div class="input_wrapper">
                        <label for="food_name">Food Description</label>
                        <input class="food_desc" name="food_description" type="text">
                    </div>


                    <div class="input_wrapper">
                        <label for="food_name">Price</label>
                        <input class="food_desc" type="number" name="price">
                    </div>

                    <div class="input_wrapper">
                        <label for="food_name">Quantity</label>
                        <input class="food_qty" type="number" name="quantity">
                    </div>

                    <div class="input_wrapper_img   ">
                        <label for="food_name">Food Image</label>
                        <input type="hidden" role="uploadcare-uploader" data-public-key="e2ac7ad8c06a4a0b28b2"
                            data-images-only class="uploadcare-widget">
                    </div>

                    <div class="input_wrapper">
                        <input value = "submit" class="submit_btn" type="submit">
                    </div>

                </form>
            </div>

        </main>

    </div>


    <script src="public/scripts/new-product.js"></script>

</body>

</html>
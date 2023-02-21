<!DOCTYPE html>
<html>

<head>
    <title>CART</title>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
    
    <!-- stylesheets -->
    <link rel="stylesheet" type="text/css" href="public/css/style-cart.css">
    <!-- Javascipt libraries and scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>

    <input type="hidden" name="id" id="id" value=<?php session_start();
    echo $_SESSION['user_id']; ?>>
    <div class="CartContainer">
        <div class="Header">
            <h3 class="Heading">My Cart</h3>
            <a href="/fast-foodies/menu" class="back">
                <h5 class="Action">Back to Menu <i class='bx bxs-food-menu'></i></h5>
            </a>
        </div>

        <div class="Cart-Items">

            <div class="image-box">
                <img src="public/assets/chicken.png" alt="" class="menu__img">
            </div>

            <div class="about">
                <h1 class="title"> Chicken </h1>
                <h3 class="subtitle"> Braised whole chicken</h3>
            </div>

            <div class="counter">
                <div class="btn">+</div>
                <div class="count">1</div>
                <div class="btn">-</div>
            </div>

            <div class="prices">
                <div class="amount">GHC 20.00</div>
                <div class="remove"><i class='bx bxs-trash-alt'></i></div>
            </div>

        </div>

        <!-- <hr> -->
        <div class="checkout">
            <div class="total">
                <div>
                    <div class="Subtotal">Sub-Total</div>
                    <div class="items"> 2 items</div>
                </div>
                <div class="total-amount">GHC 49.00</div>
            </div>

        </div>



    </div>

    <script src="public/scripts/cart.js"></script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>My Cart</title>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="public/css/cart.css" rel="stylesheet">

    <!-- stylesheets -->
    <!-- <link rel="stylesheet" type="text/css" href="public/css/style-cart.css"> -->
    <link rel="stylesheet" type="text/css" href="public/css/cart.css">

    <!-- Javascipt libraries and scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>

    <input type="hidden" name="id" id="id" value=<?php session_start();
    echo $_SESSION['user_id']; ?>>

    <div class="wrapper">
        <div class="header-cart">
            <a href="/fast-foodies/menu">Continue Ordering</a>
            <h1>Foodies in My Basket</h1>
        </div>

		<div class="project">
			<div class="shop">
				<!-- Cart items will be placed here -->
			</div>
			<div class="right-bar">
                <p><span>Total items</span> <span id="total-items"></span></p>
                    <hr>
				<p><span>Subtotal</span> <span id="total-amt"></span></p>
				<hr>
				<p><span>Delivery</span> <span id="delivery">GHC 15.00</span></p>
				<hr>
				<p><span>Total</span> <span id = "overall-total"></span></p><a href="/fast-foodies/checkout"><i class="fa fa-shopping-cart"></i>Checkout</a>
			</div>
		</div>
	</div>

    <script src="public/scripts/cart.js"></script>
</body>
</html>
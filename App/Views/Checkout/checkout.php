<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Payment Form</title>
  <link rel="stylesheet" type="text/css" href="public/css/checkout.css">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <link rel="shortcut icon" href="public/assets/fafod.ico" type="image/x-icon">

</head>

<body>


<?php

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location: /fast-foodies/login');
}

?>
  <div class="wrapper">

    <div class="header-cart">
      <a href="/fast-foodies/menu">Continue Ordering</a>
      <h1>Foodies in My Basket</h1>
    </div>
    <div class="project">

      <form class="shop" id="payment-form" method="POST">
        <div>

          <input type="radio" name="payment-method" value="momo" id="momo-radio">
          <label for="momo-radio">Pay with Momo</label>
          <input type="radio" name="payment-method" value="cod" id="cod-radio" checked>
          <label for="cod-radio">Pay on Delivery</label>
        </div>
        <div class="box" id="momo-fields" style="display:none">
          <label for="amount">Amount:</label>
          <input type="text" name="amount" id="amount">
          <label for="phone-number">Phone Number:</label>
          <input type="text" name="phone-number" id="phone-number">
          <label for="order">Order:</label>
          <input type="text" name="order" id="order">
        </div>
        <a class="btn"id="submit-payment-button"><i class='bx bxs-package'></i>Confirm Order</a>

      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="public/scripts/checkout.js"></script>
</body>

</html>
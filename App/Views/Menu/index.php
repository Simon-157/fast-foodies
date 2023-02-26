<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--========== BOX ICONS ==========-->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <!--========== CSS ==========-->
  <link rel="stylesheet" type="text/css" href="public/css/menu.css" />
  <script src="public/scripts/main.js"></script>

  <title>Menu</title>
</head>

<body>

  <?php

  session_start();
  if (!isset($_SESSION['user_id'])) {
    header('location: /fast-foodies/login');
  }

  ?>
  <!--========== SCROLL TOP ==========-->
  <a href="#" class="scrolltop" id="scroll-top">
    <i class="bx bx-chevron-up scrolltop__icon"></i>
  </a>

  <!--========== HEADER ==========-->
  <header class="l-header" id="header">
    <nav class="nav bd-container">
      <a href="/fast-foodies" class="header_name">
        <h1>Fast Foodies.</h1>
      </a>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="/fast-foodies" class="nav__link">Home</a>
          </li>
          <li> <a href="" class="nav__link">

              <?php
              // session_start();
              if (isset($_SESSION['user_id'])) {
                echo '
                  <ul class="nav__list">
                  <li class="nav__item">
                  <a href="/fast-foodies/logout" class="nav__link">logout</a>
                </li>
                  <li class="nav__item">
                    <a href="/fast-foodies/menu" class="nav__link">Menu</a>
                  </li>
                  <li class="nav__item">
                    <a href="" class="nav__link"><span id = "username" ></span></a>
                  </li>
                  <li class="nav__item">
                  <a href="/fast-foodies/cart"><i id ="cartbtn" class="bx bx-cart-alt cart__button"  value=2 ></i></a>
                </li>
                <div class="avartar">
                  <img class="proImg" id ="avartar" ></img>
                </div>
                </ul>
                
                  ';
              }
              ?>
          </li>

          <!-- cart button -->

        </ul>
      </div>

      <div class="nav__toggle" id="nav-toggle">
        <i class="bx bx-menu"></i>
      </div>
    </nav>
  </header>
  <!--========== HEADER ENDS ==========-->
  <!-- ========== MENU ==========-->
  <section class="menu section bd-container" id="menu">
    <div class="search-title">
      <h2 class="section-title">Menu</h2>
      <?php require("search.php"); ?>

    </div>

    <!-- ========== ITEMS ==========-->
    <div class="menu__container bd-grid">
      <div class="menu__content">
        <img src="public/assets/burger.png" alt="" class="menu__img" />
        <h3 class="menu__name">Hot Burger</h3>
        <span class="menu_detail"> A nice food for you</span>
        <span class="menu__price">GHC 20.00</span>
        <a href="" class="button-order">Order</a>
      </div>
    </div>
    <?php echo $title ?>
  </section>
  <!-- ========== MENU ENDS ==========-->

  <!--========== FOOTER ==========-->
  <footer class="footer section bd-container">
    <div class="footer__container bd-grid">
      <div class="footer__content">
        <a href="#" class="footer__logo">Fast Foodies</a>
        <span class="footer__description">Restaurant</span>
        <div>
          <a href="#" class="footer__social"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="footer__social"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="footer__social"><i class="bx bxl-twitter"></i></a>
        </div>
      </div>
      <div id="menu-container"></div>

      <div class="footer__content">
        <h3 class="footer__title">Services</h3>
        <ul>
          <li><a href="/menu" class="footer__link">Order Food</a></li>
          <li>
            <a href="/table" class="footer__link">Table Reservation</a>
          </li>
          <li><a href="#" class="footer__link">Delivery</a></li>
        </ul>
      </div>

      <div class="footer__content">
        <h3 class="footer__title">Information</h3>
        <ul>
          <li><a href="#" class="footer__link">Event</a></li>
          <li><a href="#" class="footer__link">Contact us</a></li>
          <li><a href="#" class="footer__link">Privacy policy</a></li>
          <li><a href="#" class="footer__link">Terms of services</a></li>
        </ul>
      </div>

      <div class="footer__content">
        <h3 class="footer__title">Address</h3>
        <ul>
          <li>Somewhere</li>
          <li>Universe</li>
          <li>999 - 888 - 777</li>
          <li>silverleaf@gmail.com</li>
        </ul>
      </div>
    </div>

    <p class="footer__copy">&#169; 2023 All right reserved</p>
  </footer>
  <!--========== FOOTER ENDS HERE ==========-->

  <!--========== SCROLL REVEAL ==========-->
  <script src="https://unpkg.com/scrollreveal"></script>

  <!--========== MAIN JS ==========-->
  <script src="public/scripts/menu.js">

  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>

  <!-- CSS styling -->
  <link rel="stylesheet" href="public\css\login.css" />

  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
  <?php

  session_start();
  if (isset($_SESSION['user_id'])) {
    header('location: /fast-foodies');
  }

  ?>
  <main>
    <div class="main-container">
      <!-- Leaf icon -->
      <div class="leaf-wrapper">
        <img class="leaf-icon" src="public/assets/dish.svg" alt="leaf-icon" />
      </div>

      <!-- Welcome message -->
      <div class="header-message">
        <h3 class="welcome-message">Register a new account🚀</h3>
      </div>

      <!-- Form -->
      <form name="form" id="register" class="form-wrapper">
        <!-- Alert message -->
        <h6 class="alert">Input fields cannot be empty</h6>
        <span id="msg"></span>

        <!-- Input fields -->
        <div class="input-wrapper">
          <input name="fname" placeholder="first name" autofocus id="fname" class="text" type="text" />
        </div>

        <div class="input-wrapper">
          <input name="lname" placeholder="lastname name" autofocus id="lname" class="text" type="text" />
        </div>

        <div class="input-wrapper">
          <input name="email" placeholder="Email" id="email" class="email" type="text" />
        </div>

        <div class="input-wrapper">
          <input name="password" placeholder="Password" id="pass" class="password" type="password" />
        </div>


        <!-- Forgot password -->
        <div class="forgot-password">
          <a href="#">
            <h6>Forgot Password?</h6>
          </a>
        </div>

        <!-- Submit button -->
        <div class="submit-wrapper">
          <button type="" id="sub" class="btn">Register</button>
        </div>

        <div class="footer-wrapper">
          <h6 class="footer-message">
            Already have an account? Log in <a href="/fast-foodies/login">here</a>
          </h6>
        </div>
      </form>
    </div>
  </main>
  <script type="text/javascript" src="public/scripts/auth.js">

  </script>
</body>

</html>
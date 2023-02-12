<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- CSS styling -->
    <link rel="stylesheet" href="public\css\login.css" />

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  </head>
  <body>
    <main>
      <div class="main-container">
        <!-- Leaf icon -->
        <div class="leaf-wrapper">
          <img class="leaf-icon" src="img/dish.svg" alt="leaf-icon" />
        </div>

        <!-- Welcome message -->
        <div class="header-message">
          <h3 class="welcome-message">Sign in to your account 🚀</h3>
        </div>

        <!-- Form -->
        <form action="/fast-foodies/authenticate" method="GET" id="form" class="form-wrapper">
          <!-- Alert message -->
          <h6 class="alert">Input fields cannot be empty</h6>

          <!-- Input fields -->

          <div class="input-wrapper">
            <input
              placeholder="Email"
              autofocus
              id="email"
              name="email"
              class="email"
              type="text"
            />
          </div>

          <div class="input-wrapper">
            <input
              placeholder="Password"
              id="password"
              name="password"
              class="password"
              type="password"
            />
          </div>

          <!-- Forgot password -->
          <div class="forgot-password">
            <a href="#">
              <h6>Forgot Password?</h6>
            </a>
          </div>

          <!-- Submit button -->
          <div class="submit-wrapper">
            <button type="submit" class="btn">Sign In</button>
          </div>

          <div class="footer-wrapper">
            <h6 class="footer-message">
              Don't have an account? Sign Up
              <a href="/fast-foodies/register">here</a>
            </h6>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>

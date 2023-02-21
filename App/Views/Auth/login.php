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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#admin-checkbox").change(function() {
          if($(this).is(":checked")) {
            $("input.admin-field").show();
            // $("input.admin-field").hide();

          } else {
            $("input.admin-field").hide();
          }
        });
      });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
      label {
        display: block;
        margin-bottom: 10px;
      }

      input.admin-field {
        display: none;
      }
    </style>

  </head>
  <body>
    <main>
      <div class="main-container">
        <!-- Leaf icon -->
        <div class="leaf-wrapper">
          <img class="leaf-icon" src="public/assets/dish.svg" alt="leaf-icon" />
        </div>

        <!-- Welcome message -->
        <div class="header-message">
          <h3 class="welcome-message">Sign in to your account 🚀</h3>
        </div>

        <!-- Form -->
        <div class="form-wrapper">


          <form action="/fast-foodies/authenticate" method="GET" id="form" >
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

            <div class="input-wrapper">
              <input 
                type="text" 
                name="admin-key" 
                placeholder="Restaurant Secret Key" 
                class="admin-field">
            </div>

            <div class="input-wrapper">
                <p class="iama">Sign in as a:</p>
                <div class="radio_wrapper">
                    <div class="wr">
                        <input type="radio" name="user-type" value="customer" checked id="password" class="password"/>
                        <label>Customer 🧑</label>
                    </div>
                    <div class="wr">
                        <input type="radio" name="user-type" value="admin" id="admin-checkbox" id="password" class="password"/>
                        <label>Restaurant 🏪</label>
                    </div>
                </div>

            </div>


            <!-- Submit button -->
            <div class="submit-wrapper">
              <button type="submit" class="btn">Sign In</button>
            </div>
          </form>

          <!-- Google sign in button -->
          <form action="/fast-foodies/googleauth" method ="POST">
            <div class="submit-wrapper google_div"> 
              <button class="google-btn" type="submit" name = "sign-in">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo">
                Sign in with Google
              </button>
            </div>
          </form>
          
          <div class="footer-wrapper">
            <h6 class="footer-message">
              Don't have an account? Sign Up
              <a href="/fast-foodies/register">here</a>
            </h6>
          </div>
        </div>
      </div>
    </main>
    <script src="public/scripts/login.js"></script>
  </body>
</html>

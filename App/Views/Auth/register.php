<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>

    <!-- CSS styling -->
    <link rel="stylesheet" href="css/login.css" />

    <!-- Javascript -->
    <script defer type="text/javascript" src="main.js"></script>
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
          <h3 class="welcome-message">Register a new account🚀</h3>
        </div>

        <!-- Form -->
        <form action="/fast-foodies/public" method="POST" name="form" id="form" class="form-wrapper">
          <!-- Alert message -->
          <h6 class="alert">Input fields cannot be empty</h6>

          <!-- Input fields -->
          <div class="input-wrapper">
            <input
              name="fname"
              placeholder="first name"
              autofocus
              id=""
              class="text"
              type="text"
            />
          </div>

          <div class="input-wrapper">
            <input
              name="lname"
              placeholder="lastname name"
              autofocus
              id=""
              class="text"
              type="text"
            />
          </div>

          <div class="input-wrapper">
            <input
              name="email"
              placeholder="Email"
              id="email"
              class="email"
              type="text"
            />
          </div>

          <div class="input-wrapper">
            <input
            name = "password"
              placeholder="Password"
              id="password"
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
              Already have an account? Log in <a href="login.html">here</a>
            </h6>
          </div>
        </form>
      </div>
    </main>
    <!-- <script type= "text/javascript">

        document.form.addEventListener("submit", async function (event) {
  event.preventDefault();
  const form = event.target;
  const result = await fetch(form.action, {
    method: form.method,
    body: new URLSearchParams([...new FormData(form)]),
  })
    .then((response) => response.json())
    .then((json) => json)
    .catch((error) => console.log(error));
});

    </script> -->
  </body>
</html>

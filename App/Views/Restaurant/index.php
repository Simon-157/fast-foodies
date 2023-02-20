<!DOCTYPE html>
<html lang="en">
   <head>

      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Register a Restaurant</title>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="public\css\styles.css" />
      <link rel="stylesheet" href="public\css\new-food.css" />
      <link rel="stylesheet" href="public\css\login.css" />
      <!-- <script charset="utf-8" src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script> -->
      <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>

</head>
<body>

<main>
      <div class="main-container">
  
        <!-- Welcome message -->
        <div class="header-message">
          <h3 class="welcome-message">Register a new account🚀</h3>
        </div>
        
        <!-- Form -->
        <form
          action = "/fa st-foodies/addrestaurant" 
          name="register" id="register"
          class="form-wrapper"
        >
        <!-- Alert message -->
        <span id="msg"></span>

          <!-- Input fields -->
          <div class="input-wrapper">
            <input
              name= "res_name"
              placeholder="Restaurant Name"
              autofocus
              id="fname"
              class="text"
              type="text"
            />
          </div>

          <div class="input-wrapper">
            <input
              name= "res_email"
              placeholder="Restaurant Email"
              autofocus
              id="lname"
              class="text"
              type="text"
            />
          </div>

          <div class="input-wrapper">
            <input
              name= "res_address"
              placeholder="Location"
              id="email"
              class="email"
              type="text"
            />
          </div>

          <div class="input-wrapper">
            <input
              name="res_phone"
              placeholder="Phone Number"
              id="pass"
              class="password"
              type="text"
            />
          </div>
          <input
              name="image_url"
              id="img_up"
              type="hidden"
            />

          <div class="input-wrapper">
            <input type="hidden" role="uploadcare-uploader" 
                data-public-key="e2ac7ad8c06a4a0b28b2"
                data-images-only  class="uploadcare-widget"
            >

          </div>

          <!-- Submit button -->
          <div class="submit-wrapper">
            <button  id="sub" name= "register_btn"  class="btn">Register</button>
          </div>

          <div class="footer-wrapper">
            <h6 class="footer-message">
              Already have an account? Log in <a href="/fast-foodies/login">here</a>
            </h6>
          </div>
        </form>
        

      </div>
   </main>

   <script  type = "">

              // Initialize the Uploadcare widget
        var widget = uploadcare.Widget('[role=uploadcare-uploader]');

        // Listen for when a file is uploaded
        widget.onUploadComplete(function(info) {
          console.log('File uploaded:', info.cdnUrl);

          // Display the uploaded image in the img element
          var imgElement = document.getElementById('uploaded-image');
          imgElement.src = info.cdnUrl;
          $('#img_up').value = info.cdnUrl;-

          // Add the image URL to the post data
          $("#register").append('<input type="hidden" name="image_url" value="' + info.cdnUrl + '">');
        });

        // form submission script for registering a restaurant
        $("#sub").click(() => {
          const data = $("#register :input").serializeArray();

          console.log(data);

          $.post($("#register").attr("action"), data, (info) => {
            $("#msg").html(info);
          });
          clearInput();
        });

        $("#register").submit(() => {
          return false;
        });

        function clearInput (){
          $("#register :input").each(() => {
            $(this).val(' ');
          });
        };

   </script>
</body>
</html>



<!-- Your HTML code here -->

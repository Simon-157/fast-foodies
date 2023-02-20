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
      <script charset="utf-8" src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
      <!-- <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script> -->

</head>
<body>

    <div class="s-layout">
        <!-- Main Content -->
        <main class="s-layout__content">
            <nav class="nav bd-container">
                <a href="/fast-foodies" class="header_name"><h1>Foodies</h1></a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="index.html" class="nav__link ">Jack Maaye </a></li>
                    </ul>
                </div>
            </nav>

            <!-- Foods Published  -->
            <div class="text_wrapper">
                <h2>Register Your Restaurant</h2>
            </div>

            <!-- Add new food -->
            <div class="new_food_wrapper">
               <h3 id="msg"></h3>
                <form action = "/fast-foodies/addrestaurant" class="form" name="register" id="register">

                    <div class="input_wrapper">
                        <label for="food_name">Restaurant Name</label>
                        <input class="food_name" name= "res_name" type="text" placeholder="Shawa Eatery">
                    </div>
                    <div class="input_wrapper">
                        <label for="food_name">Restaurant Email</label>
                        <input class="food_name" type="text" name= "res_email" placeholder = "e.g fastfoodies@gmail.com">
                    </div>

                    <div class="input_wrapper">
                       <label for="food_name">Location</label>
                       <input class="food_desc" type="text" name= "res_address" placeholder="e.g Accra, COCOBOD" >
                     </div>

                     <div class="input_wrapper">
                        <label for="food_name">Phone Number</label>
                        <input class="food_qty" type="text" name= "res_phone" placeholder="e.g +233 552 592 929">
                     </div>
                     <div class="input_wrapper">
                         <label for="food_name">Restaurant Image/Logo</label>
                         <input type="hidden" role="uploadcare-uploader" data-public-key="e2ac7ad8c06a4a0b28b2"  data-images-only  class="uploadcare-widget">
                     </div>
                      <!-- <img id="uploaded-image"> -->
                     <div class="input_wrapper" >
                        <input class="submit_btn" type="button" name= "register_btn" id="sub"   value="Submit">
                     </div>
                </form>
            </div>

        </main>

    </div>
   <script  type = "">

      // Initialize the Uploadcare widget
var widget = uploadcare.Widget('[role=uploadcare-uploader]');

// Listen for when a file is uploaded
widget.onUploadComplete(function(info) {
  console.log('File uploaded:', info.cdnUrl);

  // Display the uploaded image in the img element
  var imgElement = document.getElementById('uploaded-image');
  imgElement.src = info.cdnUrl;

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


  // Initialize the Uploadcare widget
var widget = uploadcare.Widget('[role=uploadcare-uploader]');

// Listen for when a file is uploaded
widget.onUploadComplete(function(info) {
  console.log('File uploaded:', info.cdnUrl);

  $('#img_up').val(info.cdnUrl);
});

// form submission script for registering a restaurant
$("#sub").click(() => {
  // Validate the form
  var isValid = validateForm();

  // If the form is valid, submit it
  if (isValid) {
    // Create a new FormData object
    var formData = new FormData($("#register")[0]);

    console.log(formData);
    // Send the form data using AJAX
    $.ajax({
      url: $("#register").attr("action"),
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function(info) {
        $("#msg").html(info);
        clearInput();
      },
      error: function(xhr, status, error) {
        console.log("Error:", error);
      }
    });
  }
});


$("#register").submit(() => {
  return false;
});

function clearInput() {
  $("#register :input").each(function() {
    $(this).val("");
  });
}



function validateForm() {
  var isValid = true;
  var errorMsg = '';

  // Get the input fields
  var restaurantName = $("#fname").val();
  var restaurantAddress = $("#lname").val();
  var restaurantPhone = $("#pass").val();
  var restaurantImage = $("#img_up").val();

  // Check if the input fields are empty
  if (restaurantName.trim() == "") {
    isValid = false;
    errorMsg = "All fields are required";
  }

  if (restaurantAddress.trim() == "") {
    isValid = false;
    errorMsg = "All fields are required";
  } else {
    // Check if the email address is valid
    var emailPattern = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    if (!emailPattern.test(restaurantAddress.trim())) {
      isValid = false;
      errorMsg = "Please enter a valid email address.<br>";
    }
  }

  if (restaurantPhone.trim() == "") {
    isValid = false;
    errorMsg = "All fields are required";
  }

  if (restaurantImage.trim() == "") {
    isValid = false;
    errorMsg = "All fields are required";
  }

  // Display the error message
  if (!isValid) {
    $("#msg").html(errorMsg);
    $("#msg").css('color', 'red');
  } else {
    $("#msg").html("");
  }

  return isValid;
}

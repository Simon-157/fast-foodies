$(document).ready(function() {
  $("#admin-checkbox").change(function() {
    if ($(this).is(":checked")) {
      $("input.admin-field").show();
      $("input.pass-field").hide(); // hide password field
    } else {
      $("input.admin-field").hide();
      $("input.pass-field").show(); // show password field
    }
    
  });

  $("#password").change(function() {
    if ($(this).is(":checked")) {
      $("input.admin-field").hide();
      $("input.pass-field").show(); // hide password field
    } else {
      $("input.admin-field").sow();
      $("input.pass-field").hide(); // show password field
    }
    
  });




  // Validation function
  function validateForm() {
    var email = $("input[name='email']").val();
    var password = $("input[name='password']").val();
    var adminkey = $("input[name='admin-key']").val();

    // Check that all fields are not empty
 

    if (($("#admin-checkbox").is(":checked")) && (email == "" || adminkey == "") ){
      $("#msg").html("All fields are required *");
      $("#msg").css('color', 'red');
      return false;
    }

    else if (!($("#admin-checkbox").is(":checked")) && (email == "" || password == "")){
      $("#msg").html("All fields are required *");
      $("#msg").css('color', 'red');
      return false;
    }
    // Validate email field using regex pattern
    var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!emailPattern.test(email)) {
      $("#msg").html("Email is invalid");
      $("#msg").css('color', 'red');
      return false;
    }

    return true;
  }

  // Ajax submit
  $("#form").submit(function(event) {
    event.preventDefault(); // prevent default form submission

    if (!validateForm()) {
      return false;
    }

    $.ajax({
      type: "GET",
      url: $(this).attr("action"), // get the form action URL
      data: $(this).serialize(), // serialize form data
      success: function(response) {
        if (response.success && response.message === "admin") {
          window.location.href = '/fast-foodies/restaurant';
        } else if (response.success && response.message === "customer") {
          window.location.href = '/fast-foodies/'
        }
        // redirect to the page responded by the server
      }
    });
  });
});

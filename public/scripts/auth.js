$("#sub").click(() => {
  if (validateForm()) {
    var formData = new FormData($("#register")[0]);

    console.log(formData);
    $.ajax({
      url:"/fast-foodies/create",
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
  var fname = document.forms["form"]["fname"].value.trim();
  var lname = document.forms["form"]["lname"].value.trim();
  var email = document.forms["form"]["email"].value.trim();
  var pass = document.forms["form"]["password"].value.trim();

  if (fname == "" || lname == "" || email == "" || pass == "") {
    $("#msg").html("All fields are required");
    $("#msg").css('color', 'red');
    return false;
  }

  if (!isValidEmail(email)) {
    $("#msg").html("Please enter a valid email address");
    $("#msg").css('color', 'red');
    return false;
  }

  if (pass.length < 6) {
    $("#msg").html("Password must be at least 6 characters long");
    $("#msg").css('color', 'red');
    return false;
  }

  return true;
}

function isValidEmail(email) {
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailPattern.test(email);
}

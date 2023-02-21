
$("#sub").click(() => {
  // Create a new FormData object
  var formData = new FormData($("#register")[0]);

  console.log(formData);
  // Send the form data using AJAX
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
});

$("#register").submit(() => {
  return false;
});

function clearInput() {
  $("#register :input").each(function() {
    $(this).val("");
  });
}


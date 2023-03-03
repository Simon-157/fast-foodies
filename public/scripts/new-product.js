// $(document).ready(function() {
//     // Submit form data via AJAX
//     $("#food-form").submit(function(event) {
//       event.preventDefault();
//       var form = $(this);
//       var formData = new FormData(form[0]);
//       var widget = uploadcare.Widget("[role=uploadcare-uploader]");
//       var file = widget.value();
  
//       if (file) {
//         file.done(function(fileInfo) {
//           formData.set("food_imgUrl", fileInfo.cdnUrl);
//           console.log(formData)
//           // Submit form data with image URL via AJAX
//           $.ajax({
//             url: "/fast-foodies/addmenu",
//             method: "POST",
//             data: formData,
//             processData: false,
//             contentType: false,
//             success: function(response) {
//                $('#msg').text(response.message);
//               console.log("Form data submitted successfully");
//               return false;
//             },
//             error: function(xhr, status, error) {
//               console.log("Error submitting form data");
//             }
//           });
//         });
//       } else {
//         // Submit form data without image URL via AJAX
//         $.ajax({
//           url: "/fast-foodies/addmenu",
//           method: "POST",
//           data: formData,
//           processData: false,
//           contentType: false,
//           success: function(response) {
//             console.log("Form data submitted successfully");
//           },
//           error: function(xhr, status, error) {
//             console.log("Error submitting form data");
//           }
//         });
//       }
//     });
//   });
  



  $(document).ready(function() {
    // Submit form data via AJAX
    $("#food-form").submit(function(event) {
      event.preventDefault();
      if (validateForm()) {
        var form = $(this);
        var formData = new FormData(form[0]);
        var widget = uploadcare.Widget("[role=uploadcare-uploader]");
        var file = widget.value();
  
        if (file) {
          file.done(function(fileInfo) {
            formData.set("food_imgUrl", fileInfo.cdnUrl);
            console.log(formData)
            // Submit form data with image URL via AJAX
            $.ajax({
              url: "/fast-foodies/addmenu",
              method: "POST",
              data: formData,
              processData: false,
              contentType: false,
              success: function(response) {
                 $('#msg').text(response.message);
                console.log("Form data submitted successfully");
                return false;
              },
              error: function(xhr, status, error) {
                console.log("Error submitting form data");
              }
            });
          });
        } else {
          // Submit form data without image URL via AJAX
          $.ajax({
            url: "/fast-foodies/addmenu",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              console.log("Form data submitted successfully");
            },
            error: function(xhr, status, error) {
              console.log("Error submitting form data");
            }
          });
        }
      }
    });
    
    // Validation function
    function validateForm() {
      var valid = true;
      $("#food-form input").each(function() {
        if ($(this).val() === "") {
          $("#msg").html("All fields are required");
          $("#msg").css('color', 'red');
          valid = false;
        } else {
          $("#msg").html("All fields are required");
          $("#msg").css('color', 'red');
        }
      });
      if (!valid) {
        $("#msg").html("All fields are required");
        $("#msg").css('color', 'red');
      }
      return valid;
    }
  });
  
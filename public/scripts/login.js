
  $(document).ready(function() {
    $("#admin-checkbox").change(function() {
      if($(this).is(":checked")) {
        $("input.admin-field").show();
        // $("input.admin-field").hide();

      } else {
        $("input.admin-field").hide();
      }
    });

    // Ajax submit
    $("#form").submit(function(event) {
      event.preventDefault(); // prevent default form submission

      $.ajax({
        type: "GET",
        url: $(this).attr("action"), // get the form action URL
        data: $(this).serialize(), // serialize form data
        success: function(response) {
            if(response.success && response.message === "admin"){

                window.location.href = '/fast-foodies/restaurant';
            }
            else if(response.success && response.message === "customer"){
                window.location.href='/fast-foodies/'
            }
          // redirect to the page responded by the server
        }
      });
    });
  });


$(document).ready(function () {
    // Open the modal when the edit button is clicked
    $(document).on('click', '.edit-food-btn', function () {
        console.log('clicked')
        $('#mySizeChartModal').show();

        // Get the values of the cells in the same row as the clicked edit button
        const foodName = $(this).closest('tr').find('td:eq(0)').text();
        const foodDesc = $(this).closest('tr').find('td:eq(1)').text();
        const foodQty = $(this).closest('tr').find('td:eq(2)').text();
        const foodPrice = $(this).closest('tr').find('td:eq(3)').text();
        const menu_id = $(this).closest('tr').find('td:eq(4)').text()
        console.log(menu_id)

        // Populate the input fields in the modal with the values obtained
        $('#menuid').val(menu_id);
        $('#food_name').val(foodName);
        $('#food_desc').val(foodDesc);
        $('#food_quantity').val(foodQty);
        $('#food_price').val(foodPrice); // extracting the amount using regex
       
    });

    $("#food-form").submit(function(event) {
        event.preventDefault();
        const form = $(this);
        const formData = new FormData(form[0]);

          // Submit form data without image URL via AJAX
          $.ajax({
            url: "/fast-foodies/update_menu",
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
              console.log("error. "+ error, "status . " + status);
            }
          });
        
      });

    // Bind the click event to the window to hide the modal
    $(window).on('click', function (event) {
        if (event.target.id === 'mySizeChartModal') {
            $('#mySizeChartModal').hide();
        }
    });


    $(document).on('click', '.ebcf_close', () => {
        $('#mySizeChartModal').hide();
    })
});







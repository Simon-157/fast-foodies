$(document).ready(function () {
    // Open the modal when the edit button is clicked
    $(document).on('click', '.edit-food-btn', function () {
        console.log('clicked')
        $('#mySizeChartModal').show();

        // Get the values of the cells in the same row as the clicked edit button
        var foodName = $(this).closest('tr').find('td:eq(0)').text();
        var foodDesc = $(this).closest('tr').find('td:eq(1)').text();
        var foodQty = $(this).closest('tr').find('td:eq(2)').text();
        var foodPrice = $(this).closest('tr').find('td:eq(3)').text();

        // Populate the input fields in the modal with the values obtained
        $('#food_name').val(foodName);
        $('#food_desc').val(foodDesc);
        $('#food_quantity').val(foodQty);
        $('#food_price').val(foodPrice); // extracting the amount using regex
        // Get the modal
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







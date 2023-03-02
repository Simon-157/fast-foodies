$(document).ready(function () {
    // Make AJAX request to fetch cart items

    const id = $('#id').val();
    console.log(id);
    $.ajax({
        url: "/fast-foodies/getuser_cart?id=" + id,
        type: 'GET',
        dataType: "json",
        success: (response) => {
            
            if (response.status === 'success') {
                $(".shop").html("");

                // Replace cart content div with cart items
                var total_amt = 0;
                $.each(response.data, (index, item) => {
                    total_amt += parseFloat(item.subtotal);
                    var item_html = `
                  <div class="box" id=${index}>
                    <img src=${item.food_imgUrl}>
                    <div class="content">
                      <h3>${item.food_name}</h3>
                      <h4>Price: &#8373;${item.price_per_one}</h4>
                      <p class="unit">Quantity: <input class="item-quantity" name="" value=${item.quantity}></p>
                      <p class="btn-area"><i aria-hidden="true" class="fa fa-trash del-food-btn"></i> <span class="btn2">Remove</span></p>
                    </div>
                    <input style="display:none" type="hidden" class="item-id" value=${item.id}></input>
                  </div>
                `;
                    $(".shop").append(item_html);
                });

                $('#total-amt').html('GHC ' + total_amt.toFixed(2));
                $('#total-items').html(Object.keys(response.data).length);
                const delivery = $('#delivery').html();
                $('#overall-total').html('GHC ' + (parseFloat(delivery.replace("GHC "," "))+  total_amt).toFixed(2))
            } else {
                console.error(response.message);
            }

            $(".loader-wrapper").remove();

        }
    });


    $(document).on('click', '.del-food-btn', function () {

        const idContent = $(this).closest(".box").find(".item-id").val();
        console.log(idContent);
    
        const edit_id = { id: id, item_id: idContent };
    
        // Display custom confirmation pop-up
        const popup = $('<div/>', {
            id: 'custom-popup',
            html: '<p>Are you sure you want to delete this item?</p><button id="delete-btn">Delete</button><button id="cancel-btn">Cancel</button>'
        }).appendTo('body');
    
        // Handle delete button click
        $('#delete-btn').on('click', function () {
            // Submit menu id to be deleted
            $.ajax({
                url: "/fast-foodies/remove_cart",
                method: "POST",
                data: edit_id,
                success: function (response) {
                    $('#msg').text(response.message);
                    console.log("Form data submitted successfully");
                    location.reload();
                    return false;
                },
                error: function (xhr, status, error) {
                    console.log("Error submitting form data");
                    console.log("error. " + error, "status . " + status);
                }
            });
            popup.remove();
        });
    
        // Handle cancel button click
        $('#cancel-btn').on('click', function () {
            popup.remove();
        });
    });
    

});

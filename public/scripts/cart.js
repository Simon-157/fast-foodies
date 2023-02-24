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
                  <div class="box" id = ${index}>
                    <img src=${item.food_imgUrl}>
                    <div class="content">
                      <h3>${item.food_name}</h3>
                      <h4>Price: $${item.price_per_one}</h4>
                      <p class="unit">Quantity: <input name="" value=${item.quantity}></p>
                      <p class="btn-area"><i aria-hidden="true" class="fa fa-trash del-food-btn"></i> <span class="btn2">Remove</span></p>
                    </div>
                    <input style="display:none" type="hidden" id="itemid" value = ${item.id}></input>
                  </div>
                `;
                    $(".shop").append(item_html);
                });

                $('#total-amt').html('GHC ' + total_amt);
                $('#total-items').html(Object.keys( response.data ).length);
            }

            else {
                console.error(response.message);
            }
        }
    });


    $(document).on('click', '.del-food-btn', function () {

        // const menu_id = $(this).closest('tr').find('td:eq(4)').text();

        const idContent = $('#itemid').val();
        console.log(idContent);

        const edit_id = { id: id, item_id: idContent }; // add menu_id key-value pair

        // Submit menu id to be deleted
        $.ajax({
            url: "/fast-foodies/remove_cart",
            method: "POST",
            data: edit_id,
            success: function (response) {
                $('#msg').text(response.message);
                console.log("Form data submitted successfully");
                location.reload()
                return false;
            },
            error: function (xhr, status, error) {
                console.log("Error submitting form data");
                console.log("error. " + error, "status . " + status);
            }
        });

    });

});

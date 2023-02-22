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
                $(".Cart-Items").html("");

                // Replace cart content div with cart items
                var total_amt = 0;
                $.each(response.data, (index, item) => {
                    total_amt += parseInt(item.subtotal);
                    var item_html = `
                <div class="item" id = ${index}>
                  <div class="image-box">
                    <img src="${item.food_imgUrl}" alt="" class="menu__img">
                  </div>
                  <div class="about">
                    <h1 class="title">${item.food_name}</h1>
                    <h3 class="subtitle">${item.food_description}</h3>
                  </div>
                  <div class="counter">
                    <div class="btn">+</div>
                    <div class="count">${item.quantity}</div>
                    <div class="btn">-</div>
                  </div>
                  <div class="Subtotal">GHC ${item.price_per_one
                        }</div>
                  <div class="amount">Sub Total: ${item.subtotal}</div>
                  <input style="display:none" type="hidden" id="itemid" value = ${item.id}></input>
                  <div class="prices">
                    <div class="remove"><i class='bx bxs-trash-alt del-food-btn'></i></div>
                  </div>
                </div>
              `;
                    $(".Cart-Items").append(item_html);
                });

                $('#total-amt').html(total_amt);
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
                // location.reload()
                return false;
            },
            error: function (xhr, status, error) {
                console.log("Error submitting form data");
                console.log("error. " + error, "status . " + status);
            }
        });

    });

});

$(document).ready(function() {
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
            $.each(response.data, (index, item) =>{ 
                total_amt += parseInt(item.subtotal);
              var item_html = `
                <div class="item">
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
                  <div class="prices">
                    <div class="remove"><i class='bx bxs-trash-alt'></i></div>
                  </div>
                </div>
              `;
              $(".Cart-Items").append(item_html);
            });

            $('#total-amt').html(total_amt);
            $('#total-items').html(length(response.data));
        }

        else {
            console.error(response.message);
        }
    }
  });
});

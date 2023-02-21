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
            $.each(response.data, (index, item) =>{
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
                  <div class="prices">
                    <div class="amount">GHC ${item.price}</div>
                    <div class="remove"><i class='bx bxs-trash-alt'></i></div>
                  </div>
                </div>
              `;
              $(".Cart-Items").append(item_html);
            });
        }

        else {
            console.error(response.message);
        }
    }
  });
});

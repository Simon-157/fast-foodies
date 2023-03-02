$(document).ready(function () {
    var cartNo = document.getElementById('cartbtn');
    var allData = [];
    var filteredData = [];
  
    $.ajax({
      url: '/fast-foodies/allmenus',
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        $(".loader-wrapper").remove();
        allData = response;
        filteredData = allData;
        updateTable(filteredData);
        // cartNo.value = (response.length)
        // console.log(cartNo.value)

      },
      error: function (xhr, status, error) {
        console.log('Error:', error);
      }
    });
  
    $('#search-input').on('change', function () {
      var searchTerm = $(this).val().toLowerCase();
      filteredData = allData.filter(function (item) {
        return item.food_name.toLowerCase().includes(searchTerm);
      });
      updateTable(filteredData);
    });
  
    $(document).on("click", ".button-order", function(){
      const menuid = $(this).closest(".menu__content").find(".menuid").val();
      const quant = 1;
      console.log(menuid);
      $.ajax({
        url:"/fast-foodies/add_cartitem",
        method:"POST",
        data: {menu_id: menuid, quantity:quant},
        success:function(response){
          location.href = "/fast-foodies/cart"
        },
        error: function(xhr, status, error){
          console.log("Error placing order");
          console.log("error. " + error, "status . " + status);
        }
      });
    });
  
    function updateTable(data) {
      var table_body = '';
      $.each(data, function (index, item) {
        table_body += `<div class='menu__content' id=${index}>
          <img src=${item.food_imgUrl} alt="" class="menu__img" />
          <h3 class="menu__name">${item.food_name}</h3>
          <span class="menu_detail">${item.food_description}</span>
          <span class="menu__price"> GHC  ${item.price}</span>
          <input type="button" class="button-order" value="Order" />
          <input type="hidden" class="menuid" value="${item.id}" />
        </div>`;
      });
      $('.menu__container').empty().append(table_body);
     
    }


    // console.log(cartNo.value)

  });
  
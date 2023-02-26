$(document).ready(function () {
    var cartNo = document.getElementById('cartbtn');
    $.ajax({
        url: '/fast-foodies/allmenus',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data)
            var table_body = '';
            $.each(data, function (index, item) {
                table_body += "<div class='menu__content'>"
                + `<img src="${item.food_imgUrl} alt="" class="menu__img" />
                <h3 class="menu__name">${item.food_name}</h3>
                <span class="menu_detail">${item.food_description}</span>
                <span class="menu__price"> GHC  ${item.price}</span>
                <input type="button" id="oder-btn" class="button-order" value="Order" />
                <input type="hidden" id="menuid" value =${item.id} />`
                + '</div>';
            });
            $('.menu__container').empty().append(table_body);
            cartNo.value = data.length;
            // console.log()
        },
        error: function (xhr, status, error) {
            console.log('Error:', error);
        }
    });


    $(document).on("click", "#oder-btn", function(){

        const menuid = $("#menuid").val();
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
        })
    })

});

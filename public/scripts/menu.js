$(document).ready(function () {
    $.ajax({
        url: '/fast-foodies/allmenus',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data)
            var table_body = '';
            $.each(data, function (index, item) {
                table_body += "<div class='menu__content'>"
                + '<img src="' + item.food_imgUrl + '" alt="" class="menu__img" />'
                + '<h3 class="menu__name">' + item.food_name + '</h3>'
                + '<span class="menu_detail">' + item.food_description + '</span>'
                + '<span class="menu__price"> '+ 'GHC ' + item.price+  '</span>'
                + '<a href="/fast-foodies/cart" class="button-order">Order</a>'
                + '</div>';
            });
            $('.menu__container').empty().append(table_body);
        },
        error: function (xhr, status, error) {
            console.log('Error:', error);
        }
    });
});

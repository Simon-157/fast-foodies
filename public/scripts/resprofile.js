$(document).ready(function () {

    var imgElement = document.getElementById('avartar');
    var restaurant_name = document.getElementById('res_name');
    
    $.ajax({
        url: '/fast-foodies/getrestaurantinfo',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response.data);
            restaurant_name.innerHTML = response.data.res_name;
            imgElement.src = response.data.img_url
            
        },
        error: function (xhr, status, error) {
            console.log('Error:', error);
        }
    })

    

})
$(document).ready(function () {

    var imgElement = document.getElementById('avartar');
    var imgElement2 = document.getElementById('avartar2');
    var restaurant_name = document.getElementById('res_name');
    var restaurant_name2 = document.getElementById('res_name2');
    var restaurant_address = document.getElementById('address');
    var restaurant_phone = document.getElementById('phone');
    $.ajax({
        url: '/fast-foodies/getrestaurantinfo',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response.data);
            restaurant_name.innerHTML =  response.data.res_name;
            restaurant_name2.innerHTML = " "+response.data.res_name;
            restaurant_address.innerHTML ="Address: " + response.data.res_address;
            restaurant_phone.innerHTML = "Phone Number:"+" "+response.data.phone_number;
            imgElement.src = response.data.img_url
            imgElement2.src = response.data.img_url

            
        },
        error: function (xhr, status, error) {
            console.log('Error:', error);
        }
    })

    

})
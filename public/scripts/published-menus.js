$(document).ready(function () {
    $.ajax({
        url: '/fast-foodies/allmenus_res',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var table_body = '';
            $.each(data, function (index, item) {
                table_body += '<tr>';
                table_body += '<td>' + item.food_name + '</td>';
                table_body += '<td>' + item.food_description + '</td>';
                table_body += '<td>' + item.quantity + '</td>';
                table_body += '<td>' + item.price + '</td>';
                table_body += '<td style="display:none" hidden id="#id">' + item.id + '</td>';
                table_body += '<td><i class="bx bx-edit edit-food-btn" id="edit-food-btn""></i></td>';
                table_body += '<td><i class="bx bx-trash del-food-btn" ></i></td>';
                table_body += '<td></td>';
                table_body += '</tr>';
                $('#menuid').value = item.id;
            });
            $('table tbody').empty().append(table_body);
        },
        error: function (xhr, status, error) {
            console.log('Error:', error);
        }
    });

    $(document).on('click', '.del-food-btn', function () {

        const menu_id = $(this).closest('tr').find('td:eq(4)').text();
        const edit_id = { id: menu_id, menu_id: menu_id }; // add menu_id key-value pair
        
        // Submit menu id to be deleted
        $.ajax({
            url: "/fast-foodies/delete_menu",
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
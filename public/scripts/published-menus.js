$(document).ready(function() {
    $.ajax({
      url: '/fast-foodies/allmenus',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        var table_body = '';
        $.each(data, function(index, item) {   
          table_body += '<tr>';
          table_body += '<td>' + item.food_name + '</td>';
          table_body += '<td>' + item.food_description + '</td>';
          table_body += '<td>' + item.quantity + '</td>';
          table_body += '<td>' + item.price + '</td>';
          table_body += '<td style="display:none" hidden>' + item.id + '</td>';
          table_body += '<td><i class="bx bx-edit edit-food-btn" id="edit-food-btn""></i></td>';
          table_body += '<td><i class="bx bx-trash"></i></td>';
          table_body += '<td></td>';
          table_body += '</tr>';
          $('#menuid').value = item.id;
        });
        $('table tbody').empty().append(table_body);
      },
      error: function(xhr, status, error) {
        console.log('Error:', error);
      }
    });
  });
  
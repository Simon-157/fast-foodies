$(document).ready(function() {
    $('input[name="payment-method"]').change(function() {
      if ($(this).val() == 'momo') {
        $('#momo-fields').show();
      } else {
        $('#momo-fields').hide();
      }
    });
  
    $('#submit-payment-button').click(function(event) {
      event.preventDefault();
  
      var formData = {
        'payment-method': $('input[name=payment-method]:checked').val(),
        'amount': $('#amount').val(),
        'phone-number': $('#phone-number').val(),
        'order': $('#order').val()
      };
  
      $.ajax({
        type: 'POST',
        url: '/fast-foodies/confirm_order',
        data: formData,
        dataType: 'json',
        encode: true
      })
      .done(function(data) {
        alert(data.message);
      })
      .fail(function(data) {
        alert('Payment failed: ' + data.responseJSON.error);
      });
    });
  });
  
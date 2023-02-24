$(document).ready(function () {

    var imgElement = document.getElementById('avartar');
    var data = null;
    $.ajax({
        url: '/fast-foodies/getuser',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response.data)
            imgElement.src = response.data.profileImg
            data = response.data
           
        },
        error: function (xhr, status, error) {
            console.log('Error:', error);
        }
    })




    $(document).on('click', '.proImg', function () {
        console.log(data);
        $('#mySizeChartModal').show();
       
    });

    // Bind the click event to the window to hide the modal
    $(window).on('click', function (event) {
        if (event.target.id === 'mySizeChartModal') {
            $('#mySizeChartModal').hide();
        }
    });


    $(document).on('click', '.ebcf_close', () => {
        $('#mySizeChartModal').hide();
    })

})
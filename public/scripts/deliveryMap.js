$(document).ready(function () {

  // me005IF5xish5MEfb6DNfBuPoW35e7pZ


  $(document).on('click', '#track-btn', function () {
    const address = $(this).closest('tr').find('.user_address').text().trim();
    console.log(address);

    $.ajax({
      url: "https://geocode.maps.co/search?q=" + address,
      method: "GET",
      success: function (response) {
        console.log(response);
        initializeMap(response[0]);
        console.log("des", response[0].lat);
      },
      error: function (xhr, status, error) {
        console.log("Error submitting form data");
        console.log("error. " + error, "status . " + status);
      }
    });
  });




  $("#map").css("background-color", "#FBFEFD")

  var map;

  function initializeMap(destination) {
    var mapOptions = {
      zoom: 12,
      center: new google.maps.LatLng(5.6037, -0.1870), // Accra
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    // Get the user's current location
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        var userLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        var startMarker = new google.maps.Marker({
          position: userLocation,
          map: map
        });

        var destMarker = new google.maps.Marker({
          position: new google.maps.LatLng(destination.lat, destination.lon), // University of Ghana 5.650562, -0.1962244
          map: map
        });

        var bounds = new google.maps.LatLngBounds();
        bounds.extend(startMarker.getPosition());
        bounds.extend(destMarker.getPosition());

        // create the polyline
        var path = [
          startMarker.getPosition(),
          destMarker.getPosition()
        ];
        var polyline = new google.maps.Polyline({
          path: path,
          geodesic: true,
          strokeColor: 'orange',
          strokeOpacity: 2.0,
          strokeWeight: 2
        });
        polyline.setMap(map);

        map.fitBounds(bounds);
      });
    }
  }

  // initializeMap();

  $('#track-btn').click(function () {
    const address = document.getElementById("user_address");
    console.log(address);
  });

  $(window).on('click', function (event) {
    if (event.target.id === 'mySizeChartModal') {
      $('#mySizeChartModal').hide();
    }
  });

  $(document).on('click', '.ebcf_close', () => {
    $('#mySizeChartModal').hide();
  })

});

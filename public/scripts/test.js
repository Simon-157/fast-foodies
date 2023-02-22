
  $(document).ready(function() {
    $("#map").css("background-color", "#FBFEFD")
    var geocoder = new google.maps.Geocoder();
    var map;
  
    function initializeMap() {
      var mapOptions = {
        zoom: 12,
        center: new google.maps.LatLng(37.7749295, -122.4194155), // San Francisco
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map(document.getElementById('map'), mapOptions);
  
      // Get the user's current location
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var userLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
          map.setCenter(userLocation);
        });
      }
    }
  
  
    function codeAddress() {
        var start = $('#start').val();
        var destination = $('#destination').val();
        var startLat, startLng, destLat, destLng;
      
        geocoder.geocode( { 'address': start}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            startLat = results[0].geometry.location.lat();
            startLng = results[0].geometry.location.lng();
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
          
          geocoder.geocode( { 'address': destination}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              destLat = results[0].geometry.location.lat();
              destLng = results[0].geometry.location.lng();
            } else {
              alert('Geocode was not successful for the following reason: ' + status);
            }
      
            var startMarker = new google.maps.Marker({
              position: new google.maps.LatLng(5.760275, -0.2199224),
              map: map
            });
      
            var destMarker = new google.maps.Marker({
              position: new google.maps.LatLng(5.650562, -0.1962244),
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
              strokeColor: 'green',
              strokeOpacity: 1.0,
              strokeWeight: 2
            });
            polyline.setMap(map);
      
            map.fitBounds(bounds);
          });
        });
      }
      
    
    $('#submit').click(function() {
      codeAddress();
    });
  
  
  
    initializeMap();
  });
  
  
  
  
  
  
  
  
  
  
  
  
  
  // function codeAddress() {
  //   var start = $('#start').val();
  //   var destination = $('#destination').val();
  //   var startLat, startLng, destLat, destLng;
  
  //   geocoder.geocode( { 'address': start}, function(results, status) {
  //     if (status == google.maps.GeocoderStatus.OK) {
  //       startLat = results[0].geometry.location.lat();
  //       startLng = results[0].geometry.location.lng();
  //     } else {
  //       alert('Geocode was not successful for the following reason: ' + status);
  //     }
  //   });
  
  //   geocoder.geocode( { 'address': destination}, function(results, status) {
  //     if (status == google.maps.GeocoderStatus.OK) {
  //       destLat = results[0].geometry.location.lat();
  //       destLng = results[0].geometry.location.lng();
  //     } else {
  //       alert('Geocode was not successful for the following reason: ' + status);
  //     }
  
  //     var startMarker = new google.maps.Marker({
  //       position: new google.maps.LatLng(5.760275, -0.2199224),
  //       map: map
  //     });
  
  //     var destMarker = new google.maps.Marker({
  //       position: new google.maps.LatLng(5.650562, -0.1962244),
  //       map: map
  //     });
  
  //     var bounds = new google.maps.LatLngBounds();
  //     bounds.extend(startMarker.getPosition());
  //     bounds.extend(destMarker.getPosition());
  //     map.fitBounds(bounds);
  //   });
  // }
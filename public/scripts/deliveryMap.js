// Load the Google Maps API with your API key
function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 8,
    center: { lat: 37.7749, lng: -122.4194 },// Set the initial center of the map
  });

  const form = document.getElementById("order-form");
  form.addEventListener("submit", (event) => {
    event.preventDefault(); // Prevent the form from submitting

    const address = document.getElementById("address-input").value;

    // Use the Geocoding API to get the latitude and longitude of the user's address
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: address }, (results, status) => {
      if (status === "OK") {
        const location = results[0].geometry.location;

        // Add a marker for the user's location
        const marker = new google.maps.Marker({
          position: location,
          map: map,
          title: "User's Location",
        });

        // Update the center of the map to the user's location
        map.setCenter(location);

        // Use the Geolocation API to get the current position of the user
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
            (position) => {
              const currentPosition = new google.maps.LatLng(
                position.coords.latitude,
                position.coords.longitude
              );


              const directionsService = new google.maps.DirectionsService();
              const directionsRenderer = new google.maps.DirectionsRenderer();
              directionsRenderer.setMap(map);

              // Set the origin and destination for the route
              const origin = currentPosition;
              const destination = location;

              // Set the travel mode for the route
              const travelMode = google.maps.TravelMode.DRIVING;

              // Request the route from the Directions API
              directionsService.route(
                {
                  origin: origin,
                  destination: destination,
                  travelMode: travelMode,
                },
                (result, status) => {
                  if (status === "OK") {
                    directionsRenderer.setDirections(result);
                  }
                }
              );
            },
            () => {
              alert("Could not get current position.");
            }
          );
        } else {
          alert("Geolocation is not supported by this browser.");
        }
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  });
}

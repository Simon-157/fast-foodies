<!DOCTYPE html>
<html>
<head>
  <title>Google Maps Example</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCijWSH4--ZN34vfPan6N88A-LUwC9FTbI"></script>
  <script src="public/scripts/test.js"></script>
</head>
<body>
  <div>
    <label for="start">Starting Point:</label>
    <input type="text" id="start">
  </div>
  <div>
    <label for="destination">Destination:</label>
    <input type="text" id="destination">
    <button id="submit">Show on Map</button>
  </div>
  <div id="map" style="width: 100%; height: 500px;"></div>
</body>
</html>

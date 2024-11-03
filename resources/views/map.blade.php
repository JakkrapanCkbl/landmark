<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Map</title>
    <style>
        /* Define the size of the map container */
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
    <!-- Add Google Maps JavaScript API (Replace YOUR_GOOGLE_MAPS_API_KEY with your actual API key) -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
    <script>
        function initMap() {
            // Define the coordinates (latitude and longitude)
            const coordinates = { lat: 40.730610, lng: -73.935242 }; // Example: New York City

            // Initialize the map and set its center to the specified coordinates
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: coordinates,
            });

            // Optional: Add a marker at the specified coordinates
            new google.maps.Marker({
                position: coordinates,
                map: map,
            });
        }
    </script>
</head>
<body onload="initMap()">
    <h1>Google Map Display</h1>
    <div id="map"></div>
</body>
</html>

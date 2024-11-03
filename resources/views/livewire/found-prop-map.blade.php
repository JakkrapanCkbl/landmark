<div>
    
    {{-- <div class="col-lg-12">
        <div class="card" id="map">
            <div class="card-header border-bottom">
                <div class="card-title">Map</div>
            </div>
            <div class="card-body">
                <div id="map"></div>
            </div>
        </div>
    </div> --}}

    <h1>Google Map</h1>
    <div id="map" style="height: 500px; width: 100%;"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
    <script>
        function initMap() {
            var location = { lat: @json($lat), lng: @json($lng) };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: location
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }

        // Ensure the map initializes when the component is rendered
        window.addEventListener('load', function() {
            initMap();
        });
    </script>

    <!-- Leaflet CSS -->
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Leaflet Map Div -->
    <div id="map" style="height: 500px; width: 100%;"></div>

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        document.addEventListener('livewire:load', function () {
            // Initialize the map
            var map = L.map('map').setView([51.505, -0.09], 13);

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Initialize marker
            var marker = L.marker([51.505, -0.09]).addTo(map);

            // Listen for events from Livewire to update the marker position
            Livewire.on('updateMarkerPosition', (lat, lng) => {
                marker.setLatLng([lat, lng]);
                map.setView([lat, lng], 13);
            });
        });
    </script> --}}

</div>

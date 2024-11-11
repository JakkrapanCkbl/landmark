<div wire:ignore style="height: 500px;">
    {{-- <h1>Map latitude{{$lat}}</h1>
     <h1>Map longtitude{{$lng}}</h1> --}}
    <div id="map" style="width: 100%; height: 300px;"></div>
    <div id="street-view" style="width: 100%; height: 300px; margin-top: 20px;"></div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>

<script>


    function initMap() {
        // Center coordinates for the map
        
        const location = { lat: {{$lat}}, lng: {{$lng}} }; // Coordinates for Bangkok
        
        // Initialize the main map
        const map = new google.maps.Map(document.getElementById('map'), {
            center: location,
            mapTypeId: google.maps.MapTypeId.HYBRID, // Set map to satellite view
            zoom: 18
        });
        
        // Initialize Street View
        const streetView = new google.maps.StreetViewPanorama(document.getElementById('street-view'), {
            position: {lat: {{ $lat }}, lng: {{ $lng }}},
            pov: {
                heading: 165,
                pitch: 0
            },
            zoom: 1
        });
        
        // Link the Street View to the main map
        map.setStreetView(streetView);
    }
    
</script>

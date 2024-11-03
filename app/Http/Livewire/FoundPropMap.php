<?php

namespace App\Http\Livewire;

use Livewire\Component;
use GoogleMaps\GoogleMaps;

class FoundPropMap extends Component
{
    public $sum = '5';
    public $lat;
    public $lng;

    public $latitude = 51.505;
    public $longitude = -0.09;

    
    
    protected $listeners = [
        'addTwoNumbers'
    ];
    
    public function render()
    {
        // Call your custom function to load coordinates
        $this->loadMapCoordinates();

        return view('livewire.found-prop-map');
    }

    public function addTwoNumbers($num1,$num2){
        //dd('ok');
        $this->sum = $num1 + $num2;
        //dd($this->sum);
    }

    public function loadMapCoordinates()
    {
        // Get the Google Maps API key from the .env file
        $apiKey = env('GOOGLE_MAPS_API_KEY');

        //dd($apiKey);

        // Initialize Google Maps with your API key
        $googleMaps = new GoogleMaps(['key' => $apiKey]);

        // Example: Get coordinates for a specific address
        $response = $googleMaps->load('geocoding')
                               ->setParam(['address' => '1600 Amphitheatre Parkway, Mountain View, CA'])
                               ->get();

        $data = json_decode($response, true);
        // dd($data);
        
        $this->lat = $data['results'][0]['geometry']['location']['lat'];
        $this->lng = $data['results'][0]['geometry']['location']['lng'];
    }

    public function updateMarker($lat, $lng)
    {
        $this->latitude = $lat;
        $this->longitude = $lng;

        // Emit event to update marker position on the map
        $this->emit('updateMarkerPosition', $this->latitude, $this->longitude);
    }
}

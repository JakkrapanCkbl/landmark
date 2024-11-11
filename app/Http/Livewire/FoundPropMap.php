<?php

namespace App\Http\Livewire;

use Livewire\Component;
use GoogleMaps\GoogleMaps;

class FoundPropMap extends Component
{
    public $sum = '5';
    
    public $lat;
    public $lng;

    public function mount()
    {
        // Get the latitude and longitude from the URL query parameters
        $this->lat = request()->query('lat'); // Default to San Francisco if not provided
        $this->lng = request()->query('lng'); // Default to San Francisco if not provided
       
    }

    
    public function render()
    {
        $this->lat = request()->query('lat'); // Default to San Francisco if not provided
        $this->lng = request()->query('lng'); // Default to San Francisco if not provided
        return view('livewire.found-prop-map');
    }

    public function addTwoNumbers($num1,$num2){
        //dd('ok');
        $this->sum = $num1 + $num2;
        //dd($this->sum);
    }

    
}

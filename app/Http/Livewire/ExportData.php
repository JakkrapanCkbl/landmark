<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExportData extends Component
{
    public $jobs = null;
    public $users;

    
    public function render()
    {
        $this->jobs = DB::select('select * from jobs order by id desc LIMIT 200');
        $this->users = Auth::user();
        return view('livewire.export-data');
    }
}


<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Job;
use Illuminate\Support\Facades\DB;



class GetProject extends Component
{
    public $query, $table, $results = array(), $event;
   

    public function updatedQuery(){
        if($this->query!='') {
            // $this->results = DB::table($this->table)
            //                 ->where('projectname', 'like', $this->query . '%')
            //                 ->limit(5)->get();
            $this->results = DB::table('jobs')
            ->select(DB::raw("CONCAT(projectname, ' ', proplocation) AS projectname"))
            ->where('projectname', 'LIKE', $this->query . '%')
            ->whereNotNull('projectname')
            ->orderByDesc('projectname')
            ->limit(5)
            ->get();
        }else{
            $this->results = [];
        }
    }

    public function select($rowId){
        //dd($rowId);
        $this->emitUp($this->event, $rowId);
        $this->reset('results');
        $this->query = '';
        
    }

    public function render()
    {
      return view('livewire.get-project');
    }
    
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class JobAdd extends Component
{
    public $company;
    public $sum;
    
    protected $listeners = ['event' => 'companySelected'];
    
    public function companySelected(Job $company){
       $this->company = $company;
       //dd($company);
    }

    public function addTwoNumbers($num1,$num2){
        $this->sum = $num1+$num2;
    }

    public function render()
    {
        $list = DB::table('provinces')->get();
        $listtwo = DB::table('amphures')->get();
        $listthree = DB::table('users')->get();

        return view('livewire.job-add')->with('list', $list)->with('listtwo', $listtwo)->with('listthree', $listthree);
        
        // return view('livewire.job-add');
    }
}

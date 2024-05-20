<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Job;
use App\Models\Province;
use App\Models\Amphure;

class Students extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $sum;
    public $provinces = null;
    public $selectedProvince = null;
    public $selectedAmphure = null;
    public $amphures = null;
    public $provincename;
    public $amphurename;



    protected $listeners = ['companySelected'];

    public function companySelected($firstname){
        // wording Project and Address Information
        $this->firstname = trim($firstname);
        // get province name from wording
        $provinceToFind = Province::pluck('name_th')->toArray();
        foreach ($provinceToFind as $province) {
            if (strpos($this->firstname, $province) !== false) {
                $this->provincename = $province;
                break; // If any province is found, exit the loop
            }
        }
       // get amphure from province code
        $provincecode = Province::where('name_th', $this->provincename)->first();
        $amphureToFind = Amphure::where('code', 'LIKE', $provincecode->code . '%')->pluck('name_th')->toArray();
        foreach ($amphureToFind as $amphure) {
            if (strpos($this->firstname, $amphure) !== false) {
                $this->amphurename = $amphure;
                break; // If any province is found, exit the loop
            }
        }
        // binding cbo province
        $this->provinces = Province::orderBy('id')->get();
        $this->selectedProvince = $provincecode->code;
        // binding cbo amphure
        $this->amphures = Amphure::where('code', 'LIKE', $provincecode->code . '%')->get();
        $amphurecode = Amphure::where('name_th', $this->amphurename)->first();
        $this->selectedAmphure = $amphurecode->code;
    }

    public function resetInputFields(){
        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->phone = '';
    }

    public function addTwoNumbers($num1,$num2){
        $this->sum = $num1+$num2;
    }


    public function store(){
        
        $validateDate = $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        Student::create($validateDate);
        session()->flash('message','Student Created Successfully!');
        $this->resetInputFields();
        $this->emit('studentAdded');
    }

    public function render()
    {
        $students = Student::orderBy('id','DESC')->get();
        //$provinces = Province::orderBy('id')->get();
        //return view('livewire.students',['students'=>$students,'provinces'=>$provinces]);
        return view('livewire.students',['students'=>$students]);
    }


    public function updatedSelectedProvince($province_code){
        $this->amphures = Amphure::where('code', 'LIKE', $province_code . '%')->get();

    }
}

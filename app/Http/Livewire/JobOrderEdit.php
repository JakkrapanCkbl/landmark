<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Http\Controllers\MainController;
use App\Models\Job;
use App\Models\Province;
use App\Models\Amphure;

class JobOrderEdit extends Component
{
    public $sum;
    public $newValue;

    public $edit_id='';
    public $job;
    public $jobcode;
    public $reportcode;
    public $projectname;
    public $client;
    public $prop_type;
    public $prop_size;
    public $proplocation;
    public $provinces = null;
    public $province_code;
    public $provincename;
    public $selectedProvince = null;
    public $selectedAmphure = null;
    public $amphures = null;
    public $amphure_code;
    public $amphurename;
    public $district;
    public $customer;
    public $jobtype;
    public $jobsize;
    public $easydiff;
    public $obj_id;
    public $valuationfee;
    public $valuationfee_case;
    public $job_gps;
    public $lat;
    public $lng;
    public $employees = null; //for valuer and headvaluer
    public $valuer = 'dido';
    public $headvaluer = 'สาโรจน์';
    public $startdate;
    public $inspectiondate;
    public $lcduedate;
    public $clientduedate;
    public $่job_status;
   
// -------------------------------------------------------------------------------------------
    public function addTwoNumbers($num1,$num2){
        $this->sum = $num1+$num2;
    }

    // Method to update the property with a new value
    public function updateValue()
    {
        // The property $newValue is automatically updated with the value from the input field
        // because it's bound using wire:model
        dd($this->newValue);
    }
// ---------------------------------------------------------------------------------------------


    public function mount()
    {
        $this->provinces = Province::orderBy('id')->get();
        Carbon::setLocale('th');
        $this->job = Job::find($this->edit_id);
        $this->jobcode = $this->job->jobcode;
        $this->reportcode = $this->job->reportcode;
        $this->projectname = $this->job->projectname;
        $this->client = $this->job->client;
        $this->prop_type = $this->job->prop_type;
        $this->prop_size = $this->job->prop_size;
        $this->proplocation = $this->job->proplocation;
        $this->province_code = $this->job->province_code;
        $this->selectedProvince = $this->job->province_code;
        $this->amphures = Amphure::where('code', 'LIKE', $this->job->province_code . '%')->get();
        $this->amphure_code = $this->job->amphure_code;
        $this->district = $this->job->district;
        $this->customer = $this->job->customer;
        $this->jobtype = $this->job->jobtype;
        $this->jobsize = $this->job->jobsize;
        $this->easydiff = $this->job->easydiff;
        $this->obj_id = $this->job->obj_id;
        $this->valuationfee = number_format($this->job->valuationfee);
        $this->valuationfee_case = $this->job->valuationfee_case;
        $this->job_gps = $this->job->job_gps;
        $this->lat = $this->job->lat;
        $this->lng = $this->job->lng;
        $this->valuer = $this->job->valuer;
        $this->headvaluer = $this->job->headvaluer;
        $this->startdate = Carbon::parse($this->job->startdate)->isoFormat('Do MMM Y');
        $this->inspectiondate = Carbon::parse($this->job->inspectiondate)->isoFormat('Do MMM Y');
        $this->lcduedate = Carbon::parse($this->job->lcduedate)->isoFormat('Do MMM Y');
        $this->clientduedate = Carbon::parse($this->job->clientduedate)->isoFormat('Do MMM Y');
        $this->job_status = $this->job->job_status;
       
    }

    public function render()
    {        
        $this->employees = DB::table('users')->get();
        return view('livewire.job-order-edit');
    }
 
    protected $listeners = [
        'callUpdate',
        'updateValue'
        // Add more listeners as needed
    ];

    public function callUpdate() {
        $this->updateData();
    }

   
    public function updateData()
    {
        
        $this->validate([
            'projectname' => 'required|string',
            
        ]);

        if ($this->lat == null){
            $this->lat = 0;
        }
        if ($this->lng == null){
            $this->lng = 0;
        }
        $sql_startdate = (new MainController)->ConvertThaiDate2SqlDate($this->startdate);
        $sql_inspectiondate = (new MainController)->ConvertThaiDate2SqlDate($this->inspectiondate);
        $sql_lcduedate = (new MainController)->ConvertThaiDate2SqlDate($this->lcduedate);
        $sql_clientduedate = (new MainController)->ConvertThaiDate2SqlDate($this->clientduedate);
        
        if($this->edit_id){
            $my_job = Job::find($this->edit_id);
            $my_job->update([
                'reportcode' => $this->reportcode,
                'client' => $this->client,
                'prop_type' => $this->prop_type,
                'prop_size' => $this->prop_size,
                'projectname' => $this->projectname,
                'proplocation' => $this->proplocation,
                'province_code' => $this->province_code,
                'amphure_code' => $this->amphure_code,
                'district' => $this->district,
                'customer' => $this->customer,
                'jobtype' => $this->jobtype,
                'jobsize' => $this->jobsize,
                'easydiff' => $this->easydiff,
                'obj_id' => $this->obj_id,
                'valuationfee' => (float) str_replace(',', '', $this->valuationfee),
                'valuationfee_case' => $this->valuationfee_case,
                'job_gps' => $this->job_gps,
                'lat' => $this->lat,
                'lng' => $this->lng,
                'valuer' => $this->valuer,
                'headvaluer' => $this->headvaluer,
                'startdate' => $sql_startdate,
                'inspectiondate' => $sql_inspectiondate,
                'lcduedate' => $sql_lcduedate,
                'clientduedate' => $sql_clientduedate,
                'job_status' => $this->job_status,
            ]);
        }

        session()->flash('message', 'User updated successfully.');
        //$this->emit('jobUpdated');
        //return redirect('/dashboard')->with('message', 'บันทึกข้อมูลเสร็จแล้ว');
    }
    
   

    public function updatedSelectedProvince($value)
    {
        $this->amphures = Amphure::where('code', 'LIKE', $value . '%')->get();
    }
}

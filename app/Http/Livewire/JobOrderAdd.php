<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Carbon;
use App\Http\Controllers\MainController;

use App\Models\Province;
use App\Models\{Job,Amphure,District};


class JobOrderAdd extends Component
{
    public $sum;
   
    public $selectedType; //codetype
    public $new_id; //jobcode;
    public $reportcode;
    public $client = "UOB";  //bank short name
    public $prop_type = "ห้องชุด";
    public $inputname;
    public $projectname = '';
    public $projectaddress = '';  //proplocation
    public $provinces = null;
    public $selectedProvince = null;
    public $selectedAmphure = null;
    public $amphures = null;
    public $provincename;
    public $amphurename;
    public $district;
    public $prop_size;
    public $customer;
    public $list_valuers = null; //for valuer 
    public $valuer;
    public $list_headvaluers = null; //for head valuer 
    public $headvaluer = 'สาโรช';
    public $startdate;
    public $inspectiondate;
    public $lcduedate;
    public $clientduedate;
    public $selectedJobType = 'ไทย 1 ชุด';
    public $selectedJobSize = 'HL';
    public $selectedEasyDiff = 'NORM / +++';
    public $selectedObj_id = '1';
    public $valuationfee = '3,000';
    public $vat = '210';
    public $valuationfeeVat = '3,210';
    public $selectedvaluationfee_case = '100% วางบิลธนาคาร';

    public function mount()
    {
        //dd(Auth::user()->name);
        Carbon::setLocale('th');
        $buddhistYear = Carbon::now()->year + 543; // Get the Thai Buddhist year for start date
        //$this->startdate = Carbon::now()->isoFormat('Do MMM '). $buddhistYear;
        $this->startdate = Carbon::now()->isoFormat('Do MMM Y');
        $this->inspectiondate =  Carbon::now()->modify('+1 day')->isoFormat('Do MMM Y');
        $this->lcduedate = now()->modify('+2 day')->isoFormat('Do MMM Y');
        $this->clientduedate = now()->modify('+3 day')->isoFormat('Do MMM Y');
    }

    public function render()
    {
        // $this->employees = DB::table('users')->get();
        $this->list_valuers = $this->get_valuers();
        $this->list_headvaluers = $this->get_headvaluers();
        return view('livewire.job-order-add');   
    }

    
    protected $listeners = [
        'callStore',
        'companySelected'
        // Add more listeners as needed
    ];

   

    public function store($continue)
    {         
        
        $validateDate = $this->validate([
            'new_id' => 'required',
            'projectname' => 'required',
            'projectaddress' => 'required',
            'selectedProvince' => 'required',
            'selectedAmphure' => 'required',
            'prop_size' => 'required',
            'customer' => 'required'
        ]);

        $sql_startdate = (new MainController)->ConvertThaiDate2SqlDate($this->startdate);
        $sql_inspectiondate = (new MainController)->ConvertThaiDate2SqlDate($this->inspectiondate);
        $sql_lcduedate = (new MainController)->ConvertThaiDate2SqlDate($this->lcduedate);
        $sql_clientduedate = (new MainController)->ConvertThaiDate2SqlDate($this->clientduedate);

        Job::create([
            'jobcode' => $this->new_id,
            'reportcode' => $this->reportcode,
            'client' => $this->client,
            'prop_type' => $this->prop_type,
            'projectname' => $this->projectname,
            'prop_size' => $this->prop_size,
            'proplocation' => $this->projectaddress,
            'province_code' => $this->selectedProvince,
            'amphure_code' =>  $this->selectedAmphure,
            'customer' => $this->customer,
            'jobtype' => $this->selectedJobType,
            'jobsize' => $this->selectedJobSize,
            'easydiff' => $this->selectedEasyDiff,
            'obj_id' => $this->selectedObj_id,
            'valuationfee' => (float) str_replace(',', '', $this->valuationfee),
            'valuationfee_case' => $this->selectedvaluationfee_case,
            'valuer' => $this->valuer,
            'headvaluer' => $this->headvaluer,
            'startdate' => $sql_startdate,
            'inspectiondate' => $sql_inspectiondate,
            'lcduedate' => $sql_lcduedate,
            'clientduedate' => $sql_clientduedate,
        ]);

        //return redirect('/dashboard')->with('message', 'Post created successfully');

        session()->flash('message','บันทึกข้อมูลเสร็จแล้ว. พิมพ์รายการถัดไป');
        $this->resetInputFields();
        $this->emit('JobOrderAdded');

        if ($continue == '1') {
            $this->emit('dataAdded');
            return true;
        }else{
            return redirect('/dashboard')->with('message', 'บันทึกข้อมูลเสร็จแล้ว');
        }
        
    }

    public function callStore($param_continue) {
        $this->store($param_continue);
    }

   
    public function resetInputFields(){
        $this->selectedType = '';
        $this->new_id = '';
        $this->projectname = '';
        $this->projectaddress = '';
        $this->reportcode = '';
        $this->prop_size = '';
        $this->customer = '';
    }


    public function addTwoNumbers($num1,$num2){
        $this->sum = $num1+$num2;
    }

    // for get Project Information from combobox in GetProject component (My share components)

    //protected $listeners = ['companySelected'];

    public function companySelected($inputname){
        //binding project name
        $this->projectname = Str::limit($inputname, 30, '');
        //binding project address
        $this->projectaddress = Str::substr($inputname, 30);
        // wording Project and Address Information
        $this->inputname = trim($inputname);
        // get province name from wording
        $provinceToFind = Province::pluck('name_th')->toArray();
        foreach ($provinceToFind as $province) {
            if (strpos($this->inputname, $province) !== false) {
                $this->provincename = $province;
                break; // If any province is found, exit the loop
            }
        }
       // get amphure from province code
       if ($this->provincename == null) {
        $this->provincename = "กรุงเทพมหานคร";
       }
        $provincecode = Province::where('name_th', $this->provincename)->first();
        $amphureToFind = Amphure::where('code', 'LIKE', $provincecode->code . '%')->pluck('name_th')->toArray();
        foreach ($amphureToFind as $amphure) {
            if (strpos($this->inputname, $amphure) !== false) {
                $this->amphurename = $amphure;
                break; // If any province is found, exit the loop
            }
        }
        // binding cbo province
        $this->provinces = Province::orderBy('id')->get();
        $this->selectedProvince = $provincecode->code;
        // binding cbo amphure

        $this->amphures = Amphure::where('code', 'LIKE', $provincecode->code . '%')->get();
        if ($this->amphurename == null){
            $this->amphurename = "พิมพ์ไม่ตรงกัน";
        }

        $amphurecode = Amphure::where('name_th', $this->amphurename)->first();
        $this->selectedAmphure = $amphurecode->code;
        // binding tumbon name
        // get Tumbon name from wording Input
        $districtToFind = District::pluck('name_th')->toArray();
        foreach ($districtToFind as $getDistrict) {
            if (strpos($this->inputname, $getDistrict) !== false) {
                $this->district = $getDistrict;
                // dd($this->district);
                break; // If any province is found, exit the loop
            }else{
                $this->district = '';
            }
        }
    }

    public function updatedSelectedProvince($province_code){
        $this->amphures = Amphure::where('code', 'LIKE', $province_code . '%')->get();

    }

    public function ChangeType() {
        if ($this->selectedType == 'BF'){
            $this->new_id = $this->gennewbfid();
        }elseif($this->selectedType == 'R'){
            $this->new_id = $this->gennewrid();
        }else{
            $this->new_id = '';
        }
    }

    public static function gennewbfid()
    {
        $currentYear = ((now()->year) + 543) - 2500;
        //dd($currentYear);
        $prefix = "LC/" . $currentYear . "BF-";
        $id = $prefix;
        $id = IdGenerator::generate(['table' => 'jobs', 'field' => 'jobcode', 'length' => 12, 'prefix' => $prefix, 'reset_on_prefix_change' => true]);
        //dd($id);
        return $id;
    }


    public static function gennewrid()
    {
        $currentYear = ((now()->year) + 543) - 2500;
        $prefix = "LC/". $currentYear . "R-";
        $id = $prefix;
        $id = IdGenerator::generate(['table' => 'jobs', 'field' => 'jobcode', 'length' => 11, 'prefix' => $prefix, 'reset_on_prefix_change' => true]);       
        return $id;
    }

    public static function get_valuers()
    {
        $strsql = "SELECT * FROM users WHERE sequence_valuer is not null ORDER BY sequence_valuer";
        return DB::select($strsql);
    }

    public static function get_headvaluers()
    {
        $strsql = "SELECT * FROM users WHERE sequence_head is not null ORDER BY sequence_head";
        return DB::select($strsql);
    }
    
   
}

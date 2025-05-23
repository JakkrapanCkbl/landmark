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
use App\Models\Proptype;
use App\Models\Proptype2;
use App\Models\Client;



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
    public $client_note;
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
    public $list_valuers = null; //for valuer 
    public $valuer = 'dido';
    public $list_headvaluers = null; //for valuer 
    public $list_checkers = null; //for checker
    public $headvaluer = 'สาโรจน์';
    public $checker = 'dido';
    public $startdate;
    public $inspectiondate;
    public $lcduedate;
    public $clientduedate;
    public $report_checked_date;
    public $approve_checked_date;
    public $่job_status;
    public $obj_method;
    public $marketvalue;
    public $job_checked = 0;
    public $print_checked = 0;
    public $link_checked = 0;
    public $file_checked = 0;
    public $proptypes = null;
    public $proptype;
    public $selectedProptype = null;
    public $proptype2s = null;
    public $proptype2;
    public $selectedProptype2 = null;
    public $prop_type_note = null;
    public $prop_type2_note;
    public $list_clients = null; //for dropdown client

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
        $this->client_note = $this->job->client_note;
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
        $this->checker = $this->job->checker;
        $this->startdate = Carbon::parse($this->job->startdate)->isoFormat('Do MMM Y');
        $this->inspectiondate = Carbon::parse($this->job->inspectiondate)->isoFormat('Do MMM Y');
        $this->lcduedate = Carbon::parse($this->job->lcduedate)->isoFormat('Do MMM Y');
        $this->clientduedate = Carbon::parse($this->job->clientduedate)->isoFormat('Do MMM Y');
        $this->report_checked_date = Carbon::parse($this->job->report_checked_date)->isoFormat('Do MMM Y');
        $this->approve_checked_date = Carbon::parse($this->job->approve_checked_date)->isoFormat('Do MMM Y');
        $this->job_status = $this->job->job_status;
        $this->obj_method = $this->job->obj_method;
        $this->marketvalue = number_format($this->job->marketvalue);
        $this->job_checked = $this->job->job_checked;
        $this->print_checked = $this->job->print_checked;
        $this->link_checked = $this->job->link_checked;
        $this->file_checked = $this->job->file_checked;

        $this->proptypes = Proptype::orderBy('itemno')->get();
        $this->proptype = $this->job->prop_type;
        $this->selectedProptype = $this->job->prop_type;

        $this->proptype2s = Proptype2::where('show_prop_type', $this->job->prop_type)->orderBy('itemno', 'asc')->get();

        if ($this->proptype2s->isEmpty()) {
            $this->proptype2s = Proptype2::whereIn('itemno', [1, 99])->take(2)->get();
            $this->selectedProptype2 = "";
            $this->prop_type2_note = "";
        }else{
            $this->proptype2 = $this->job->prop_type2;
            $this->selectedProptype2 = $this->job->prop_type2;
            $this->prop_type2_note = $this->job->prop_type2_note;
        }
       
        
    }

    public function render()
    {        
        //$this->employees = DB::table('users')->get();
        $this->list_valuers = $this->get_valuers();
        $this->list_headvaluers = $this->get_headvaluers();
        $this->list_checkers = $this->get_checkers();
        $this->list_clients = Client::orderBy('itemno', 'asc')->get();
        return view('livewire.job-order-edit');
    }
 
    protected $listeners = [
        'callUpdate',
        'updateValue'
        // Add more listeners as needed
    ];

    // public function updatedSelectedProp_type($prop_typeId)
    // {
    //     dd($prop_typeId);
    //     $this->prop_type2s = Proptype2::where('prop_type', $prop_typeId)->get();
    //     $this->selectedProp_type2 = null;
    // }

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
        $sql_report_checked_date = (new MainController)->ConvertThaiDate2SqlDate($this->report_checked_date);
        $sql_approve_checked_date = (new MainController)->ConvertThaiDate2SqlDate($this->approve_checked_date);
        
        if($this->edit_id){
            $my_job = Job::find($this->edit_id);
            // for check add new value in client combobox
            if ($this->client != 'อื่นๆ'){
                $this->client_note = "";
            }else{
                if ( $this->client_note != '') {
                    // นำ client_note ไปเช็คในตาราง clients ถ้าไม่มีให้ Add new
                    $result = (new MainController)->MyFind("clients","clientname","where clientname = '" . $this->client_note . "'","" ); 
                    if ($result == '') {
                        $new_itemno = $this->gen_new_itemno();
                        Client::create([
                            'itemno' => $new_itemno,
                            'clientname' => $this->client_note,
                        ]);
                        $this->list_clients = Client::orderBy('itemno', 'asc')->get();
                    }
                }
            }
            // for check add new value in proptype combobox
            if ($this->selectedProptype == 'อื่นๆ'){
                if ( $this->prop_type_note != '') {
                    // นำ prop_type_not ไปเช็คในตาราง proptypes ถ้าไม่มีให้ Add new
                    $result = (new MainController)->MyFind("proptypes","show_prop_type","where show_prop_type = '" . $this->prop_type_note . "'","" ); 
                    if ($result == '') {
                        $new_itemno = $this->gen_new_itemno_proptype();
                        Proptype::create([
                            'itemno' => $new_itemno,
                            'show_prop_type' => $this->prop_type_note,
                        ]);
                        $this->proptypes = Proptype::orderBy('itemno', 'asc')->get();
                    }
                }
            }
            // for check add new value in proptype2 combobox
             if ($this->selectedProptype2 == 'อื่นๆ'){
                 if ( $this->prop_type2_note != '') {
                    // นำ $prop_type2_note ไปเช็คในตาราง proptype2s ถ้าไม่มีให้ Add new
                    //dd($this->selectedProptype . "   " . $this->prop_type2_note);
                    $result = (new MainController)->MyFind("proptype2s","show_prop_type2","where show_prop_type = '" . $this->selectedProptype . "' and show_prop_type2 = '" . $this->prop_type2_note . "'","" ); 
                    // dd($result);
                    if ($result == '') {
                        $new_itemno = $this->gen_new_itemno_proptype2($this->selectedProptype);
                        if ($new_itemno == "1") {
                            Proptype2::create([
                                'show_prop_type' => $this->selectedProptype,
                                'itemno' => 1,
                                'show_prop_type2' => "",
                            ]);
                            Proptype2::create([
                                'show_prop_type' => $this->selectedProptype,
                                'itemno' => 99,
                                'show_prop_type2' => "อื่นๆ",
                            ]);
                        }
                        $new_itemno = $this->gen_new_itemno_proptype2($this->selectedProptype);
                        if ((int)$new_itemno > 1) {
                            Proptype2::create([
                                'show_prop_type' => $this->selectedProptype,
                                'itemno' => $new_itemno,
                                'show_prop_type2' => $this->prop_type2_note,
                            ]);
                        }
                        $this->proptypes2 = Proptype2::where('show_prop_type',$this->selectedProptype)->orderBy('itemno', 'asc')->get();
                        
                    }
                }
             }else{
                $this->proptypes2 = Proptype2::where('show_prop_type',$this->selectedProptype)->orderBy('itemno', 'asc')->get();
             }

            $my_job->update([
                'reportcode' => $this->reportcode,
                'client' => $this->client,
                'client_note' => $this->client_note,
                'prop_type' => $this->selectedProptype,
                'prop_type2' => $this->selectedProptype2,
                'prop_type2_note' => $this->prop_type2_note,
                'prop_size' => $this->prop_size,
                'projectname' => $this->projectname,
                'proplocation' => $this->proplocation,
                'province_code' => $this->selectedProvince,
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
                'checker' => $this->checker,
                'startdate' => $sql_startdate,
                'inspectiondate' => $sql_inspectiondate,
                'lcduedate' => $sql_lcduedate,
                'clientduedate' => $sql_clientduedate,
                'report_checked_date' => $sql_report_checked_date,
                'approve_checked_date' => $sql_approve_checked_date,
                'job_status' => $this->job_status,
                'obj_method' => $this->obj_method,
                'marketvalue' => (float) str_replace(',', '', $this->marketvalue),
                'job_checked' => (bool) $this->job_checked,
                'print_checked' => (bool) $this->print_checked,
                'link_checked' => (bool) $this->link_checked,
                'file_checked' => (bool) $this->file_checked,
            ]);
            // for set change new value in client combobox
            if ($this->client == 'อื่นๆ'){
                if ( $this->client_note != '') {
                    $my_job->update([
                        'client' => $this->client_note,
                        'client_note' => '',
                    ]);
                    $this->client = $this->client_note;
                    $this->client_note = "";
                }
            }
            // for set change new value in proptype combobox
            if ($this->selectedProptype == 'อื่นๆ'){
                if ( $this->prop_type_note != '') {
                    $my_job->update([
                        'prop_type' => $this->prop_type_note,
                    ]);
                    $this->selectedProptype = $this->prop_type_note;
                    $this->prop_type_note = "";
                }
            }
            // for set change new value in proptype2 combobox (selectedProptype2)
            
            if ($this->selectedProptype2 == 'อื่นๆ'){
                //dd($this->prop_type2_note);
                if ( $this->prop_type2_note != '') {
                    $my_job->update([
                        'prop_type2' => $this->prop_type2_note,
                        'prop_type2_note' => "",
                    ]);
                    $this->selectedProptype2 = $this->prop_type2_note;
                    $this->prop_type2_note = "";
                }
            }
            $this->proptype2 = Job::find($this->edit_id)->prop_type2;
        }

        
        session()->flash('message', 'Updated successfully.');
        //$this->emit('jobUpdated');
        //return redirect('/dashboard')->with('message', 'บันทึกข้อมูลเสร็จแล้ว');
    }
    
   
    public function updatedSelectedProvince($value)
    {
        $this->amphures = Amphure::where('code', 'LIKE', $value . '%')->get();
    }

    public function updatedSelectedProptype($value)
    {
       
        $this->proptype2s = Proptype2::where('show_prop_type', $value)->orderBy('itemno', 'asc')->get();
        if ($this->proptype2s->isEmpty()) {
            $this->proptype2s = Proptype2::whereIn('itemno', [1, 99])->take(2)->get();
            $this->selectedProptype2 = "";
        }
        if ($value !== 'อื่นๆ') {
            $this->prop_type_note = "";
            
        }
    }

    public function updatedSelectedProptype2($value)
    {
        if ($value !== 'อื่นๆ') {
            $this->prop_type2_note = "";
        }
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

    public static function get_checkers()
    {
        $strsql = "SELECT * FROM users WHERE utype = 'ADM' AND name NOT IN ('dido', 'มงคล') ORDER BY sequence_valuer";
        return DB::select($strsql);
    }

    public function updatedclient($value)
    {
        //dd('client updated');
        if ($value == 'อื่นๆ') {
            //dd('ok');
            $this->client_note = '';
        }
        
    }

    public function doSomething($id, $name) {
        // Use $id and $name
        dd($id . " hi " . $name);
    }

    public static function gen_new_itemno()
    {
        $strsql = "SELECT MAX(itemno) AS max_value ";
        $strsql = $strsql . "FROM clients WHERE itemno <> 99";
        $result = DB::select($strsql);
        if ($result == null) {
            // dd("null");
            return 0;
        }else {
            return (int) $result[0]->max_value + 1;
        }
        
    }

    public static function gen_new_itemno_proptype()
    {
        $strsql = "SELECT MAX(itemno) AS max_value ";
        $strsql = $strsql . "FROM proptypes WHERE itemno <> 99";
        $result = DB::select($strsql);
        if ($result == null) {
            // dd("null");
            return 0;
        }else {
            return (int) $result[0]->max_value + 1;
        }
        
    }

    
    public static function gen_new_itemno_proptype2($myproptype)
    {
        $strsql = "SELECT MAX(itemno) AS max_value ";
        $strsql = $strsql . "FROM proptype2s ";
        $strsql = $strsql . "WHERE itemno <> 99 And Show_prop_type = '" . $myproptype . "' ";
        $result = DB::select($strsql);
        if ($result == null) {
            // dd("null");
            return 0;
        }else {
            return (int) $result[0]->max_value + 1;
        }
        
    }

}

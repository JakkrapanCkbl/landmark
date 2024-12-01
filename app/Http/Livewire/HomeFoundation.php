<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Foundation_prop;



class HomeFoundation extends Component
{
    public $sum = '5';
    public $myid = '1';
    public $prop_type;
    public $prop_name;
    public $prop_location;
    public $deed_no;
    public $rai;
    public $ngan;
    public $wha;
    public $owner;
    public $prop_status;
    public $owner_how;
    public $certificate;
    public $prop_operator;
    public $prop_operator2;
    public $remark;
    public $gps;
    
    public $job_imgs;
    public $mainfolder = 'foundation_files';
    public $subfolder;
    public $landindex;
    public $disclaim;
    public $building;
    public $appendix;
    public $other;

    public $c_school = 0;
    public $c_hospital = 0;
    public $c_tomb = 0;
    public $c_land = 0;

    public $labels = [];
    public $values = [];

    public $lat = '13.7479686';
    public $lng= '100.4916953';

    public function initializeChartData()
    {
        // Sample data - replace this with your actual data
        $this->labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $this->values = [65, 59, 80, 81, 56, 55, 40];
    }

    protected $listeners = [
        'updateValue',
        'showSum',
        'bindingPopup',
        'bindingPopupEditData',
        'test',
        'addTwoNumbers'
        

    ];

    // Use mount to initialize data
    public function mount()
    {
        $this->initializeChartData();
    }

    public function render()
    {
        // count prop_type
        $this->CountPropType(); 
        // binding files list
         $this->subfolder = str_replace('/', '_', $this->myid);
         $this->job_imgs = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'deed' order by file_name");
         $this->landindex = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'landindex' order by file_name");
         $this->disclaim = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'disclaim' order by file_name");
         $this->building = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'building' order by file_name");
         $this->appendix = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'appendix' order by file_name");
         $this->other = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'other' order by file_name");
        

         return view('livewire.home-foundation');
    }

    public function addTwoNumbers($num1,$num2){
        //dd('ok');
        $this->sum = $num1 + $num2;
        //dd($this->sum);
    }

    public function getData(Request $request)
    {
        // Perform the SQL query
        
        $sql = "SELECT id, prop_type, prop_name, prop_location, deed_no, ";
        $sql = $sql . "rai, ngan, wha, owner, prop_status, ";
        $sql = $sql . "owner_how, certificate, prop_operator, prop_operator2, remark, gps, ";
        $sql = $sql . "SUBSTRING_INDEX(gps, ',', 1) AS lat, SUBSTRING_INDEX(gps, ',', -1) AS lng ";
        $sql = $sql . "FROM foundation_props ";
        $sql = $sql . "ORDER BY id ";
        $jobs = DB::select($sql);
        // Return as JSON
        return response()->json(['data' => $jobs]);
    }

    public function bindingPopup($value1,$value2,$value3,){
       
        //dd($value0);
        $this->myid = $value1;
        $this->prop_name = $value2;
        $this->prop_location = $value3;

        // binding files list
        $this->subfolder = str_replace('/', '_', $this->myid);
        $this->job_imgs = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'deed' order by file_name");
        $this->landindex = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'landindex' order by file_name");
        $this->disclaim = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'disclaim' order by file_name");
        $this->building = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'building' order by file_name");
        $this->appendix = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'appendix' order by file_name");
        $this->other = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'other' order by file_name");
    }

    public function bindingPopupEditData($value1,$value2,$value3,$value4,$value5,$value6,$value7,$value8,$value9,$value10,$value11,$value12,$value13,$value14,$value15,$value16){
       
        //dd($value16);
        $this->myid = $value1;
        $this->prop_type = $value2;
        $this->prop_name = $value3;
        $this->prop_location = $value4;
        $this->deed_no = $value5;
        $this->rai = $value6;
        $this->ngan = $value7;
        $this->wha = $value8;
        $this->owner = $value9;
        $this->prop_status = $value10;
        $this->owner_how = $value11;
        $this->certificate = $value12;
        $this->prop_operator = $value13;
        $this->prop_operator2 = $value14;
        $this->remark = $value15;
        $this->gps = $value16;
    }

    public function updateValue(){
        $my_job = Foundation_prop::find($this->myid);
        //dd($my_job);
        $my_job->update([
            'prop_type' => $this->prop_type,
            'prop_name' => $this->prop_name,
            'prop_location' => $this->prop_location,
            'deed_no' => $this->deed_no,
            'rai' => $this->rai,
            'ngan' => $this->ngan,
            'wha' => $this->wha,
            'owner' => $this->owner,
            'prop_status' => $this->prop_status,
            'owner_how' => $this->owner_how,
            'certificate' => $this->certificate,
            'prop_operator' => $this->prop_operator,
            'prop_operator2' => $this->prop_operator2,
            'remark' => $this->remark,
            'gps' => $this->gps
        ]);
        $this->emit('userSaved');
    }

    public function CountPropType(){
        $strsql = "SELECT COUNT(*) AS count ";
        $strsql = $strsql . "FROM foundation_props ";
        $strsql = $strsql . "WHERE prop_type = 'รร' ";
        $result = DB::select($strsql);
        if (is_null($result) || empty($result)) {
            $this->c_school = 0;
        }else{
            $this->c_school = $result[0]->count;
        }

        $strsql = "SELECT COUNT(*) AS count ";
        $strsql = $strsql . "FROM foundation_props ";
        $strsql = $strsql . "WHERE prop_type = 'รพ' ";
        $result = DB::select($strsql);
        if (is_null($result) || empty($result)) {
            $this->c_hospital = 0;
        }else{
            $this->c_hospital = $result[0]->count;
        }

        $strsql = "SELECT COUNT(*) AS count ";
        $strsql = $strsql . "FROM foundation_props ";
        $strsql = $strsql . "WHERE prop_type = 'สุสาน' ";
        $result = DB::select($strsql);
        if (is_null($result) || empty($result)) {
            $this->c_tomb = 0;
        }else{
            $this->c_tomb = $result[0]->count;
        }

        $strsql = "SELECT COUNT(*) AS count ";
        $strsql = $strsql . "FROM foundation_props ";
        $strsql = $strsql . "WHERE prop_type = 'ดิน' ";
        $result = DB::select($strsql);
        if (is_null($result) || empty($result)) {
            $this->c_land = 0;
        }else{
            $this->c_land = $result[0]->count;
        }

    }

    

}

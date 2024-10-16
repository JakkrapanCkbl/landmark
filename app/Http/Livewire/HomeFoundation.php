<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeFoundation extends Component
{
    public $sum = '5';
    public $myid = '1';
    public $prop_name;
    public $prop_location;
    public $job_imgs;
    public $mainfolder = 'foundation_files';
    public $subfolder;
    public $landindex;
    public $disclaim;
    public $building;
    public $appendix;
    public $other;

    protected $listeners = [
        'updateValue',
        'showSum',
        'bindingPopup',
        'test',
        'addTwoNumbers'
        // Add more listeners as needed
    ];

    public function render()
    {
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
        $sql = $sql . "owner_how, certificate, remark, prop_operator, '' AS PDF, ";
        $sql = $sql . "'' AS Appendix  ";
        $sql = $sql . "FROM foundation_prop ";
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
}

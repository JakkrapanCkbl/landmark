<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MainController;
use App\Models\City_plan;


class CityPlan extends Component
{
    public $sum = '5';
    public $myid = '1';
    public $doc_group;
    public $asa_no;
    public $publish_date;
    public $law_type;
    public $province;
    public $description;
    public $expire_date;
    public $organization;
    public $remark;

    public $job_imgs;
    public $landindex;
    public $disclaim;

    public $mainfolder = 'cityplan_files';
    public $subfolder;
    public $fileUrl;


    protected $listeners = [
        'showSum',
        'addTwoNumbers',
        'bindingPopup',
        "opens3file",
        'bindingPopupEditData',
        'updateValue'
    ];

    public function render()
    {
        return view('livewire.city-plan');
    }

    public function addTwoNumbers($num1,$num2){
        //dd('ok');
        $this->sum = $num1 + $num2;
        //dd($this->sum);
    }

    public function getData(Request $request)
    {
        // Perform the SQL query
        
        $sql = "Select id, asa_no, publish_date, province, description, expire_date, organization, remark, ";
        $sql = $sql . "'' As PDF, '' As Word, '' As Print, doc_group ";
        $sql = $sql . "From city_plans ";
        $sql = $sql . "ORDER BY id ";
        $cityplans = DB::select($sql);
        // Return as JSON
        return response()->json(['data' => $cityplans]);
    }

    public function bindingPopup($value1,$value2,$value3,){       
        //dd($value1);
        $this->myid = $value1;
        $this->province = $value2;
        $this->description = $value3;

        // binding files list
        $this->subfolder = str_replace('/', '_', $this->myid);
        $this->job_imgs = DB::select("select * from cityplan_files where job_id = " . $this->myid . " and doc_type = 'cityplan_pdf' order by file_name");
        $this->landindex = DB::select("select * from cityplan_files where job_id = " . $this->myid . " and doc_type = 'cityplan_word' order by file_name");
        $this->disclaim = DB::select("select * from cityplan_files where job_id = " . $this->myid . " and doc_type = 'cityplan_print' order by file_name");
        // $this->disclaim = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'disclaim' order by file_name");
        // $this->building = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'building' order by file_name");
        // $this->appendix = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'appendix' order by file_name");
        // $this->other = DB::select("select * from foundation_files where job_id = " . $this->myid . " and doc_type = 'other' order by file_name");
    }

    function opens3file($id,$doc_type){
        $mypath = (new MainController)->MyFind("cityplan_files","file_path","where job_id = '" . $id . "' and doc_type = '" . $doc_type ."' ","" );
        $this->fileUrl = Storage::disk('s3')->url($mypath);
    }

    public function bindingPopupEditData($value1,$value2,$value3,$value4,$value5,$value6,$value7,$value8,$value9,$value10){
       
        //dd($value16);
        $this->myid = $value1;
        $this->doc_group = $value2;
        $this->asa_no = $value3;
        $this->publish_date = $value4;
        $this->law_type = $value5;
        $this->province = $value6;
        $this->description = $value7;
        $this->expire_date = $value8;
        $this->organization = $value9;
        $this->remark = $value10;
    }

    public function updateValue(){
        $my_job = City_plan::find($this->myid);
        //dd($my_job);
        $my_job->update([
            'doc_group' => $this->doc_group,
            'asa_no' => $this->asa_no,
            'publish_date' => $this->publish_date,
            'law_type' => $this->law_type,
            'province' => $this->province,
            'description' => $this->description,
            'expire_date' => $this->expire_date,
            'organization' => $this->organization,
            'remark' => $this->remark
        ]);
        $this->emit('userSaved');
    }

    public function submit()
    {
        // $this->validate();

        City_plan::create([
            'doc_group' => $this->doc_group,
            'asa_no' => $this->asa_no,
            'publish_date' => $this->publish_date,
            'law_type' => $this->province,
            'province' => $this->asa_no,
            'description' => $this->description,
            'expire_date' => $this->expire_date,
            'organization' => $this->organization,
            'remark' => $this->remark,
        ]);

        session()->flash('success', 'Data added successfully!');
        $this->reset();
    }

}

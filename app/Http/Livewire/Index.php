<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\{Job,Amphure};
// use Carbon\Carbon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\Proptype;
use App\Models\Proptype2;
use App\Models\Client;

class Index extends Component
{
    public $sum = '5';
    public $message = '';
    public $jobs = null;
    public $users;

    public $SumTask;
    public $SumCompleted;
    public $SumInProgress;
    public $SumOnHold;
    public $SumCancel;

    public $SumBfCompletedByMonth;
    public $SumRCompletedByMonth;
    public $CountAllCompletedByMonth;
    public $CountAllByMonth;
    public $AvgCompletedByMonth;
    public $TotalSaleByMonth;
   
    public $myid = '0';
    public $jobcode;
    public $reportcode;
    public $projectname;
    public $proplocation;
    public $jobsize;
    public $prop_size;
    public $client;
    public $client_note;
    public $startdate;
    public $inspectiondate;
    public $lcduedate;
    public $clientduedate;
    public $report_checked_date;
    public $approve_checked_date;
    public $job_status;
    public $job_imgs;
    public $mainfolder = 'working_files';
    public $subfolder;
    public $list_valuers = null; //for valuer 
    public $valuer = 'dido';
    public $list_headvaluers = null; //for valuer 
    public $list_checkers = null; //for checker
    public $headvaluer = 'สาโรจน์';
    public $checker = 'dido';
    public $proptypes = null;
    public $proptype;
    public $selectedProptype = null;
    public $proptype2s = null;
    public $proptype2;
    public $selectedProptype2 = null;
    public $prop_type_note = null;
    public $prop_type2_note;
    public $list_clients = null; //for dropdown client
    public $print_checked = 0;
    public $print_checked_by;
    public $link_checked = 0;
    public $link_checked_by;
    public $file_checked = 0;
    public $file_checked_by;

    public $job_checked = 0;
    public $report_checked_by;

    protected $listeners = [
        'updateValue',
        'showSum',
        'bindingPopup',
        'test',
        'openreport',
        'addTwoNumbers'
        // Add more listeners as needed
    ];

    
    public function render()
    {
        // $this->jobs = DB::select('select * from jobs order by id desc LIMIT 200');
        //$this->jobs = DB::select('select * from jobs WHERE YEAR(startdate) = YEAR(NOW()) order by id desc');
        // $sql = "Select id, client, jobcode, reportcode, projectname, proplocation, prop_type, prop_size, startdate, ";
        // $sql = $sql . "inspectiondate, lcduedate, clientduedate, valuer, headvaluer, job_status, customer, ";
        // $sql = $sql . "jobsize, easydiff, print_checked, link_checked, file_checked, job_checked ";
        // $sql = $sql . "from jobs WHERE YEAR(startdate) = YEAR(NOW()) order by id desc ";
        // $this->jobs = DB::select($sql);
        // $this->jobs = Job::whereYear('startdate', Carbon::now()->year)->get();
        $this->users = Auth::user();
        $this->CountTotalTask(Carbon::now()->year);
        $this->CountCompletedTaskByMonth(Carbon::now()->year,Carbon::now()->month);
        $this->proptypes = Proptype::orderBy('itemno')->get();
        $this->list_clients = Client::orderBy('itemno', 'asc')->get();
        $this->list_valuers = $this->get_valuers();
        $this->list_headvaluers = $this->get_headvaluers();
        $this->list_checkers = $this->get_checkers();
        return view('livewire.index');
        //return view('livewire.index',compact('jobs', 'users'));
    }

    
    public function getData(Request $request)
    {
        // Perform the SQL query
        //$jobs = Job::whereYear('startdate', Carbon::now()->year)->get();
        $sql = "Select jobs.id, jobs.client, jobs.jobcode, jobs.reportcode, CONCAT(jobs.projectname, '<BR> ', jobs.proplocation) AS showprojectname, ";
        $sql = $sql . "jobs.obj_method, jobs.marketvalue, jobs.marketvalue_unit, ";
        $sql = $sql . "jobs.prop_type, jobs.prop_size, jobs.startdate, ";
        $sql = $sql . "jobs.inspectiondate, jobs.lcduedate, ";
        $sql = $sql . "jobs.report_checked_date, jobs.approve_checked_date, jobs.clientduedate, ";
        $sql = $sql . "jobs.valuer, jobs.headvaluer, '' as 'do_advance', jobs.job_status, jobs.customer, ";
        $sql = $sql . "jobs.jobsize, jobs.easydiff, jobs.print_checked, jobs.link_checked, jobs.file_checked, jobs.job_checked, ";
        $sql = $sql . "jobs.customer, jobs.proplocation, jobs.print_checked, jobs.link_checked, jobs.file_checked, jobs_img.file_name, jobs.projectname ";
        $sql = $sql . "From jobs Left Join ";
        $sql = $sql . "jobs_img On jobs_img.jobcode = jobs.jobcode ";
        $sql = $sql . "WHERE Year(jobs.startdate) >= Year(Now()) - 2 Order By jobs.id Desc";
        //dd($sql);
        $jobs = DB::select($sql);
        // Return as JSON
        return response()->json(['data' => $jobs]);
    }

    
    public function updateValue()
    {
        // The property $newValue is automatically updated with the value from the input field
        // because it's bound using wire:model
        dd($this->sum);
    }

    public function addTwoNumbers($num1,$num2){
        dd('ok');
        $this->sum = $num1 + $num2;
        dd($this->sum);
    }

    public function showSum($num1,$num2)
    {
        dd($num1 + $num2);
        $this->sum = $this->sum + 5;
        dd($this->sum);
    }

    public function test()
    {
       
        dd('test');
    }

    public function bindingPopup($value0,$value1,$value2,$value3,$value4,$value5,$value6,$value7,$value8,$value9,$value10,$value11){
       
        //dd($value0);
        $this->myid = $value0;
        $this->BindingData($value0);
        $this->jobcode = $value1;
        $this->reportcode = $value2;
        $this->projectname = $value3;
        $this->proplocation = $value4;
        // $this->startdate = $value5;
        //$this->startdate = Carbon::parse($value5)->isoFormat('Do MMM Y');
        $this->clientduedate = $value6;
        $this->job_status = $value7;
        //$this->print_checked = $value8;
        $this->link_checked = $value9;
        $this->file_checked = $value10;
        $this->client = $value11;
        // binding files list
        //$myjob = Job::find($this->myid);
        $this->subfolder = str_replace('/', '_', $this->jobcode);
        $this->job_imgs = DB::select('select * from jobs_img where job_id = ' . $this->myid . ' order by file_name');
        
    }

    public function openreport($jobid){
       
        //dd($jobid);
        //$this->myid = $jobid;
        //$this->subfolder = str_replace('/', '_', $this->jobcode);
        //$this->job_imgs = DB::select('select * from jobs_img where job_id = ' . $this->myid . ' order by file_name');
        //return Storage::disk("s3")->url("/working_files/LC_66BF_0824/LC-66BF-0824-T.pdf");

        //$filePath = '/working_files/LC_66BF_0824/LC-66BF-0824-T.pdf';
        $filePath = DB::select('select * from jobs_img where job_id = ' . $jobid . ' order by file_name');
        if (empty($filePath)) {
            // No records found
            return response()->json(['message' => 'No files found'], 404);
        }else{
            $firstFile = $filePath[0]->file_path ?? null;
            //dd($firstFile);
            if ($firstFile) {
                $mypath = $filePath[0]->file_path;
                if (Storage::disk('s3')->exists($mypath)) {
                    $url = Storage::disk('s3')->temporaryUrl(
                        $mypath,
                        now()->addMinutes(5) // Expiration time
                    );
                    $this->dispatchBrowserEvent('open-url', ['url' => $url]);
                    //return redirect()->to($url);
                    //dd('ok');
                }
            }
            return response()->json(['message' => 'File not found'], 404);
        }
        
    }


    public function showMessage()
    {
        $this->message = 'Button clicked!';
    }

    public function countDaySendJob($targetDate){
        // Get today's date
        $today = Carbon::today();
        //dd($today);

        // Calculate the difference in days, considering the past or future
        if ($targetDate->isPast()) {
            //$differenceInDays = "Target Day is Past";
            $differenceInDays = $today->diffInDays($targetDate);
        } else {
            //$differenceInDays = "Target Day > today";
            $differenceInDays = -$today->diffInDays($targetDate);
        }
        return $differenceInDays;
    }

    public function CountTotalTask($ProjectYear){
        //Total Task
        $strsql = "Select Year(jobs.startdate) As TaskYear, Count(jobs.id) As Count_Task ";
        $strsql = $strsql . "From jobs ";
        $strsql = $strsql . "Where Year(jobs.startdate) = '" . $ProjectYear . "' ";
        $strsql = $strsql . "Group By Year(jobs.startdate) ";
        $result = DB::select($strsql);
        if (is_null($result) || empty($result)) {
            $this->SumTask = 0;
        }else{
            $this->SumTask = $result[0]->Count_Task;
        }
        //Total Completed
        $strsql = "Select Year(jobs.startdate) As TaskYear, Count(jobs.id) As Count_Task, jobs.job_status ";
        $strsql = $strsql . "From jobs ";
        $strsql = $strsql . "Where Year(jobs.startdate) = '" . $ProjectYear . "' And jobs.job_status = 'Completed' ";
        $strsql = $strsql . "Group By Year(jobs.startdate), jobs.job_status ";
        $result = DB::select($strsql);
        if (is_null($result) || empty($result)) {
            $this->SumCompleted = 0;
        }else{
            $this->SumCompleted = $result[0]->Count_Task;
        }
        //Total In Progress
        $strsql = "Select Year(jobs.startdate) As TaskYear, Count(jobs.id) As Count_Task, jobs.job_status ";
        $strsql = $strsql . "From jobs ";
        $strsql = $strsql . "Where Year(jobs.startdate) = '" . $ProjectYear . "' And jobs.job_status = 'In Progress' ";
        $strsql = $strsql . "Group By Year(jobs.startdate), jobs.job_status ";
        $result = DB::select($strsql);
        if (is_null($result) || empty($result)) {
            $this->SumInprogress = 0;
        }else{
            $this->SumInprogress = $result[0]->Count_Task;
        }      
        //Total In On Hold
        $strsql = "Select Year(jobs.startdate) As TaskYear, Count(jobs.id) As Count_Task, jobs.job_status ";
        $strsql = $strsql . "From jobs ";
        $strsql = $strsql . "Where Year(jobs.startdate) = '" . $ProjectYear . "' And jobs.job_status = 'On Hold' ";
        $strsql = $strsql . "Group By Year(jobs.startdate), jobs.job_status ";
        $result = DB::select($strsql);
        //dd($result);
        if (is_null($result) || empty($result)) {
            $this->SumOnHold = 0;
        }else{
            $this->SumOnHold = $result[0]->Count_Task;
        }
        //Total In Cancel
        $strsql = "Select Year(jobs.startdate) As TaskYear, Count(jobs.id) As Count_Task, jobs.job_status ";
        $strsql = $strsql . "From jobs ";
        $strsql = $strsql . "Where Year(jobs.startdate) = '" . $ProjectYear . "' And jobs.job_status = 'Cancel' ";
        $strsql = $strsql . "Group By Year(jobs.startdate), jobs.job_status ";
        $result = DB::select($strsql);
        if  (is_null($result) || empty($result)) {
            $this->SumCancel = 0;
        }else{
            $this->SumCancel = $result[0]->Count_Task;
        }
       
       
    }

    public function CountCompletedTaskByMonth($ProjectYear, $ProjectMonth){
        //Completed BF by month
        $strsql = "Select Year(jobs.startdate) As TaskYear, Month(jobs.startdate) As TaskMonth, Count(jobs.id) As Count_Task, ";
        $strsql = $strsql . "jobs.job_status ";
        $strsql = $strsql . "From jobs ";
        $strsql = $strsql . "Where Year(jobs.startdate) = '" . $ProjectYear . "' ";
        $strsql = $strsql . "And Month(jobs.startdate) = '" . $ProjectMonth . "' ";
        $strsql = $strsql . "And jobs.jobcode like '%BF%' ";
        $strsql = $strsql . "And jobs.job_status = 'Completed' ";
        $strsql = $strsql . "Group By Year(jobs.startdate), Month(jobs.startdate), jobs.job_status";
        $result = DB::select($strsql);
        if (is_null($result) || empty($result)) {
            $this->SumBfCompletedByMonth = 0;
        }else{
            $this->SumBfCompletedByMonth = $result[0]->Count_Task;
        }
        //Completed R by month
        $strsql = "Select Year(jobs.startdate) As TaskYear, Month(jobs.startdate) As TaskMonth, Count(jobs.id) As Count_Task, ";
        $strsql = $strsql . "jobs.job_status ";
        $strsql = $strsql . "From jobs ";
        $strsql = $strsql . "Where Year(jobs.startdate) = '" . $ProjectYear . "' ";
        $strsql = $strsql . "And Month(jobs.startdate) = '" . $ProjectMonth . "' ";
        $strsql = $strsql . "And jobs.jobcode like '%R%' ";
        $strsql = $strsql . "And jobs.job_status = 'Completed' ";
        $strsql = $strsql . "Group By Year(jobs.startdate), Month(jobs.startdate), jobs.job_status";
        $result = DB::select($strsql);
        if (is_null($result) || empty($result)) {
            $this->SumRCompletedByMonth = 0;
        }else{
            $this->SumRCompletedByMonth = $result[0]->Count_Task;
        }

        // Avg. / Task (month)
        $strsql = "Select Year(jobs.startdate) As TaskYear, Month(jobs.startdate) As TaskMonth, Count(jobs.id) As Count_Task, ";
        $strsql = $strsql . "jobs.job_status ";
        $strsql = $strsql . "From jobs ";
        $strsql = $strsql . "Where Year(jobs.startdate) = '" . $ProjectYear . "' ";
        $strsql = $strsql . "And Month(jobs.startdate) = '" . $ProjectMonth . "' ";
        $strsql = $strsql . "And jobs.job_status = 'Completed' ";
        $strsql = $strsql . "Group By Year(jobs.startdate), Month(jobs.startdate), jobs.job_status";
        $result = DB::select($strsql);
        if (is_null($result) || empty($result)) {
            $this->CountAllCompletedByMonth = 0;
        }else{
            $this->CountAllCompletedByMonth = $result[0]->Count_Task;
        }

        $strsql = "Select Year(jobs.startdate) As TaskYear, Month(jobs.startdate) As TaskMonth, Count(jobs.id) As Count_Task ";
        $strsql = $strsql . "From jobs ";
        $strsql = $strsql . "Where Year(jobs.startdate) = '" . $ProjectYear . "' ";
        $strsql = $strsql . "And Month(jobs.startdate) = '" . $ProjectMonth . "' ";
        $strsql = $strsql . "Group By Year(jobs.startdate), Month(jobs.startdate)";
        $result = DB::select($strsql);
        
        if (is_null($result) || empty($result)) {
            $this->CountAllByMonth = 0;
            $this->AvgCompletedByMonth = 0;
        }else{
            $this->CountAllByMonth = $result[0]->Count_Task;
            //dd($result[0]->Count_Task);
            $this->AvgCompletedByMonth = ($this->CountAllCompletedByMonth / $this->CountAllByMonth) * 100;
        }
        

        $this->TotalSaleByMonth = 0;
    }

    public function BindingData($jobid)
    {
        //dd($jobid);
        $this->job = Job::find($jobid);
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
        $this->jobsize = $this->job->jobsize;
        $this->prop_size = $this->job->prop_size;
        $this->client_note = $this->job->client_note;
        $this->valuationfee = $this->job->valuationfee;
        $this->valuer = $this->job->valuer;
        $this->headvaluer = $this->job->headvaluer;
        $this->checker = $this->job->checker;
        //$this->startdate = Carbon::parse($this->job->startdate)->isoFormat('Do MMM Y');
        $this->startdate = $this->job->startdate;
        $this->inspectiondate = $this->job->inspectiondate;
        $this->lcduedate = $this->job->lcduedate;
        
        $this->print_checked = $this->job->print_checked;
        $this->print_checked_by = $this->job->print_checked_by;
        $this->link_checked = $this->job->link_checked;
        $this->link_checked_by = $this->job->link_checked_by;
        $this->file_checked = $this->job->file_checked;
        $this->file_checked_by = $this->job->file_checked_by;

        $this->job_checked = $this->job->job_checked;
        $this->report_checked_by = $this->job->report_checked_by;
        $this->report_checked_date = $this->job->report_checked_date;
        $this->approve_checked_date= $this->job->approve_checked_date;

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

    public function updatedclient($value)
    {
        //dd('client updated');
        if ($value == 'อื่นๆ') {
            //dd('ok');
            $this->client_note = '';
        }
        
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



}


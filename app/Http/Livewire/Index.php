<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\{Job,Amphure};
use Carbon\Carbon;


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
    public $startdate;
    public $clientduedate;
    public $job_status;
    public $job_imgs;
    public $mainfolder = 'working_files';
    public $subfolder;

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
        return view('livewire.index');
        //return view('livewire.index',compact('jobs', 'users'));
        
    }

    public function getData(Request $request)
    {
        // Perform the SQL query
        //$jobs = Job::whereYear('startdate', Carbon::now()->year)->get();
        $sql = "Select id, client, jobcode, reportcode, CONCAT(projectname, '/ ', proplocation) AS projectname, prop_type, prop_size, startdate, ";
        $sql = $sql . "inspectiondate, lcduedate, clientduedate, valuer, headvaluer, job_status, customer, ";
        $sql = $sql . "jobsize, easydiff, print_checked, link_checked, file_checked, job_checked, ";
        $sql = $sql . "customer, proplocation, print_checked, link_checked, file_checked ";
        //$sql = "Select id, client ";
        $sql = $sql . "from jobs WHERE YEAR(startdate) = YEAR(NOW()) order by id desc ";
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

    public function bindingPopup($value0,$value1,$value2,$value3,$value4,$value5,$value6,$value7,$value8,$value9,$value10){
       
        //dd($value0);
        $this->myid = $value0;
        $this->jobcode = $value1;
        $this->reportcode = $value2;
        $this->projectname = $value3;
        $this->proplocation = $value4;
        $this->startdate = $value5;
        $this->clientduedate = $value6;
        $this->job_status = $value7;
        $this->print_checked = $value8;
        $this->link_checked = $value9;
        $this->file_checked = $value10;

        
        // binding files list
        //$myjob = Job::find($this->myid);
        $this->subfolder = str_replace('/', '_', $this->jobcode);
        $this->job_imgs = DB::select('select * from jobs_img where job_id = ' . $this->myid . ' order by file_name');
        
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



}


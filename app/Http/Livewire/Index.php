<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MainController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\{Job,Amphure};
use App\Models\Proptype;
use App\Models\Proptype2;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

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
    public $obj_id;
    public $jobtype;
    public $customer;
    public $jobsize;
    public $prop_size;
    public $easydiff;
    public $client;
    public $client_note;
    public $valuationfee;
    public $valuationfee_case;
    public $startdate;
    public $inspectiondate;
    public $lcduedate;
    public $clientduedate;
    public $send_check_report_date;
    
    public $job_imgs;
    public $mainfolder = 'working_files';
    public $subfolder;
    public $list_valuers = null; //for valuer 
    public $valuer = 'dido';
    public $list_headvaluers = null; //for valuer 
    public $list_checkers = null; //for checker
    
    public $job_gps;
    public $lat;
    public $lng;
    
    public $proptypes = null;
    public $proptype;
    public $selectedProptype;
    public $prop_type_note;

    // public $proptype2s = null;
    // public $proptype2;
    // public $selectedProptype2 = null;
    // public $prop_type2_note;

    public $list_clients = null; //for dropdown client
    public $pre_job_checked = 0;
    public $pre_checker;
    public $pre_report_checked_date;
    public $pre_show_modified;

    public $link_checked = 0;
    public $link_checked_by;
    public $link_checked_date;
    public $show_link_checked;

    public $print_checked = 0;
    public $print_checked_by;
    public $print_checked_date;
    public $show_print_checked;

    public $file_checked = 0;
    public $file_checked_by;
    public $file_checked_date;
    public $show_file_checked;

    public $approve_checked = 0;
    public $headvaluer;
    public $approve_checked_date;
    public $show_Approved;

    public $job_checked = 0;
    public $checker;
    public $job_status;
    public $job_checked_date;
    public $show_finishjob;


    protected $listeners = [
        'updateValue',
        'showSum',
        'bindingPopup',
        'callUpdate',
        'test',
        'openreport',
        'addTwoNumbers'
        // Add more listeners as needed
    ];

    public function mount()
    {
        // $this->subfolder = str_replace('/', '_', $this->jobcode);
        // $this->job_imgs = DB::select('select * from jobs_img where job_id = ' . $this->myid . ' order by file_name');
        if ($this->myid != '0') {
            
        }
       
    }

    
    public function render()
    {
        $this->users = Auth::user();
        $this->CountTotalTask(Carbon::now()->year);
        $this->CountCompletedTaskByMonth(Carbon::now()->year,Carbon::now()->month);
        $this->proptypes = Proptype::whereNot('id', 1)->orderBy('itemno')->get();
        $this->list_clients = Client::orderBy('itemno', 'asc')->get();
        $this->list_valuers = $this->get_valuers();
        $this->list_headvaluers = $this->get_headvaluers();
        $this->list_checkers = $this->get_checkers();
        return view('livewire.index');
    }

    
    public function getData(Request $request)
    {
        // Perform the SQL query
        //$jobs = Job::whereYear('startdate', Carbon::now()->year)->get();
        $sql = "Select jobs.id, jobs.client, jobs.customer, ";
        $sql = $sql . "jobs.jobcode, jobs.reportcode, CONCAT(jobs.projectname, '<BR> ', jobs.proplocation) AS showprojectname, ";
        $sql = $sql . "jobs.obj_method, jobs.marketvalue, jobs.marketvalue_unit, ";
        $sql = $sql . "jobs.prop_type, jobs.prop_size, jobs.startdate, ";
        $sql = $sql . "jobs.inspectiondate, jobs.lcduedate, jobs.send_check_report_date, ";
        $sql = $sql . "jobs.pre_report_checked_date, jobs.approve_checked_date,  jobs.clientduedate, ";
        $sql = $sql . "jobs.valuer, jobs.headvaluer, jobs.advance_by, jobs.job_status, ";
        $sql = $sql . "jobs.jobsize, jobs.easydiff, jobs.print_checked, jobs.link_checked, jobs.file_checked, jobs.job_checked, ";
        $sql = $sql . "jobs.customer, jobs.proplocation, jobs.print_checked, jobs.link_checked, jobs.file_checked, jobs_img.file_name, jobs.projectname ";
        $sql = $sql . "From jobs Left Join ";
        $sql = $sql . "jobs_img On jobs_img.jobcode = jobs.jobcode ";
        //$sql = $sql . "WHERE jobs.jobcode like 'LC/66BF-000%' Order By jobs.id Desc";
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

    public function bindingPopup($value1,$value2,$value3,$value4,$value5){
       
        //dd($value0);
        $this->myid = $value1;
        $this->BindingData($value1);
        $this->jobcode = $value2;
        $this->reportcode = $value3;
        $this->projectname = $value4;
        $this->proplocation = $value5;
    }

    public function BindingData($jobid)
    {
        //dd($jobid);
        Carbon::setLocale('th');
        $this->job = Job::find($jobid);
        $this->client = $this->job->client;
        $this->client_note = $this->job->client_note;
        $this->customer = $this->job->customer;

        $this->proptype = $this->job->prop_type;
        $this->selectedProptype = $this->job->prop_type;
        $this->prop_type_note = $this->job->prop_type_note;
        $this->prop_size = $this->job->prop_size;
        $this->job_gps = $this->job->job_gps;
        $this->lat = $this->job->lat;
        $this->lng = $this->job->lng;
        $this->obj_id = $this->job->obj_id;
        $this->jobtype = $this->job->jobtype;
        $this->jobsize = $this->job->jobsize;
        $this->easydiff = $this->job->easydiff;
        $this->valuationfee = number_format($this->job->valuationfee);
        $this->valuationfee_case = $this->job->valuationfee_case;
        
        
        $this->valuer = $this->job->valuer;
        $this->headvaluer = $this->job->headvaluer;
        
        if ($this->job->startdate === '1976-04-27') {
            $this->startdate = null;
        } else {
            //$this->startdate = Carbon::parse($this->job->startdate)->locale('th')->translatedFormat('j M Y');
            $carbonDate = Carbon::parse($this->job->startdate)->locale('th');
            $dayMonth = $carbonDate->translatedFormat('j M');
            $buddhistYear = $carbonDate->year + 543;
            $this->startdate = $dayMonth . ' ' . $buddhistYear;
        }
        if ($this->job->inspectiondate === '1976-04-27') {
            $this->inspectiondate = null;
        } else {
            //$this->inspectiondate = Carbon::parse($this->job->inspectiondate)->locale('th')->translatedFormat('j M Y');
            $carbonDate = Carbon::parse($this->job->inspectiondate)->locale('th');
            $dayMonth = $carbonDate->translatedFormat('j M');
            $buddhistYear = $carbonDate->year + 543;
            $this->inspectiondate = $dayMonth . ' ' . $buddhistYear;
        }
        if ($this->job->lcduedate === '1976-04-27') {
            $this->lcduedate = null;
        } else {
            //$this->lcduedate = Carbon::parse($this->job->lcduedate)->locale('th')->translatedFormat('j M Y');
            $carbonDate = Carbon::parse($this->job->lcduedate)->locale('th');
            $dayMonth = $carbonDate->translatedFormat('j M');
            $buddhistYear = $carbonDate->year + 543;
            $this->lcduedate = $dayMonth . ' ' . $buddhistYear;
        }
        if (($this->job->clientduedate === '1976-04-27') || ($this->job->clientduedate === null)) {
            $this->clientduedate = null;
        } else {
            //$this->clientduedate = Carbon::parse($this->job->clientduedate)->locale('th')->translatedFormat('j M Y');
            $carbonDate = Carbon::parse($this->job->clientduedate)->locale('th');
            $dayMonth = $carbonDate->translatedFormat('j M');
            $buddhistYear = $carbonDate->year + 543;
            $this->clientduedate = $dayMonth . ' ' . $buddhistYear;
        }
        if (($this->job->send_check_report_date === '1976-04-27')|| ($this->job->send_check_report_date === null)) {
            $this->send_check_report_date = null;
        } else {
            //$this->send_check_report_date = Carbon::parse($this->job->send_check_report_date)->locale('th')->translatedFormat('j M Y');
            $carbonDate = Carbon::parse($this->job->send_check_report_date)->locale('th');
            $dayMonth = $carbonDate->translatedFormat('j M');
            $buddhistYear = $carbonDate->year + 543;
            $this->send_check_report_date = $dayMonth . ' ' . $buddhistYear;
        }
        $this->pre_job_checked = $this->job->pre_job_checked;
        $this->pre_checker = $this->job->pre_checker;
        $this->pre_report_checked_date = $this->job->pre_report_checked_date;
        $this->pre_show_modified = $this->pre_checker . ' ' . $this->formatBuddhistDateTime($this->pre_report_checked_date) ;
        //dd($this->pre_show_modified);
       

        $this->link_checked = $this->job->link_checked;
        $this->link_checked_by = $this->job->link_checked_by;
        $this->link_checked_date = $this->job->link_checked_date;
        $this->show_link_checked = $this->link_checked_by . ' ' . $this->formatBuddhistDateTime($this->link_checked_date) ;
        
        $this->print_checked = $this->job->print_checked;
        $this->print_checked_by = $this->job->print_checked_by;
        $this->print_checked_date = $this->job->print_checked_date;
        $this->show_print_checked = $this->job->print_checked_by . ' ' . $this->formatBuddhistDateTime($this->print_checked_date) ;
       
        $this->file_checked = $this->job->file_checked;
        $this->file_checked_by = $this->job->file_checked_by;
        $this->file_checked_date = $this->job->file_checked_date;
        $this->show_file_checked = $this->job->file_checked_by . ' ' . $this->formatBuddhistDateTime($this->file_checked_date) ;
       

        $this->approve_checked = $this->job->approve_checked;
        $this->headvaluer= $this->job->headvaluer;
        $this->approve_checked_date= $this->job->approve_checked_date;
        $this->show_Approved = $this->headvaluer . ' ' . $this->formatBuddhistDateTime($this->approve_checked_date) ;
        

        $this->job_checked = $this->job->job_checked;
        $this->checker = $this->job->checker;
        $this->job_checked_date = $this->job->job_checked_date;
        $this->show_finishjob = $this->checker . ' ' . $this->formatBuddhistDateTime($this->job_checked_date);

        $this->job_status = $this->job->job_status;

        // $this->proptype2s = Proptype2::where('show_prop_type', $this->job->prop_type)->orderBy('itemno', 'asc')->get();
        // if ($this->proptype2s->isEmpty()) {
        //     $this->proptype2s = Proptype2::whereIn('itemno', [1, 99])->take(2)->get();
        //     $this->selectedProptype2 = "";
        //     $this->prop_type2_note = "";
        // }else{
        //     $this->proptype2 = $this->job->prop_type2;
        //     $this->selectedProptype2 = $this->job->prop_type2;
        //     $this->prop_type2_note = $this->job->prop_type2_note;
        // }


        // binding files list
        //$this->subfolder = str_replace('/', '_', $this->jobcode);
        //$this->job_imgs = DB::select('select * from jobs_img where job_id = ' . $this->myid . ' order by file_name');
        //$this->subfolder = str_replace('/', '_', $this->job->jobcode);
        //$this->job_imgs = DB::select('select * from jobs_img where job_id = ' . $jobid . ' order by file_name');

    }




    public function callUpdate() {
        $this->updateData();
    }

    public function updateData()
    {
        //dd($this->pre_checker);
        $user = Auth::user();
        //dd($user->name);
        $this->validate([
            'projectname' => 'required|string',
            
        ]);
        // set ชื่อธนาคาร ให้เป็นฟอร์แมท Master

        // set job_gps and sprit to lat and long
        if($this->job_gps === "") {
            $this->lat = 0;
            $this->lng = 0;
        }else{
            $result = $this->validateGPS($this->job_gps);
            $this->lat = $result['latitude']; 
            $this->lng = $result['longitude']; 
        }
        //dd("lat = " . $lat . ", long = " . $long);
        $clientName = $this->convert2ClientMaster($this->client);
        //dd($clientName);
        //$valuationfee_number = (int) str_replace(',', '', $this->valuationfee);
        //dd($valuationfee_number);
        if($this->startdate == null){
            $sql_startdate = null;
        }else{
            $sql_startdate = (new MainController)->ConvertThaiDate2SqlDate($this->startdate);
        }
        if($this->inspectiondate == null){
            $sql_inspectiondate = null;
        }else{
            $sql_inspectiondate = (new MainController)->ConvertThaiDate2SqlDate($this->inspectiondate);
        }
        if($this->lcduedate == null){
            $sql_lcduedate = null;
        }else{
            $sql_lcduedate = (new MainController)->ConvertThaiDate2SqlDate($this->lcduedate);
        }
        if($this->clientduedate == null){
            $sql_clientduedate = null;
        }else{
            $sql_clientduedate = (new MainController)->ConvertThaiDate2SqlDate($this->clientduedate);
        }
       //dd($this->send_check_report_date);
        if($this->send_check_report_date == null){
            $sql_send_check_report_date = null;
        }else{
            $sql_send_check_report_date = (new MainController)->ConvertThaiDate2SqlDate($this->send_check_report_date);
        }
        //dd($sql_send_check_report_date);
        if ($this->pre_job_checked == '1'){
            if ($this->pre_checker == '') {
                if (($user->name == 'ศิรินานา') || ($user->name == 'วลัยกร') || ($user->name == 'สมสมัย') || 
                ($user->name == 'นิรันดร') || ($user->name == 'มนต์ชัย') || ($user->name == 'ปริวรรต')) {
                    $this->pre_job_checked = '1';
                    $this->pre_checker = $user->name;
                    $this->pre_report_checked_date = now();
                }else{
                    $this->pre_job_checked = '0';
                    $this->pre_checker = '';
                    $this->pre_report_checked_date = null;
                }
            }
        }else{
            $this->pre_checker = '';
            $this->pre_report_checked_date = null;
        }
        
        if ($this->approve_checked == '1'){
            if ($this->headvaluer == '') {
                if (($user->name == 'dido') || ($user->name == 'สาโรจน์') || ($user->name == 'มงคล') || ($user->name == 'นิรันดร')) {
                    $this->approve_checked = '1';
                    $this->headvaluer = $user->name;
                    $this->approve_checked_date = now();
                }else{
                    $this->approve_checked = '0';
                    $this->headvaluer = '';
                    $this->approve_checked_date = null;
                }
            }
        }else{
            $this->headvaluer = '';
            $this->approve_checked_date = null;
        }

        if ($this->job_checked == '1'){
            if ($this->checker == '') {
                if (($user->name == 'dido') || ($user->name == 'กนกวรรณ') || ($user->name == 'มงคล') || ($user->name == 'วลัยกร')) {
                    $this->job_checked = '1';
                    $this->checker = $user->name;
                    $this->job_checked_date = now();
                }else{
                    $this->job_checked = '0';
                    $this->checker = '';
                    $this->job_checked_date = null;
                }
            }
        }else{
            $this->checker = '';
            $this->job_checked_date = null;
        }
        
        if ($this->link_checked == '1'){
            if ($this->link_checked_by == '') {
                if (($user->name == 'ศิรินานา') || ($user->name == 'วลัยกร') || ($user->name == 'กนกวรรณ') || ($user->name == 'สมสมัย')) {
                    $this->link_checked = '1';
                    $this->link_checked_by = $user->name;
                    $this->link_checked_date = now();
                }else{
                    $this->link_checked = '0';
                    $this->link_checked_by = '';
                    $this->link_checked_date = null;
                }
            }
        }else{
            $this->link_checked_by = '';
            $this->link_checked_date = null;
        }
        
        if ($this->print_checked == '1'){
            if ($this->print_checked_by == '') {
                if (($user->name == 'ศิรินานา') || ($user->name == 'วลัยกร') || ($user->name == 'กนกวรรณ') || ($user->name == 'สมสมัย')) {
                    $this->print_checked = '1';
                    $this->print_checked_by = $user->name;
                    $this->print_checked_date = now();
                }else{
                    $this->print_checked = '0';
                    $this->print_checked_by = '';
                    $this->print_checked_date = null;
                }
            }
        }else{
            $this->print_checked_by = '';
            $this->print_checked_date = null;
        }
        //--
        if ($this->file_checked == '1'){
            if ($this->file_checked_by == '') {
                if (($user->name == 'ศิรินานา') || ($user->name == 'วลัยกร') || ($user->name == 'กนกวรรณ') || ($user->name == 'สมสมัย')) {
                    $this->file_checked = '1';
                    $this->file_checked_by = $user->name;
                    $this->file_checked_date = now();
                }else{
                    $this->file_checked = '0';
                    $this->file_checked_by = '';
                    $this->file_checked_date = null;
                }
            }
        }else{
            $this->file_checked_by = '';
            $this->file_checked_date = null;
        }


        if($this->myid){
            //dd($this->job_checked);
            $my_job = Job::find($this->myid);
            //dd($my_job);
            // for check add new value in client combobox
            // if ($this->client != 'อื่นๆ'){
            //     $this->client_note = "";
            // }else{
            //     if ( $this->client_note != '') {
            //         // นำ client_note ไปเช็คในตาราง clients ถ้าไม่มีให้ Add new
            //         $result = (new MainController)->MyFind("clients","clientname","where clientname = '" . $this->client_note . "'","" ); 
            //         if ($result == '') {
            //             $new_itemno = $this->gen_new_itemno();
            //             Client::create([
            //                 'itemno' => $new_itemno,
            //                 'clientname' => $this->client_note,
            //             ]);
            //             $this->list_clients = Client::orderBy('itemno', 'asc')->get();
            //         }
            //     }
            // }
            // for check add new value in proptype combobox
            // if ($this->selectedProptype == 'อื่นๆ'){
            //     if ( $this->prop_type_note != '') {
            //         // นำ prop_type_not ไปเช็คในตาราง proptypes ถ้าไม่มีให้ Add new
            //         $result = (new MainController)->MyFind("proptypes","show_prop_type","where show_prop_type = '" . $this->prop_type_note . "'","" ); 
            //         if ($result == '') {
            //             $new_itemno = $this->gen_new_itemno_proptype();
            //             Proptype::create([
            //                 'itemno' => $new_itemno,
            //                 'show_prop_type' => $this->prop_type_note,
            //             ]);
            //             $this->proptypes = Proptype::orderBy('itemno', 'asc')->get();
            //         }
            //     }
            // }
            // for check add new value in proptype2 combobox
            //  if ($this->selectedProptype2 == 'อื่นๆ'){
            //      if ( $this->prop_type2_note != '') {
            //         // นำ $prop_type2_note ไปเช็คในตาราง proptype2s ถ้าไม่มีให้ Add new
            //         //dd($this->selectedProptype . "   " . $this->prop_type2_note);
            //         $result = (new MainController)->MyFind("proptype2s","show_prop_type2","where show_prop_type = '" . $this->selectedProptype . "' and show_prop_type2 = '" . $this->prop_type2_note . "'","" ); 
            //         // dd($result);
            //         if ($result == '') {
            //             $new_itemno = $this->gen_new_itemno_proptype2($this->selectedProptype);
            //             if ($new_itemno == "1") {
            //                 Proptype2::create([
            //                     'show_prop_type' => $this->selectedProptype,
            //                     'itemno' => 1,
            //                     'show_prop_type2' => "",
            //                 ]);
            //                 Proptype2::create([
            //                     'show_prop_type' => $this->selectedProptype,
            //                     'itemno' => 99,
            //                     'show_prop_type2' => "อื่นๆ",
            //                 ]);
            //             }
            //             $new_itemno = $this->gen_new_itemno_proptype2($this->selectedProptype);
            //             if ((int)$new_itemno > 1) {
            //                 Proptype2::create([
            //                     'show_prop_type' => $this->selectedProptype,
            //                     'itemno' => $new_itemno,
            //                     'show_prop_type2' => $this->prop_type2_note,
            //                 ]);
            //             }
            //             $this->proptypes2 = Proptype2::where('show_prop_type',$this->selectedProptype)->orderBy('itemno', 'asc')->get();
                        
            //         }
            //     }
            //  }else{
            //     $this->proptypes2 = Proptype2::where('show_prop_type',$this->selectedProptype)->orderBy('itemno', 'asc')->get();
            //  }

            $my_job->update([
                //jobcode
                'reportcode' => $this->reportcode,
                'client' => $this->client,
                'client_note' => $this->client_note,
                'customer' => $this->customer,
                'prop_type' => $this->selectedProptype,
                'prop_type_note' => $this->prop_type_note,
                'prop_size' => $this->prop_size,
                // 'prop_type2' => $this->selectedProptype2,
                // 'prop_type2_note' => $this->prop_type2_note,
                'projectname' => $this->projectname,
                'job_gps' => $this->job_gps,
                'lat' => $this->lat,
                'lng' => $this->lng,
                'proplocation' => $this->proplocation,
                'obj_id' => $this->obj_id,
                'jobtype' => $this->jobtype,
                'jobsize' => $this->jobsize,
                'easydiff' => $this->easydiff,
                'valuationfee' => (float) str_replace(',', '', $this->valuationfee),
                'valuationfee_case' => $this->valuationfee_case,
                'valuer' => $this->valuer,
                'startdate' => $sql_startdate,
                'inspectiondate' => $sql_inspectiondate,
                'lcduedate' => $sql_lcduedate,
                'clientduedate' => $sql_clientduedate,
                'send_check_report_date' => $sql_send_check_report_date,
                
                'pre_job_checked' => (bool) $this->pre_job_checked,
                'pre_checker' => $this->pre_checker,
                //'pre_report_checked_date' => $this->pre_job_checked ? now() : null,
                'pre_report_checked_date' => $this->pre_report_checked_date,

                'approve_checked' => (bool) $this->approve_checked,
                'headvaluer' => $this->headvaluer,
                'approve_checked_date' => $this->approve_checked_date,

                'link_checked' => (bool) $this->link_checked,
                'link_checked_by' => $this->link_checked_by,
                'link_checked_date' => $this->link_checked_date,

                'print_checked' => (bool) $this->print_checked,
                'print_checked_by' => $this->print_checked_by,
                'print_checked_date' => $this->print_checked_date,

                'file_checked' => (bool) $this->file_checked,
                'file_checked_by' => $this->file_checked_by,
                'file_checked_date' => $this->file_checked_date,
                
                'job_checked' => (bool) $this->job_checked,
                'checker' => $this->checker,
                'job_checked_date' => $this->job_checked_date,
                'job_status' => $this->job_status,

                // 'province_code' => $this->selectedProvince,
                // 'amphure_code' => $this->amphure_code,
                // 'district' => $this->district,
                // 'obj_method' => $this->obj_method,
                // 'marketvalue' => (float) str_replace(',', '', $this->marketvalue),
             
            ]);
            // for set change new value in client combobox
            // if ($this->client == 'อื่นๆ'){
            //     if ( $this->client_note != '') {
            //         $my_job->update([
            //             'client' => $this->client_note,
            //             'client_note' => '',
            //         ]);
            //         $this->client = $this->client_note;
            //         $this->client_note = "";
            //     }
            // }

            // for set change new value in proptype combobox
            // if ($this->selectedProptype == 'อื่นๆ'){
            //     if ( $this->prop_type_note != '') {
            //         $my_job->update([
            //             'prop_type' => $this->prop_type_note,
            //         ]);
            //         $this->selectedProptype = $this->prop_type_note;
            //         $this->prop_type_note = "";
            //     }
            // }
            // for set change new value in proptype2 combobox (selectedProptype2)
            
            // if ($this->selectedProptype2 == 'อื่นๆ'){
            //     //dd($this->prop_type2_note);
            //     if ( $this->prop_type2_note != '') {
            //         $my_job->update([
            //             'prop_type2' => $this->prop_type2_note,
            //             'prop_type2_note' => "",
            //         ]);
            //         $this->selectedProptype2 = $this->prop_type2_note;
            //         $this->prop_type2_note = "";
            //     }
            // }
            // $this->proptype2 = Job::find($this->edit_id)->prop_type2;
        }

        
        session()->flash('message', 'Updated successfully.');
        //$this->emit('jobUpdated');
        //return redirect('/dashboard')->with('message', 'บันทึกข้อมูลเสร็จแล้ว');
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

   
    public function updatedSelectedProptype($value)
    {
        // $this->proptype2s = Proptype2::where('show_prop_type', $value)->orderBy('itemno', 'asc')->get();
        // if ($this->proptype2s->isEmpty()) {
        //     $this->proptype2s = Proptype2::whereIn('itemno', [1, 99])->take(2)->get();
        //     $this->selectedProptype2 = "";
        // }
        if ($value !== 'อื่นๆ') {
            $this->prop_type_note = "";
        }
    }

    // public function updatedSelectedProptype2($value)
    // {
    //     if ($value !== 'อื่นๆ') {
    //         $this->prop_type2_note = "";
    //     }
    // }

    public function updatedclient($value)
    {
        if ($value !== 'อื่นๆ') {
            $this->client_note = '';
        }
        $this->jobtype = $this->GetReportLanguage($value);
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

    function validateGPS($gpsString)
    {
        $validator = Validator::make(['gps' => $gpsString], [
            'gps' => [
                'required',
                'regex:/^-?\d{1,2}\.\d{6},\s?-?\d{1,3}\.\d{6}$/', // Format check: "lat, long"
                function ($attribute, $value, $fail) {
                    list($lat, $long) = explode(',', $value);
                    $lat = trim($lat);
                    $long = trim($long);

                    if ($lat < -90 || $lat > 90) {
                        $fail('Latitude must be between -90 and 90.');
                    }
                    if ($long < -180 || $long > 180) {
                        $fail('Longitude must be between -180 and 180.');
                    }
                }
            ]
        ]);

        // If validation fails, return null for latitude and longitude
        if ($validator->fails()) {
            return [
                'latitude' => null,
                'longitude' => null,
                'errors' => $validator->errors()->all()
            ];
        }

        // Extract latitude and longitude
        list($lat, $long) = explode(',', $gpsString);
        
        return [
            'latitude' => trim($lat),
            'longitude' => trim($long)
        ];
    }

    function convert2ClientMaster($input){
        // client master is UOB, KK, CIMB, SCB, BOC, ICBC, LHB, TTB, KTB, MBKG
        if (strpos($input, 'UOB') !== false) {
            return "UOB";
        }elseif (strpos($input, 'KK') !== false) {
            return "KK";
        }elseif (strpos($input, 'CIMB') !== false) {
            return "CIMB";
        }elseif (strpos($input, 'SCB') !== false) {
            return "SCB";
        }elseif (strpos($input, 'BOC') !== false) {
            return "BOC";
        }elseif (strpos($input, 'ICBC') !== false) {
            return "ICBC";
        }elseif (strpos($input, 'LHB') !== false) {
            return "LHB";
        }elseif (strpos($input, 'TTB') !== false) {
            return "TTB";
        }elseif (strpos($input, 'KTB') !== false) {
            return "KTB";
        }elseif (strpos($input, 'MBKG') !== false) {
            return "MBKG";
        }elseif (strpos($input, 'อื่นๆ') !== false) {
            return "อื่นๆ";
        }
        else {
            return $input;
        }
    }

    public function updatedJobChecked($value)
    {
        // Do something when job_checked changes
    }

   

    public function GetReportLanguage($bankname)
    {
      $result = '';
      if ($bankname == 'UOB') {
        $result = 'ไทย 1 เล่ม + (ส่ง Soft File ในระบบ)';
      }elseif ($bankname == 'KK') {
        $result = 'ไทย (ส่ง Soft File Only)';
      }elseif ($bankname == 'CIMB') {
        $result = 'ไทย 2 เล่ม';
      }elseif ($bankname == 'SCB') {
        $result = 'ไทย 2 เล่ม + CD + PDF';
      }elseif ($bankname == 'TTB') {
        $result = 'ไทย 2 เล่ม + CD + (ส่ง Soft File ในระบบ)';
      }elseif ($bankname == 'Thai Credit') {
        $result = 'ไทย 2 เล่ม + (ส่ง PDF โดยตรง)';
      }elseif ($bankname == 'GSB') {
        $result = 'ไทย 2 เล่ม + อังกฤษ 2 เล่ม + (ส่ง PDF)';
      }elseif ($bankname == 'KTB') {
        $result = 'ไทย 2 เล่ม + CD + (ส่ง Soft File ในระบบ)';
      }elseif ($bankname == 'MBKG') {
        $result = 'ไทย 2 เล่ม';
      }elseif ($bankname == 'LHB') {
        $result = 'ไทย 1 เล่ม + (ส่ง Soft File ในระบบ)';
      }elseif ($bankname == 'BOC') {
        $result = 'ไทย 2 เล่ม + CD + PDF';
      }elseif ($bankname == 'ICBC') {
        $result = 'ไทย 2 เล่ม + CD + PDF';
      }elseif ($bankname == 'ICBC') {
        $result = 'ไทย 2 เล่ม + CD + PDF';
      }elseif ($bankname == 'อื่นๆ') {
        $result = 'ไทย 2 เล่ม + (ส่ง PDF โดยตรง)';
      }else{
        $result = 'ไทย (ส่ง Soft File Only)';
      }
      return $result;
    }

    public function toggleJobChecked()
    {
        $this->job_checked = $this->job_checked == 0 ? 1 : 0;
    }

    public function formatBuddhistDateTime($datetime)
    {
        //$carbon = \Carbon\Carbon::parse($datetime);
        //$buddhistYear = $carbon->year + 543;
        //return $carbon->format('d-m-') . $buddhistYear . $carbon->format(' H:i:s');
        if ($datetime == null) {
            return null;
        }

        \Carbon\Carbon::setLocale('th'); // Set Thai locale
        $carbon = \Carbon\Carbon::parse($datetime);
        $buddhistYear = $carbon->year + 543;
        $day = $carbon->format('d');
        $month = $carbon->translatedFormat('M'); // e.g., เม.ย.
        $time = $carbon->format('H:i:s');

        return "{$day} {$month} {$buddhistYear} {$time}";
    }

}


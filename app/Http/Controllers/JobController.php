<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;

use App\Http\Controllers\MainController;

use App\Models\{Job,Amphure};

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response+
     * 
     */
    public function index()
    {
        
        $jobs = DB::select('select * from jobs order by id desc LIMIT 20');
        $users = Auth::user();
        return view('livewire.index',compact('jobs', 'users'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = DB::table('provinces')->get();
        $listtwo = DB::table('amphures')->get();
        $listthree = DB::table('users')->get();

        return view('livewire.job-add')->with('list', $list)->with('listtwo', $listtwo)->with('listthree', $listthree);
        //return redirect()->route('job-add')->with('list', $list)->with('listtwo', $listtwo)->with('listthree', $listthree);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $this->validate($request, [
            'jobcode' => 'required',
            'projectname' => 'required',
            'province_code' => 'required',
            'amphure_code' => 'required',
            'obj_id' => 'required'
            /**'image'=>'required|mimes:jpeg,jpg,png'**/
        ]);
        Job::create([
        //     /*'slug'=>str_slug($title),*/
            'jobcode' => $jobcode = $request->get('jobcode'),
            'reportcode' => $request->get('reportcode'),
            'client' => $request->get('client'),
            'prop_type' => $request->get('prop_type'),
            'projectname' => $request->get('projectname'),
            'prop_size' => $request->get('prop_size'),
            'proplocation' => $request->get('proplocation'),
            'province_code' => $request->get('province_code'),
            'amphure_code' =>  $this->getAmphureCode($request->get('amphure_code')),
            'customer' => $request->get('customer'),
            'jobtype' => $request->get('jobtype'),
            'jobsize' => $request->get('jobsize'),
            'easydiff' => $request->get('easydiff'),
            'obj_id' => $request->get('obj_id'),
            'valuationfee' => $request->get('valuationfee'),
            'valuationfee_case' => $request->get('valuationfee_case'),
            'valuer' => $request->get('valuer'),
            'headvaluer' => $request->get('headvaluer'),
        //     'startdate' => $startdate,
        //     'inspectiondate' => $inspectiondate,
        //     'lcduedate' => $lcduedate,
        //     'clientduedate' => $clientduedate,
        //     'lat' => $lat,
        //     'lng' => $lng,
        //     // 'default_coordinates' => $isdefault,
        ]);

        return redirect('/dashboard')->with('message', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = DB::table('provinces')->get();
        $listtwo = DB::table('amphures')->get();
        $listfour = DB::table('users')->get();
        $job = Job::find($id);
        return view('livewire.job-edit')->with('jobs',$job)->with('list', $list)->with('listtwo', $listtwo)->with('listfour', $listfour);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        //dd($request->all());       
        $this->validate($request, [
            'jobcode' => 'required',
            'province_code' => 'required',
            'amphure_code' => 'required',
            'obj_id' => 'required'
        ]);
        Job::where('id', $id)->update([
            'jobcode' => $request->get('jobcode'),
            'reportcode' => $request->get('reportcode'),
            'client' => $request->get('client'),
            'prop_type' => $request->get('prop_type'),
            'projectname' => $request->get('projectname'),
            'prop_size' => $request->get('prop_size'),
            'proplocation' => $request->get('proplocation'),
            'province_code' =>  $request->get('province_code'),
            'amphure_code' => $request->get('amphure_code'),
            'district' => $request->get('district'),
            'customer' => $request->get('customer'),
            'jobtype' => $request->get('jobtype'),
            'jobsize' => $request->get('jobsize'),
            'easydiff' => $request->get('easydiff'),
            'obj_id' => $request->get('obj_id'),
            'valuationfee' => str_replace(',', '',$request->get('valuationfee')),
            'valuationfee_case' => $request->get('valuationfee_case'),
            'valuer' => $request->get('valuer'),
            'headvaluer' => $request->get('headvaluer'),
            'startdate' => $request->get('startdate'),
            'inspectiondate' => $request->get('inspectiondate'),
            'lcduedate' => $request->get('lcduedate'),
            'clientduedate' => $request->get('clientduedate'),
            'job_status' => $request->get('job_status'),

        // $formattedDate = Carbon::createFromFormat('d-m-Y', $inputDate)->format('Y-m-d');
        //     'customer_tel' => $request->get('customer_tel'),
        //     'urgent' => $request->get('urgent'),
        //     'headvaluer_n' => $this->getUserName($request->get('headvaluer')),
        //     'valuer_n' => $this->getUserName($request->get('valuer')),
        //     'startdate' => $startdate,
        //     'inspectiondate' => $inspectiondate,
        //     'lcduedate' => $lcduedate,
        //     'clientduedate' => $clientduedate,
        //     'address_no' => $request->get('address_no'),
        //     'level' => $request->get('level'),
        //     'moo' => $request->get('moo'),
        //     'areaunit' => $request->get('areaunit'),
        //     'soi' => $request->get('soi'),
        //     'soi' => $request->get('soi'),
        //     'deedno' => $request->get('deedno'),
        //     'deedtumbon' => $request->get('deedtumbon'),
        //     'deedamphur' => $request->get('deedamphur'),
        //     'lat' => $lat,
        //     'lng' => $lng,
        //     'land_allocate' => $request->get('land_allocate'),
        //     'publicentrance' => $request->get('publicentrance'),
        //     'building_detail' => $request->get('building_detail'),
        //     'ownership' => $request->get('ownership'),
        //     'ownership_building' => $request->get('ownership_building'),
        //     'mortgage' => $request->get('mortgage'),
        //     'obj_guideline' => $request->get('obj_guideline'),
        //     'obj_method' => $request->get('obj_method'),
        //     'marketvalue' => str_replace(',', '',$request->get('marketvalue')),
        //     'marketvalue_sale' => str_replace(',', '',$request->get('marketvalue_sale')),
        //     'marketvalue_rcn' => str_replace(',', '',$request->get('marketvalue_rcn')),
        //     'marketvalue_ac' => str_replace(',', '',$request->get('marketvalue_ac')),
        //     'marketvalue_unit' => str_replace(',', '',$request->get('marketvalue_unit')),
        //     'room_sum' => str_replace(',', '',$request->get('rdoRoom')),
        //     'liquidity' => $request->get('liquidity'),
        //     'estimatecondition' => $request->get('estimatecondition'),
        //     'remark' => $request->get('remark'),
        ]);

         return redirect('/dashboard')->with('message', 'Update successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function test(Request $request)
    {
        $result = Amphure::where('name_th', 'บางกรวย')->first();
        dd($result->name_th);
       
    }

    public static function gennewbfid()
    {
        $prefix = "LC/67BF-";
        $id = $prefix;
        $id = IdGenerator::generate(['table' => 'jobs', 'field' => 'jobcode', 'length' => 12, 'prefix' => $prefix, 'reset_on_prefix_change' => true]);
        //dd($id);
        return $id;
    }


    public static function gennewrid()
    {
        $prefix = "LC/67R-";
        $id = $prefix;
        $id = IdGenerator::generate(['table' => 'jobs', 'field' => 'jobcode', 'length' => 11, 'prefix' => $prefix, 'reset_on_prefix_change' => true]);
        //dd($id);
        return $id;
    }

    private function  getAmphureCode($apName){
        $output = DB::table('amphures')->where('name_th','LIKE','%'.$apName.'%')->first();
        if (!$output){
            // Throw error, 404 or whatever
            return '1000';
        }
        // dd($output->code);
        return $output->code;
    }


    public function editJobInsertPdf($id)
    {
        $job = Job::find($id);
        $jobcode = str_replace('/', '_', $job->jobcode);
        $job_imgs = DB::select('select * from jobs_img where job_id = ' . $id . ' order by file_name');
        //dd($id);
        return view('livewire.job-insert-pdf')->with('id',$id)->with('jobcode', $jobcode)->with('job_imgs', $job_imgs);
    }

    
    public function editJobInsertFiles($id, $mainfolder, $subfolder)
    {
        //dd($mainfolder);
        $job = Job::find($id);
        $jobcode = str_replace('/', '_', $job->jobcode);

        $sql = "select * from jobs_img ";
        $sql = $sql . "where job_id = '" . $id . "' ";
        if($subfolder != 'all'){
            $sql = $sql . "and file_path like '%" . $subfolder . "%' ";
        }
        $sql = $sql . "order by file_date desc ";

        $job_imgs = DB::select($sql);
        //dd($id);
        return view('livewire.job-insert-files')->with('id',$id)->with('jobcode', $jobcode)->with('job_imgs', $job_imgs)->with('mainfolder', $mainfolder)->with('subfolder', $subfolder);
    }


    public static function getS3FileWithDefault($id, $type){
        //dd($id);
        $result = DB::select("select * from jobs_img where job_id = '" . $id . "' and default_preview = '" . $type . "' ");
        if ($result == null) {
            $output = "";
        }else{
            $output = Storage::disk('s3')->url($result[0]->file_path);
        }
        //dd(Storage::disk('s3')->url($result[0]->file_path));
        //return Storage::disk('s3')->response($result[0]->file_path);
        //return Storage::disk('s3')->url($result[0]->file_path);
        return $output;
    }

    
    public function uploadfile2s3($id, $jobcode, $uploadfiletype, Request $request){ 
        //dd($request->file('file'));

        //dd($id . ' : ' . $jobcode . ' : ' . $uploadfiletype);
        //dd($request->file('input-files'));
        $imageName = $request->file('file')->getClientOriginalName();
        //dd($imageName);
        if($uploadfiletype == 'docs'){
            $fullPath = 'working_files/' . $jobcode.'/docs/';
        }else{
            $fullPath = 'working_files/' . $jobcode.'/imgs/';
        }
        //dd($fullPath);
        $s3 = \Storage::disk('s3');
        $s3->put($fullPath,$imageName);

        //dd('ok');

        // DB::table('jobs_img')->insert([
        //         'jobcode' => str_replace('_', '/', $jobcode),
        //         'file_type' => $uploadfiletype,
        //         'file_path' => $fullPath . $imageName
        //         ]);

        //return response()->json('[uploaded =>/'. $fullPath . '/'. $imageName .']');
        return response()->json(['success'=>$imageName]);
    }
    
    public function dropzoneStorepdf(Request $request)
    {
        $id = $request->get('jobid');
        $jobcode = $request->get('jobcode');
        $image = $request->file('file');
        $file_size = $request->file('file')->getSize();
        $imageName = $image->getClientOriginalName();
        $fullPath = 'working_files/' . $jobcode . '/docs/';

        //$s3 = \Storage::disk('s3');
        //$s3->put($fullPath,$imageName);
        $image->storeAs($fullPath, $imageName, 's3');

        DB::table('jobs_img')->insert([
                'job_id' => $id,
                'jobcode' => str_replace('_', '/', $jobcode),
                'file_name' => pathinfo($fullPath . $imageName, PATHINFO_BASENAME),
                'file_type' => pathinfo($fullPath . $imageName, PATHINFO_EXTENSION),
                'file_size' => $file_size,
                'file_path' => $fullPath . $imageName
            ]);

        // return redirect()->to('/route'); 

        return response()->json(['success'=>$imageName]);
    }

    public function dropzoneStoreimg(Request $request)
    {
        $id = $request->get('jobid2');
        $jobcode = $request->get('jobcode2');
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $file_size = $request->file('file')->getSize();
        $fullPath = 'working_files/' . $jobcode . '/imgs/';
        $file_date = now();
        $image->storeAs($fullPath, $imageName, 's3');

        //dd($image->lastModified($fullPath, $imageName));
        //$document->getSize();
        //$document->getMimeType();
        //Storage::lastModified('file1.jpg');

        DB::table('jobs_img')->insert([
            'job_id' => $id,
            'jobcode' => str_replace('_', '/', $jobcode),
            'file_name' => pathinfo($fullPath . $imageName, PATHINFO_BASENAME),
            'file_date' => $file_date,
            'file_type' => pathinfo($fullPath . $imageName, PATHINFO_EXTENSION),
            'file_size' => $file_size,
            'file_path' => $fullPath . $imageName
        ]);

        return response()->json(['success'=>$imageName]);
    }


    public function dropzoneStoreFiles(Request $request)
    {
        
        // if($request->get('mainfolder') == ''){
        //     error_log('mainfolder is null');
        //     return response()->json(['message'=>'mainfolder is null']);
        // }
        $id = $request->get('jobid');
        $jobcode = $request->get('jobcode');
        $mainfolder = $request->get('mainfolder');
        $subfolder = $request->get('subfolder');
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $file_size = $request->file('file')->getSize();
        $fullPath = $mainfolder . '/' . $jobcode . '/' . $subfolder . '/';
        $file_date = now();
        $image->storeAs($fullPath, $imageName, 's3');

        // check existing files in table
        $result = (new MainController)->MyFind("jobs_img","id","where jobcode = '" . str_replace('_', '/', $jobcode) . "' and file_name = '" . $image->getClientOriginalName() ."' ","" );     
        if($result == '') {
            $fz = (new MainController)->formatBytes($file_size);
            DB::table('jobs_img')->insert([
                'job_id' => $id,
                'jobcode' => str_replace('_', '/', $jobcode),
                'file_name' => pathinfo($fullPath . $imageName, PATHINFO_BASENAME),
                'file_date' => $file_date,
                'file_type' => pathinfo($fullPath . $imageName, PATHINFO_EXTENSION),
                'file_size' => $fz,
                'file_path' => $fullPath . $imageName
            ]);
        }
        
        return response()->json(['upload success'=>$imageName]);
    }


    public function Dz_StoreFiles(Request $request)
    {
        $id = $request->get('jobid');
        $jobcode = $request->get('jobcode');
        $mainfolder = $request->get('mainfolder');
        $subfolder = $request->get('subfolder');
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $file_size = $request->file('file')->getSize();
        $fullPath = $mainfolder . '/' . $subfolder . '/';
        $file_date = now();
        $image->storeAs($fullPath, $imageName, 's3');
        // check existing files in table
        $result = (new MainController)->MyFind("jobs_img","id","where jobcode = '" . $jobcode . "' and file_name = '" . $image->getClientOriginalName() ."' ","" );     
        if($result == '') {
            $fz = (new MainController)->formatBytes($file_size);
            DB::table('jobs_img')->insert([
                'job_id' => $id,
                'jobcode' => str_replace('_', '/', $jobcode),
                'file_name' => pathinfo($fullPath . $imageName, PATHINFO_BASENAME),
                'file_date' => $file_date,
                'file_type' => pathinfo($fullPath . $imageName, PATHINFO_EXTENSION),
                'file_size' => $fz,
                'file_path' => $fullPath . $imageName
            ]);
        }
        
        return response()->json(['upload success'=>$imageName]);
    }

    
    public function deletejobfile($id,$fn){
        //dd($id . "   fn = " . $fn);
        //$fn = "working_files/LC_65BF-1939/Alphard.jpg";
        $img_fn = (new MainController)->MyFind("jobs_img","file_path","where job_id = '" . $id . "' and file_name = '" . $fn ."' ","" );
        $img_id = (new MainController)->MyFind("jobs_img","id","where job_id = '" . $id . "' and file_name = '" . $fn ."' ","" );
        //dd($img_id);

        DB::table('jobs_img')->where('id', $img_id)->delete();

        $s3 = Storage::disk('s3');
        if($s3->exists($img_fn)){
            $s3->delete($img_fn);
        }
      
        // return redirect()->route('editJobInsertFiles',$id);
        //return response()->json(['delete file success'=> $fn]);
        return redirect('/dashboard');
    }


    public function testcode(){
        $result = (new MainController)->MyFind('jobs','jobcode','where id = 15085','' );
        dd($result);
    }

   

}

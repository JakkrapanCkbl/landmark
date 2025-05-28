<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ApiJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'i am hear';
        $jobs = DB::table('jobs')
        ->select('id','jobcode','projectname')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
       
        return response()->json($jobs,200,[], JSON_UNESCAPED_UNICODE);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = Job::create([
            'id' => $request->id,
            'jobcode' => $request->jobcode,
            'reportcode' => $request->reportcode,
            'projectname' => $request->projectname,
            'proplocation' => $request->proplocation,
            'client' => $request->client,
            'customer' => $request->customer,
            'prop_type' => $request->prop_type,
            'prop_size' => $request->prop_size,
            'percentfinish' => $request->percentfinish,
            'startdate' => $request->startdate,
            'inspectiondate' => $request->inspectiondate,
            'lcduedate' => $request->lcduedate,
            'clientduedate' => $request->clientduedate,
            'headvaluer' => $request->headvaluer,
            'valuer' => $request->valuer,
            'job_status' => $request->job_status,
            'province_code' => $request->province_code,
            'amphure_code' => $request->amphure_code,
            'district' => $request->district,
        ]);
        
        if($job){
            return response()->json([
                'status' => 200,
                'message' => "success"
            ],200);
        }else{
            return response()->json([
                'status' => 500,
                'message' => "Someting went wrong"
            ],500);
        }
        
       
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
        //
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'jobcode' => 'required|string',
            'reportcode' => 'required|string',
            'projectname' => 'nullable|string',
            'proplocation' => 'required|string',
            'client' => 'required|string',
            'customer' => 'required|string',
            'prop_type' => 'required|string',
            'prop_size' => 'required|string',
            'startdate' => 'required',
            'inspectiondate' => 'required',
            'lcduedate' => 'required',
            'clientduedate' => 'required',
            'headvaluer' => 'required|string',
            'valuer' => 'nullable|string',
            'job_status' => 'required|string',
            'province_code' => 'required|string',
            'amphure_code' => 'required|string',
            'district' => 'required|string',
            // Add other fields and validation rules as necessary
        ]);

        // Find the item by ID
        $job = Job::findOrFail($id);
        // Update the item with the validated data
        $job->update($validatedData);

        // Return a response, typically the updated item or a success message
        return response()->json([
            'message' => 'Job updated successfully',
            'item' => $job,
        ], 200);
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

    // Login User
    //  public function login(Request $request) {
    //     $user = User::where('email', 'jakkrapan.ckbl@gmail.com')->first();
    //     $token = $user->createToken("Postman", ["*"])->plainTextToken;
    //     $response = [
    //         'user' => $user,
    //         'token' => $token
    //     ];
    //     return response($response, 201);
    // }

    public function update_job_from_report(Request $request, $fieldValue)
    {
        $validatedData = $request->validate([
            'client' => 'nullable|string',
            'customer'=> 'nullable|string', //3 jobcode is $fieldValue
            'reportcode' => 'nullable|string',
            'projectname' => 'nullable|string', //5
            
            'proplocation' => 'nullable|string',
            'obj_method' => 'nullable|string',
            'marketvalue' => 'nullable|string',
            'marketvalue_unit' => 'nullable|string',
            'prop_type' => 'nullable|string', //10

            'prop_size' => 'nullable|string',
            'startdate' => 'nullable|date_format:Y-m-d',
            'inspectiondate' => 'nullable|date_format:Y-m-d',
            'lcduedate' => 'nullable|date_format:Y-m-d',
            'send_check_report_date' => 'nullable|date_format:Y-m-d', //15

            'pre_report_checked_date' => 'nullable|date_format:Y-m-d H:i:s',
            'approve_checked_date' => 'nullable|date_format:Y-m-d H:i:s',
            'clientduedate' => 'nullable|date_format:Y-m-d',
            'valuer' => 'nullable|string',
            'headvaluer' => 'nullable|string', //20

            'advance_by' => 'nullable|string',
            'job_status' => 'nullable|string',
            'job_gps' => 'nullable|string',
            'lat' => 'nullable|string',
            'lng' => 'nullable|string', //25

            'obj_id' => 'nullable|string',
            'jobtype' => 'nullable|string',
            'jobsize' => 'nullable|string',
            'easydiff' => 'nullable|string',
            'valuationfee' => 'nullable|string', //30

            'valuationfee_case' => 'nullable|string',
            'pre_job_checked' => 'nullable|string',
            'pre_checker' => 'nullable|string',
            'approve_checked' => 'nullable|string',
            'link_checked' => 'nullable|string', //35
            
            'link_checked_by' => 'nullable|string',
            'link_checked_date' => 'nullable|date_format:Y-m-d H:i:s',
            'print_checked' => 'nullable|string',
            'print_checked_by' => 'nullable|string',
            'print_checked_date' => 'nullable|date_format:Y-m-d H:i:s', //40

            'file_checked' => 'nullable|string',
            'file_checked_by' => 'nullable|string',
            'file_checked_date' => 'nullable|date_format:Y-m-d H:i:s',
            'job_checked' => 'nullable|string',
            'checker' => 'nullable|string', //45

            'job_checked_date' => 'nullable|date_format:Y-m-d H:i:s',
            'advance_checked' => 'nullable|string',
            'advance_date' => 'nullable|date_format:Y-m-d H:i:s',
            'remark'=> 'nullable|string' //49 end then 50 is active field

            // 'reportcode' => 'nullable|string',
            // 'projectname' => 'nullable|string'
        ]);

        // Find the model using the alternative field (e.g., 'slug' or 'email')
        $item = Job::where('jobcode', $fieldValue)->firstOrFail();
        
        // Update the resource
        $item->update($validatedData);

        // Return a response
        return response()->json([
            'success' => true,
            'message' => 'jobsize updated successfully.',
            'data' => $item,
        ]);
    }

}

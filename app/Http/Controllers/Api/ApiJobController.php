<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;


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
        //
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
}

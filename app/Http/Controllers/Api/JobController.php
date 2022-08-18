<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Http\Resources\JobV2Resource;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if (empty($req->companyId))
            return DB::table('jobs')
            ->join('jobDetails','jobs.id', '=', 'jobDetails.job_id')
            ->join('users','users.id', '=', 'jobs.company_id')
            ->select('jobs.id', 'users.id as company_id', 'jobDetails.title', 'jobDetails.technical', 'jobDetails.salary', 'jobDetails.technical', 'jobDetails.description', 'jobDetails.required', 'jobDetails.deadline', 'users.address', 'users.image', 'jobDetails.created_at','jobDetails.updated_at')->get();
        return DB::table('jobs')
        ->join('jobDetails','jobs.id', '=', 'jobDetails.job_id')
        ->join('users','users.id', '=', 'jobs.company_id')
        ->select('jobs.id', 'users.id as company_id', 'jobDetails.title', 'jobDetails.technical', 'jobDetails.salary', 'jobDetails.technical', 'jobDetails.description', 'jobDetails.required', 'jobDetails.deadline', 'users.address', 'users.image', 'jobDetails.created_at','jobDetails.updated_at')->where('users.id',$req->companyId)->get();
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
        $job = Job::create($request->all());
        return new JobResource($job);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return new JobResource($job);
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
    public function update(Request $request, Job $job)
    {
        $job->update($request->all());
        return new JobResource($job);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
    }
    public function searchJob(Request $request)
    {
        if($request->all() == null or $request->all() == "")
        {
            return DB::table('jobs')->join('jobDetails','jobs.id', '=', 'jobDetails.job_id')
            ->join('users','users.id', '=', 'jobs.company_id')->orderBy('jobs.id', 'desc')->get('*');
        }
        if(!$request->max){
            $request->max = 5000;
        }
        if(!$request->min){
            $request->min = 200;
        }
        $result = DB::table('jobs')
                ->join('jobDetails','jobs.id', '=', 'jobDetails.job_id')
                ->join('users','users.id', '=', 'jobs.company_id')
                ->select('jobs.id', 'jobDetails.title', 'jobDetails.technical', 'jobDetails.salary', 'jobDetails.technical', 'jobDetails.description', 'jobDetails.required', 'jobDetails.deadline', 'users.address', 'users.image', 'jobDetails.created_at','jobDetails.updated_at')

                ->where('users.address', 'like', "%$request->location%")
                ->where('jobDetails.title', 'like', "%$request->title%")
                ->where('jobDetails.technical', 'like', "%$request->technical%")
                ->where('jobDetails.salary', '<', $request->max)
                ->where('jobDetails.salary', '>', $request->min)
                ->orderBy('jobs.id', 'desc')
                ->get();
        return $result;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobReSource;
use App\Models\Job;
use App\Models\JobDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index()
    {
        return JobReSource::collection(Job::paginate(10));
    }

    public function show($id)
    {
        return new JobReSource(Job::findOrFail($id));
    }

    public function create(Request $request)
    {
        $job = Job::create($request->all());

        return response()->json($job, 201);
    }

    public function update(Request $request, Job $job)
    {
        $job->update($request->all());

        return response()->json($job, 200);
    }

    public function delete(Job $job)
    {
        $job->delete();

        return response()->json(null, 204);
    }
}

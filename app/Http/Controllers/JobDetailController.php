<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobDetailReSource;
use App\Models\JobDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobDetailController extends Controller
{
    public function index()
    {
        return JobDetailReSource::collection(JobDetail::paginate(10));
    }

    public function show($id)
    {
        return new JobDetailReSource(JobDetail::findOrFail($id));
    }

    public function create(Request $request)
    {
        $jobDetail = JobDetail::create($request->all());

        return response()->json($jobDetail, 201);
    }

    public function update(Request $request, JobDetail $jobDetail)
    {
        $jobDetail->update($request->all());

        return response()->json($jobDetail, 200);
    }

    public function delete(JobDetail $jobDetail)
    {
        $jobDetail->delete();

        return response()->json(null, 204);
    }
    public function searchByTitle(Request $request)
    {
        if($request->keyword == null)
        {
            return JobDetail::all();
        }
        $result = DB::table('jobdetails')
                ->where('title', 'like', "%$request->keyword%")
                ->orderByDesc('id')
                ->get();
        return $result;
    }

    public function searchBySalary(Request $request)
    {
        if($request->minSalary == null || $request->maxSalary == null)
        {
            return JobDetail::all();
        }
        $result = DB::table('jobDetails')
                ->where('salary', '<=',$request->maxSalary)
                ->where('salary', '>=',$request->minSalary)
                ->orderByDesc('salary')
                ->get();
        return $result;
    }
}

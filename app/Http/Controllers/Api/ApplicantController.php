<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicantRequest;
use App\Http\Resources\ApplicantResource;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Applicant::orderBy('id', 'desc')->get();
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
        $request->validate([
            'job_id' => 'required',
            'student_id' => 'required',
            'year_experience' => 'required|string',
            'cv' => 'required|mimes:txt,pdf',
            'cover_letter' => 'required|mimes:txt,pdf,docx',
        ]);

        $applicant = Applicant::create(array_merge(
            $request->only('job_id', 'student_id', 'year_experience'),
            [
                'cv' => URL::to('/').'/storage/'.$request->file('cv')->store('image/applicants', 'public'),
                'cover_letter' => $request->cover_letter? URL::to('/').'/storage/'.$request->file('cover_letter')->store('image/applicants', 'public') : null
            ]
        ));
        return new ApplicantResource($applicant);
    }

    /**
     * Display the specified resource.
     *
     * @param  Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        return new ApplicantResource($applicant);
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
    public function update(Request $request, Applicant $applicant)
    {
        $applicant->update($request->all());
        return new ApplicantResource($applicant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        $applicant->delete();
    }
}

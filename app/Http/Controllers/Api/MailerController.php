<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Http\Resources\JobV2Resource;
use App\Mail\MailToEmployeer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailerController extends Controller
{
    public function mailToEmployeer(Request $request){
        $mailData = [
            "cv"=>$request->cv,
            "cover_letter"=>$request->cover_letter,
            "student"=>$request->student,
            "name"=>$request->name,
        ];
        Mail::to($request->mailTo)->send(new MailToEmployeer($mailData));
        return "Send email successful!";
    }
}

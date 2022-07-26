<?php

namespace App\Models;
use App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    protected $table = 'jobdetails';
    use HasFactory;
    protected $filltable =[
        'id',
        'title',
        'description',
        'required',
        'technical',
        'salary',
        'deadline',
        'job_id',
    ];
    public function Job () {
        return $this->belongsTo(Job::class, 'job_id', 'id' );
    }
}

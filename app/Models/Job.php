<?php

namespace App\Models;
use App\Models\JobDetail;
use App\Models\JobType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    use HasFactory;
    protected $filltable =[
        'id',
        'company_id',
        'job_type_id',
    ];
    public function jobDetail() {
        return $this->hasOne(JobDetail::class, 'job_id', 'id');
    }

    public function jobType() {
        return $this->hasOne(JobType::class, 'job_id', 'id');
    }
}

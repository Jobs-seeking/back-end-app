<?php

namespace App\Models;
use App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    protected $table = 'jobdetail';
    use HasFactory;

    public function Job () {
        return $this->belongsTo(Job::class, 'job_id', 'id' );
    }
}

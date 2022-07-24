<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = 'jobtype';
    use HasFactory;

    public function job() {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
}

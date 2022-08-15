<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = 'jobtypes';
    use HasFactory;
    protected $fillable =[
        'id',
        'job_type',
    ];
    public function job() {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
}

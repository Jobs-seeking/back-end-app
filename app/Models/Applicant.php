<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicants';
    use HasFactory;
    protected $fillable =[
        'id',
        'job_id',
        'student_id',
        'year_experience',
        'cv',
        'cover_letter',
    ];
}

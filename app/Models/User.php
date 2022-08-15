<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    use HasFactory;
    protected $fillable = [
        'id',
        'email',
        'password',
        'name',
        'gender',
        'dateOfBirth',
        'phone',
        'description',
        'address',
        'status',
        'role',
    ];
    

}

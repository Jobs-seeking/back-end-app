<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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
        'level',
        'dateOfBirth',
        'phone',
        'description',
        'address',
        'status',
        'role',
    ];
}

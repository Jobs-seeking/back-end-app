<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'userinfos';
    use HasFactory;
    protected $filltable = [
        'id',
        'email',
        'password',
        'dateOfBirth',
        'phone',
        'description',
        'address',
        'status',
        'role',
    ];

}

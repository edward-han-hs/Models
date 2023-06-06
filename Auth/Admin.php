<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'phone',
        'username',
        'password',
        'password_update_log',
        'staff_id',
        'role_id',
        'department_id',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'password_update_log'
    ];
}
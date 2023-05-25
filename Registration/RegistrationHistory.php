<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrationHistory extends Model
{
    //注册历史表
    use SoftDeletes,BeasModel;
    protected $guarded = [];
    protected $table = 'registration_history';
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}

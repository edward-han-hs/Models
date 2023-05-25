<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;;
use Illuminate\Database\Eloquent\Model;

class UserCounpon extends Model
{
    protected $table = "user_coupon";
    
    use SoftDeletes,BeasModel;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}

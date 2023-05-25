<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminModule extends Model
{
    use SoftDeletes;
    
    protected  $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    public static function getModulesByAuth($user)
    {
      return self::where('status', 1)->get()->toArray();
    }
}

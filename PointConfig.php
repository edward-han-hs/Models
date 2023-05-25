<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PointConfig extends Model
{
    protected  $table  = 'point_config';
    use HasFactory,SoftDeletes,BeasModel;
    protected function serializeDate(\DateTimeInterface $date)
    {  
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}

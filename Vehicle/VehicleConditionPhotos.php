<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class VehicleConditionPhotos extends Model
{
    protected $table = "vehicle_condition_photo";
    
    use SoftDeletes,BeasModel;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}

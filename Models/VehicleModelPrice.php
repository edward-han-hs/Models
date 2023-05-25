<?php

namespace App\Models\Models;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleModelPrice extends Model
{
    use HasFactory,BeasModel,SoftDeletes;
    protected $table = "vehicle_model_price_set";
    
    protected function serializeDate(\DateTimeInterface $date) {
		return $date->format($this->dateFormat ?: 'Y-m-d H:i');
	}
}

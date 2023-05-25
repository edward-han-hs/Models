<?php

namespace App\Models\Device;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleDeviceConfig extends Model
{
    use HasFactory,BeasModel,SoftDeletes;
    protected $table = "vehicle_device_config";
	protected function serializeDate(\DateTimeInterface $date) {
		return $date->format($this->dateFormat ?: 'Y-m-d H:i');
	}
}

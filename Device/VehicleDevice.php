<?php

namespace App\Models\Device;

use App\Models\BeasModel;
use App\Models\Vehicles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleDevice extends Model
{
    use HasFactory,BeasModel,SoftDeletes;
    
	protected function serializeDate(\DateTimeInterface $date) {
		return $date->format($this->dateFormat ?: 'Y-m-d H:i');
	}
	public function vehicle(){
		return $this->hasOne(Vehicles::class,'id','vid');
	}	
	public function config(){
		return $this->hasOne(VehicleDeviceConfig::class,'device_id','id');
	}
	public function reports()
	{
		return $this->hasOne(VehicleDeviceReports::class,'vehicleid','vehicleid');
	}
}

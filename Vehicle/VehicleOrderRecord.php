<?php

namespace App\Models\Vehicle;
use App\Models\BeasModel;
use App\Models\Vehicles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class VehicleOrderRecord extends Model
{
    protected $table = "vehicle_order_record";
    use HasFactory,BeasModel,SoftDeletes;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    public function info(){
        return $this->hasOne(VehicleOrderInfo::class,'order_info_id','id');
    }
}

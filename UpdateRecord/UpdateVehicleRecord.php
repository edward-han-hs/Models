<?php

namespace App\Models\UpdateRecord;

use App\Models\Admin;
use App\Models\BeasModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UpdateVehicleRecord extends Model
{
    protected $table = "update_vehicle_record";
    use HasFactory,BeasModel,SoftDeletes;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    public function admin(){
        return $this->hasOne(Admin::class,'id','admin_id');
    }
}

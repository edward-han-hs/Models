<?php

namespace App\Models;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Device\VehicleDevice;

class Vehicles extends Model
{
    use SoftDeletes, BeasModel;

    protected $table = "vehicle";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'vehicle_name',
        'vehicle_image',
        'vehicle_type',
        'vehicle_color',
        'seats',
        'plate_number',
        'photo_key',
        'is_active',
        'car_park_no',
        'deck_no',
        'lot_no',
        'device_id',
        'vehicle_iu',
        'state_of_driving',
        'solved_exterior_damage',
        'solved_interior_damage',
        'late_maintenance',
        'late_cleaning',
        'phv_status',
        'comments',
        'admin_id',
        'age_Limit',
        'malaysia_entry',
        'deck',
        'dealer_id',
        'disable_time',
        'vehicle_status',
    ];

    //关联Device表
    public function device()
    {
        return $this->hasOne(Device::class, 'id', 'device_id');
    }
    //关联Dealer表
    public function dealer()
    {
        return $this->hasOne(DealerModel::class, 'id', 'dealer_id');
    }
    //关联VehicleCategorys表
    public function vehicle_categorys()
    {
        return $this->hasOne(VehicleCategorys::class, 'vehicle_id', 'id');
    }
    //关联VehicleModels表
    public function vehicle_model()
    {
        return $this->hasOne(VehicleModels::class, 'vehicle_id', 'id');
    }
    //关联VehicleCarPark表
    public function vehicle_car_park()
    {
        return $this->hasOne(VehicleCarParks::class, 'vehicle_id', 'id');
    }
    public function vehicle_car_park_to()
    {
        return $this->belongsToMany(CarPark::class, 'vehicle_car_park', 'vehicle_id', 'car_park_id');
    }
    public function vehicle_condition_photo()
    {
        return $this->hasOne(VehicleConditionPhotos::class, 'vehicle_id', 'id');
    }
    public function vehicle_devices()
    {
        return $this->hasOne(VehicleDevice::class, 'vid', 'id');
    }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}
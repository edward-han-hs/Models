<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarPark extends Model
{
    use SoftDeletes, HasFactory, BeasModel;

    protected $table = "car_park";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'address_id',
        'code',
        'number_lot',
        'location_id',
        'availablelots',
        'availabledeck',
        'available_lots',
        'available_deck',
        'status',
        'admin_id',
    ];

    protected $visible = ['id', 'name', 'address_id', 'code', 'number_lot', 'location_id', 'availablelots', 'availabledeck', 'available_lots', 'available_deck', 'status', 'address', 'location', 'admin_id', 'created_at', 'admin', 'carparkVehicle']; //返回字段

    //关联Address表
    public function address()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }
    //关联 location 表
    public function location()
    {
        return $this->hasOne(CarParkLocation::class, 'id', 'location_id');
    }
    //关联 admin
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    }

    //站点下的车辆
    public function carparkVehicle()
    {
        return $this->belongsToMany(Vehicles::class, 'vehicle_car_park', 'car_park_id', 'vehicle_id');
        //  return  $this->hasMany(VehicleCarParks::class,'car_park_id','id');
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }


}
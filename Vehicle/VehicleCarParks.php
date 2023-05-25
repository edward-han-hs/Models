<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class VehicleCarParks extends Model
{
    use SoftDeletes, BeasModel;

    protected $table = "vehicle_car_park";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vehicle_id',
        'car_park_id',
        'available_deck',
        'available_lots',
    ];

    //关联CarPark表
    public function car_park()
    {
        return $this->hasOne(CarPark::class, 'id', 'car_park_id');
    }
    public function vehicle()
    {
        return $this->hasOne(Vehicles::class, 'id', 'vehicle_id');
    }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}
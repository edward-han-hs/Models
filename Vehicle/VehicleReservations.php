<?php

namespace App\Models;

use App\Models\Vehicle\VehicleOrderRecord;
use App\Models\BeasModel;
use App\Models\Booking\BookingRecord;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class VehicleReservations extends Model
{

    use SoftDeletes, BeasModel;

    protected $table = "vehicle_reservation";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'orderon',
        'user_id',
        'car_park_id',
        'vehicle_id',
        'cancelled_at',
        'booking_id',
        'vehicle_device_number',
        'reservation_status',
        'order_id',
        'start_time',
        'end_time',
    ];

    //关联车辆表
    public function vehicle()
    {
        return $this->hasOne(Vehicles::class, 'id', 'vehicle_id');
    }

    //关联站点(停车场)表
    public function car_park()
    {
        return $this->hasOne(CarPark::class, 'id', 'car_park_id');
    }

    //关用户信息表
    public function user()
    {
        return $this->hasOne(Users::class, 'id', 'user_id');
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    public function order()
    {
        return $this->belongsTo(VehicleOrderRecord::class, 'order_id', 'id');
    }

    public function Booking_record()
    {
        return $this->belongsTo(BookingRecord::class, 'booking_id', 'id');
    }
}
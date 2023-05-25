<?php

namespace App\Models\Booking;

use App\Models\BeasModel;
use App\Models\VehicleReservations;
use App\Models\Vehicles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingRecord extends Model
{
    use HasFactory, BeasModel, SoftDeletes; //预约记录

    protected $table = "booking_record";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'booking_id',
        'details_amount',
        'money',
        'transaction_id',
        'remark',
        'booking_status',
        'bill_type',
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    /**
     * 关联预约订单
     */
    public function Reservation()
    {
        return $this->hasOne(VehicleReservations::class, 'booking_id', 'id');
    }


}
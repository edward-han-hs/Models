<?php

namespace App\Models\Order;

use Carbon\Carbon;
use App\Abstracts\Model;

class Order extends Model
{
    protected $table = "orders";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'order_no',
        'status',
        'user_id',
        'vehicle_id',
        'carpark_id',
        'start_time',
        'end_time',
        'actual_start_time',
        'actual_end_time',
        'start_mileage',
        'end_mileage',
        'rating',
        'rating_desc',
        'cancelled_at',
    ];

    protected $visible = ['uuid', 'order_no', 'status', 'user_id', 'vehicle_id', 'carpark_id', 'start_time', 'end_time', 'actual_start_time', 'actual_end_time', 'start_mileage', 'end_mileage', 'rating', 'rating_desc', 'cancelled_at', 'created_by', 'updated_by', 'created_at', 'updated_at', 'order_extensions', 'order_item'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function order_extensions()
    {
        return $this->hasMany('App\Models\Order\OrderExtension');
    }

    public function order_item()
    {
        return $this->morphOne('App\Models\Order\OrderItemable', 'itemable');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle\Vehicle');
    }

    public function carpark()
    {
        return $this->belongsTo('App\Models\Carpark\Carpark');
    }
}
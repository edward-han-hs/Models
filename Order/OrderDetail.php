<?php

namespace App\Models\Order;

use Carbon\Carbon;
use App\Abstracts\Model;

class OrderDetail extends Model
{
    protected $table = "order_details";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'order_no',
        'order_id',
        'start_time',
        'end_time',
        'price_0',
        'price_1',
        'price_2',
        'cdw',
        'mte',
        'gst',
        'subtotal',
        'total',
        'penalty_charge',
        'mileage_charge',
        'redeemed_point',
    ];

    protected $visible = ['uuid', 'order_no', 'order_id', 'start_time', 'end_time', 'price_0', 'price_1', 'price_2', 'cdw', 'mte', 'gst', 'subtotal', 'total', 'penalty_charge', 'mileage_charge', 'redeemed_point', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order\Order');
    }
}
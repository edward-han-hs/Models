<?php

namespace App\Models\Order;

use Carbon\Carbon;
use App\Abstracts\Model;

class OrderItemable extends Model
{
    protected $table = "order_itemables";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'itemable_type',
        'itemable_id',
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

    protected $visible = ['itemable_type', 'itemable_id', 'price_0', 'price_1', 'price_2', 'cdw', 'mte', 'gst', 'subtotal', 'total', 'penalty_charge', 'mileage_charge', 'redeemed_point', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function itemable()
    {
        return $this->morphTo();
    }
}
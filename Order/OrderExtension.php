<?php

namespace App\Models\Order;

use Carbon\Carbon;
use App\Abstracts\Model;

class OrderExtension extends Model
{
    protected $table = "order_extensions";

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
    ];

    protected $visible = ['uuid', 'order_no', 'order_id', 'start_time', 'end_time', 'created_by', 'updated_by', 'created_at', 'updated_at'];

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

    public function order_item()
    {
        return $this->morphOne('App\Models\Order\OrderItemable', 'itemable');
    }
}
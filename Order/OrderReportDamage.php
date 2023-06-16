<?php

namespace App\Models\Order;

use Carbon\Carbon;
use App\Abstracts\Model;

class OrderReportDamage extends Model
{
    protected $table = "order_report_damages";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'key',
        'value',
    ];

    protected $visible = ['order_id', 'key', 'value', 'created_by', 'updated_by', 'created_at', 'updated_at'];

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
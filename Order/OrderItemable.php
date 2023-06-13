<?php

namespace App\Models\Order;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItemable extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "order_itemables";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'itemable_type',
        'itemable_id',
        'charges',
        'cdw',
        'mte',
        'gst',
        'subtotal',
        'total',
        'penalty_charge',
        'mileage_charge',
        'redeemed_point',
    ];

    protected $visible = ['itemable_type', 'itemable_id', 'charges', 'cdw', 'mte', 'gst', 'subtotal', 'total', 'penalty_charge', 'mileage_charge', 'redeemed_point', 'created_by', 'updated_by', 'created_at', 'updated_at'];

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

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
<?php

namespace App\Models\Order;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderExtension extends Model
{
    use SoftDeletes, HasFactory;

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

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
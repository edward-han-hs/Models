<?php

namespace App\Models\Voucher;

use Carbon\Carbon;
use App\Abstracts\Model;

class Voucher extends Model
{
    protected $table = "vouchers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'code',
        'desc',
        'type',
        'amount',
        'start_date',
        'end_date',
        'enabled',
        'usage_limit_per_customer',
        'quantity',
        'condition',
        'publicity',
    ];

    protected $visible = ['uuid', 'code', 'description', 'type', 'amount', 'start_date', 'end_date', 'enabled', 'usage_limit_per_customer', 'quantity', 'condition', 'publicity', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user_vouchers()
    {
        return $this->hasMany('App\Models\User\UserVoucher');
    }
}
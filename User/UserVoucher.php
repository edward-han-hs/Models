<?php

namespace App\Models\User;

use Carbon\Carbon;
use App\Abstracts\Model;
use Laravel\Sanctum\HasApiTokens;

class UserVoucher extends Model
{
    use HasApiTokens;

    protected $table = "user_vouchers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'voucher_id',
        'valid_date',
        'status',
    ];

    protected $visible = ['user_id', 'voucher_id', 'valid_date', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }
}
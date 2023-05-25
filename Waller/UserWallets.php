<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
;
use Illuminate\Database\Eloquent\Model;

class UserWallets extends Model
{
    use SoftDeletes, BeasModel;
    protected $table = "user_wallets";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'currency',
        'wallet_type',
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use SoftDeletes, BeasModel;
    protected $table = "user_address";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'postal_code',
        'unit_number',
        'detail_address',
        'country_code',
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    public static function getAddress($user_id)
    {
        return self::where('user_id', $user_id)->first()?->toArray();
    }
}
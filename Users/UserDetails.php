<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{

    use SoftDeletes, BeasModel;
    protected $table = "user_details";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'user_id',
        'address_id',
        'date_or_birth',
        'nric',
        'driving_license_validity',
        'driving_license_class',
        'issuedate',
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    public function address()
    {
        return $this->hasOne(UserAddress::class, 'id', 'address_id');
    }
    //用户其他信息
    public static function getOne($user_id, $select = "*")
    {
        return self::with([
            'address' => function ($query) {
                $query->select(['id', 'postal_code', 'detail_address', 'unit_number', 'country_code', 'user_id']);
            }
        ])->select($select)->where('user_id', $user_id)->first()?->toArray();
    }
}
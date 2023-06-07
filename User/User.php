<?php

namespace App\Models\User;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'email',
        'name',
        'password',
        'mobile_prefix',
        'mobile_no',
        'sex',
        'dob',
        'nric',
        'driving_license_class',
        'driving_license_validity',
        'driving_license_issue_date',
        'driving_license_expiry_date',
        'block',
        'floor',
        'unit',
        'address_1',
        'address_2',
        'postal_code',
        'city',
        'state',
        'two_years_driving',
        'agreed_tnc',
        'do_not_contact',
        'bookmarks',
        'reward_point',
        'membership_point',
        'status',
        'referral_code',
        'enabled',
        'photo_id',
    ];

    protected $visible = ['uuid', 'email', 'name', 'password', 'mobile_prefix', 'mobile_no', 'sex', 'dob', 'nric', 'driving_license_class', 'driving_license_validity', 'driving_license_issue_date', 'driving_license_expiry_date', 'block', 'floor', 'unit', 'address_1', 'address_2', 'postal_code', 'city', 'state', 'two_years_driving', 'agreed_tnc', 'do_not_contact', 'bookmarks', 'reward_point', 'membership_point', 'status', 'referral_code', 'enabled', 'photo_id', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
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
<?php

namespace App\Models\Setting;

use Carbon\Carbon;
use App\Abstracts\Model;

class MembershipTier extends Model
{
    protected $table = "membership_tiers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'code',
        'name',
        'point_from',
        'point_to',
        'multiplier',
    ];

    protected $visible = ['uuid', 'code', 'name', 'point_from', 'point_to', 'multiplier', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
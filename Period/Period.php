<?php

namespace App\Models\Period;

use Carbon\Carbon;
use App\Abstracts\Model;

class Period extends Model
{
    protected $table = "periods";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'start_date',
        'end_date',
    ];

    protected $visible = ['uuid', 'start_date', 'end_date', 'created_by', 'updated_by', 'created_at', 'updated_at', 'details'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function details()
    {
        return $this->hasMany('App\Models\Period\PeriodDetail');
    }
}
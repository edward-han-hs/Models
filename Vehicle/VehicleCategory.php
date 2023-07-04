<?php

namespace App\Models\Vehicle;

use Carbon\Carbon;
use App\Abstracts\Model;

class VehicleCategory extends Model
{
    protected $table = "vehicle_categories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'code',
        'name',
        'description',
        'peak_rate',
        'off_peak_rate',
        'super_off_peak_rate',
    ];

    protected $visible = ['uuid', 'code', 'name', 'description', 'peak_rate', 'off_peak_rate', 'super_off_peak_rate', 'created_by', 'updated_by', 'created_at', 'updated_at'];

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
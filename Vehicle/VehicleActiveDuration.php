<?php

namespace App\Models\Vehicle;

use Carbon\Carbon;
use App\Abstracts\Model;

class VehicleActiveDuration extends Model
{
    protected $table = "vehicle_active_durations";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vehicle_id',
        'start_time',
        'end_time',
    ];

    protected $visible = ['vehicle_id', 'start_time', 'end_time', 'created_by', 'updated_by', 'created_at', 'updated_at'];

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
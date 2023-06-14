<?php

namespace App\Models\Vehicle;

use Carbon\Carbon;
use App\Abstracts\Model;

class VehicleModel extends Model
{
    protected $table = "vehicle_models";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'code',
        'name',
        'desc',
    ];

    protected $visible = ['uuid', 'code', 'name', 'desc', 'created_by', 'updated_by', 'created_at', 'updated_at'];

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
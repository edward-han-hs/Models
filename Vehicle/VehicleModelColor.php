<?php

namespace App\Models\Vehicle;

use Carbon\Carbon;
use App\Abstracts\Model;

class VehicleModelColor extends Model
{
    protected $table = "vehicle_model_colors";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'model_id',
        'name',
        'description',
    ];

    protected $visible = ['model_id', 'name', 'description', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}
<?php

namespace App\Models\Vehicle;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleModelColor extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "vehicle_model_colors";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'model_id',
        'name',
        'desc',
    ];

    protected $visible = ['model_id', 'name', 'desc', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}
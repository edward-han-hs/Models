<?php

namespace App\Models\Vehicle;

use Carbon\Carbon;
use App\Abstracts\Model;

class Vehicle extends Model
{
    protected $table = "vehicles";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'transmission',
        'seat',
        'plate_no',
        'deck',
        'lot',
        'iu',
        'malaysia_entry',
        'age_limit',
        'condition',
        'solved_exterior_damage',
        'solved_interior_damage',
        'phv_status',
        'enabled',
        'carpark_id',
        'category_id',
        'model_id',
        'tracker_id',
        'dealer_id',
    ];

    protected $visible = ['uuid', 'name', 'transmission', 'seat', 'plate_no', 'deck', 'lot', 'iu', 'malaysia_entry', 'age_limit', 'condition', 'solved_exterior_damage', 'solved_interior_damage', 'phv_status', 'enabled', 'carpark_id', 'category_id', 'model_id', 'tracker_id', 'dealer_id', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function active_durations()
    {
        return $this->hasMany('App\Models\Vehicle\VehicleActiveDuration');
    }

    public function carpark()
    {
        return $this->belongsTo('App\Models\Carpark\Carpark');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Vehicle\VehicleCategory');
    }

    public function model()
    {
        return $this->belongsTo('App\Models\Vehicle\VehicleModel');
    }
}
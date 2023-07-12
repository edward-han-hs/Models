<?php

namespace App\Models\Carpark;

use Carbon\Carbon;
use App\Abstracts\Model;

class Carpark extends Model
{
    protected $table = "carparks";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'code',
        'name',
        'enabled',
        'block',
        'floor',
        'unit',
        'address_1',
        'address_2',
        'postal_code',
        'city',
        'state',
        'country',
        'latitude',
        'longitude',
        'total_slots',
        'available_lots',
        'available_decks',
        'location_id',
    ];

    protected $visible = ['uuid', 'code', 'name', 'enabled', 'block', 'floor', 'unit', 'address_1', 'address_2', 'postal_code', 'city', 'state', 'country', 'latitude', 'longitude', 'total_slots', 'available_lots', 'available_decks', 'location_id', 'created_by', 'updated_by', 'created_at', 'updated_at', 'vehicles'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle\Vehicle');
    }

}
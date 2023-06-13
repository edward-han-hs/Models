<?php

namespace App\Models\Carpark;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carpark extends Model
{
    use SoftDeletes, HasFactory;

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
        'lots',
        'status',
        'block',
        'floor',
        'unit',
        'address_1',
        'address_2',
        'postal_code',
        'city',
        'state',
        'lat',
        'long',
        'location_id',
    ];

    protected $visible = ['uuid', 'code', 'name', 'lots', 'status', 'block', 'floor', 'unit', 'address_1', 'address_2', 'postal_code', 'city', 'state', 'lat', 'long', 'location_id', 'created_by', 'updated_by', 'created_at', 'updated_at', 'vehicles'];

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

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
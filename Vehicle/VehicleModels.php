<?php

namespace App\Models;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class VehicleModels extends Model
{
    use SoftDeletes, BeasModel;

    protected $table = "vehicle_model";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'model_code',
        'vehicle_id',
    ];

    //关联Models表
    public function models()
    {
        return $this->hasOne(Models::class, 'model_code', 'model_code');
    }
    //关联vehicle表
    public function vehicle()
    {
        return $this->hasOne(Vehicles::class, 'id', 'vehicle_id');
    }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}
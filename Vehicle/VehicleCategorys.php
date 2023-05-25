<?php

namespace App\Models;

use App\Models\BeasModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class VehicleCategorys extends Model
{
    use SoftDeletes, BeasModel;

    protected $table = "vehicle_category";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vehicle_id',
        'category_code',
    ];

    //关联Categorys表
    public function category()
    {
        return $this->hasOne(Category::class, 'code', 'category_code');
    }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}
<?php

namespace App\Models\Setting;

use App\Abstracts\Model;

class OrderConfig extends Model
{
    protected $table = "order_configs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'value',
        'unit',
    ];

    protected $visible = ['name', 'description', 'value', 'unit', 'created_by', 'updated_by', 'created_at', 'updated_at'];
}